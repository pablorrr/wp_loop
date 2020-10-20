<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
<?php /*wyswietlanie w petli wybranych tagow w customowym poscie*/?>	
<? $args = array(
	'post_type' => 'receptury',//nazwa posta
	'tax_query' => array(
		'relation' => 'AND',//? polecenie pokazuj takie i takie lub nie pokazuj
		array(
			'taxonomy' => 'ingredients',//nazwa taxonomi(wczesniej utworzyc w functions)
			'field'    => 'slug',//wskazanie ze bedziemy sie poslugiwac nazwa taxonomi
			'terms'    => array( 'cukier', 'likier' ),//nazwy tagow utworzone w graficzym interfejsie wp
		),
		array(
			'taxonomy' => 'meal-type',//jak w/w
			'field'    => 'term_id',//wskazanie ze bedziemy sie poslugiwac numerem id tagu
			'terms'    => array( 20, 19),//przykladowe id majace odzwieciedlenie w graficznym intefejsie wp
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
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>