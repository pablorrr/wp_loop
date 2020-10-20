uwaga :robione na podstawie szbalonu twnty thirteen
wszytsko dotyczy sie petli wp qery, TRZEBA OCZYWISCIE UTWORZYC TAGO KATEGORIE ITP

<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
		<?php /*ustawianie wyswietlania danej kategorii w wp_query, niesstosowac "if", id kategorii pobierasz z paska adresu przegladarki w momencie edycji kategorii, jesli dasz minus nie pojawia sie wpis z danej kategorii jesli pozostawaiasz bez zmian wyswietla sie tylko te wpsisy ktore sa z danej kategorii  */?>
		<?php $query = new WP_Query( 'cat=-20' );//ustawienie zmiennej np query i kategori na niewidoczna ?>

			<?php /* The loop */ ?>
			<?php /*while ($query->have_posts() ) : $query->the_post();//pokazanie wordpresowi o jaka petle chodzi tutaj poprzez podstawieni query*/ ?>
				<?php /*get_template_part( 'content', get_post_format() );*/ ?>
			<?php/* endwhile;*/ ?>

			<?php/* twentythirteen_paging_nav();*/ ?>
		

		
			<?php /*ustwiwnie wyswietlania kategori w wp_qeury poprzez nazwe, slug, nazwe bedaca slugiem sprawdzasz poprzez edycje kategorii i upr nazwa */?>
		<?php $query = new WP_Query( 'category_name=nazwa-kategorii' );//ustawienie zmiennej i categori poprzez nazwe ?>

			<?php /* The loop */ ?>
			<?php while ($query->have_posts() ) : $query->the_post();//pokazanie wordpresowi o jaka petle chodzi tutaj poprzez podstawieni query ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>

			<?php twentythirteen_paging_nav(); ?>
			
			<?php /*ustwiwnie wyswietlania tag w wpquery poprzez nazwe-slug,podobnie mozna po id robiac to samo co poprzednio $query = new WP_Query( 'tag_id=13' );, mozna wyswitlac kilka id i nazw po przecinkach */?>
		<?php $query = new WP_Query( 'tag=to-jest-tag' );//nastawienie tagu?>

			<?php /* The loop */ ?>
			<?php while ($query->have_posts() ) : $query->the_post();//pokazanie wordpresowi o jaka petle chodzi tutaj poprzez podstawieni query ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>

			<?php twentythirteen_paging_nav(); ?>

		<?php /*cwiczenia z taxonomia:tag, wczesniej utworzylem taxonomie tagu niecaly nowy custmowey post z codexu w functions jest to tag customowy ale dodawany do standardowych wpisow*/?>
	<?php $args = array(//przeslanie argumentow
	'post_type' => 'post',//nazwa posta tutaj uzyta standardowa
	'tax_query' => array(
		array(
			'taxonomy' => 'people',
			'field'    => 'slug',
			'terms'    => 'bob2',//wskazanie jakie posty do jakiego tagu sa przyporadkowane
		),
	),
);
$query = new WP_Query( $args );?>	
<?php /* The loop */ ?>
			<?php while ($query->have_posts() ) : $query->the_post();//pokazanie wordpresowi o jaka petle chodzi tutaj poprzez podstawieni query ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
	


		<?php endwhile; ?>
		
////////////////////////////////////////////////////////////////////////////////////////////
		<?php /*cwiczenia z taxonomia wyswietlanie kilku wybranych tagow, wczesniej utworzylem taxonomie tagu niecaly nowy custmowey post z codexu w functions jest to tag customowy akle dodawany do standardowych wpisow*/?>
	<?php $args = array(//przeslanie argumentow
	'post_type' => 'post',//nazwa posta tutaj uzyta standardowa
	'tax_query' => array(
		array(
			'taxonomy' => 'people',
			'field'    => 'slug',
			'terms'    => 'bob2',//wskazanie jakie posty do jakiego tagu sa przyporadkowane
		),
	),
);
$query = new WP_Query( $args );?>	
<?php /* The loop */ ?>
			<?php while ($query->have_posts() ) : $query->the_post();//pokazanie wordpresowi o jaka petle chodzi tutaj poprzez podstawieni query ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
	


		<?php endwhile; ?>		
	<?php get_template_part( 'content', get_post_format() ); ?>
	
	///////////////////////////////////////////////////////////////////////////////////////////////
	
	<? $args = array(
	'post_type' => 'acme_product',//nazwa posta
	'tax_query' => array(
		'relation' => 'AND',//? polecenie pokazuj takie i takie lub nie pokazuj
		array(
			'taxonomy' => 'movie_genre',//nazwa taxonomi(wczesniej utworzyc w functions)
			'field'    => 'slug',//wskazanie ze bedziemy sie poslugiwac nazwa taxonomi
			'terms'    => array( 'action', 'comedy' ),//nazwy tagow utworzone w graficzym interfejsie wp
		),
		array(
			'taxonomy' => 'actor',//jak w/w
			'field'    => 'term_id',//wskazanie ze bedziemy sie poslugiwac numerem id tagu
			'terms'    => array( 30, 31, 32 ),//przykladowe id majace odzwieciedlenie w graficznym intefejsie wp
			'operator' => 'NOT IN',//? niepokazywane w/w tagow
		),
	),
);
$query = new WP_Query( $args );?>
<?php /* The loop */ ?>
			<?php while ($query->have_posts() ) : $query->the_post();//pokazanie wordpresowi o jaka petle chodzi tutaj poprzez podstawieni query ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>
<?php twentythirteen_paging_nav(); ?>
	
////////////////////////////
inee sposoby pod codexem www 	https://codex.wordpress.org/Class_Reference/WP_Query
	
	
	
	
	
	
	
	
	
	
		</div><!-- #content -->
	</div><!-- #primary -->
///////////zawartosc pliku functions
add_action( 'init', 'create_posttype' );
function create_posttype() {//def.customowego typu z codexu
  register_post_type( 'acme_product',
    array(
      'labels' => array(
        'name' => __( 'Products' ),
        'singular_name' => __( 'Product' )
      ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'products'),
    )
  );
}
function people_init() {
	// create a new taxonomy,tagu customowego nie osobnego postu
	register_taxonomy(
		'people',
		'acme_product',//nazwa customowego postu(zdef.powyzej )do jakiego ma byc przzypisany
		array(
			'label' => __( 'People' ),
			'rewrite' => array( 'slug' => 'person' ),
			'capabilities' => array(
				'assign_terms' => 'edit_guides',
				'edit_terms' => 'publish_guides'
			)
		)
	);
}
add_action( 'init', 'people_init' );	
	
	