<?php
/**
 * The template for displaying archives of color schemes.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package whimsy-color
 */

get_header(); ?>


<?php whimsy_content_before(); ?>

<div id="content" class="container row">

	<div id="primary" class="full-width">

		<?php whimsy_main_before(); ?>

		<main id="main" class="site-main" role="main">
		
		<?php whimsy_main_inside_before(); ?>

		<?php if ( have_posts() ) : ?>


			<header class="page-header">
				<h1 class="page-title">
					<?php
						if ( is_category() ) :
							single_cat_title();

						elseif ( is_tag() ) :
							single_tag_title();

						elseif ( is_author() ) :
							printf( __( 'Author: %s', 'whimsy-framework' ), '<span class="vcard">' . get_the_author() . '</span>' );

						elseif ( is_day() ) :
							printf( __( 'Day: %s', 'whimsy-framework' ), '<span>' . get_the_date() . '</span>' );

						elseif ( is_month() ) :
							printf( __( 'Month: %s', 'whimsy-framework' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'whimsy-framework' ) ) . '</span>' );

						elseif ( is_year() ) :
							printf( __( 'Year: %s', 'whimsy-framework' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'whimsy-framework' ) ) . '</span>' );

						elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
							_e( 'Asides', 'whimsy-framework' );

						elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
							_e( 'Galleries', 'whimsy-framework' );

						elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
							_e( 'Images', 'whimsy-framework' );

						elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
							_e( 'Videos', 'whimsy-framework' );

						elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
							_e( 'Quotes', 'whimsy-framework' );

						elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
							_e( 'Links', 'whimsy-framework' );

						elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
							_e( 'Statuses', 'whimsy-framework' );

						elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
							_e( 'Audios', 'whimsy-framework' );

						elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
							_e( 'Chats', 'whimsy-framework' );

						else :
                            printf( __( '%s', 'whimsy-framework' ), '<span>' . single_cat_title( '', false ) . '</span>' );

						endif;
					?>
				</h1>
				<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
				?>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>		

			<?php while ( have_posts() ) : the_post(); ?>
			
			<?php whimsy_post_before(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>
			
			<?php whimsy_post_after(); ?>

			<?php endwhile; ?>

			<?php whimsy_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		<?php whimsy_main_inside_after(); ?>

		</main><!-- #main -->

		<?php whimsy_main_after(); ?>

<?php get_footer(); ?>