<?php
/**
 * Plugin Name:     custom yoast import
 * Plugin URI:      www.3ele.de
 * Description:     custom yoast import CSV
 * Author:          Sebastian Weiss
 * Author URI:      www.3ele.de
 * Text Domain:     custom-yoast-import
 * Domain Path:     
 * Version:         1.1.0
 *
 */
$link = 'http://localhost:8080/testing-url-test/';	
$url = get_site_url();
$post_name = 'testing-url-test';
$new_meta_title = 'my plugin test title';
$new_meta_description = 'my plugin test description';
print_r($url);

global $wpdb;
function get_posts_by_url_function($post_name) {
	global $wpdb;
	$results = $wpdb->get_results( 
				$wpdb->prepare ("SELECT ID FROM " . $wpdb->posts . " WHERE post_name ='".$post_name. "' LIMIT 1") 
			 );
	return $results[0]->ID;
};


function update_post_meta_description_by_post_id($post_id,$new_meta_description,$new_meta_title ) {
	global $wpdb;
	$results = $wpdb->get_results( 
				$wpdb->prepare ("UPDATE ".$wpdb->postmeta."
				SET meta_value = '".$new_meta_description."'
				WHERE meta_key like '_yoast_wpseo_metadesc' AND post_id = ".$post_id) 
			 );
	return $results;
};

function update_post_meta_title_by_post_id($post_id,$new_meta_description,$new_meta_title ) {
	global $wpdb;
	$results = $wpdb->get_results( 
				$wpdb->prepare ("UPDATE ".$wpdb->postmeta."
				SET meta_value = '".$new_meta_title."'
				WHERE meta_key like '_yoast_wpseo_title' AND post_id = ".$post_id) 
			 );
	return $results;
};