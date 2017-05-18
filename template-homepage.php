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

	<!--Photos-->
	<section id="photos" class="clearfix">

		<?php /*$images = get_attached_media( 'image' ); ?>

		<?php if ( count($images) ) :*/ ?>

		<div class="flexslider">
			<div class="slider-nav clearfix"></div>
			<ul class="slides">

			<?php /*foreach($images as $att_id => $attachment): ?>
				<li class="slide">
					<?php echo wp_get_attachment_image( $attachment->ID, 'full' ); ?>
				</li>

			<?php endforeach; */?>
                <li class="slide">
                    <img class="alignnone wp-image-93" src="http://robinsonboatclub.co.uk/wp-content/uploads/2014/10/10357771_10100925861368560_1185036100871475069_o.jpg" alt="M1_Mays_14" width="900" height="506">
                </li>
                <li class="slide">
                    <img class="alignnone wp-image-93" src="http://robinsonboatclub.co.uk/wp-content/uploads/2014/10/10476582_10154627793190543_998420965509506639_o.jpg" alt="M1_Mays_14" width="900" height="506">
                </li>
                <li class="slide">
                    <img class="alignnone wp-image-93" src="http://robinsonboatclub.co.uk/wp-content/uploads/2014/10/10346531_10152205787125897_384997893843157581_n.jpg" alt="M1_Mays_14" width="900" height="506">
                </li>

			</ul>
		</div>

		<?php /*wp_reset_postdata(); ?>

		<?php endif;*/ ?>

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
