<?php
/* Type Parameters

Show posts associated with certain type.

    post_type (string / array) - use post types. Retrieves posts by Post Types, default value is 'post'. If 'tax_query' is set for a query, the default value becomes 'any';
        'post' - a post.
        'page' - a page.
        'revision' - a revision.
        'attachment' - an attachment. Whilst the default WP_Query post_status is 'publish', attachments have a default post_status of 'inherit'. This means no attachments will be returned unless you also explicitly set post_status to 'inherit' or 'any'. (See post_status, below)
        'nav_menu_item' - a navigation menu item
        'any' - retrieves any type except revisions and types with 'exclude_from_search' set to true.
        Custom Post Types (e.g. movies)
 */
 
 $query = new WP_Query( array( 'post_type' => 'page' ) );
 
 /* Wyświetlacz "każdy" rodzaj post (pobiera dowolnego typu z wyjątkiem korekt i typów z "exclude_from_search 'ustawioną na true): */
 
 $query = new WP_Query( array( 'post_type' => 'any' ) );
 
 /* Display multiple post types, including custom post types:uwzglednieinie  cystomowych typow posta  */
 $args = array(
	'post_type' => array( 'post', 'page', 'movie', 'book' )
);
$query = new WP_Query( $args );





 ?>