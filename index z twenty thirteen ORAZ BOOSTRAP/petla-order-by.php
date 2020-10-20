<?php
/* 
    order (string | array) - Designates ang wyznacza the ascending or descending order of the 'orderby' parameter. DEFAULTS TO 'DESC'. An array can be used for multiple order/orderby sets.
	
        'ASC' - ascending order from lowest to highest values (1, 2, 3; a, b, c).
        'DESC' - descending order from highest to lowest values (3, 2, 1; c, b, a).

    orderby (string | array) - Sort retrieved posts by parameter. Defaults to 'date (post_date)'. One or more options can be passed.
	
        'none' - No order (available since Version 2.8).
        'ID' - Order by post id. Note the capitalization.
        'author' - Order by author.
        'title' - Order by title.
        'name' - Order by post name (post slug).
        'type' - Order by post type (available since Version 4.0).
        'date' - Order by date.
        'modified' - Order by last modified date.
        'parent' - Order by post/page parent id.
        'rand' - Random order.
        'comment_count' - Order by number of comments (available since Version 2.9).
		
        'relevance' (ang.stosownosc)- Order by search terms in the following order:
			First, whether the entire sentence is matched. 
			Second, if all the search times are within the titles.
			Third, if any of the search terms appear in the titles.
			And, fourth, if the full sentence appears in the contents.
		
        'menu_order' - Order by Page Order. Used most often for Pages (Order field in the Edit Page Attributes box) and for Attachments (the integer fields in the Insert / Upload Media Gallery dialog), but could be used for any post type with distinct 'menu_order' values (they all default to 0).
		
        'meta_value' - Note that a 'meta_key=keyname' must also be present in the query. Note also that the sorting will be alphabetical which is fine for strings (i.e. words), but can be unexpected for numbers (e.g. 1, 3, 34, 4, 56, 6, etc, rather than 1, 3, 4, 6, 34, 56 as you might naturally expect). Use 'meta_value_num' instead for numeric values. You may also specify 'meta_type' if you want to cast the meta value as a specific type. Possible values are 'NUMERIC', 'BINARY', 'CHAR', 'DATE', 'DATETIME', 'DECIMAL', 'SIGNED', 'TIME', 'UNSIGNED', same as in '$meta_query'. When using 'meta_type' you can also use meta_value_* accordingly. For example, when using DATETIME as 'meta_type' you can use 'meta_value_datetime' to define order structure.
		
		
        'meta_value_num' - Order by numeric meta value (available since Version 2.8). Also note that a 'meta_key=keyname' must also be present in the query. This value allows for numerical sorting as noted above in 'meta_value'.
		
        'post__in' - Preserve post ID order given in the post__in array (available since Version 3.5).
        'post_name__in' - Preserve post slug order given in the post_name__in array (available since Version 4.6).
 */
 
/* Display posts sorted by post 'title' in a descending order:  */

$args = array(
	'orderby' => 'title',
	'order'   => 'DESC',
);
$query = new WP_Query( $args );

/* Display posts sorted by 'menu_order' with a fallback to post 'title', in a descending order:
njprwd sortuj wg stron maljjoco wracajac do tytułow postów, njprwd chodzi o paginacje na postach i page 'ach
najpierw pokazzane sa wszystki posty i page malejco ( od ostaniej strony paginacji do pierwszej) a potem wyswietlane sa posty wg tytułow
  */
$args = array(
	'orderby' => 'menu_order title',
	'order'   => 'DESC',
);
$query = new WP_Query( $args );


/* Display one random post:  */
$args = array(
	'orderby'        => 'rand',
	'posts_per_page' => '1',

);
$query = new WP_Query( $args );

/*Show Popular Posts  */
$args = array(
	'orderby' => 'comment_count'
);
$query = new WP_Query( $args );

/* Display posts with 'Product' type ordered by 'Price' custom field:  */

$args = array(
	'post_type' => 'product',//typ posta
	'orderby'   => 'meta_value_num',//wg wartosci numerycznym wprowadzonych do custom meta box fields
	'meta_key'  => 'price',//nazwa customowego pola z custom metabox fileds 
);
$query = new WP_Query( $args );

/* Display pages ordered by 'title' and 'menu_order'. (title is dominant):  */


$args = array(
	'post_type' => 'page',
	'orderby'   => 'title menu_order',//kolejnosc wystepowania w menu
	'order'     => 'ASC',
);
$query = new WP_Query( $args );

/*Display pages ordered by 'title' and 'menu_order' with different sort orders (ASC/DESC) (available since Version 4.0):   */


$args = array(
	'orderby' => array( 'title' => 'DESC', 'menu_order' => 'ASC' )
);
$query = new WP_Query( $args );

/*sortuj wg meta box customowego : wartosci numeryczne maja byc malejace , tytuły postow gdzie maja byc te metaboxy rosnaco , nazwa meta box: age  */
$args = array(
	'orderby'  => array( 'meta_value_num' => 'DESC', 'title' => 'ASC' ),
	'meta_key' => 'age'
);
$query = new WP_Query( $args );

/*Display posts of type 'my_custom_post_type', ordered by 'age', and filtered to show only ages 3 and 4 (using meta_query).   */

$args = array(
	'post_type'  => 'my_custom_post_type',//nazwa posta
	'meta_key'   => 'age',//nazwacustomowego pola  meta box
	'orderby'    => 'meta_value_num',//uporzoadkowanie wg wartosci numerycznych
	'order'      => 'ASC',//rosnaco
	'meta_query' => array(//zadania szczegolowe do meta boxa
		array(
			'key'     => 'age',//nazwa pola meta box
			'value'   => array( 3, 4 ),//sortowane maja byc tylko te wartosci
			'compare' => 'IN',//porownanie w meta boxie
		),
	),
);
$query = new WP_Query( $args );





?>

