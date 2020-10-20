<?php 
// get_header(); ?>
<div class="container">
  <div class="row">
    <div class="col-md-8">
<?php 



/*STATUS PRZYKLADU: SPRAWDZONE DZILAJACE*/
/* $args = array(
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
); */


/*STATUS PRZYKLADU: SPRAWDZONE DZILAJACE
 $args = array(
	'post_type' => 'receptury',
	'tax_query' => array(
		array(
			'taxonomy' => 'ingredients',
			'field'    => 'slug',//WG SLUG
			'terms'    => array( 'cukier', 'likier','pieprz' ),
		),
	),
); */

//////////////////
/* STATUS PRZYKLADU: SPRAWDZONE DZILAJACE */
   /*  $args = array(
	'post_type' => 'receptury',//nazwa posta
	'posts_per_page' => 5,
	'offset' => 1,//w tym przypadku wyswietli 4 kolejne posty ZA wykluczonym postem wg kolejnosci dodania
	'tax_query' => array(
		'relation' => 'OR',//?AND POKAZUJE PIERWSZA TAXONOMIE A DRUGIEJ NIE TAK CZY SIAK, OR POKAZUJE WYNIKI Z //OBYDWU TAXONOMI, STOSUJ CZESCIEJ OR ABY PRINTOWAC OBYDWA WYNIKI
		   array(
			'taxonomy' => 'ingredients',//nazwa taxonomi(wczesniej utworzyc w functions)
			'field'    => 'slug',//wskazanie ze bedziemy sie poslugiwac nazwa taxonomi
			'terms'    => array( 'cukier', 'likier' ),//nazwy tagow utworzone w graficzym interfejsie wp
		),   
	 array(
			'taxonomy' => 'mealtype',//jak w/w
			 'field'    => 'term_id',//wskazanie ze bedziemy sie poslugiwac numerem id tagu
			 'terms'    => array( 32, 33),//przykladowe id majace odzwieciedlenie w graficznym intefejsie wp
			 'operator' => 'IN',//? niepokazywane w/w tagow
		),   
	),
);  */

/* stosowanie dwoch relacji na raz or  i and STATUS PRZYKLADU: SPRAWDZONE DZILAJACE
*/

/* $args = array(
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
); */

/* STATUS PRZYKLADU: SPRAWDZONE DZILAJACE */
//$query = new WP_Query( array( 'author_name' => 'johny2' ) );//nazwa autora pokrywa sie z adminem w logowaniu
/* STATUS PRZYKLADU: SPRAWDZONE DZILAJACE */
/* $args = array(
	'date_query' => array(
		array(
			'year'  => 2015,
			'month' => 6,
			'day'   => 10,
		),
	),
); */
/* Returns posts for today:STATUS PRZYKLADU: SPRAWDZONE DZILAJACE */ 
/* $today = getdate();
$query = new WP_Query( 'year=' . $today['year'] . '&monthnum=' . $today['mon'] . '&day=' . $today['mday'] ); */




/*Returns posts for this week:  
STATUS PRZYKLADU: SPRAWDZONE DZILAJACE */
/* $week = date( 'W' );
$year = date( 'Y' );
$query = new WP_Query( 'year=' . $year . '&w=' . $week ); */

/* Return posts between 9AM to 5PM on weekdays
STATUS PRZYKLADU: SPRAWDZONE DZILAJACE

 */
/* $args = array(
    'post_type' => 'receptury',
	'date_query' => array(
		array(
			'hour'      => 9,
			'compare'   => '>=',
		),
		array(
			'hour'      => 17,
			'compare'   => '<=',
		),
		array(
			'dayofweek' => array( 2, 6 ),//od srody do soboty
			'compare'   => 'BETWEEN',
		),
	),
	'posts_per_page' => -1,//wzytskie posty na strone
);
$query = new WP_Query( $args ); */


/*Return posts from January 1st to February 28th
STATUS PRZYKLADU: SPRAWDZONE DZILAJACE  */

/* $args = array(
	'date_query' => array(
		array(
			'after'     => 'January 1st, 2013',//po wartosci podanej 
			'before'    => array(//przed data podana ponizej
				'year'  => 2017,
				'month' => 1,
				'day'   => 17,
			),
			'inclusive' => true,//For after/before, whether exact value should be matched or not'. 
		),
	),
	'orderby' => 'comment_count',
	//'orderby' => 'title menu_order',
	//'orderby' => 'title',
	'order'   => 'DESC',
	//'category_name' => 'wisdom',
	'posts_per_page' => -1,
); */
//$query = new WP_Query( $args );

/* ZWROC POSTY  opublikowane rok temu ale zmodyfikowane miesiac temu
STATUS PRZYKLADU: SPRAWDZONE DZILAJACE
*/

 /* $args = array(
	'date_query' => array(
		array(
			'column' => 'post_date_gmt',//njprwd zwraca nazwe kolumny z bay danych, data publikacji posta
			'before' => '1 year ago',
		),
		array(
			'column' => 'post_modified_gmt',//data publikacji posta ( w bazie danych)
			'after'  => '1 month ago',
		),
	),
	'posts_per_page' => 5,
);  */

//pobierz wszuyskie posty biezace z biezacej strony status kodu:SPRAWDZONY DZILAJACY
//$query = new WP_Query( array( 'paged' => get_query_var( 'paged' ) ) );//funkcja pobiera wartosci z petli
//$query = new WP_Query( $args );  ?>   

<?php while( $query -> have_posts() ) : $query -> the_post(); ?>
        
          <div class="media">
            <a class="pull-left" href="<?php the_permalink(); ?>">
              <?php the_post_thumbnail( $size = 'thumbnail'); ?>
            </a>
            <div class="media-body">
              <a href="<?php the_permalink(); ?>"><h4 class="media-heading"><?php the_title(); ?></h4></a>
              <?php the_excerpt(); ?>
              <a href="<?php the_permalink(); ?>" class="btn btn-default">Czytaj więcej</a>
            </div>
          </div>
          <hr>

<?php endwhile;
 wp_reset_postdata(); ?>
 </div>

    
    <div class="col-md-4">
      <?php //get_sidebar(); ?>
    </div>
  </div>
</div>
<?php// uwaga!!! w celu cwiczen z datami mozna modyfikowac sobie dowolnie daty wpisow w edycji posta w opublikuj ?>
 

