<?php
////POJEDYNCZY AUTOR///////////////////
$query = new WP_Query( array( 'author' => 123 ) );
 //1223 jako id autora, klucz do id  autora to  autor
 
 $query = new WP_Query( array( 'author_name' => 'rami' ) );
 //rami jako nazwa autora, klucz do nazwy autora to author_name
//restauracjabootstrap

 
//////////KILKU AUTOROW NA RAZ
//pierwszy spsosb 
 $query = new WP_Query( array( 'author' => '2,6,17,38' ) );// podane kilka id interesujacych autorów
 //drugi spsosb
 $query = new WP_Query( array( 'author__in' => array( 2, 6 ) ) );
 
 
 ////WYKLUCZANIE DANEGO AUTORA 
 $query = new WP_Query( array( 'author' => -12 ) );//wszyscy autorzy beda printowani z wyja tkiem o id -12
 //wykluczanie kilku na raz
 $query = new WP_Query( array( 'author__not_in' => array( 2, 6 ) ) );
 
 
 
 
 ?>