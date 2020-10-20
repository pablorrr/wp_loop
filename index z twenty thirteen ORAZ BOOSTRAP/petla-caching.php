<?php 

/* Stop the data retrieved from being added to the cache.

    cache_results (boolean) - Post information cache.
    update_post_meta_cache (boolean) - Post meta information cache.
    update_post_term_cache (boolean) - Post term information cache.
 */
 
 /*Display 50 posts, but don't add post information to the cache:   */
 
 
$args = array(
	'posts_per_page' => 50,
	'cache_results'  => false
);
$query = new WP_Query( $args );

/* Show Posts without adding post meta information to the cache

Display 50 posts, but don't add post meta information to the cache:  */

$args = array(
	'posts_per_page'         => 50,
	'update_post_meta_cache' => false
);
$query = new WP_Query( $args );

/* Show Posts without adding post term information to the cache

Display 50 posts, but don't add post term information to the cache:  */

$args = array(
	'posts_per_page'         => 50,
	'update_post_term_cache' => false
);
$query = new WP_Query( $args );


 
?>