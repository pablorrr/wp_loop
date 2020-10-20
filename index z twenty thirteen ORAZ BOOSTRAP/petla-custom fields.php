<?php 

    /* meta_key (string) - Custom field key.
    meta_value (string) - Custom field value.
    meta_value_num (number) - Custom field value.
    meta_compare (string) - Operator to test the 'meta_value'. Possible values are '=', '!=', '>', '>=', '<', '<=', 'LIKE', 'NOT LIKE', 'IN', 'NOT IN', 'BETWEEN', 'NOT BETWEEN', 'NOT EXISTS', 'REGEXP', 'NOT REGEXP' or 'RLIKE'. Default value is '='.

    meta_query (array) - Custom field parameters (available since Version 3.1).
        relation (string) - The logical relationship between each inner meta_query array when there is more than one. Possible values are 'AND', 'OR'. Do not use with a single inner meta_query array.

meta_query also contains one or more arrays with the following keys:

    key (string) - Custom field key.
    value (string|array) - Custom field value. It can be an array only when compare is 'IN', 'NOT IN', 'BETWEEN', or 'NOT BETWEEN'. You don't have to specify a value when using the 'EXISTS' or 'NOT EXISTS' comparisons in WordPress 3.9 and up.
    (Note: Due to bug #23268, value is required for NOT EXISTS comparisons to work correctly prior to 3.9. You must supply some string for the value parameter. An empty string or NULL will NOT work. However, any other string will do the trick and will NOT show up in your SQL when using NOT EXISTS. Need inspiration? How about 'bug #23268'.)
    compare (string) - Operator to test. Possible values are '=', '!=', '>', '>=', '<', '<=', 'LIKE', 'NOT LIKE', 'IN', 'NOT IN', 'BETWEEN', 'NOT BETWEEN', 'EXISTS' and 'NOT EXISTS'. Default value is '='.
    type (string) - Custom field type. Possible values are 'NUMERIC', 'BINARY', 'CHAR', 'DATE', 'DATETIME', 'DECIMAL', 'SIGNED', 'TIME', 'UNSIGNED'. Default value is 'CHAR'. You can also specify precision and scale for the 'DECIMAL' and 'NUMERIC' types (for example, 'DECIMAL(10,5)' or 'NUMERIC(10)' are valid). */
	
	
	
	
	/*Wyświetl posty gdzie klucz niestandardowe pole jest "color", niezależnie od wartości pola niestandardowego:  */
	$query = new WP_Query( array( 'meta_key' => 'color' ) );
	
	
	
	/* Display posts where the custom field value is 'blue', regardless of the custom field key:  */
	$query = new WP_Query( array( 'meta_value' => 'blue' ) );
	
	/* Display Page where the custom field value is 'blue', regardless of the custom field key:  */
	
	$args = array(
	'meta_value' => 'blue',
	'post_type'  => 'page'
);
   $query = new WP_Query( $args );
   
   /* Display posts where the custom field key is 'color' and the custom field value is 'blue':  */
   
   $args = array(
	'meta_key'   => 'color',
	'meta_value' => 'blue'
);
$query = new WP_Query( $args );

/* Display posts where the custom field key is 'color' and the custom field value IS NOT 'blue':  */

$args = array(
	'meta_key'     => 'color',
	'meta_value'   => 'blue',
	'meta_compare' => '!='//beda pritnowane te posty przy tych meta box gdzied od klucza color nie jest //przypasowana wartosc blue
	
);
$query = new WP_Query( $args );
   
 /* Display posts where the custom field value is a number. Displays only posts where that number is less than 10. (WP_Query uses this equation to compare: $post_meta . $args['meta_compare'] . $args['meta_value'], where '$post_meta' is the value of the custom post meta stored in each post; the actual equation with the values filled in: $post_meta < 10)  
 printuj posty standardowe, taam gdzie meta boxy maja klucz number o wartosci 10 ale te posty gdzie wartosci sa mniejsze niz 10
 
 ogolnie: printuj te petle gdzie metaboxy maja wartosci mniejsze niz 10
 */
 
 $args = array(
	'post_type' => 'post',
	'meta_key' => 'number',
	'meta_value_num' => 10,
	'meta_compare' => '<',
);
$query = new WP_Query( $args );

   
/* Display posts where the custom field key is a set date and the custom field value is now. Displays only posts which date has not passed.  

printuj tylko te posty w ktorych data nie zostala przelslamna a w metaboxach */

$args = array(
	'post_type'    => 'event',
	'meta_key'     => 'event_date',
	'meta_value'   => date( "Ymd" ), // change to how "event date" is stored, meta_value jest dla dat 
	'meta_compare' => '>',
);
$query = new WP_Query( $args );


	
/* Display 'product'(s) where the custom field key is 'price' and the custom field value that is LESS THAN OR EQUAL TO 22.
By using the 'meta_value' parameter the value 99 will be considered greater than 100 as the data are stored as 'strings', not 'numbers'. For number comparison use 'meta_value_num'. */

/* meta_value_num ---- jest dla liczb int nie dla dat, mets value num nie stosuje sie apostrofow jako e int nie jest string a w adatach tak*/

$args = array(
	'meta_key'     => 'price',
	'meta_value'   => '22',
	'meta_compare' => '<=',
	'post_type'    => 'product'
);
$query = new WP_Query( $args );
	
/* Display posts with a custom field value of zero (0), regardless of the custom field key: 	 */

$args = array(
	'meta_value' => '_wp_zero_value'
);
$query = new WP_Query( $args );

/* Display posts from a single custom field: 
 z postow produkty wyswietl te( wszytskie) posty ktore  maja klucz metabox color ale nie z wartoscia blue
	 */

$args = array(
	'post_type'  => 'product',
	'meta_query' => array(
		array(
			'key'     => 'color',
			'value'   => 'blue',
			'compare' => 'NOT LIKE',
		),
	),
);
$query = new WP_Query( $args );

/* Display posts from SEVERAL CUSTOM FIELD: 	 */

$args = array(
	'post_type'  => 'product',
	'meta_query' => array(
		array(
			'key'     => 'color',
			'value'   => 'blue',
			'compare' => 'NOT LIKE',
		),
		array(
			'key' => 'price',
			'value'   => array( 20, 100 ),//spomiedy tych wartosci numerycznych
			'type'    => 'numeric',
			'compare' => 'BETWEEN',
		),
	),
);
$query = new WP_Query( $args );


/* Display posts that have meta key 'color' NOT LIKE value 'blue' OR meta key 'price' with values BETWEEN 20 and 100: 


  to samo co powyzej ale z parametrem OR , njprwd jesli istniejea dwa metaboxy i sa spelnione warunki to wyswietla sie obydwa jesli nie to ten w ktiorym spelniaaja sie warunki */

$args = array(
	'post_type'  => 'product',
	'meta_query' => array(
		'relation' => 'OR',
		array(
			'key'     => 'color',
			'value'   => 'blue',
			'compare' => 'NOT LIKE',
		),
		array(
			'key'     => 'price',
			'value'   => array( 20, 100 ),
			'type'    => 'numeric',
			'compare' => 'BETWEEN',
		),
	),
);
$query = new WP_Query( $args );

	/* The 'meta_query' clauses can be nested in order to construct complex queries. For example, show productss where color=orange OR color=red&size=small translates to the following:

     zpostow o typuie produkty wyswietl posty dla klyczy metabox color o wartosci orange lub zarowno (i and)  gdzie metaboxy maja klucze color i size i wartosci odpowiednio red, small
	*/
	
	$args = array(
	'post_type'  => 'product',
	'meta_query' => array(
		'relation' => 'OR',
		array(
			'key'     => 'color',
			'value'   => 'orange',
			'compare' => '=',//color = orange
		),
                array(
                        'relation' => 'AND',
                        array(
                                'key' => 'color',
                                'value' => 'red',
                                'compare' => '=',
                        ),
                        array(
                                'key' => 'size',
                                'value' => 'small',
                                'compare' => '=',
                        ),
		),
	),
);
$query = new WP_Query( $args );
	
	
	
?>
