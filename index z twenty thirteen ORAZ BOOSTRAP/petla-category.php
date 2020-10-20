<?php 

//printuj categorie wg id oraz podkategorie TEj KATEGORII
$query = new WP_Query( array( 'cat' => 4 ) )

//wg. nazwy, slug(?) kategorii wraz z podkategoriami TEj KATEGORII
$query = new WP_Query( array( 'category_name' => 'staff' ) );

//printuj kategore o podanym id- BEZ- podkategorii 
$query = new WP_Query( array( 'category__in' => 4 ) );

//printuj kilka kategorii na raz (wraz ich podkategoriami?) wg id
$query = new WP_Query( array( 'cat' => '2,6,17,38' ) );

//printuj kilka kategorii na raz wz nazy (slug?)
$query = new WP_Query( array( 'category_name' => 'staff,news' ) );

//Display posts that have "all" of these categories:
$query = new WP_Query( array( 'category_name' => 'staff+news' ) );

//wyklucz te kategorie wg id
$query = new WP_Query( array( 'cat' => '-12,-34,-56' ) );

//Display posts that are in multiple categories. This shows posts that are in both categories 2 and 6:
$query = new WP_Query( array( 'category__and' => array( 2, 6 ) ) );

/* To display posts from either category 2 OR 6, you could use cat as mentioned above, or by using category__in (note this does not show posts from any children of these categories): (printuje kilka kategorii wg id ale z podkategoriami)*/
$query = new WP_Query( array( 'category__in' => array( 2, 6 ) ) );

//wykluczanie kilku kategorii na raz
$query = new WP_Query( array( 'category__not_in' => array( 2, 6 ) ) );





?>