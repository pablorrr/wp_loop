<?php


/* post_mime_type (string/array) - Allowed mime types.
  Get gif images and remember that by default the attachment's post_status is set to inherit. */

$args = array(
	'post_type'	 => 'attachment',// typ posta zalacznik
	'post_status'	 => 'inherit',//ststus psta dziedziczny
	'post_mime_type' => 'image/gif',//typ mime pliku
);
$query = new WP_Query( $args );


/* To exclude certain mime types you first need to get all mime types using get_allowed_mime_types() and run a difference between arrays of what you want and the allowed mime types with array_diff().  */


$unsupported_mimes  = array( 'image/jpeg', 'image/gif', 'image/png', 'image/bmp', 'image/tiff', 'image/x-icon' );
$all_mimes          = get_allowed_mime_types();

/*//array_diff-  array_diff- Computes the difference of arrays

param: tablica ktora bedzie porownywana
tablica druga z ktora bedzie prownywana pierwsza

RETURN: Zwraca tablicę zawierającą wszystkie informacje z tablicy 1, które nie są obecne w każdym z innych       tablicach.inne sfromulowanie: usuwa te wartosvci tablicy pierwszej(z lewej jako parametr wywolania) ktrore sie powtarzaja w drugiej, pzostaja unikatowe wartosci
*/

$accepted_mimes     = array_diff( $all_mimes, $unsupported_mimes );//
$args		    = array(
    'post_type'         => 'attachment',//TYP POSTA ZALACZNIK
    'post_status'       => 'inherit',//staus posta dziedziczny
    'post_mime_type'    => $accepted_mimes,//typ mime
);
$query		    = new WP_Query( $query_args );




?>