<?php
/**
 * The main template file.
 *
 * @package QOD_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php endif; ?>

			<p>

			
			<?php
				//Create WordPress Query with 'orderby' set to 'rand' (Random)
				$args = array( 'orderby' => 'rand', 'posts_per_page' => '1' );
				$posts = get_posts( $args ); // returns an array of posts
				// output the random post
				while ( have_posts() ) : the_post();
					echo '<span class="author">';
					 the_title();
					echo '</span>';
					echo '<span class="quote">';
					the_content();
					echo '</span>';
				endwhile;
				// Reset Post Data
				wp_reset_postdata();
			?>


</p>
		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
