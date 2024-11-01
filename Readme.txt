=== WordPress Widgets Extended ===
Contributors: and0r1995
Donate link: http://andornagy.com/
Tags: comments, posts, authors, pages, widgets
Requires at least: 3.4
Tested up to: 3.7.0
Stable tag: 3.7.0

WPWE is a plugin that adds some new widgets to your websites to customise how posts, pages, comments and authros appear in your sidebar.

== Description ==

WPWE or in other words WordPress Widgets Extended is a plugin that adds new widgets to you websites. These widgets can be easily customized. 

Currently the following Widgets are available:

*   "WPWE - Recent Posts"    - Simply displays the recent posts on your website with or without thumbnail and post meta data. 
*   "WPWE - Recent Comments" - Displays the recent Comments on your website with or without Author Avatar ( GRAvatar ). 
*   "WPWE - Authors"         - Displays a list of authors in your sidebar. With or without Avatar. Also can be set to display how many posts ware written by the author.
*   "WPWE - Pages"           - Displays recent pages, if not set by ID. Also if the theme has Page Thumbnail support, can display that aswell. 
*   "WPWE - tags"            - Displays displays tags and posts cout with that tags, can be displayed as list or non-list

*   More to come.

== Installation ==

1. Upload the`widgets-extended` folder to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Place the widgets you like in your theme's sidebar

== Frequently Asked Questions ==

= How can I display Page Thumbnails? =

You need to add the following Function into your Theme's functions.php if it dose not supports Page Thumbnails

`if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'page-thumbnails' );  
}`

== Screenshots ==

1. Recent Posts Widget display/options
2. Recent Comments Widget display/options
3. Authors Widget display/options
4. Pages Widget display/options
5. Tags Widget display/options

== Changelog ==

= 0.1 =
* Initial Release

= 0.2 =
* Fixed Widgets Directory path

= 0.3 =
* Added some Copyright stuff.
* Fixed "The plugin does not have a valid header." error.

= 0.4 =
* Fixed thumbnail size. ( 60x60 ) 
* Next version will include a dropdown with all registered size on your site

= 0.5 =
* Changed Recent Posts widget name to Posts
* Added the option to display Posts using post IDs
* Changed the Link on the comment author name to the comment, on the Recent Posts Comment

= 0.6 =

* Fixed thumbnail sizes ( No need to regenerate them when plugin is activated )
* Added tags Widgte ( allows you to display post count )

== Upgrade Notice ==

* Fixed "The plugin does not have a valid header." error.