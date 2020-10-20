<?php 
//printuj tag wg nazwy
$query = new WP_Query( array( 'tag' => 'cooking' ) );

//wg id
$query = new WP_Query( array( 'tag_id' => 13 ) );

//kilka tagow wg nazwy ( slug ?)
$query = new WP_Query( array( 'tag' => 'bread,baking' ) );

//Display posts that have "all" of these tags:
$query = new WP_Query( array( 'tag' => 'bread+baking+recipe' ) );

//printuj kilka tagow na raz podobni obydwa zapisy rownowazne
$query = new WP_Query( array( 'tag__and' => array( 37, 47 ) ) );
$query = new WP_Query( array( 'tag__in' => array( 37, 47 ) ) );

//(array) - use tag slugs.
$query = new WP_Query( array('tag_slug__and' => array( 'red', 'blue')) ); 
$query = new WP_Query( array( 'tag_slug__in' => array( 'red', 'blue')) ); 

//wykluczanie kilku tagow na raz
$query = new WP_Query( array( 'tag__not_in' => array( 37, 47 ) ) );
?>