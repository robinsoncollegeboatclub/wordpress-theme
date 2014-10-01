<?php

/* ----------------------------------------------------------------

 TABLE OF CONTENTS
 
	 1. LOCALIZATION
	 2. CONTENT WIDTH
	 3. THEME SETUP
	 4. REGISTER SIDEBAR
	 5. ENQUEUE SCRIPTS
	 6. EXCLUDE FROM SEARCH
	 7. COMMENTS
	 8. MORE LINK
	 9. IS BLOG
	10. POST FORMAT: GALLERY
	11. CONTACT FORM
	12. NEXT/PREV POST NAV
	13. INIT
   
-----------------------------------------------------------------*/


/* ----------------------------------------------------------------
   1. LOCALIZATION
-----------------------------------------------------------------*/

function mighty_localization() {
	load_theme_textdomain( 'mighty', get_template_directory() . '/languages' );
}

add_action( 'after_setup_theme', 'mighty_localization' );


/* ----------------------------------------------------------------
   2. CONTENT WIDTH
-----------------------------------------------------------------*/

if ( !isset( $content_width ) )
	$content_width = 920;


/* ----------------------------------------------------------------
   3. THEME SETUP
-----------------------------------------------------------------*/

if ( !function_exists( 'mighty_theme_setup' ) ) {
    function mighty_theme_setup() {
        
    	/* Register WP3+ menus */
 		register_nav_menu( 'header-menu', __( 'Header Menu', 'mighty' ) );
        register_nav_menu( 'footer-menu', __( 'Footer Menu', 'mighty' ) );
   	
    	/* Configure WP 2.9+ thumbnails */
    	add_theme_support( 'post-thumbnails' );
    	
        add_image_size( 's', 430, 300, true );
        add_image_size( 'l', 920, '', true );
        
        add_theme_support( 
            'post-formats', 
            array(
                'gallery',
                'link',
                'quote',
                'video',
                'audio'
            ) 
        );     

		add_post_type_support( 'page', 'excerpt' );
        add_theme_support('automatic-feed-links');
     
    }
}

add_action( 'after_setup_theme', 'mighty_theme_setup' );


/* ----------------------------------------------------------------
   4. REGISTER SIDEBAR
-----------------------------------------------------------------*/

if ( function_exists( 'register_sidebar' ) ) {
	register_sidebar( array(
		'name' => __( 'Sidebar', 'mighty' ),
		'id' => 'sidebar',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	));
}


/* ----------------------------------------------------------------
   5. ENQUEUE SCRIPTS
-----------------------------------------------------------------*/

if ( !function_exists( 'mighty_enqueue_scripts' ) ) {
	function mighty_enqueue_scripts() {
	    
		/* Register */
		wp_register_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.custom.js', '2.6.2' );
		wp_register_script( 'classie', get_template_directory_uri() . '/js/classie.js', '1.0.1', TRUE );
		wp_register_script( 'flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js', 'jquery', '2.2.0' );
		wp_register_script( 'fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', 'jquery', '1.0.3' );
	    wp_register_script( 'isotope', get_template_directory_uri() . '/js/jquery.isotope.min.js', 'jquery', '1.5.25', TRUE );
		wp_register_script( 'slicknav', get_template_directory_uri() . '/js/jquery.slicknav.min.js', 'jquery', '1.0' );
		wp_register_script( 'custom', get_template_directory_uri() . '/js/jquery.custom.js', 'jquery', '1.0', TRUE );

		/* Enqueue */
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'modernizr' );
		wp_enqueue_script( 'classie' );
		wp_enqueue_script( 'flexslider' );
		wp_enqueue_script( 'fitvids' );
		wp_enqueue_script( 'isotope' );
		wp_enqueue_script( 'slicknav' );
		wp_enqueue_script( 'custom' );
		
		if ( is_singular( 'post' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
				
		/* SSL */
		$protocol = is_ssl() ? 'https' : 'http';
		
		wp_enqueue_style( 'googlefont-gentium', $protocol . '://fonts.googleapis.com/css?family=Gentium+Basic:700,400italic,400' );
		wp_enqueue_style( 'style', get_stylesheet_uri(), FALSE, '1.0' );

		$accent = of_get_option( 'accent-color' );
		
		if ( $accent != '#ec3853' ) {
			wp_enqueue_style( 'style-css', get_template_directory_uri() . '/css/style.css.php', FALSE, '1.0' );
		}

		if ( of_get_option( 'custom-css' ) ) {
			wp_enqueue_style( 'custom-css', get_template_directory_uri() . '/css/custom.css.php', FALSE, '1.0' );
		}

		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', FALSE, '4.1.0' );
		wp_enqueue_style( 'responsive', get_template_directory_uri() . '/css/responsive.css', FALSE, '1.0' );

    }
}

add_action( 'wp_enqueue_scripts', 'mighty_enqueue_scripts' );


/* Enqueue Admin Scripts */

if ( !function_exists( 'mighty_enqueue_admin_scripts' ) ) {
    function mighty_enqueue_admin_scripts() {

        wp_register_script( 'mighty-admin', get_template_directory_uri() . '/includes/js/jquery.custom.admin.js', 'jquery' );
        wp_enqueue_script( 'mighty-admin' );

    }
}

add_action( 'admin_enqueue_scripts', 'mighty_enqueue_admin_scripts' );


/* ----------------------------------------------------------------
   7. COMMENTS
-----------------------------------------------------------------*/

if ( !function_exists( 'mighty_comment' ) ) {

	function mighty_comment( $comment, $args, $depth ) {
	
        $GLOBALS['comment'] = $comment; ?>
        
        <li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
	        <article class="clearfix" itemprop="comment" itemscope="itemscope" itemtype="http://schema.org/UserComments">
				<?php echo get_avatar( $comment, 75 ); ?>
		        <div class="comment-author">
					<p class="vcard" itemprop="creator" itemscope="itemscope" itemtype="http://schema.org/Person">
						<cite class="fn" itemprop="name"><?php comment_author_link(); ?></cite>
						<time itemprop="commentTime" datetime="<?php comment_time( 'c' ); ?>">
							<?php comment_date( 'F dS, Y' ); ?>
						</time>
			            <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ) ?>
			            <?php edit_comment_link( __( 'Edit', 'mighty'), ' &middot; ', '' ) ?>
					</p>
		        </div>
				<div class="comment-content" itemprop="commentText">
		            <?php comment_text() ?>
		            <?php if ( $comment->comment_approved == '0' ) : ?>
		                <p><em class="awaiting"><?php _e( 'Your comment is awaiting moderation.', 'mighty' ) ?></em></p>
		            <?php endif; ?>
				</div>
	        </article>
		</li>

<?php }
}


/* ----------------------------------------------------------------
   8. MORE LINK
-----------------------------------------------------------------*/

function mighty_more_link( $more_link, $more_link_text ) {
	return str_replace( $more_link_text, __( 'Continue Reading', 'mighty' ), $more_link );
}

add_filter( 'the_content_more_link', 'mighty_more_link', 10, 2 );


/* ----------------------------------------------------------------
   9. IS BLOG
-----------------------------------------------------------------*/

function is_blog () {
	global $post;
	$posttype = get_post_type( $post );
	return ( ( (is_archive() ) || ( is_author() ) || ( is_category() ) || ( is_home() ) || ( is_single() ) || ( is_tag() ) ) && ( $posttype == 'post' )  ) ? true : false;
}


/* ----------------------------------------------------------------
   10. POST FORMAT: GALLERY
-----------------------------------------------------------------*/
	
function mighty_gallery( $post_id ) {

	global $post;
	$images = get_children( array( 'post_parent' => $post_id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID' ) );

	if ( $images ) :

		foreach ( $images as $attachment_id => $image ) :

			$img_alt = get_post_meta( $attachment_id, '_wp_attachment_image_alt', true );
			if ( $img_alt == '' ) : $img_alt = $image->post_title;
			endif;

			$array = image_downsize( $image->ID, 'l' );
			$img_url = $array[0];
			?>

			<li>
				<img src="<?php echo $img_url; ?>" alt="<?php echo $img_alt; ?>" />
			</li>

			<?php

	endforeach;
	endif;
}


/* ----------------------------------------------------------------
   12. CONTACT FORM
-----------------------------------------------------------------*/

function mighty_contact_form() {

	if ( isset( $_POST['form'] ) != "contact-form" ) { return; }

	// Set some form vaiables
	if ( of_get_option( 'contact-email' ) ) {
		$admin_email = of_get_option( 'contact-email' );
	} else {
		$admin_email = get_option( 'admin_email' );
	}

    $site = get_bloginfo( 'name' );

    // Get form info
    $name = trim( $_POST['name'] );
    $email = trim( $_POST['email'] );
    $phone = trim( $_POST['phone'] );
    $message = trim( $_POST['message'] );
    $currenturl = trim( $_POST['currenturl'] );
    $redirect = trim( $_POST['redirect'] );

    // Check required fields for values
    if ( $name == '' AND $email == '' AND $message == '' ) {
        $error = $currenturl.'?check=empty';
        wp_redirect( $error );
        exit;
    }

    // Prevent email header injections
    foreach ( $_POST as $value ) {
        if ( stripos( $value, 'Content-Type:' ) != FALSE ) {
            $error = $currenturl.'?check=fields';
            wp_redirect( $error );
            exit;
        }
    }

    // Validate the email address
    if ( !is_email( $email ) ) {
        $error = $currenturl.'?check=email';
        wp_redirect( $error );
        exit;
    }

    // Build the email
    $body  = "Name: ". $name ."\r";
    $body .= "Email: ". $email ."\r";
    $body .= "Phone: ". $phone ."\r";
    $body .= "Message: ". $message ."\r";

    // Set from headers
    $headers = 'From: '. $name .' <'. $email .'>';

    // Set email subject
    $subject = '['. $site .'] Contact Form';

    // Who are we going to send this form too
    $send_to = $admin_email;

    if ( wp_mail( $send_to, $subject, $body, $headers ) ) {
        wp_redirect( $redirect );
        exit;
    }

}

add_action( 'wp', 'mighty_contact_form' );


/* ----------------------------------------------------------------
   12. NEXT/PREV POST NAV
-----------------------------------------------------------------*/

if ( ! function_exists( 'mighty_article_nav' ) ) :

	function mighty_article_nav() {

		$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
		$next = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous ) {
			return;
		}
		?>
		
		<nav id="article-nav" class="clearfix" role="navigation">
			<?php
				previous_post_link( '<div class="nav-previous">%link</div>', _x( '<span class="meta-nav">&larr; &nbsp;Previous Post</span> %title', 'Previous post link', 'mighty' ) );
				next_post_link( '<div class="nav-next">%link</div>', _x( '<span class="meta-nav">Next Post&nbsp; &rarr;</span> %title', 'Next post link', 'mighty' ) );
			?>
		</nav>
		
		<?php
	}

endif;


/* ----------------------------------------------------------------
   13. INIT
-----------------------------------------------------------------*/

/* Custom Meta Boxes */
function init_cmb() {
	require_once( 'includes/metabox/functions.php' );
}

add_action( 'init', 'init_cmb' );


/* Options Framework */
define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/framework/' );
require_once dirname( __FILE__ ) . '/framework/options-framework.php';


/* Init Includes */
require_once( 'includes/init.php' );

