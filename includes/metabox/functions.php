<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * Be sure to replace all instances of '_mighty_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category YourThemeOrPlugin
 * @package  Demo_CMB2
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/CMB2/CMB2
 */

/**
 * Get the bootstrap! If using the plugin from wordpress.org, REMOVE THIS!
 */

if ( file_exists( dirname( __FILE__ ) . '/cmb2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/cmb2/init.php';
} elseif ( file_exists( dirname( __FILE__ ) . '/CMB2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/CMB2/init.php';
}

/* ----------------------------------------------------------------
   METABOX POST FORMAT: AUDIO
-----------------------------------------------------------------*/

add_action( 'cmb2_admin_init', 'mighty_register_audio_metabox' );

function mighty_register_audio_metabox() {

	$prefix = '_mighty_';

	$cmb_audio = new_cmb2_box( array(
		'id'           => 'mighty-metabox-audio',
		'title'        => esc_html__( 'Audio Details', 'cmb2' ),
		'object_types' => array( 'post', ),
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true, // Show field names on the left
	) );

	$cmb_audio->add_field( array(
		'name'     => esc_html__( 'Audio File', 'cmb2' ),
		'desc'     => esc_html__( 'Enter URL to the MP3 audio file. &nbsp;(Example: http://domain.com/speech.mp3)', 'cmb2' ),
		'id'       => $prefix . 'audio-file',
		'type'     => 'text_url',
		'on_front' => false,
	) );

}

/* ----------------------------------------------------------------
   METABOX POST FORMAT: LINKS
-----------------------------------------------------------------*/

add_action( 'cmb2_admin_init', 'mighty_register_link_metabox' );

function mighty_register_link_metabox() {

	$prefix = '_mighty_';

	$cmb_link = new_cmb2_box( array(
		'id'           => 'mighty-metabox-link',
		'title'        => esc_html__( 'Link Details', 'cmb2' ),
		'object_types' => array( 'post', ),
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true, // Show field names on the left
	) );

	$cmb_link->add_field( array(
		'name'     => esc_html__( 'Link Anchor Text', 'cmb2' ),
		'desc'     => esc_html__( 'The text string you would like linked to the URL below.', 'cmb2' ),
		'id'       => $prefix . 'link-text',
		'type'     => 'text_medium',
		'on_front' => false,
	) );

	$cmb_link->add_field( array(
		'name'     => esc_html__( 'Link URL', 'cmb2' ),
		'desc'     => esc_html__( 'Enter the URL to the link. &nbsp;(Example: http://domain.com)', 'cmb2' ),
		'id'       => $prefix . 'link-url',
		'type'     => 'text_url',
		'on_front' => false,
	) );

	$cmb_link->add_field( array(
		'name'     => esc_html__( 'Link Target', 'cmb2' ),
		'desc'     => esc_html__( 'Open link in a new window', 'cmb2' ),
		'id'       => $prefix . 'link-target',
		'type'     => 'checkbox',
		'on_front' => false,
	) );

}

/* ----------------------------------------------------------------
   METABOX POST FORMAT: QUOTES
-----------------------------------------------------------------*/

add_action( 'cmb2_admin_init', 'mighty_register_quote_metabox' );

function mighty_register_quote_metabox() {

	$prefix = '_mighty_';

	$cmb_quote = new_cmb2_box( array(
		'id'           => 'mighty-metabox-quote',
		'title'        => esc_html__( 'Quote Details', 'cmb2' ),
		'object_types' => array( 'post', ),
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true, // Show field names on the left
	) );

	$cmb_quote->add_field( array(
		'name'     => esc_html__( 'Quote Text', 'cmb2' ),
		'desc'     => esc_html__( 'Add the text quote you would like displayed.', 'cmb2' ),
		'id'       => $prefix . 'quote-text',
		'type'     => 'textarea_small',
		'on_front' => false,
	) );

	$cmb_quote->add_field( array(
		'name'     => esc_html__( 'Quote Citation', 'cmb2' ),
		'desc'     => esc_html__( 'Add the citation of who said the quote.<br>(Example: Steve Jobs &#8212; Apple, Inc.)', 'cmb2' ),
		'id'       => $prefix . 'quote-attr',
		'type'     => 'text_medium',
		'on_front' => false,
	) );

}

/* ----------------------------------------------------------------
   METABOX POST FORMAT: VIDEO
-----------------------------------------------------------------*/

add_action( 'cmb2_admin_init', 'mighty_register_video_metabox' );

function mighty_register_video_metabox() {

	$prefix = '_mighty_';

	$cmb_video = new_cmb2_box( array(
		'id'           => 'mighty-metabox-video',
		'title'        => esc_html__( 'Video Details', 'cmb2' ),
		'object_types' => array( 'post', ),
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true, // Show field names on the left
	) );

	$cmb_video->add_field( array(
		'name'     => esc_html__( 'Self Hosted Video URL', 'cmb2' ),
		'desc'     => esc_html__( 'Enter in the URL to the video MP4 or M4V file. (Example: http://domain.com/movie.mp4)', 'cmb2' ),
		'id'       => $prefix . 'video-url',
		'type'     => 'text_url',
		'on_front' => false,
	) );

	$cmb_video->add_field( array(
		'name'     => esc_html__( 'Third Party Video', 'cmb2' ),
		'desc'     => sprintf(
			esc_html__( 'Enter a YouTube, Vimeo, etc URL. Supports services listed at %s.', 'cmb2' ),
			'<a href="https://codex.wordpress.org/Embeds">codex.wordpress.org/Embeds</a>'
		),
		'id'       => $prefix . 'video-embed',
		'type'     => 'oembed',
		'on_front' => false,
	) );

}

/* ----------------------------------------------------------------
   PORTFOLIO METABOX
-----------------------------------------------------------------*/

add_action( 'cmb2_admin_init', 'mighty_register_portfolio_metabox' );
add_action( 'cmb2_admin_init', 'mighty_register_portfolio_details_metabox' );

function mighty_register_portfolio_metabox() {

	$prefix = '_mighty_';

	$cmb_portfolio = new_cmb2_box( array(
		'id'           => 'mighty-metabox-portfolio',
		'title'        => esc_html__( 'Project Media', 'cmb2' ),
		'object_types' => array( 'portfolio', ),
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true, // Show field names on the left
	) );

	$cmb_portfolio->add_field( array(
		'name'     => esc_html__( 'Slideshow Gallery', 'cmb2' ),
		'desc'     => esc_html__( 'If you would like to display a slideshow image gallery, check this box.', 'cmb2' ),
		'id'       => $prefix . 'slideshow-gallery',
		'type'     => 'checkbox',
		'on_front' => false,
	) );

	$cmb_portfolio->add_field( array(
		'name'     => esc_html__( 'Self Hosted Video URL', 'cmb2' ),
		'desc'     => esc_html__( 'Enter in the URL to the video MP4 or M4V file. (Example: http://domain.com/movie.mp4)', 'cmb2' ),
		'id'       => $prefix . 'video-url',
		'type'     => 'text_url',
		'on_front' => false,
	) );

	$cmb_portfolio->add_field( array(
		'name'     => esc_html__( 'Third Party Video', 'cmb2' ),
		'desc'     => sprintf(
			esc_html__( 'Enter a YouTube, Vimeo, etc URL. Supports services listed at %s.', 'cmb2' ),
			'<a href="https://codex.wordpress.org/Embeds">codex.wordpress.org/Embeds</a>'
		),
		'id'       => $prefix . 'video-embed',
		'type'     => 'oembed',
		'on_front' => false,
	) );

	$cmb_portfolio->add_field( array(
		'name'     => esc_html__( 'Audio File', 'cmb2' ),
		'desc'     => esc_html__( 'Enter URL to the MP3 audio file. &nbsp;(Example: http://domain.com/speech.mp3)', 'cmb2' ),
		'id'       => $prefix . 'audio-file',
		'type'     => 'text_url',
		'on_front' => false,
	) );

}

function mighty_register_portfolio_details_metabox() {

	$prefix = '_mighty_';

	$cmb_portfolio = new_cmb2_box( array(
		'id'           => 'mighty-metabox-portfolio-details',
		'title'        => esc_html__( 'Project Details', 'cmb2' ),
		'object_types' => array( 'portfolio', ),
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true, // Show field names on the left
	) );

	$cmb_portfolio->add_field( array(
		'name'     => esc_html__( 'Project Date', 'cmb2' ),
		'desc'     => esc_html__( 'Enter the date you produced this project.', 'cmb2' ),
		'id'       => $prefix . 'project-date',
		'type'     => 'text_date',
		'on_front' => false,
	) );

	$cmb_portfolio->add_field( array(
		'name'     => esc_html__( 'Client Name', 'cmb2' ),
		'desc'     => esc_html__( 'Enter the name of the Client you did this project for.', 'cmb2' ),
		'id'       => $prefix . 'client-name',
		'type'     => 'text_medium',
		'on_front' => false,
	) );

	$cmb_portfolio->add_field( array(
		'name'     => esc_html__( 'Client Name Link URL', 'cmb2' ),
		'desc'     => esc_html__( 'Optionally you may enter a URL to link to the clients site. &nbsp;(Example: http://domain.com)', 'cmb2' ),
		'id'       => $prefix . 'client-url',
		'type'     => 'text_url',
		'on_front' => false,
	) );

	$cmb_portfolio->add_field( array(
		'name'     => esc_html__( 'Special Skills', 'cmb2' ),
		'desc'     => sprintf(
			esc_html__( 'You may optionally and special skills you would like to note.%s(Example: Design, Coding, User Testing)', 'cmb2' ),
			'<br>'
		),
		'id'       => $prefix . 'project-skills',
		'type'     => 'text',
		'on_front' => false,
	) );

	$cmb_portfolio->add_field( array(
		'name'     => esc_html__( 'Project Link Anchor Text', 'cmb2' ),
		'desc'     => esc_html__( 'The text string you would like linked to the URL below. &nbsp;(Example: View Project)', 'cmb2' ),
		'id'       => $prefix . 'project-link-text',
		'type'     => 'text_medium',
		'on_front' => false,
	) );

	$cmb_portfolio->add_field( array(
		'name'     => esc_html__( 'Project Link URL', 'cmb2' ),
		'desc'     => esc_html__( 'Enter a URL to link to the project elsewhere. &nbsp;(Example: http://domain.com)', 'cmb2' ),
		'id'       => $prefix . 'project-url',
		'type'     => 'text_url',
		'on_front' => false,
	) );

}
