<?php
/* Pagination Parameters

    nopaging (boolean) - show all posts or use pagination. Default value is 'false', use paging.
    posts_per_page (int) - number of post to show per page (available since Version 2.1, replaced showposts parameter). Use 'posts_per_page'=>-1 to show all posts (the 'offset' parameter is ignored with a -1 value). Set the 'paged' parameter if pagination is off after using this parameter. Note: if the query is in a feed, wordpress overwrites this parameter with the stored 'posts_per_rss' option. To reimpose the limit, try using the 'post_limits' filter, or filter 'pre_option_posts_per_rss' and return -1
    posts_per_archive_page (int) - number of posts to show per page - on archive pages only. Over-rides posts_per_page and showposts on pages where is_archive() or is_search() would be true.
    offset (int) - number of post to displace or pass over. Warning: Setting the offset parameter overrides/ignores the paged parameter and breaks pagination (Click here for a workaround). The 'offset' parameter is ignored when 'posts_per_page'=>-1 (show all posts) is used.
    paged (int) - number of page. Show the posts that would normally show up just on page X when using the "Older Entries" link.
    page (int) - number of page for a static front page. Show the posts that would normally show up just on page X of a Static Front Page.
    ignore_sticky_posts (boolean) - ignore post stickiness (available since Version 3.1, replaced caller_get_posts  */
	
/* Display 3 posts per page: 	 */
$query = new WP_Query( array( 'posts_per_page' => 3 ) );

/* Display all posts in one page:  */
$query = new WP_Query( array( 'posts_per_page' => -1 ) );

/* Display all posts by disabling pagination:  */
$query = new WP_Query( array( 'nopaging' => true ) );

/* Display posts from the 4th one:  */
$query = new WP_Query( array( 'offset' => 3 ) );

/* Display 5 posts per page which follow the 3 most recent posts:  */
$query = new WP_Query( array( 'posts_per_page' => 5, 'offset' => 3 ) );

/* Display posts from page number 6:  */
$query = new WP_Query( array( 'paged' => 6 ) );

/* Display posts from current page:  */
$query = new WP_Query( array( 'paged' => get_query_var( 'paged' ) ) );

/*  Display posts from the current page and set the 'paged' parameter to 1 when the query variable is not set (first page).*/

$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
$query = new WP_Query( array( 'paged' => $paged ) );

/* Pagination Note: Use get_query_var('page'); if you want your query to work in a Page template that you've set as your static front page. The query variable 'page' also holds the pagenumber for a single paginated Post or Page that includes the <!--nextpage--> Quicktag in the post content.  */

/*  Display posts from current page on a static front page: */
$paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
$query = new WP_Query( array( 'paged' => $paged ) );

	
?>