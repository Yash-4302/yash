<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Tour Travel Agent
 */
get_header(); ?>

<main id="main" role="main" class="content-aa">
	<div class="container space-top">
        <div class="page-content py-4">	
        	<?php if(get_theme_mod('tour_travel_agent_404_title','404 Not Found')){ ?>	
				<h1><?php echo esc_html( get_theme_mod('tour_travel_agent_404_title',__('404 Not Found', 'tour-travel-agent' )) ); ?></h1>
			<?php }?>
			<?php if(get_theme_mod('tour_travel_agent_404_text','Looks like you have taken a wrong turn. Dont worry it happens to the best of us.')){ ?>
				<p class="text-404 mb-0"><?php echo esc_html( get_theme_mod('tour_travel_agent_404_text',__('Looks like you have taken a wrong turn. Dont worry it happens to the best of us.', 'tour-travel-agent' )) ); ?></p>
			<?php }?>
			<?php if(get_theme_mod('tour_travel_agent_404_button_text','Return to Home Page')){ ?>
				<div class="read-moresec">
	           		<a href="<?php echo esc_url( home_url() ); ?>" class="button hvr-sweep-to-right my-3 py-2 px-4"><?php echo esc_html( get_theme_mod('tour_travel_agent_404_button_text',__('Return to Home Page', 'tour-travel-agent' )) ); ?><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('tour_travel_agent_404_button_text',__('Return to Home Page', 'tour-travel-agent' )) ); ?></span></a>
				</div>
				<div class="clearfix"></div>
			<?php }?>
        </div>
	</div>
</main>
	
<?php get_footer(); ?>