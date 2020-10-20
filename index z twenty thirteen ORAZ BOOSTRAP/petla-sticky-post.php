<?php 
/*  Display just the first sticky post: */

$sticky = get_option( 'sticky_posts' );
$query = new WP_Query( array( 'p' => $sticky[0] ) );

/* Display just the first sticky post, if none return the last post published:
njprwd gdy nie ma zadnych zwyklych postow zwracany jest sticky  */

$args = array(
	'posts_per_page'      => 1,
	'post__in'            => get_option( 'sticky_posts' ),//pobiera sticky posty
	'ignore_sticky_posts' => 1,//pomin sticky post na poczatku petli, pomija cala grupe postow sticky a umozliwia //wstawic tylko jeden-pierwsy
);
$query = new WP_Query( $args );

/* Display just the first sticky post, if none return nothing:  */

$sticky = get_option( 'sticky_posts' );
$args = array(
	'posts_per_page'      => 1,
	'post__in'            => $sticky,
	'ignore_sticky_posts' => 1,
);
$query = new WP_Query( $args );
if ( $sticky[0] ) {
	// insert here your stuff...
}

/* Exclude all sticky posts from the query:  */

$query = new WP_Query( array( 'post__not_in' => get_option( 'sticky_posts' ) ) );

/* Exclude sticky posts from a category. Return ALL posts within the category, but don't show sticky posts at the top. The 'sticky posts' will still show in their natural position (e.g. by date):  */


$query = new WP_Query( array( 'ignore_sticky_posts' => 1, 'posts_per_page' => 3, 'cat' => 6 );

/* Exclude sticky posts from a category. Return posts within the category, but exclude sticky posts completely, and adhere to paging rules:  */

$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
$sticky = get_option( 'sticky_posts' );
$args = array(
	'cat'                 => 3,
	'ignore_sticky_posts' => 1,
	'post__not_in'        => $sticky,
	'paged'               => $paged,
);
$query = new WP_Query( $args );




?>