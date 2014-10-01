<?php /* Template Name: Homepage */ ?>

<?php get_header(); ?>

<main id="content" role="main" itemprop="mainContentOfPage">


	<!-- Heading -->
	<section id="header-meta" class="wrap clearfix">
	<?php if ( of_get_option( 'header-title' ) ) { ?>
		<h1 class="entry-title"><?php echo of_get_option( 'header-title' ); ?></h1>
	<?php } if ( of_get_option( 'header-sub' ) ) { ?>
		<div class="entry-excerpt"><?php echo of_get_option( 'header-sub' ); ?></div>
	<?php } if ( of_get_option( 'billboard-btn-link' ) ) { ?>
		<a href="<?php echo of_get_option( 'billboard-btn-link' ); ?>" title="<?php echo of_get_option( 'billboard-btn-text' ); ?>" class="more"><?php echo of_get_option( 'billboard-btn-text' ); ?></a>
	<?php } ?>
	</section>


	<!--Portfolio-->
	<section id="portfolio" class="clearfix">

		<?php $loop = new WP_Query( array( 'post_type' => 'portfolio', 'posts_per_page' => 4 ) ); ?>

		<?php if ( $loop->have_posts() ) : ?>

		<div class="flexslider">
			<div class="slider-nav clearfix"></div>
			<ul class="slides">

			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

				<li class="slide">
				<?php if ( has_post_thumbnail() ) : ?>
					<a href="<?php the_permalink(); ?>" rel="bookmark">
						<?php the_post_thumbnail( 'l' ); ?>
					</a>
				<?php endif; ?>
				</li>

			<?php endwhile; ?>

			</ul>
		</div>

		<?php wp_reset_postdata(); ?>

		<?php endif; ?>

	</section>


	<!--Text Columns-->
	<section id="columns">
		<div class="wrap clearfix">

		<?php if ( of_get_option( 'text-left-heading' ) || of_get_option( 'text-left-content' ) ) : ?>

			<div class="column">
			<?php if ( of_get_option( 'text-left-heading' ) ) : ?>
				<h2><?php echo of_get_option( 'text-left-heading' ); ?></h2>
			<?php endif; ?>
				<?php echo of_get_option( 'text-left-content' ); ?>
			</div>

		<?php endif; ?>

		<?php if ( of_get_option( 'text-center-heading' ) || of_get_option( 'text-center-content' ) ) : ?>

			<div class="column">
			<?php if ( of_get_option( 'text-center-heading' ) ) : ?>
				<h2><?php echo of_get_option( 'text-center-heading' ); ?></h2>
			<?php endif; ?>
				<?php echo of_get_option( 'text-center-content' ); ?>
			</div>

		<?php endif; ?>

		<?php if ( of_get_option( 'text-right-heading' ) || of_get_option( 'text-right-content' ) ) : ?>

			<div class="column last">
			<?php if ( of_get_option( 'text-right-heading' ) ) : ?>
				<h2><?php echo of_get_option( 'text-right-heading' ); ?></h2>
			<?php endif; ?>
				<?php echo of_get_option( 'text-right-content' ); ?>
			</div>

		<?php endif; ?>

		</div>
	</section>


	<!--Blog Posts-->
	<section id="blog" class="wrap clearfix">

		<?php $post_count = wp_count_posts()->publish; ?>

		<div class="blog-post<?php if ( $post_count == 1 ) { echo " blog-post-single"; } ?>">
			<?php global $more; $more = 0; ?>
			<?php
				$blog_args = array(
					'posts_per_page' => 1,
					'post__not_in' => get_option( 'sticky_posts' ),
				);
				$blog_post = new WP_Query( $blog_args );
			?>
			<?php while ( $blog_post->have_posts() ) : $blog_post->the_post() ?>
				<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				<p class="entry-meta">
					<?php echo get_the_date(); ?> <span>&mdash;</span> <a href="<?php the_permalink(); ?>#comments" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s comments', 'mighty' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php comments_number( __( 'No Comments', 'mighty' ), __( '1 Comment', 'mighty' ), __( '% Comments', 'mighty' ) ); ?></a>
				</p>
				<div class="entry-excerpt">
					<?php the_excerpt(); ?>
					<a href="<?php the_permalink(); ?>" rel="bookmark" class="more"><?php _e( 'Continue Reading', 'mighty' ); ?></a>
				</div>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		</div>

		<div class="blog-posts">
			<ul>
				<?php
					$blog_args = array(
						'posts_per_page' 	=> 3,
						'offset'			=> 1
					);
					$blog_post = new WP_Query( $blog_args );
				?>
				<?php while ( $blog_post->have_posts() ) : $blog_post->the_post() ?>
					<li>
						<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
						<p class="entry-meta">
							<?php echo get_the_date(); ?> <span>&mdash;</span> <a href="<?php the_permalink(); ?>#comments" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s comments', 'mighty' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php comments_number( __( 'No Comments', 'mighty' ), __( '1 Comment', 'mighty' ), __( '% Comments', 'mighty' ) );?></a>
						</p>
					</li>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			</ul>
		</div>

	</section>


</main>
			
<?php get_footer(); ?>
