<?php 
/* perm (string) - User permission.  */

/* Show posts if user has the appropriate capability:

Display published and private posts, if the user has the appropriate capability:  */

$args = array(
	'post_status' => array( 'publish', 'private' ),
	'perm'        => 'readable',//tylke te posty do odczytania
);
$query = new WP_Query( $args );


?>