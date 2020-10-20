<?php
   
 /* 'publish' - a published post or page.
    'pending' - post is pending review.-----pending ang. w oczekiwaniu na zatweirdzenie
    'draft' - a post in draft status.--- draft j.ang wersja robocza
    'auto-draft' - a newly created post, with no content.--- nowo wykreowane posty bez tresci
    'future' - a post to publish in the future.--oosty oczekujace na publikacje w przyszlosci
    'private' - not visible to users who are not logged in.--- prywatne
    'inherit' - a revision. see get_children.---posty majace "podposty"
    'trash' - post is in trashbin (available since Version 2.9).-- posty w koszu 
    'any' - retrieves any status except those from post statuses with 'exclude_from_search' set to true (i.e. trash and auto-draft). ---Any' - pobiera żadnego statusu wyjątkiem tych z statusy wiadomości z 'exclude_from_search' ustawiona na true (czyli śmieci i auto-Projekt).*/
	
	
/* Display only drafts: 	 */
$query = new WP_Query( array( 'post_status' => 'draft' ) );	

/* Display multiple post status:  */
$args = array(
	'post_status' => array( 'pending', 'draft', 'future' )
);
$query = new WP_Query( $args );

/* Display all attachments:  */
$args = array(
	'post_status' => 'any',
	'post_type'   => 'attachment'//dipsplay posty z zalacznikiem
);
$query = new WP_Query( $args );





	
	
	
	
	
	
?>
