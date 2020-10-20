<?php
/*		PARAMETRY
    p (int) - use post id. Default post type is post.
    name (string) - use post slug.
    title (string) - use post title (available with Version 4.4).
    page_id (int) - use page id.
    pagename (string) - use page slug.
    post_parent (int) - use page id to return only child pages. Set to 0 to return only top-level entries.
    post_parent__in (array) - use post ids. Specify posts whose parent is in an array. (available since Version 3.6)
    post_parent__not_in (array) - use post ids. Specify posts whose parent is not in an array. (available since Version 3.6)
    post__in (array) - use post ids. Specify posts to retrieve. ATTENTION If you use sticky posts, they will be included (prepended!) in the posts you retrieve whether you want it or not. To suppress this behaviour use ignore_sticky_posts.
    post__not_in (array) - use post ids. Specify post NOT to retrieve. If this is used in the same query as post__in, it will be ignored.
    post_name__in (array) - use post slugs. Specify posts to retrieve. (available since Version 4.4)
	
  */
  
  $query = new WP_Query( array( 'p' => 7 ) );
  
  $query = new WP_Query( array( 'page_id' => 7 ) );
/* Display post by slug:  */
  $query = new WP_Query( array( 'name' => 'about-my-life' ) );
  
  /* Display page by slug:  */
  $query = new WP_Query( array( 'pagename' => 'contact' ) );
  
  
  /*  Show Child Posts/Pages

Display child page using the slug of the parent and the child page, separated by a slash (e.g. 'parent_slug/child_slug'): */

$query = new WP_Query( array( 'pagename' => 'contact_us/canada' ) );

/* Display child pages using parent page ID:  */
$query = new WP_Query( array( 'post_parent' => 93 ) );


/* Display only top-level pages, exclude all child pages:  */

$query = new WP_Query( array( 'post_parent' => 0 ) );


/* Display posts whose parent is in an array:  */

$query = new WP_Query( array( 'post_parent__in' => array( 2, 5, 12, 14, 20 ) ) );

/* WYSWIETL TYLKO TE PAGE O ID */

$query = new WP_Query( array( 'post_type' => 'page', 'post__in' => array( 2, 5, 12, 14, 20 ) ) );

/* Display all posts but NOT the specified ones:  */
$query = new WP_Query( array( 'post_type' => 'post', 'post__not_in' => array( 2, 5, 12, 14, 20 ) ) );

/* NOTE: YOU CANNOT COMBINE POST__IN AND POST__NOT_IN IN THE SAME QUERY.  */




// This will NOT work
$exclude_ids = '1,2,3';
$query = new WP_Query( array( 'post__not_in' => array( $exclude_ids ) ) );

// This WILL work
$exclude_ids = array( 1, 2, 3 );
$query = new WP_Query( array( 'post__not_in' => $exclude_ids ) );
  
  
  


?>