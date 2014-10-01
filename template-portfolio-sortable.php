<?php /* Template Name: Portfolio (Sortable) */ ?>

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
			$args = array(
				'post_type' => 'portfolio',
				'order' => 'DESC',
				'posts_per_page' => -1
			);

			$wp_query = new WP_Query( $args );
		?>

		<?php if ( $wp_query->have_posts() ) : ?>

		<?php $terms = get_terms( 'portfolio-type' ); ?>
		
		<?php if ( !empty( $terms ) ) : ?>

			<!-- Filters -->
			<div class="portfolio-filter clearfix">
				<ul>
					<li class="filter-heading"><?php _e( 'Filter:', 'mighty' ); ?></li>
					<li><a href="<?php get_permalink( $id ); ?>" class="active" data-filter="*"><?php _e( 'All', 'mighty' ); ?></a></li>
					<?php foreach( $terms as $term ) : ?>
					<li><a href="<?php get_term_link( $term ); ?>" data-filter=".<?php echo $term->slug; ?>"><?php echo $term->name; ?></a></li>
					<?php endforeach; ?>
				</ul>
			</div>

		<?php endif; ?>

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
			<article id="post-<?php the_ID(); ?>" <?php post_class( array( $term_list, 'post' ) ); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
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

		<?php endwhile; endif; ?>

		</div><!--/.portfolio-container-->
		
	</div>
</main>
			
<?php get_footer(); ?>
