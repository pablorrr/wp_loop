<?php 
/* PARAMETRY:
   
        relation (string) - The logical relationship between each inner taxonomy array when there is more than one. Possible values are 'AND', 'OR'. Do not use with a single inner taxonomy array. Default value is 'AND'.
            taxonomy (string) - Taxonomy.
			
            field (string) - Select taxonomy term by. Possible values are 'term_id', 'name', 'slug' or 'term_taxonomy_id'. 
			     -------------Default value is 'term_id'.
			
            terms (int/string/array) - Taxonomy term(s).
            include_children (boolean) - Whether or not to include children for hierarchical taxonomies. 
			-------------------Defaults to true.
			
            operator (string) - Operator to test. Possible values are 'IN', 'NOT IN', 'AND', 'EXISTS' and 'NOT EXISTS'. 
			-------------------------Default value is 'IN'.
 */
/*  Simple Taxonomy Query:SPR*/
$args = array(
	'post_type' => 'post',
	'tax_query' => array(
		array(
			'taxonomy' => 'people',
			'field'    => 'slug',//WG SLUG
			'terms'    => 'bob',
		),
	),
);
$query = new WP_Query( $args );
///////////////////////////////////////////////////////////////
/* Multiple Taxonomy Handling:AND  SPR*/

$args = array(// tworzenie tablicy wielowymiarowej
	'post_type' => 'post',
	'tax_query' => array(//żądanie, zapytanie dla taxonimi
		'relation' => 'AND',//klucz relacja obok wartosc relacji tutaj:and , tlumaczenie: wyprintuj to i to
		array(
			'taxonomy' => 'movie_genre',//nazwa taxonomi kontext rejestracji taxonomi w poscie
			
			/* pole z jakiego bedzie sie korzystac w celu okreslania taxonomi:  slug( NIE NAZWA) lub id  */
			'field'    => 'slug',
			'terms'    => array( 'action', 'comedy' ),//nazwa taxonomi w kontexcie nazwawy w panelu admina
		),
		array(
			'taxonomy' => 'actor',
			'field'    => 'term_id',//tutaj okreslenie ze w celu identyfikacji konkretnej taxonomi przez id
			'terms'    => array( 103, 115, 206 ),
			'operator' => 'NOT IN',//operator ten bedzie okreslal ze powyzsze taxonomie nie beda wyswietlane
		),
	),//koniec dla raxquery
);
$query = new WP_Query( $args );

/* tlumaczenie tablicy argumentow:
1 z wbudowanego typu posta standardowego, natywnego typu posta POST(wpisy)
2  wyswietl nastepujace posty z dwoch taxonomi
3 pierwsza taxonomia o zarejstrowanej nazwie( np. w functions.php) - movie genre
4. w taxonomi movie_genre  odnajdz taxonomie o nazwie action i comedy( poslugiwaniem sie nazwami taxonomi nie id)
5. w taxonimi actor poslugujac id wyswietl wszytskie z wyjatkiem tych ltore zostaly ujete w id jako wykluczone
*/

/* Multiple Taxonomy Handling:OR SPR*/
$args = array(
	'post_type' => 'post',
	'tax_query' => array(
		'relation' => 'OR',//relacja or lub
		array(
			'taxonomy' => 'category',
			'field'    => 'slug',
			'terms'    => array( 'quotes' ),//kategorie cudzslowie
		),
		array(
			'taxonomy' => 'post_format',//taxonomia jest format postu
			'field'    => 'slug',
			'terms'    => array( 'post-format-quote' ),//formaat posy musi byc " cudzyslow"
			),
	),
);
$query = new WP_Query( $args );
/* tlumaczenie tablicy argumentow:
1 z wbud typu posta post wybierz:
2  z w budowanej kategorri standardowej wordpress category
3 kategorie i nazwie quotes
4. lub
5. wybierz z taxonomi ktora jest format postow wszystkie wpisy ktore maja wlasnie format postu ustawione na"cudzysłów"
*/

/* stosowanie dwoch relacji na raz or  i and */

$args = array(
	'post_type' => 'post',
	'tax_query' => array(
		'relation' => 'OR',
		array(
			'taxonomy' => 'category',
			'field'    => 'slug',
			'terms'    => array( 'quotes' ),
		),
		array(
                        'relation' => 'AND',
                        array(
			        'taxonomy' => 'post_format',
			        'field'    => 'slug',
			        'terms'    => array( 'post-format-quote' ),
                        ),
                        array(
                      
					 'taxonomy' => 'category',
                     'field'    => 'slug',
                     'terms'    => array( 'wisdom' ),
                        ),
		),
	),
);
$query = new WP_Query( $args );

/* tlumaczenie kodu :

1 wybierz ze standardowej petli postow
2.te kategorie ktore mają terminy (nazwy) - quotes
3.relacja miedzy tym zapytaniem a dwoma kolejnymi or - lub 
4. wybierz z postow formatów format cytaty
5.relacja z kolejnym zapytanie okreslona jako and -i
6 wybierz z kategorii standardowej termin - wisdom 

spsosb dzilanai kodu petlawybierze te posty ktore albo beda kategorii cytaty albo beda zarowno (i) nalezaly do fromatów pstow cytaty jaki i kategorii wisdom
*/

