<?php
/*
Plugin Name: FeedWordpress Link Soruce
Description: Auto Add FeedWordpress Soruce.
Version: 0.1
Tested up to: Wordpress 3.0 Multisite,buddypress 1.2.5.2
License: GNU General Public License 2.0 (GPL) http://www.gnu.org/licenses/gpl.html
Author: MzMuttaqin
Author URI: http://masta.rumahterjemah.com/
Plugin URI: http://masta.rumahterjemah.com/
Tags: link, Feed, FeedWordpress
*/

function mzm_FeedWordpress_soruce($content ) {
	global $post; 

  //only in signle page
  if( ! is_single()) 
      return;

	if (get_post_meta($post->ID, 'syndication_permalink', true)) {
	
		$feedlink = get_post_meta($post->ID, 'syndication_permalink', true);
		$sitelink = explode('/', $feedlink, 4);
		$sitelink = $sitelink[2];
		$feedsource = '<p>[<a href="'.$feedlink.'" target="blank" rel="nofollow">source: '.$feedlink.'</a>]</p>';
	
		$fdcontent = $content . $feedsource ;  //or

	} else {
		$fdcontent = $content;
	}

return $fdcontent;
}

add_filter('the_content', 'mzm_FeedWordpress_soruce',99999,1);
?>
