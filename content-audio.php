<?php /* Post Format: Audio */ ?>

	<header class="entry-header" itemscope="itemscope" itemtype="http://schema.org/WPHeader">

		<?php if ( is_single() ) : ?>

			<h1 class="entry-title" itemprop="headline"><?php the_title(); ?></h1>

			<p class="entry-meta">
				<?php _e( ' by ', 'mighty' ); ?>
				<span class="entry-author vcard" itemprop="author" itemscope="itemscope" itemtype="http://schema.org/Person"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" itemprop="url" rel="author"><?php echo get_the_author(); ?></a></span>
				<?php _e( ' on ', 'mighty' ); ?>
				<time class="entry-time" itemprop="datePublished" datetime="<?php echo get_the_time( 'c' ); ?>"><?php echo get_the_date(); ?></time>
				<?php _e( ' in ', 'mighty' ); ?>
				<span class="entry-categories"><?php the_category( ', ' ); ?></span>
				<?php _e( ' with ', 'mighty' ); ?>
				<span class="entry-comments-meta"><?php comments_popup_link( __( '0 Replies', 'mighty' ), __( '1 Reply', 'mighty' ), __( '% Replies', 'mighty' ) ); ?></span>
			</p>

			<?php if ( has_excerpt() ) : ?>
				<div class="entry-excerpt" itemprop="text">
					<?php the_excerpt(); ?>
				</div>
			<?php endif; ?>

			<?php if ( has_post_thumbnail() ) : ?>
				<div class="entry-image">
					<?php the_post_thumbnail( 'l' ); ?>
				</div>
			<?php endif; ?>

			<?php if ( get_post_meta( get_the_ID(), '_mighty_audio-file', true ) ) : ?>
				<?php echo do_shortcode( '[audio src="' . get_post_meta( get_the_ID(), '_mighty_audio-file', true ) . '" width="920"]' ); ?>
			<?php endif; ?>


		<?php else : ?>


			<?php if ( has_post_thumbnail() ) : ?>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="entry-image">
					<?php the_post_thumbnail( 'l' ); ?>
				</a>
			<?php endif; ?>
			<?php if ( get_post_meta( get_the_ID(), '_mighty_audio-file', true ) ) : ?>
				<?php echo do_shortcode( '[audio src="' . get_post_meta( get_the_ID(), '_mighty_audio-file', true ) . '" width="920"]' ); ?>
			<?php endif; ?>

			<h2 class="entry-title" itemprop="headline">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h2>

			<p class="entry-meta">
				<?php _e( ' by ', 'mighty' ); ?>
				<span class="entry-author vcard" itemprop="author" itemscope="itemscope" itemtype="http://schema.org/Person"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" itemprop="url" rel="author"><?php echo get_the_author(); ?></a></span>
				<?php _e( ' on ', 'mighty' ); ?>
				<time class="entry-time" itemprop="datePublished" datetime="<?php echo get_the_time( 'c' ); ?>"><?php echo get_the_date(); ?></time>
				<?php _e( ' in ', 'mighty' ); ?>
				<span class="entry-categories"><?php the_category( ', ' ); ?></span>
				<?php _e( ' with ', 'mighty' ); ?>
				<span class="entry-comments-meta"><?php comments_popup_link( __( '0 Replies', 'mighty' ), __( '1 Reply', 'mighty' ), __( '% Replies', 'mighty' ) ); ?></span>
			</p>


		<?php endif; ?>
		
	</header>

	<div class="entry-content" itemprop="text">

		<?php if ( is_single() ) : ?>
			<?php the_content(); ?>
		<?php else : ?>
			<?php the_excerpt(); ?>
			<a class="more" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php _e( 'Continue Reading', 'mighty' ); ?></a>
		<?php endif; ?>

	</div>

	<?php if ( is_single() ) : ?>

		<?php wp_link_pages( 'before=<div class="entry-links">&after=</div>' ); ?>
		
		<?php if ( has_tag() ) : ?>
			<footer class="entry-footer">
				<p class="entry-meta">
					<span><?php _e( 'Tagged with', 'mighty' ); ?>: <?php the_tags( '', '', '' ); ?></span>
				</p>
			</footer>
		<?php endif; ?>

	<?php endif; ?>
