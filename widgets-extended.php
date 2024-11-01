<?php
/*
Plugin Name: WordPress Widgets Extended
Plugin URI: http://www.andornagy.com/plugins/wpwe
Description: WPWE adds some new widgets to your websites to customise how posts, pages, comments and authros appear in your sidebar. 
Version: 0.6
Author: Andor Nagy
Author URI: http://www.andornagy.com
License: GPL2

    Copyright 2013  WordPress Widgets Extended  (email : andornagy2012@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

require_once( dirname( __FILE__ ) . '/functions.php' );    		 	 // Including the base functions ( functions.php ) 

require_once( dirname( __FILE__ ) . '/widgets/posts.php' );    		 // Including the Recent Posts widgets. 
require_once( dirname( __FILE__ ) . '/widgets/recentComments.php' ); // Including the Recent Comments widgets.
require_once( dirname( __FILE__ ) . '/widgets/authors.php' );        // Including the Authors widgets.
require_once( dirname( __FILE__ ) . '/widgets/pages.php' );          // Including the Pages widgets.
require_once( dirname( __FILE__ ) . '/widgets/tags.php' );           // Including the Tags widgets.

?>