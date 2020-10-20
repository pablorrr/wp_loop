<?php 
/* 
    has_password (bool) - true for posts with passwords ; false for posts without passwords ; null for all posts with and without passwords (available since Version 3.9).
    post_password (string) - show posts with a particular password (available since Version 3.9)
 */
 /* Display only password protected posts:  */
 $query = new WP_Query( array( 'has_password' => true ) );
 
 /* Display only posts without passwords:  */
 $query = new WP_Query( array( 'has_password' => false ) );
 
 
 /* Display only posts with and without passwords:  */
 $query = new WP_Query( array( 'has_password' => null ) );
 
 /* Show Posts with particular password

Display posts with 'zxcvbn' password:  */

$query = new WP_Query( array( 'post_password' => 'zxcvbn' ) );

 
?>