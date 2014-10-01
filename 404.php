<?php get_header(); ?>

<main class="cleafix" id="content" role="main" itemprop="mainContentOfPage">
	<div class="wrap clearfix">

		<!-- Article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/CreativeWork">

			<header class="entry-header">
				<h1 class="entry-title" itemprop="headline"><?php _e( '<span class="big">404</span>', 'mighty' ); ?></h1>
			</header>

			<div class="entry-content" itemprop="text">
				<p><?php _e('Well, this is embarrassing. We can\'t seem to locate the page you\'re looking for. <br>Bad link? Mistyped address? We\'re not exactly sure. <br><br>You can always search for the page below.', 'mighty'); ?></p>
				<?php get_search_form(); ?>
			</div>

		</article>

	</div>
</main>
			
<?php get_footer(); ?>
