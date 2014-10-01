<?php /* Template Name: Portfolio */ ?>

<?php get_header(); ?>

<main id="content" role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">
	<div class="wrap clearfix">

		<header class="entry-header" itemscope="itemscope" itemtype="http://schema.org/WPHeader">

			<h1 class="entry-title" itemprop="headline"><?php the_title(); ?></h1>

			<?php if ( has_excerpt() ) : ?>
				<div class="entry-excerpt" itemprop="text">
					<?php the_excerpt(); ?>
				</div>
			<?php endif; ?>
			
		</header>

		<?php

			if ( get_query_var( 'paged' ) ) {
				$paged = get_query_var( 'paged' );
			} else if ( get_query_var( 'page' ) ) {
				$paged = get_query_var( 'page' );
			} else {
				$paged = 1;
			}

			$args = array( 
				'post_type' => 'portfolio',
				'posts_per_page' => get_option( 'posts_per_page' ),
				'paged' => $paged
			);

			$temp = $wp_query;
			$wp_query = null;
			$wp_query = new WP_Query();
			$wp_query->query( $args );

			$count = 1;


			if ( $wp_query->have_posts() ) :
				$terms = get_terms( 'portfolio-type' );

		?>

		<div class="portfolio-container clearfix">


		<?php while ( $wp_query->have_posts() ) : $wp_query->the_post();

			$terms = get_the_terms( $post->ID, 'portfolio-type' );
			$term_list = '';

			if( !empty( $terms ) ) {
				foreach( $terms as $term ) {
					$term_list .= "$term->slug" . " ";
				}
				$term_list = trim( $term_list );
			}

		?>

			<!-- Article -->
			<article class="post<?php if( $count %2 == 0 ) { echo ' last'; }; ?>" id="post-<?php the_ID(); ?>" itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
				<header class="entry-header" itemscope="itemscope" itemtype="http://schema.org/WPHeader">

					<?php if ( has_post_thumbnail() ) : ?>
						<a class="entry-image" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<?php the_post_thumbnail( 's' ); ?>
						</a>
					<?php endif; ?>

					<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>

					<?php if ( !empty( $terms ) ) : ?>
						<em class="entry-meta"><?php foreach( $terms as $term ) { echo $term->name . ', '; } ?></em>
					<?php endif; ?>

				</header>
			</article>


			<?php if( $count %2 == 0 ) : ?>
				<div class="clearfix"></div>
			<?php endif; ?>

			<?php $count ++; ?>


		<?php endwhile; ?>


		</div><!--/.portfolio-container-->

		<?php
			global $wp_query;
			if ( $wp_query->max_num_pages > 1 ) :
		?>

		<!--Pagination-->
		<div class="pagination">
			<ul class=" clearfix">
				<li class="prev"><?php next_posts_link( '<span>&larr;</span> '.__( 'Older Work', 'mighty' ).'' ); ?></li>
				<li class="next"><?php previous_posts_link( __( 'Newer Work', 'mighty' ).' <span>&rarr;</span>' ); ?></li>
			</ul>
		</div>

		<?php endif; ?>

		<?php 
			$wp_query = null; 
			$wp_query = $temp;
		?>

	<?php endif; ?>
		
	</div>
</main>
			
<?php get_footer(); ?>
