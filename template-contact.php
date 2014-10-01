<?php /* Template Name: Contact */ ?>

<?php get_header(); ?>

	<main id="content" role="main" itemprop="mainContentOfPage">
		<div class="wrap clearfix">

		<?php while ( have_posts() ) : the_post(); ?>

			<!-- Article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> itemscope="itemscope" itemtype="http://schema.org/CreativeWork">

				<header class="entry-header" itemscope="itemscope" itemtype="http://schema.org/WPHeader">

					<h1 class="entry-title" itemprop="headline"><?php the_title(); ?></h1>

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
					
				</header>

				<div class="entry-content" itemprop="text">
					<?php the_content(); ?>
				</div>

				<!-- Contact Form -->
				<section id="contact-form">

				<?php if ( isset ( $_GET['success'] ) ) : ?>

					<p class="success"><?php _e( 'Your message has been sent', 'mighty' ); ?></p>

				<?php else : ?>

					<form action="" method="POST">

						<input type="hidden" name="form" value="contact-form">
						<input type="hidden" name="currenturl" value="<?php the_permalink(); ?>">
						<input type="hidden" name="redirect" value="<?php the_permalink(); ?>?success">

						<?php if ( isset( $_GET['check'] ) ) : ?>

							<p class="check">
								<?php
									if ( $_GET['check'] == "empty" ) {
										echo _e( 'Please complete the form', 'mighty' );
									} elseif ( $_GET['check'] == "fields" ) {
										echo _e( 'There was a problem processing your request', 'mighty' );
									} elseif ( $_GET['check'] == "email" ) {
										echo _e( 'Please enter a valid email address', 'mighty' );
									}
								?>
							</p>

						<?php endif; ?>

						<ul>
							<li class="contact-name">
								<label for="name">
									<?php _e( 'Name', 'mighty' ); ?>:
									<span class="required">*</span>
								</label>
								<input type="text" name="name" />
							</li>
							<li class="contact-email">
								<label for="email">
									<?php _e( 'Email', 'mighty' ); ?>:
									<span class="required">*</span>
								</label>
								<input type="text" name="email" />
							</li>
							<li class="contact-phone">
								<label for="phone">
									<?php _e( 'Phone', 'mighty' ); ?>:
								</label>
								<input type="text" name="phone" />
							</li>
							<li class="contact-message">
								<label for="message">
									<?php _e( 'Message', 'mighty' ); ?>:
								</label>
								<textarea rows="5" cols="45" name="message"></textarea>
							</li>
							<li class="contact-submit">
								<input type="submit" value="<?php _e( 'Submit', 'mighty' ); ?>" />
							</li>
						</ul>

					</form>

				<?php endif; ?>

				</section>

			</article>

		<?php endwhile; ?>
		
		</div>
	</main>
			
<?php get_footer(); ?>
