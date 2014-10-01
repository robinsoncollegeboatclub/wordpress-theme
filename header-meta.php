<?php /* Header Meta */ ?>

	<section id="header-meta" class="clearfix">
		<div class="wrap clearfix">

			<?php if ( is_archive() ) : ?>
			
				<h1 class="entry-title">
				<?php
					if ( is_category() ) {
						printf( __( 'Category: %s', 'mighty' ), single_cat_title( '', false ) );
					} elseif ( is_tag() ) {
					    printf( __( 'Tagged: %s', 'mighty' ), single_tag_title( '', false ) );
					} elseif ( is_author() ) {
						$curauth = get_queried_object();
						printf( __( 'Author: ', 'mighty' ));
						echo $curauth->display_name;
					} elseif ( is_day() ) {
					    printf( __( 'Day: %s', 'mighty' ), get_the_date() );
					} elseif ( is_month() ) {
					    printf( __( 'Month: %s', 'mighty' ), get_the_date( 'F Y' ) );
					} elseif ( is_year() ) {
					    printf( __( 'Year: %s', 'mighty' ), get_the_date( 'Y' ) );
					} else {
					    _e( 'Archives', 'mighty' );
					}
				?>
				</h1>
			
			<?php elseif ( is_search() ) : ?>
							
				<h1 class="entry-title"><?php _e( 'Search results for', 'mighty' ) ?>: '<?php the_search_query(); ?>'</h1>
			   				
			<?php elseif ( is_single() && !is_singular( 'portfolio' ) ) : 
								
				if ( $posts_page = get_post( get_option( 'page_for_posts' ) ) ) {
			 		echo '<h1 class="entry-title">' . $posts_page->post_title . '</h1>';
			 		echo '<div class="entry-excerpt">' . $posts_page->post_excerpt . '</div>';
					 }	?>
					 
			<?php else : ?>
								
				<h1 class="entry-title"><?php single_post_title(); ?></h1>
			
				<?php if ( !is_archive() && !is_search() && !is_404() ) :
				
					$page_id = get_queried_object_id(); ?>
					<div class="entry-excerpt"><?php echo get_post_field( 'post_excerpt', $page_id, 'display' ); ?></div>
				
				<?php endif;?>
		
			<?php endif; ?>
			
		</div>
	</section>