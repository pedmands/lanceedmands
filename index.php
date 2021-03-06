<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Lance
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

<?php 
	$projects = array(
	'post_type' => array('projects','features'),
	// 'posts_per_page' => 12,
	'orderby' => 'rand'
	);
	$project_tiles = new WP_Query($projects);?>


<div id="projects">
	<?php while ( $project_tiles->have_posts() ) : $project_tiles->the_post();
	    echo '<div class="project hvr-float">';
	    echo '<a class="" href="' . get_permalink() . '" title="Learn more about ' . get_the_title() . '">';
	    echo '<span class="cover">';
	    the_post_thumbnail('project-thumb');
	    echo '<div class="project-caption">';
	    echo '<h1 class="project-title">' . get_the_title() . '</h1>';
	    if ( 'projects' == get_post_type()) {
	    	if (has_term('','clients')){
			    echo get_the_term_list($post->ID, 'clients', '<h1 class="project-client">', '</h1><h1 class="project-client">', '</h1>' );
			} else {
				echo get_the_term_list($post->ID, 'director', '<h1 class="project-client">', '</h1><h1 class="project-client">', '</h1>' );
			}
	    } else {
	    	if (has_term('', 'year')){
				echo get_the_term_list($post->ID, 'year', '<h1 class="project-client">', '</h1><h1 class="project-client">', '</h1>' );
	    	} else {
	    		echo get_the_term_list($post->ID, 'director', '<h1 class="project-client">', '</h1><h1 class="project-client">', '</h1>' );
	    	}
		}
	    echo '</div>';
	    echo '</span>';
	    echo '</a>';
	    echo '</div>';
	endwhile; 


	wp_reset_query();


	?>



		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
