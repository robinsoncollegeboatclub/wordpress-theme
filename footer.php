
		<footer class="clearfix" id="footer" role="contentinfo" itemscope="itemscope" itemtype="http://schema.org/WPFooter">
			<div class="wrap clearfix">

			    <!-- Links -->
			    <nav role="navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
				    <?php if ( has_nav_menu( 'footer-menu' ) ) : ?>

					    <?php
						    wp_nav_menu(
							    array(
								    'theme_location' => 'footer-menu',
								    'container'      => false,
								    'menu_id'        => 'links',
								    'menu_class'     => 'footer-menu',
								    'depth'          => '1'
							    )
						    );
					    ?>

				    <?php else : ?>

						<ul id="links">
							<?php wp_list_pages( 'title_li=&depth=1' ); ?>
						</ul>

			    	<?php endif; ?>
				</nav>

			    <!-- Copyright -->
				<p class="copyright">

				<?php if ( of_get_option( 'copyright-text' ) ) : ?>
					<?php echo of_get_option( 'copyright-text' ); ?><br>
				<?php else : ?>
					Copyright &copy; <?php echo date( 'Y' ); ?>.
				<?php endif; ?>

				</p>

			</div>
		</footer>

		<!--Sidebar-->
		<?php get_sidebar( 'sidebar' ); ?>

		<?php if ( of_get_option( 'footer-scripts' ) ) : ?>
			<script type="text/javascript">
				<?php echo of_get_option( 'footer-scripts' ); ?>
			</script>
		<?php endif; ?>

		<?php wp_footer(); ?>

	</body>
</html>
