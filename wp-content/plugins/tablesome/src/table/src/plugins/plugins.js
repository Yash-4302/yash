import TextPlugin from"./text/text.js";import RichTextPlugin from"./richText/richText.js";import NumberPlugin from"./number/number.js";import DatePlugin from"./date/date.js";import URLPlugin from"./url/url.js";import ButtonPlugin from"./button/button.js";import ImagePlugin from"./image/image.js";import EMailPlugin from"./email/email.js";import CheckBoxPlugin from"./checkbox/checkbox.js";class Plugins{constructor(i){new TextPlugin(i),new RichTextPlugin(i),new NumberPlugin(i),new DatePlugin(i),new URLPlugin(i),new ButtonPlugin(i),new ImagePlugin(i),new EMailPlugin(i),new CheckBoxPlugin(i)}}export default Plugins;