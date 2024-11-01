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

add_action( 'widgets_init', create_function('', 'return register_widget("WPWEAuthors");') );

class WPWEAuthors extends WP_Widget
{
  function WPWEAuthors()
  {
    $widget_ops = array('classname' => 'WPWEAuthors', 'description' => 'The most recent posts on your site.' );
    $this->WP_Widget('WPWEAuthors', 'WPWE - Authors', $widget_ops);
  }
 
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
    $title  = $instance['title'];
	$num    = $instance['num'];
	$avatar = $instance['avatar'];
	$posts  = $instance['posts'];
	$order  = $instance['order'];
	$order2 = $instance['order2'];
?>

  <p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
  
  <p><label for="<?php echo $this->get_field_id('num'); ?>">Number of Authors: <input class="wideslim" id="<?php echo $this->get_field_id('num'); ?>" name="<?php echo $this->get_field_name('num'); ?>" type="text" value="<?php echo esc_attr($num); ?>"  size="3" /></label></p>
  
  <p><label for="<?php echo $this->get_field_id('order'); ?>">Order: <select id="<?php echo $this->get_field_id('order'); ?>" name="<?php echo $this->get_field_name('order'); ?>" type="text">
  <option value="display_name" <?php selected($instance['order'], 'display_name'); ?>>Name </option>
  <option value="user_registered" <?php selected($instance['order'], 'user_registered');?>>Join Date </option>
  </select> <select id="<?php echo $this->get_field_id('order2'); ?>" name="<?php echo $this->get_field_name('order2'); ?>" type="text">
  <option value="asc" <?php selected($instance['order2'], 'asc'); ?>>ASC </option>
  <option value="desc" <?php selected($instance['order2'], 'desc');?>>DESC </option>
  </select> </label></p>

  <p><label for="<?php echo $this->get_field_id('avatar'); ?>"><input
type="checkbox"
id="<?php echo $this->get_field_id('avatar'); ?>"
name="<?php echo $this->get_field_name('avatar'); ?>"
<?php checked(isset($avatar) ? 1 : 0); ?> /> Show Avatar ( GRavatar )</label> </p>  

  <p><label for="<?php echo $this->get_field_id('posts'); ?>"><input
type="checkbox"
id="<?php echo $this->get_field_id('posts'); ?>"
name="<?php echo $this->get_field_name('posts'); ?>"
<?php checked(isset($posts) ? 1 : 0); ?> /> Show Number of Posts</label> </p> 
  
<?php
  }
 
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['title']  = $new_instance['title'];
	$instance['num']    = $new_instance['num'];
	$instance['order']  = $new_instance['order'];
	$instance['order2'] = $new_instance['order2'];
	$instance['avatar'] = $new_instance['avatar'];
	$instance['posts']  = $new_instance['posts'];
    return $instance;
  }
 
  function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
 
    echo $before_widget;
    $title  = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
	$num    = $instance['num'];
	$order  = $instance['order'];
	$order2 = $instance['order2'];
	$avatar = $instance['avatar'];
	$posts  = $instance['posts'];
 	
 
    if (!empty($title))
      echo $before_title . $title . $after_title;;
 
    // WIDGET CODE GOES HERE
 
 
		global $wpdb;
		
		$authors = $wpdb->get_results("SELECT * from $wpdb->users ORDER BY $order $order2 LIMIT $num");
		echo "<ul>";
		foreach($authors as $author) { ?>
		<li>
			<?php if ( $avatar == true ) { ?>
                <section class="thumb">
                    <a href="<?php echo get_bloginfo('url') ?>/author/<?php echo $author->user_login; ?>">
                     <?php echo get_avatar($author->ID ,'60'); ?>
                    </a>
                </section>
            <?php } ?>
            
            <a href="<?php echo get_bloginfo('url') ?>/author/<?php echo $author->user_login; ?>">
            <?php the_author_meta('display_name', $author->ID); ?>
            </a><br />
            
            <?php if ( $posts == true ) { ?>
            	<span class="info"> Has written <?php echo count_user_posts( $author->ID ); ?> posts. </span>
            <?php } ?>
            
            <div class="clear"></div>
		</li>
		<?php } 
		echo "</ul>";
 
    echo $after_widget;
  }
 
}