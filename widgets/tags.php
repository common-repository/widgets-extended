<?php
/*  Copyright 2013  WordPress Widgets Extended  (email : andornagy2012@gmail.com)

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

add_action( 'widgets_init', create_function('', 'return register_widget("WPWETags");') );

class WPWETags extends WP_Widget
{
  function WPWETags()
  {
    $widget_ops = array('classname' => 'WPWETags', 'description' => 'The most recent posts with thumbnails on your site.' );
    $this->WP_Widget('WPWETags', 'WPWE - Tags', $widget_ops);
  }
 
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
    $title   = $instance['title'];
	$num     = $instance['num'];
	$count   = $instance['count'];
	$display    = $instance['display'];
	
		
	
?>

  <p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
  
  <p><label for="<?php echo $this->get_field_id('count'); ?>"><input
type="checkbox"
id="<?php echo $this->get_field_id('count'); ?>"
name="<?php echo $this->get_field_name('count'); ?>"
<?php checked(isset($display) ? 1 : 0); ?> /> Show Post Count</label> </p>  

  <p><label for="<?php echo $this->get_field_id('num'); ?>">Number of Tags: <input class="wideslim" id="<?php echo $this->get_field_id('num'); ?>" name="<?php echo $this->get_field_name('num'); ?>" type="text" value="<?php echo esc_attr($num); ?>"  size="3" /></label></p>
  
  <p><label for="<?php echo $this->get_field_id('display'); ?>">Style: <select id="<?php echo $this->get_field_id('display'); ?>" name="<?php echo $this->get_field_name('display'); ?>" type="text">
  <option value="list" <?php selected($instance['display'], 'list'); ?>>List </option>
  <option value="no-list" <?php selected($instance['display'], 'no-list');?>>Not List </option>
  </select></label></p>  
<?php

  }
 
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['title']  = $new_instance['title'];
	$instance['count']    = $new_instance['count'];
	$instance['num']    = $new_instance['num'];
	$instance['display']  = $new_instance['display'];
    return $instance;
  }
 
  function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
 
    echo $before_widget;
	
    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
	
	$count    = $instance['count']; 
	$num    = $instance['num']; 
	$display   = $instance['display']; 	
 	
 	if ( !empty ( $posts ) ) {
	 	$posts = explode(',',$posts);
	} else {
		$posts = '';
	}
 
    if (!empty($title))
      echo $before_title . $title . $after_title;;
 
    // WIDGET CODE GOES HERE
 
 
	query_posts( array( 'posts_per_page' => $num,
						'orderby' => 'data',
						'order' => 'Desc',
						'post__in' => $posts
						)
				);
						
	// Select all the post tag IDs
	$the_tags = get_tags( array('order' => 'ASC') );
	$number = 1;
	
	echo '<ul class="'.$display.'">';

	// Loop over each ID, and grab associated data
	foreach($the_tags as $tag_id) {
		// Get information on the post tag
		$post_tag = get_term( $tag_id, 'post_tag' );
		
		if ( $count == true ) {
			
			// Print the tag name and count (how many posts have this tag)
			echo '<li><a href="'.get_tag_link($tag_id).'"><span  class="tag">' .$post_tag->name.'</span><span class="count">'.$post_tag->count.'</span></a></li>';
		
		} else {
					
			// Print the tag name and count (how many posts have this tag)
			echo '<li><a href="'.get_tag_link($tag_id).'"><span  class="tag">' .$post_tag->name.'</span></a></li>';
	
			}
		// Unset the data when it's not needed
		unset($post_tag);
	}
 
 	echo '</ul>';
    echo $after_widget;
  }
}