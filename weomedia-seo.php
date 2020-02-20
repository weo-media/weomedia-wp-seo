<?php
/*
Plugin Name: WEO Media SEO Plugin
Plugin URI:  https://github.com/weo-media/weomedia-wp-seo
GitHub Plugin URI: https://github.com/weo-media/weomedia-wp-seo
Description: SEO Settings - global & per post/page overrides
Version:     1.0
Author:      WEO Media
Author URI:  https://weomedia.com
License:     GPL3
License URI: https://www.gnu.org/licenses/gpl-3.0.txt
Text Domain: weomedia_acf_seo
*/


// 1. customize ACF path
add_filter('acf/settings/path', 'my_acf_settings_path');
  
function my_acf_settings_path( $path )
{
    // update path
    $path = plugin_dir_path( __FILE__ ) . 'acf/';
 
    // return
    return $path;
}
  
 
// 2. customize ACF dir
add_filter('acf/settings/dir', 'my_acf_settings_dir');
 
function my_acf_settings_dir( $dir )
{
    // update path
    $dir = plugin_dir_url( __FILE__ ) . 'acf/';
 
    // return
    return $dir;
}
  
// 3. Hide ACF field group menu item
add_filter('acf/settings/show_admin', '__return_false');


function weomedia_acf_seo_activate() {
    if ( ! class_exists( 'acf' ) ) {
        require_once( plugin_dir_path( __FILE__ ) . 'acf/acf.php' );
    }
}
add_action( 'plugins_loaded', 'weomedia_acf_seo_activate' );


add_action( 'init', 'weomedia_acf_seo_init', 1 );
function weomedia_acf_seo_init() {

	// Add SEO Options Page
	if( function_exists('acf_add_options_page') ) {
		acf_add_options_page(array(
			'page_title' 	=> 'SEO & Meta Data Default Settings',
			'menu_title'	=> 'SEO Settings',
			'menu_slug' 	=> 'weomedia-acf-seo-settings',
			'capability'	=> 'edit_theme_options',
			'redirect'		=> false
		));
	}

	if( function_exists('acf_add_local_field_group') ):

	acf_add_local_field_group(array (
		'key' => 'group_5914613407e76',
		'title' => 'SEO Settings',
		'fields' => array (
			array (
				'key' => 'field_5914613d4d0d5',
				'label' => 'Default Meta Description',
				'name' => 'default_meta_description',
				'type' => 'textarea',
				'instructions' => 'Add a default description for you site. This will appear in google results under the title and URL.',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => 330,
				'rows' => 3,
				'new_lines' => '',
			),
			array (
				'key' => 'field_591461db4d0d6',
				'label' => 'Default Social Media Image',
				'name' => 'default_social_media_image',
				'type' => 'image',
				'instructions' => '1200 x 630',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'return_format' => 'id',
				'preview_size' => 'weomedia-acf-seo-thumb',
				'library' => 'all',
				'min_width' => 1200,
				'min_height' => 630,
				'min_size' => '',
				'max_width' => '',
				'max_height' => '',
				'max_size' => '',
				'mime_types' => '',
			),
			array (
				'key' => 'field_591479e548b4e',
				'label' => 'Twitter Handle',
				'name' => 'twitter_handle',
				'type' => 'text',
				'instructions' => 'Be sure to visit the <a href="https://cards-dev.twitter.com/validator">twitter card validator</a> to setup validation for twitter cards for this site.',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '@exampletwitteruser',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
		/*  array (
				'key' => 'field_59147a4a48b4f',
				'label' => 'Post Types',
				'name' => 'seo_post_types',
				'type' => 'text',
				'instructions' => 'Comma separated list of Post Types to add Custom SEO field options to',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => 'post,page',
				'placeholder' => 'post,page,custom_type',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			array (
				'key' => 'field_59147ataxonomies',
				'label' => 'Taxonomies',
				'name' => 'seo_taxonomies',
				'type' => 'text',
				'instructions' => 'Comma separated list of Taxonomies to add Custom SEO field options to',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => 'category,post_tag',
				'placeholder' => 'category,post_tag,custom_taxonomy',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			), */
			array (
				'key' => 'field_shuef27googlean8b4f',
				'label' => 'Google Analytics',
				'name' => 'googleanalytics',
				'type' => 'text',
				'instructions' => 'Google Analitics Tracking ID',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '000000000-1',
				'prepend' => 'UA-',
				'append' => '',
				'maxlength' => '',
			),
			array (
				'key' => 'field_favicon27438b0b502',
				'label' => 'Addition Raw Header Code (for favicon settings, etc.)',
				'name' => 'favicon_header',
				'type' => 'textarea',
				'instructions' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'weomedia-acf-seo-settings',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'seamless',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => 1,
		'description' => '',
	));

	endif;

	// get the array of post types to add
	$types = array();
	if ( function_exists('get_field') && get_field('seo_post_types', 'options') ) {
		$typesdata = get_field('seo_post_types', 'options');
		$typesdata = explode(',', $typesdata);
	}
	else {
		$typesdata = array('post', 'page');
	}
	foreach ($typesdata as $item) {
		$types[] = array(
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => trim($item),
			),
		);
	}
	
	// get the array of taxonomies to add
	if ( function_exists('get_field') && get_field('seo_taxonomies', 'options') ) {
		$taxdata = get_field('seo_taxonomies', 'options');
		$taxdata = explode(',', $taxdata);
	}
	else {
		$taxdata = array('category', 'post_tag');
	}
	foreach ($taxdata as $item) {
		$types[] = array(
			array (
				'param' => 'taxonomy',
				'operator' => '==',
				'value' => trim($item),
			),
		);
	}

	// Add Seo Fields to Post/Page/Custom Edit Screen
	if( function_exists('acf_add_local_field_group') && is_admin() ):

	if ( is_admin() && empty($_GET['post']) ) {
		$message = __('publish / update to view the preview', 'acf');
	}
	else {
		$message = weomedia_acf_seo_google_preview_html();
	}

	acf_add_local_field_group(array (
		'key' => 'group_59147c153ee90',
		'title' => 'SEO & Social Media',
		'fields' => array (
			array (
				'key' => 'field_59147d1e64317',
				'label' => 'SEO Meta Description',
				'name' => 'seo_meta_description',
				'type' => 'textarea',
				'instructions' => 'Add a description for this page. This will appear in google results under the title and URL and in social media sharing contexts.',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => 330,
				'rows' => 3,
				'new_lines' => '',
			),
			array (
				'key' => 'field_59147d2464318',
				'label' => 'Social Media Image',
				'name' => 'seo_social_media_image',
				'type' => 'image',
				'instructions' => 'Upload an image to use in social sharing contexts. It\'s a great idea to include a unique image for every page!',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'return_format' => 'id',
				'preview_size' => 'weomedia-acf-seo-thumb',
				'library' => 'all',
				'min_width' => 1200,
				'min_height' => 630,
				'min_size' => '',
				'max_width' => '',
				'max_height' => '',
				'max_size' => '',
				'mime_types' => '',
			),
			array (
				'key' => 'field_59147d3564319',
				'label' => 'Twitter Handle',
				'name' => 'seo_twitter_handle',
				'type' => 'text',
				'instructions' => 'Override the twitter:creator meta tag if appropriate.',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '@exampletwitteruser',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			array (
				'key' => 'field_59147deb0b502',
				'label' => 'SEO Title Override',
				'name' => 'seo_title_override',
				'type' => 'text',
				'instructions' => 'Leave this blank in most cases to use the default title. If you need to override the default &lt;title&gt; tag for this particular page, enter your custom title here.',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => 60,
			),
			array (
				'key' => 'field_5914921d37359',
				'label' => 'Social Sharing Title Override',
				'name' => 'seo_social_title_override',
				'type' => 'text',
				'instructions' => 'Leave this blank in most cases to use the default title. If you need to override the title on social sharing for this particular page, enter your custom title here.',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => 60,
			),
			array (
				'key' => 'field_5914654378PREVIEW',
				'label' => 'Preview',
				'name' => '',
				'type' => 'message',
				'message' => $message,
				'new_lines' => '',
				'esc_html' => 0,
			),
			array (
				'key' => 'field_canonical75483997034290',
				'label' => 'Canonical URL',
				'name' => 'canonical_url',
				'type' => 'url',
				'instructions' => 'Enter the canonical URL if appropriate. This is the "primary location" of the content. <a href="https://moz.com/learn/seo/canonicalization">More infomation</a>. Leave this blank in most cases.',
			),
			array(
				'key' => 'field_noindex748923795647483',
				'label' => 'NOINDEX',
				'name' => 'noindex',
				'type' => 'true_false',
				'message' => 'Discourage Search Engines from Indexing this Page.',
				'default_value' => 0,
				'instructions' => 'This is appropriate for hidden links, thank you pages, etc. that are publicly accessible but should not be found in a Search.',
			),
		),
		'location' => $types,
		'menu_order' => 200,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => 1,
		'description' => '',
	));

	endif;

}

// Remove the "generator" tag
function weomedia_acf_seo_remove_version() {
	return '';
}
add_filter('the_generator', 'weomedia_acf_seo_remove_version');

function weomedia_acf_seo_image_sizes() {
	// Add the custom image sizes needed
	add_image_size('weomedia-acf-seo-facebook', 1200, 627, true);
	add_image_size('weomedia-acf-seo-twitter', 1024, 512, true);
	add_image_size('weomedia-acf-seo-thumb', 527, 275, true);
	// make sure wordpress is not supplying a default <title> tag
	remove_theme_support( 'title-tag' );
}
add_action( 'plugins_loaded', 'weomedia_acf_seo_image_sizes' );


function weomedia_acf_seo_get_data() {

	$obj = get_queried_object();

	// get the data
	$return = array();
	// title
	if ( function_exists('get_field') && get_field('seo_title_override', $obj) ) {
		$return['head_title'] = get_field('seo_title_override', $obj);
	}
	else {
		if ( is_admin() && isset( $obj->post_title ) ) {
			$return['head_title'] = $obj->post_title . ' — ' .get_bloginfo('name');
		}
		elseif ( is_admin() && isset( $obj->name ) ) {
			$return['head_title'] = $obj->name . ' — ' .get_bloginfo('name');
		}
		else {
			$return['head_title'] = wp_title('—',false,'right') . get_bloginfo('name');
		}
	}

	// social title
	if ( function_exists('get_field') && get_field('seo_social_title_override', $obj) ) {
		$return['social_title'] = get_field('seo_social_title_override', $obj);
	}
	elseif ( function_exists('get_field') && get_field('seo_title_override', $obj) ) {
		$return['social_title'] = get_field('seo_title_override', $obj);
	}
	else {
		$return['social_title'] = wp_title('—',false,'right') . get_bloginfo('name');
	}
	
	global $pagenow;
	// description
	// if post-specific description is not empty
	if ( function_exists('get_field') && get_field('seo_meta_description', $obj) ) {
		$return['description'] = get_field('seo_meta_description', $obj);
	}
	// else if we can get an excerpt for the post
	// note: check with is_singular not is_single to be sure to include PAGES too https://www.engagewp.com/is_single-vs-is_singular-vs-is_page/
	// note: check if we are on a post edit admin page to provide an accurate preview
	elseif ( is_singular() || 'post.php' === $pagenow ) {
		if ( 'post.php' === $pagenow ) {
			$excerpt = get_the_excerpt( (int) $_GET['post'] );
		}
		else {
			$excerpt = get_the_excerpt();
		}
		// https://wordpress.stackexchange.com/a/70924/41488
		$limit = 330;
		$excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
		$excerpt = strip_shortcodes($excerpt);
		$excerpt = strip_tags($excerpt);
		$excerpt = substr($excerpt, 0, $limit);
		$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
		$excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
		
		$return['description'] = $excerpt;
	}
	// else if default description field is not empty
	elseif ( function_exists('get_field') && get_field('default_meta_description', 'options') ) {
		$return['description'] = get_field('default_meta_description', 'options');
	}
	// else if WordPress Tagline is not empty
	elseif ( get_bloginfo('description') ) {
		$return['description'] = get_bloginfo('description');
	}
	// else don't display any of the description meta tags
	else {
		$return['description'] = false;
	}

	// image
	// if post-specific social media image is not empty
	if ( function_exists('get_field') && get_field('seo_social_media_image', $obj) ) {
		$image = get_field('seo_social_media_image', $obj);
		$facebookimage = wp_get_attachment_image_src( $image, 'weomedia-acf-seo-facebook' );
		$return['facebookimage'] = $facebookimage[0];
		$twitterimage = wp_get_attachment_image_src( $image, 'weomedia-acf-seo-twitter' );
		$return['twitterimage'] = $twitterimage[0];
	}
	// else if WordPress Featured Image exists for this post
	elseif ( get_post_thumbnail_id() ) {
		$image = true;
		$facebookimage = wp_get_attachment_image_src( get_post_thumbnail_id(), 'weomedia-acf-seo-facebook' );
		$return['facebookimage'] = $facebookimage[0];
		$twitterimage = wp_get_attachment_image_src( get_post_thumbnail_id(), 'weomedia-acf-seo-twitter' );
		$return['twitterimage'] = $twitterimage[0];
	}
	// else if default social media image is not empty
	elseif ( function_exists('get_field') && get_field('default_social_media_image', 'options') ) {
		$image = get_field('default_social_media_image', 'options');
		$facebookimage = wp_get_attachment_image_src( $image, 'weomedia-acf-seo-facebook' );
		$return['facebookimage'] = $facebookimage[0];
		$twitterimage = wp_get_attachment_image_src( $image, 'weomedia-acf-seo-twitter' );
		$return['twitterimage'] = $twitterimage[0];
	}
	// else don't display any of the image meta tags
	else {
		$image = false;
		$return['facebookimage'] = false;
		$return['twitterimage'] = false;
	}

	// set the twitter card type
	if ($image) {
		$return['twitter_card'] = 'summary_large_image';
	}
	else {
		$return['twitter_card'] = 'summary';
	}

	// twitter handles
	$return['twittersite'] = false;
	$return['twitterauthor'] = false;
	// if default twitter handle exists
	if ( function_exists('get_field') && get_field('twitter_handle', 'options') ) {
		$return['twittersite'] = get_field('twitter_handle', 'options');
		$return['twitterauthor'] = $return['twittersite'];
	}
	// if post specific twitter handle exists, override the author handle
	if ( function_exists('get_field') && get_field('seo_twitter_handle', $obj) ) {
		$return['twitterauthor'] = get_field('seo_twitter_handle', $obj);
		if (!$return['twittersite']) {
			$return['twittersite'] = get_field('seo_twitter_handle', $obj);
		}
	}
	
	// permalink
	if ( is_tax() || is_category() || is_tag() ) :
		$return['url'] = get_term_link( $obj );
	else :
		$return['url'] = get_permalink( $obj );
	endif;

	// if the canonical url is set add it to the array
	if ( function_exists('get_field') && get_field('canonical_url', $obj) ) {
		$return['canonical'] = get_field('canonical_url', $obj);
	}
	else {
		$return['canonical'] = false;
	}

	// if noindex is set add it to the array
	if ( function_exists('get_field') && get_field('noindex', $obj) ) {
		$return['noindex'] = get_field('noindex', $obj);
	}
	else {
		$return['noindex'] = false;
	}

	// if favicon_header is set add it to the array
	if ( function_exists('get_field') && get_field('favicon_header', 'option') ) {
		$return['favicon_header'] = get_field('favicon_header', 'option');
	}
	else {
		$return['favicon_header'] = false;
	}

	// return the array
	return $return;
}

// remove the default canonical and shorlink from <head> - we want to use only our overrides.
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head');



function weomedia_acf_seo_google_preview_html() {
	$preview = "<style>@import url('https://fonts.googleapis.com/css?family=Roboto');.rc,.rc h3{max-width:600px;width:100%;font-weight:400}.rc,.rc cite,.rc h3,.st{font-weight:400}.rc{margin:1em;color:#222;display:block;font-family:Roboto,arial,sans-serif;font-size:13px;line-height:15.6px}.rc h3{font-size:18px;height:21px;line-height:21.6px;margin:0;overflow:hidden;padding:0;text-overflow:ellipsis;white-space:nowrap}.rc a{color:#1a0dab;text-decoration:none}.rc a:hover{color:#1a0dab;text-decoration:underline}.rc cite{color:#006621;display:inline;font-size:14px;line-height:16px;font-style:normal}.st{color:#545454;font-size:13px;line-height:18.2px;word-wrap:break-word}</style>";

	$data = weomedia_acf_seo_get_data();

	$url = get_permalink($_GET['post']);
	$url = str_replace('http://', '', $url);

	$preview .= '<div class="rc"><h3 class="r"><a href="javascript:;">' . $data['head_title'] . '</a></h3>
	<div class="s"><div class="f" style="white-space:nowrap"><cite>' . $url . '</cite></div>
	<span class="st">' . $data['description'] . '</span></div>
	</div>';

	return $preview;
}


// add the tags to the HTML <head>
function weomedia_acf_seo_hook_header() {

	// get the data
	$data = weomedia_acf_seo_get_data();

	// output the code
	?>
	<title><?php echo $data['head_title']; ?></title>

	<?php if ( $data['description'] ) : ?>
		<meta name="description" content="<?php echo esc_attr( $data['description'] ); ?>">
		<meta name="twitter:description" content="<?php echo esc_attr( $data['description'] ); ?>">
		<meta property="og:description" content="<?php echo esc_attr( $data['description'] ); ?>">
	<?php endif; ?>

	<!-- Twitter Card data -->
	<meta name="twitter:title" content="<?php echo esc_attr( $data['social_title'] ); ?>">
	<meta name="twitter:card" content="<?php echo $data['twitter_card']; ?>">
	<?php if ( $data['twittersite'] ) : ?>
		<meta name="twitter:site" content="<?php echo $data['twittersite']; ?>">
	<?php endif; ?>
	<?php if ( $data['twitterauthor'] ) : ?>
		<meta name="twitter:creator" content="<?php echo $data['twitterauthor']; ?>">
	<?php endif; ?>
	<?php if ( $data['twitterimage'] ) : ?>
		<meta name="twitter:image:src" content="<?php echo esc_url( $data['twitterimage'] ); ?>">
	<?php endif; ?>

	<!-- Open Graph data -->
	<meta property="og:title" content="<?php echo esc_attr( $data['social_title'] ); ?>">
	<meta property="og:type" content="article" />
	<meta property="og:url" content="<?php echo esc_url( $data['url'] ); ?> ">
	<meta property="og:site_name" content="<?php esc_attr( bloginfo('name') ); ?>">
	<?php if ( $data['facebookimage'] ) : ?>
		<meta property="og:image" content="<?php echo esc_url( $data['facebookimage'] ); ?>">
		<meta property="og:image:width" content="1200">
		<meta property="og:image:height" content="627">
	<?php endif; ?>

	<?php if ( $data['canonical'] ) : ?>
		<!-- Canonical URL (points to primary source) -->
		<link rel="canonical" href="<?php echo esc_url( $data['canonical'] ); ?>">
	<?php endif; ?>

	<?php if ( $data['noindex'] ) : ?>
		<!-- Discourage Search Engines from Indexing this Page -->
		<meta name="robots" content="noindex, follow">
	<?php endif; ?>

	<?php if ( $data['favicon_header'] ) : ?>
		<!-- Code added from WEO Media SEO (favicon code field) -->
		<?php echo $data['favicon_header']; ?>
	<?php endif; ?>

	<?php
}
add_action('wp_head','weomedia_acf_seo_hook_header');

// add google analtyics to the header
function weomedia_googleanatlyics_header() {

	if (
		WP_DEBUG !== true &&
		substr($_SERVER['SERVER_NAME'],0,3) != 'dev' &&
		function_exists('get_field') &&
		$googleanalytics = get_field('googleanalytics', 'options')
	) {
		echo "<!-- weomedia_acf_seo googleanalytics -->
			<!-- Global site tag (gtag.js) - Google Analytics -->
			<script async src='https://www.googletagmanager.com/gtag/js?id=UA-" . $googleanalytics . "'></script>
			<script>window.dataLayer = window.dataLayer || [];function gtag(){dataLayer.push(arguments);}gtag('js', new Date());
			gtag('config', 'UA-" . $googleanalytics . "');</script>";
	}
	elseif (
		function_exists('get_field') &&
		!get_field('googleanalytics', 'options')
	) {
		echo "<!-- OOPS - enter your google analytics UA account number on the settings page - weomedia_acf_seo googleanalytics -->";
	}
	else {
		echo '<!-- weomedia_acf_seo googleanalytics will go here on the live site. -->';
	}

}
add_action( 'wp_head', 'weomedia_googleanatlyics_header', 9999 );
