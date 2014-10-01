<?php get_header(); ?>

<main class="clearfix" id="content" role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">
	<div class="wrap clearfix">

		<header class="entry-header" itemscope="itemscope" itemtype="http://schema.org/WPHeader">

			<?php if ( is_day() ) : ?>

				<h1 class="entry-title" itemprop="headline"><?php printf( __( 'Day: %s', 'mighty' ), get_the_date() ); ?></h1>

			<?php elseif ( is_month() ) : ?>

				<h1 class="entry-title" itemprop="headline"><?php printf( __( 'Month: %s', 'mighty' ), get_the_date( 'F Y' ) ); ?></h1>

			<?php elseif ( is_year() ) : ?>

				<h1 class="entry-title" itemprop="headline"><?php printf( __( 'Year: %s', 'mighty' ), get_the_date( 'Y' ) ); ?></h1>

			<?php elseif ( is_category() ) : ?>

				<h1 class="entry-title" itemprop="headline"><?php printf( __( 'Category: %s', 'mighty' ), single_cat_title( '', false ) ); ?></h1>
				<div class="entry-excerpt" itemprop="text">
					<?php echo category_description(); ?>
				</div>

			<?php elseif ( is_tag() ) : ?>

				<h1 class="entry-title" itemprop="headline"><?php printf( __( 'Tagged: %s', 'mighty' ), single_tag_title( '', false ) ); ?></h1>

			<?php elseif ( is_author( $author ) ) : ?>

				<?php $curauth = get_queried_object(); ?>

				<?php echo get_avatar( get_the_author_meta( 'email' ), '75', get_the_author() ); ?>
				<h1 class="entry-title" itemprop="headline"><?php echo $curauth->display_name; ?></h1>
				<div class="entry-excerpt" itemprop="text">
					<?php echo $curauth->description; ?>
				</div>
					 
			<?php else : ?>
								
				<h1 class="entry-title" itemprop="headline"><?php single_post_title(); ?></h1>
		
			<?php endif; ?>

		</header>

		<hr />

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<!-- Article -->
			<article <?php post_class( 'clearfix' ); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">

				<?php 
					$format = get_post_format(); 
					get_template_part( 'content', $format );
				?>

			</article>

		<?php endwhile; ?>

			<?php if ( $wp_query->max_num_pages > 1 ) : ?>

				<!--Pagination-->
		        <ul class="pagination clearfix">
			        <li class="prev"><?php next_posts_link( __( 'Older Posts', 'mighty' ) ); ?></li>
			        <li class="next"><?php previous_posts_link( __( 'Newer Posts', 'mighty' ) ); ?></li>
		        </ul>

			<?php endif; ?>

		<?php endif; ?>

	</div>
</main>
			
<?php get_footer(); ?>
