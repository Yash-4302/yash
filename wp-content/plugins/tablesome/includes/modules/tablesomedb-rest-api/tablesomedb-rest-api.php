<?php

namespace Tablesome\Includes\Modules\TablesomeDB_Rest_Api;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (!class_exists('\Tablesome\Includes\Modules\TablesomeDB_Rest_Api\TablesomeDB_Rest_Api')) {
    class TablesomeDB_Rest_Api
    {
        public $tablesome_db;
        public $workflow_library;

        public function __construct()
        {

        }
        public function init()
        {
            $namespece = 'tablesome/v1';

            $this->tablesome_db = new \Tablesome\Includes\Modules\TablesomeDB\TablesomeDB();

            /** All REST-API Routes */
            $routes_controller = new \Tablesome\Includes\Modules\TablesomeDB_Rest_Api\Routes();
            $routes = $routes_controller->get_routes();

            foreach ($routes as $route) {
                /** Register the REST route */
                register_rest_route($namespece, $route['url'], $route['args']);
            }
        }

        public function api_access_permission()
        {
            if (get_current_user_id() >= 1) {
                return true;
            }
            $error_code = "UNAUTHORIZED";
            return new \WP_Error($error_code, $this->get_error_message($error_code));
        }

        public function get_error_message($error_code)
        {
            $messages = array(
                'UNAUTHORIZED' => "You don't have an permission to access this resource",
                'REQUIRED_POST_ID' => "Required, Tablesome table ID ",
                'INVALID_POST' => "Invalid, Tablesome post",
                'REQUIRED_RECORD_IDS' => "Required, Tablesome table record IDs",
                'UNABLE_TO_CREATE' => "Unable to create a post.",
            );

            $message = isset($messages[$error_code]) ? $messages[$error_code] : 'Something Went Wrong, try later';
            return $message;
        }

        public function get_previous_sort_settings($table_id)
        {
            $previous_table_meta_data = get_tablesome_data($table_id);
            // error_log('$previous_table_meta_data : ' . print_r($previous_table_meta_data, true));
            $previous_sort_settings = array();
            if (isset($previous_table_meta_data['options']) && isset($previous_table_meta_data['options']['sort'])) {
                $previous_sort_settings = $previous_table_meta_data['options']['sort'];
            }

            return $previous_sort_settings;
        }

        public function is_admin_user()
        {
            if (current_user_can('manage_options')) {
                return true;
            }
            return false;
        }

        public function get_params($request)
        {
            $params = $request->get_params();
            $params['table_id'] = isset($params['table_id']) ? intval($params['table_id']) : 0;
            $params['columns'] = isset($params['columns']) ? $params['columns'] : [];
            $params['last_column_id'] = isset($params['last_column_id']) ? intval($params['last_column_id']) : 0;
            $params['triggers'] = isset($params['triggers']) ? $params['triggers'] : [];
            $params['editorState'] = isset($params['editorState']) ? $params['editorState'] : [];
            $params['display'] = isset($params['display']) ? $params['display'] : [];
            $params['style'] = isset($params['style']) ? $params['style'] : [];
            $params['access_control'] = isset($params['access_control']) ? $params['access_control'] : [];
            $params['mode'] = isset($params['mode']) ? $params['mode'] : '';
            $params['records_updated'] = isset($params['records_updated']) ? $params['records_updated'] : [];
            $params['records_deleted'] = isset($params['records_deleted']) ? $params['records_deleted'] : [];
            $params['records_inserted'] = isset($params['records_inserted']) ? $params['records_inserted'] : [];

            error_log('params : ' . print_r($params, true));

            // $filters = new \Tablesome\Includes\Filters();
            // $params = $filters->sanitizing_the_array_values($params);

            $params = $this->get_sanitized_params($params);

            return $params;
        }

        public function get_sanitized_params($params)
        {
            $params['records_updated'] = $this->get_sanitized_records($params['records_updated']);
            $params['records_deleted'] = $this->get_sanitized_records($params['records_deleted']);
            $params['records_inserted'] = $this->get_sanitized_records($params['records_inserted']);

            return $params;
        }

        public function get_sanitized_records($records_updated = [])
        {
            if (empty($records_updated)) {
                return $records_updated;
            }

            foreach ($records_updated as $key => $value) {

                $content = isset($value['content']) ? $value['content'] : [];
                foreach ($content as $key2 => $cell) {
                    $type = isset($cell['type']) ? $cell['type'] : 'text';

                    if (isset($records_updated[$key]['content'][$key2]['value'])) {
                        $records_updated[$key]['content'][$key2]['value'] = $this->sanitize_by_type($type, $value);
                    }
                    if (isset($records_updated[$key]['content'][$key2]['html'])) {
                        $records_updated[$key]['content'][$key2]['html'] = $this->sanitize_by_type('html', $value);
                    }
                }
            }

            return $records_updated;

        }

        public function sanitize_by_type($type, $content)
        {
            if ($type == 'text') {
                return sanitize_text_field($content);
            } else if ($type == 'html') {
                return tablesome_wp_kses($content);
            } else if ($type == 'number') {
                return intval($content);
            } else {
                return tablesome_wp_kses($content);
            }

        }

        public function get_param_rules()
        {

            $rules = [
                'column' => [
                    'id' => 'number',
                    'name' => 'string',
                    'type' => 'string',
                    'show_time' => 'number',
                    'index' => 'number',
                ],
                'record' => [
                    'record_id' => 'number',
                    'rank_order' => 'string',
                    'content' => 'cell',
                    'cell' => [
                        'type' => 'string',
                        'html' => 'html',
                        'value' => '',
                        'column_id' => 'number',
                    ],

                ],

            ];
            return $rules;

        }

        public function dispatch_mixpanel_event($params)
        {

            $event_params = [];
            error_log('dispatch_mixpanel_event() params[triggers] : ' . print_r($params['triggers'], true));

            if (!empty($params['triggers'])) {
                $event_params = $this->get_triggers_and_actions($params['triggers'], $event_params);
                // error_log('dispatch_mixpanel_event() event_params : ' . print_r($event_params, true));
            }

            $event_params = $this->update_records_count($params, $event_params);
            $event_params = $this->update_columns($params, $event_params);
            $event_params = $this->update_editor_settings($params, $event_params);
            $event_params = $this->update_display_settings($params, $event_params);
            $event_params = $this->update_style_settings($params, $event_params);

            $event_params['table_id'] = $params['table_id'];
            $event_params['mode'] = $params['mode'];
            $event_params['triggers_count'] = count($params['triggers']);
            $event_params['columns_count'] = count($params['columns']);

            $dispatcher = new \Tablesome\Includes\Tracking\Dispatcher_Mixpanel();
            $dispatcher->send_single_event('tablesome_table_save', $event_params);

            error_log('dispatch_mixpanel_event() event_params : ' . print_r($event_params, true));
        }

        public function update_style_settings($params, $event_params)
        {
            $event_params['style'] = isset($params['style']) ? $params['style'] : [];
            return $event_params;
        }

        public function update_display_settings($params, $event_params)
        {
            $event_params['display'] = isset($params['display']) ? $params['display'] : [];
            return $event_params;
        }

        public function update_editor_settings($params, $event_params)
        {
            $event_params['access_control'] = isset($params['access_control']) ? $params['access_control'] : [];
            return $event_params;
        }

        public function update_columns($params, $event_params)
        {
            $event_params['columns_count'] = count($params['columns']);
            // $event_params['columns'] = $params['columns'];

            foreach ($params['columns'] as $key => $column) {
                $format = isset($column['format']) ? $column['format'] : 'text';
                if (!isset($event_params['columns'][$format])) {
                    $event_params['columns'][$format] = 1;
                } else {
                    $event_params['columns'][$format] += 1;
                }

            }

            return $event_params;
        }

        public function update_records_count($params, $event_params)
        {
            $event_params['records_updated_count'] = isset($params['records_updated']) ? count($params['records_updated']) : 0;
            $event_params['records_deleted_count'] = isset($params['records_deleted']) ? count($params['records_deleted']) : 0;
            $event_params['records_inserted_count'] = isset($params['records_deleted']) ? count($params['records_inserted']) : 0;

            $event_params['records_count'] = $event_params['records_updated_count'] + $event_params['records_deleted_count'] + $event_params['records_inserted_count'];

            return $event_params;
        }

        public function get_triggers_and_actions($triggers, $event_params)
        {
            $event_params['triggers'] = [];
            $event_params['actions'] = [];
            // $workflow_library = new \Tablesome\Includes\Workflow\Library();

            $this->workflow_library = get_tablesome_workflow_library();

            foreach ($triggers as $trigger) {
                $trigger_id = $trigger['trigger_id'];
                $trigger_name = $this->workflow_library->get_trigger_name($trigger_id);

                if (!isset($event_params['triggers'][$trigger_name])) {
                    $event_params['triggers'][$trigger_name] = 1;
                } else {
                    $event_params['triggers'][$trigger_name]++;
                }

                if (!isset($trigger['actions']) || empty($trigger['actions'])) {
                    continue;
                }

                foreach ($trigger['actions'] as $action) {
                    $action_id = $action['action_id'];
                    $action_name = $this->workflow_library->get_action_name($action_id);
                    // $event_params['action_names'][] = $action_name;
                    if (!isset($event_params['actions'][$action_name])) {
                        $event_params['actions'][$action_name] = [];
                    }
                    if (!isset($event_params['actions'][$action_name]['count'])) {
                        $event_params['actions'][$action_name]['count'] = 1;
                    } else {
                        $event_params['actions'][$action_name]['count']++;
                    }

                    if ($action['action_id'] == 1) {
                        $event_params['actions'][$action_name]['autodetect_enabled'] = isset($action['autodetect_enabled']) ? $action['autodetect_enabled'] : false;
                        $event_params['actions'][$action_name]['enable_duplication_prevention'] = isset($action['enable_duplication_prevention']) ? $action['enable_duplication_prevention'] : false;
                        $event_params['actions'][$action_name]['enable_submission_limit'] = isset($action['enable_submission_limit']) ? $action['enable_submission_limit'] : false;
                    }
                }
            }

            return $event_params;
        }

        public function create_or_update_table($request)
        {
            // $params = $request->get_params();
            $params = $this->get_params($request);
            // $params = $this->get_sanitized_params($params);
            $table = new \Tablesome\Includes\Core\Table();

            // Dispatch to Mixpanel
            $this->dispatch_mixpanel_event($params);

            if ($params['mode'] == 'read-only') {
                $response = array(
                    'table_id' => $params['table_id'],
                    'status' => 'success',
                );
                return rest_ensure_response($response);
            }

            // Previous saved value
            $previous_sort_settings = $this->get_previous_sort_settings($params['table_id']);

            // Only Admin User can change the sort settings
            if ($this->is_admin_user()) {
                $sort = isset($params['sort']) ? $params['sort'] : $previous_sort_settings;
            } else {
                $sort = $previous_sort_settings;
            }

            // error_log(' triggers : ' . print_r($params['triggers'], true));
            // error_log(' display : ' . print_r($params['display'], true));

            {
                $post_data = array(
                    'post_title' => isset($params['table_title']) ? $params['table_title'] : 'Untitled Table',
                    'post_type' => TABLESOME_CPT,
                    'post_content' => isset($params['content']) ? $params['content'] : '',
                    'post_status' => isset($params['table_status']) ? $params['table_status'] : 'publish',
                );
            }

            $params['table_id'] = $table->insert_or_update_post($params['table_id'], $post_data);

            if (empty($params['table_id'])) {
                $response = array(
                    'status' => 'failed',
                    'message' => $this->get_error_message('UNABLE_TO_CREATE'),
                );
                return rest_ensure_response($response);
            }

            set_tablesome_table_triggers($params['table_id'], $params['triggers']);

            set_tablesome_data($params['table_id'],
                array(
                    'editorState' => $params['editorState'],
                    'options' => array(
                        'display' => $params['display'],
                        'style' => $params['style'],
                        'access_control' => $params['access_control'],
                        'sort' => $sort,
                    ),
                    'columns' => $params['columns'],
                    'meta' => array(
                        'last_column_id' => $params['last_column_id'],
                    ),
                )
            );

            $meta_data = get_tablesome_data($params['table_id']);

            $response = array(
                'table_id' => $params['table_id'],
                'table_meta' => $meta_data,
                'status' => 'success',
            );
            return rest_ensure_response($response);
        }

        public function get_tables($request)
        {
            $data = array();
            /** Get all tablesome posts */
            $posts = get_posts(
                array(
                    'post_type' => TABLESOME_CPT,
                    'numberposts' => -1,
                )
            );
            $response_data = array(
                'data' => $data,
                'message' => 'Get all tablesome tables data',
            );

            if (empty($posts)) {
                return rest_ensure_response($response_data);
            }
            $tablesome_db = new \Tablesome\Includes\Modules\TablesomeDB\TablesomeDB();

            foreach ($posts as $post) {
                $meta_data = get_tablesome_data($post->ID);

                error_log('$meta_data : ' . print_r($meta_data, true));

                $table = $tablesome_db->create_table_instance($post->ID);
                /** Get records count */
                $records_count = $table->count();

                $data[] = array(
                    'ID' => $post->ID,
                    'post_title' => $post->post_title,
                    'post_content' => $post->post_title,
                    'post_status' => $post->post_status,
                    'meta_data' => $meta_data,
                    'records_count' => $records_count,
                );
            }

            $response_data['data'] = $data;
            return rest_ensure_response($data);
        }

        public function get_table_data($request)
        {
            $data = array();
            $table_id = $request->get_param('table_id');
            $post = get_post($table_id);

            if (empty($post) || $post->post_type != TABLESOME_CPT) {
                $error_code = "INVALID_POST";
                return new \WP_Error($error_code, $this->get_error_message($error_code));
            }
            $tablesome_db = new \Tablesome\Includes\Modules\TablesomeDB\TablesomeDB();
            $table_meta = get_tablesome_data($post->ID);

            $table = $tablesome_db->create_table_instance($post->ID);
            $records_count = $table->count();

            // $query = $tablesome_db->query(array(
            //     'table_id' => $post->ID,
            //     'table_name' => $table->name,
            //     'orderby' => array('rank_order', 'id'),
            //     'order' => 'asc',
            // ));

            // $records = isset($query->items) ? $query->items : [];
            // $records = $tablesome_db->get_formatted_rows($records, $table_meta, []);

            $args = array(
                'table_id' => $post->ID,
                'table_name' => $table->name,
            );

            $args['table_meta'] = $table_meta;
            $args['collection'] = [];

            $records = $tablesome_db->get_rows($args);

            $data = array(
                'ID' => $post->ID,
                'post_title' => $post->post_title,
                'post_content' => $post->post_content,
                'post_status' => $post->post_status,
                'meta_data' => $table_meta,
                'records' => $records,
                'records_count' => $records_count,
                'status' => 'success',
                'message' => 'Successfully get table with records',
            );

            return rest_ensure_response($data);
        }

        public function delete($request)
        {
            $table_id = $request->get_param('table_id');

            if (empty($table_id)) {
                $error_code = "REQUIRED_POST_ID";
                return new \WP_Error($error_code, $this->get_error_message($error_code));
            }

            $post = get_post($table_id);

            if (empty($post) || $post->post_type != TABLESOME_CPT) {
                $error_code = "INVALID_POST";
                return new \WP_Error($error_code, $this->get_error_message($error_code));
            }
            $table = $this->tablesome_db->create_table_instance($post->ID);
            $table_drop = $table->drop();

            $message = 'Table Deleted';
            if (!$table_drop) {
                $message = 'Can\'t delete the table';
            }

            $response_data = array(
                'message' => $message,
            );
            return rest_ensure_response($response_data);
        }

        public function get_table_records($request)
        {
            $params = $request->get_params();

            $table_id = isset($params['table_id']) ? $params['table_id'] : 0;

            if (empty($table_id)) {
                $error_code = "REQUIRED_POST_ID";
                return new \WP_Error($error_code, $this->get_error_message($error_code));
            }

            $query_args = isset($params['query_args']) && is_array($params['query_args']) ? $params['query_args'] : [];

            $post = get_post($table_id);

            if (empty($post) || $post->post_type != TABLESOME_CPT) {
                $error_code = "INVALID_POST";
                return new \WP_Error($error_code, $this->get_error_message($error_code));
            }
            $table_meta = get_tablesome_data($post->ID);
            $tablesome_db = new \Tablesome\Includes\Modules\TablesomeDB\TablesomeDB();
            $table = $tablesome_db->create_table_instance($post->ID);

            $args = array_merge(
                array(
                    'table_id' => $post->ID,
                    'table_name' => $table->name,
                ), $query_args
            );

            $records = $tablesome_db->get_rows($args);

            // $query = $tablesome_db->query($query_args);

            // // TODO: Return the formatted data if need. don't send the actual db data
            // $records = isset($query->items) ? $query->items : [];

            $response_data = array(
                'records' => $tablesome_db->get_formatted_rows($records, $table_meta, []),
                'message' => 'Get records successfully',
                'status' => 'success',
            );

            return rest_ensure_response($response_data);
        }

        public function modified_records($request)
        {
            $params = $request->get_params();
            $args = array();
            $args['mode'] = isset($params['mode']) ? $params['mode'] : '';
            // error_log('$params : ' . print_r($params, true));

            $args['table_id'] = isset($params['table_id']) ? $params['table_id'] : 0;
            $args['meta_data'] = get_tablesome_data($args['table_id']);

            if (empty($args['table_id'])) {
                $error_code = "REQUIRED_POST_ID";
                return new \WP_Error($error_code, $this->get_error_message($error_code));
            }

            $post = get_post($args['table_id']);

            if (empty($post) || $post->post_type != TABLESOME_CPT) {
                $error_code = "INVALID_POST";
                return new \WP_Error($error_code, $this->get_error_message($error_code));
            }

            $records_inserted = isset($params['records_inserted']) ? $params['records_inserted'] : [];
            $args['records_updated'] = isset($params['records_updated']) ? $params['records_updated'] : [];
            $records_deleted = isset($params['records_deleted']) ? $params['records_deleted'] : [];

            error_log('$records_updated : ' . print_r($args['records_updated'], true));
            $requests = array(
                'columns_deleted' => isset($params['columns_deleted']) ? $params['columns_deleted'] : [],
            );

            $tablesome_db = new \Tablesome\Includes\Modules\TablesomeDB\TablesomeDB();
            $table = $tablesome_db->create_table_instance($args['table_id'], [], $requests);
            $args['table_name'] = $table->name;

            $args['query'] = $tablesome_db->query(array(
                'table_id' => $args['table_id'],
                'table_name' => $args['table_name'],
            ));

            /** Table MetaData */

            $inserted_records_count = 0;
            $updated_records_count = 0;

            if (is_array($records_deleted) && !empty($records_deleted)) {
                $tablesome_db->delete_records($args, $records_deleted);
            }

            /** Insert all records  */
            if (!empty($records_inserted) && is_array($records_inserted)) {
                $insert_info = $tablesome_db->insert_many($args['table_id'], $args['meta_data'], $records_inserted);
                $inserted_records_count = isset($insert_info) && $insert_info['records_inserted_count'] ? $insert_info['records_inserted_count'] : 0;
            }

            // TODO: Need implement updating bulk record
            /**  */
            $response_data = $tablesome_db->update_records($args);

            $response_data = array_merge($response_data, array(
                'inserted_records_count' => $inserted_records_count,
                // 'updated_records_count' => $updated_records_count,
                'message' => 'Records modified successfully',
                'status' => 'success',
            ));

            return rest_ensure_response($response_data);
        }

        public function delete_records($request)
        {
            $params = $request->get_params();
            $table_id = $request->get_param('table_id');
            $mode = isset($params['mode']) ? $params['mode'] : '';
            if (empty($table_id)) {
                $error_code = "REQUIRED_POST_ID";
                return new \WP_Error($error_code, $this->get_error_message($error_code));
            }

            $record_ids = $request->get_param("record_ids");

            $post = get_post($table_id);

            if (empty($post) || $post->post_type != TABLESOME_CPT) {
                $error_code = "INVALID_POST";
                return new \WP_Error($error_code, $this->get_error_message($error_code));
            }

            if (empty($record_ids)) {
                $error_code = "REQUIRED_RECORD_IDS";
                return new \WP_Error($error_code, $this->get_error_message($error_code));
            }

            $message = 'Records removed successfully';

            $tablesome_db = new \Tablesome\Includes\Modules\TablesomeDB\TablesomeDB();
            $table = $tablesome_db->create_table_instance($post->ID);

            $query = $tablesome_db->query(array(
                'table_id' => $post->ID,
                'table_name' => $table->name,
            ));
            $args['table_id'] = $post->ID;
            $args['query'] = $query;
            $args['mode'] = $mode;
            $delete_records = $tablesome_db->delete_records($args, $record_ids);

            $response_data = array(
                'message' => $message,
                'status' => ($delete_records) ? 'success' : 'failed',
            );
            return rest_ensure_response($response_data);
        }

    }
}
