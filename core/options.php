<?php

/**
ReduxFramework Sample Config File
For full documentation, please visit: https://docs.reduxframework.com
* */

if (!class_exists('admin_folder_Redux_Framework_config')) {

	class admin_folder_Redux_Framework_config {

		public $args        = array();
		public $sections    = array();
		public $theme;
		public $ReduxFramework;

		public function __construct() {

			if (!class_exists('ReduxFramework')) {
				return;
			}

// This is needed. Bah WordPress bugs.  ;)
			if ( true == Redux_Helpers::isTheme( __FILE__ ) ) {
				$this->initSettings();
			} else {
				add_action('plugins_loaded', array($this, 'initSettings'), 10);
			}

		}

		public function initSettings() {

// Just for demo purposes. Not needed per say.
			$this->theme = wp_get_theme();

// Set the default arguments
			$this->setArguments();

// Set a few help tabs so you can see how it's done
			$this->setHelpTabs();

// Create the sections and fields
			$this->setSections();

if (!isset($this->args['opt_name'])) { // No errors please
	return;
}

// If Redux is running as a plugin, this will remove the demo notice and links
add_action( 'redux/loaded', array( $this, 'remove_demo' ) );

// Function to test the compiler hook and demo CSS output.
// Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
//add_filter('redux/options/'.$this->args['opt_name'].'/compiler', array( $this, 'compiler_action' ), 10, 2);

// Change the arguments after they've been declared, but before the panel is created
//add_filter('redux/options/'.$this->args['opt_name'].'/args', array( $this, 'change_arguments' ) );

// Change the default value of a field after it's been set, but before it's been useds
//add_filter('redux/options/'.$this->args['opt_name'].'/defaults', array( $this,'change_defaults' ) );

// Dynamically add a section. Can be also used to modify sections/fields
//add_filter('redux/options/' . $this->args['opt_name'] . '/sections', array($this, 'dynamic_section'));

$this->ReduxFramework = new ReduxFramework($this->sections, $this->args);
}

/**

This is a test function that will let you see when the compiler hook occurs.
It only runs if a field   set with compiler=>true is changed.

* */
function compiler_action($options, $css) {
//echo '<h1>The compiler hook has run!';
//print_r($options); //Option values
//print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )

/*
// Demo of how to use the dynamic CSS and write your own static CSS file
$filename = dirname(__FILE__) . '/style' . '.css';
global $wp_filesystem;
if( empty( $wp_filesystem ) ) {
require_once( ABSPATH .'/wp-admin/includes/file.php' );
WP_Filesystem();
}

if( $wp_filesystem ) {
$wp_filesystem->put_contents(
$filename,
$css,
FS_CHMOD_FILE // predefined mode settings for WP files
);
}
*/
}

/**

Custom function for filtering the sections array. Good for child themes to override or add to the sections.
Simply include this function in the child themes functions.php file.

NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
so you must use get_template_directory_uri() if you want to use any of the built in icons

* */
function dynamic_section($sections) {
//$sections = array();
	$sections[] = array(
		'title' => __('Section via hook', 'epv'),
		'desc' => __('<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'epv'),
		'icon' => 'el-icon-paper-clip',
// Leave this as a blank section, no options just some intro text set above.
		'fields' => array()
	);

	return $sections;
}

/**

Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.

* */
function change_arguments($args) {
//$args['dev_mode'] = true;

	return $args;
}

/**

Filter hook for filtering the default value of any given field. Very useful in development mode.

* */
function change_defaults($defaults) {
	$defaults['str_replace'] = 'Testing filter hook!';

	return $defaults;
}

// Remove the demo link and the notice of integrated demo from the redux-framework plugin
function remove_demo() {

// Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
	if (class_exists('ReduxFrameworkPlugin')) {
		remove_filter('plugin_row_meta', array(ReduxFrameworkPlugin::instance(), 'plugin_metalinks'), null, 2);

// Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
		remove_action('admin_notices', array(ReduxFrameworkPlugin::instance(), 'admin_notices'));
	}
}

public function setSections() {

/**
Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
* */
// Background Patterns Reader
$sample_patterns_path   = ReduxFramework::$_dir . '../sample/patterns/';
$sample_patterns_url    = ReduxFramework::$_url . '../sample/patterns/';
$sample_patterns        = array();

if (is_dir($sample_patterns_path)) :

	if ($sample_patterns_dir = opendir($sample_patterns_path)) :
		$sample_patterns = array();

		while (( $sample_patterns_file = readdir($sample_patterns_dir) ) !== false) {

			if (stristr($sample_patterns_file, '.png') !== false || stristr($sample_patterns_file, '.jpg') !== false) {
				$name = explode('.', $sample_patterns_file);
				$name = str_replace('.' . end($name), '', $sample_patterns_file);
				$sample_patterns[]  = array('alt' => $name, 'img' => $sample_patterns_url . $sample_patterns_file);
			}
		}
	endif;
endif;

ob_start();

$ct             = wp_get_theme();
$this->theme    = $ct;
$item_name      = $this->theme->get('Name');
$tags           = $this->theme->Tags;
$screenshot     = $this->theme->get_screenshot();
$class          = $screenshot ? 'has-screenshot' : '';

$customize_title = sprintf(__('Customize &#8220;%s&#8221;', 'epv'), $this->theme->display('Name'));

?>
<div id="current-theme" class="<?php echo esc_attr($class); ?>">
	<?php if ($screenshot) : ?>
		<?php if (current_user_can('edit_theme_options')) : ?>
			<a href="<?php echo wp_customize_url(); ?>" class="load-customize hide-if-no-customize" title="<?php echo esc_attr($customize_title); ?>">
				<img src="<?php echo esc_url($screenshot); ?>" alt="<?php esc_attr_e('Current theme preview'); ?>" />
			</a>
		<?php endif; ?>
		<img class="hide-if-customize" src="<?php echo esc_url($screenshot); ?>" alt="<?php esc_attr_e('Current theme preview'); ?>" />
	<?php endif; ?>

	<h4><?php echo $this->theme->display('Name'); ?></h4>

</div>

<?php
$item_info = ob_get_contents();

ob_end_clean();

$sampleHTML = '';
if (file_exists(dirname(__FILE__) . '/info-html.html')) {
	/** @global WP_Filesystem_Direct $wp_filesystem  */
	global $wp_filesystem;
	if (empty($wp_filesystem)) {
		require_once(ABSPATH . '/wp-admin/includes/file.php');
		WP_Filesystem();
	}
	$sampleHTML = $wp_filesystem->get_contents(dirname(__FILE__) . '/info-html.html');
}

// ACTUAL DECLARATION OF SECTIONS
$this->sections[] = array(
	'title'     => __('General Settings', 'epv'),
// Biến thành con của thằng ở trên
// 'subsection'       => true,
	'desc'      => __('Welcome to 3conn theme options panel! Have fun customizing the theme!', 'epv'),
	'icon'      => 'el-icon-edit',
// 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
	'fields'    => array(     
		array(
			'id'        => 'logo',
			'type'      => 'media',
			'url'      => true,
			'title'     => __('Logo upload', 'epv'),
			'desc'      => __('Website Logo', 'epv'),
			'subtitle'  => __('Choose image', 'epv'),
			'default'  => array(
				'url'=>''
			),
		), 
		array(
			'id'        => 'other-logo',
			'type'        => 'slides',
			'title'     => __('Other logo', 'epv'),
			'show'        => array( 'description' => false,'title' => false, 'url' => true ),
		),
		array(
			'id'        => 'top-head-from-date',
			'type'        => 'date',
			'title'     => __('Top Head From Date', 'epv'),
		),
		array(
			'id'        => 'top-head-to-date',
			'type'        => 'date',
			'title'     => __('Top Head To Date', 'epv'),
		),
		array(
			'id'        => 'top-head-title',
			'type'        => 'text',
			'title'     => __('Top Head Title', 'epv'),
		),
		array(
			'id'        => 'top-head-title-vi',
			'type'        => 'text',
			'title'     => __('Top Head Title VI', 'epv'),
		),
		array(
			'id'        => 'popup-image',
			'type'      => 'media',
			'url'      => true,
			'title'     => __('Popup Image', 'epv'),
			'subtitle'  => __('Choose image', 'epv'),
			'default'  => array(
				'url'=>''
			),
		), 
		array(
			'id'       => 'popup-post',
			'type'     => 'select',
			'data'     => 'posts',
			'args'     => array('post_type' => 'post','posts_per_page' => -1),
			'title'    => __('Popup Post', 'epv'),
			'subtitle' => __('Selected post will be displayed in homepage', 'epv'),
		),
		array(
			'id'       => 'feature-article',
			'type'     => 'select',
			'data'     => 'posts',
			'args'     => array('post_type' => 'post','posts_per_page' => -1),
			'title'    => __('Featured Articles', 'epv'),
			'multi'    => true,
		),
		array(
			'id'       => 'feature-article-vi',
			'type'     => 'select',
			'data'     => 'posts',
			'args'     => array('post_type' => 'post','posts_per_page' => -1),
			'title'    => __('Featured Articles VI', 'epv'),
			'multi'    => true,
		),
		array(
			'id'       => 'e-brochure',
			'type'      => 'media',
			'url'      => true,
			'title'     => __('E-Brochure Sidebar Image', 'epv'),
			'subtitle'  => __('Choose image', 'epv'),
			'default'  => array(
				'url'=>''
			),
		),
		array(
			'id'        => 'top-banner-ads',
			'type'        => 'slides',
			'title'     => __('Top Banner Ads', 'epv'),
			'show'        => array( 'description' => false,'title' => false, 'url' => true ),
		),
		array(
			'id'        => 'top-banner-ads-vi',
			'type'        => 'slides',
			'title'     => __('Top Banner Ads VI', 'epv'),
			'show'        => array( 'description' => false,'title' => false, 'url' => true ),
		),
		array(
			'id'        => 'middle-banner-ads',
			'type'        => 'slides',
			'title'     => __('Middle Banner Ads', 'epv'),
			'show'        => array( 'description' => false,'title' => false, 'url' => true ),
		),
		array(
			'id'        => 'middle-banner-ads-vi',
			'type'        => 'slides',
			'title'     => __('Middle Banner Ads VI', 'epv'),
			'show'        => array( 'description' => false,'title' => false, 'url' => true ),
		),
		array(
			'id'        => 'bottom-banner-ads',
			'type'        => 'slides',
			'title'     => __('Bottom Banner Ads', 'epv'),
			'show'        => array( 'description' => false,'title' => false, 'url' => true ),
		),
		array(
			'id'        => 'bottom-banner-ads-vi',
			'type'        => 'slides',
			'title'     => __('Bottom Banner Ads VI', 'epv'),
			'show'        => array( 'description' => false,'title' => false, 'url' => true ),
		),
		array(
			'id'        => 'sidebar-ads',
			'type'        => 'slides',
			'title'     => __('Sidebar Ads', 'epv'),
			'show'        => array( 'description' => false,'title' => false, 'url' => true ),
		),
		array(
			'id'        => 'sidebar-ads-vi',
			'type'        => 'slides',
			'title'     => __('Sidebar Ads VI', 'epv'),
			'show'        => array( 'description' => false,'title' => false, 'url' => true ),
		),
		array(
			'id'        => 'coverage-ads',
			'type'        => 'slides',
			'title'     => __('Coverage Ads', 'epv'),
			'show'        => array( 'description' => false,'title' => false, 'url' => true ),
		),
		array(
			'id'        => 'coverage-ads-vi',
			'type'        => 'slides',
			'title'     => __('Coverage Ads VI', 'epv'),
			'show'        => array( 'description' => false,'title' => false, 'url' => true ),
		),
		array(
			'id'        => 'registration-title',
			'type'      => 'text',
			'title'     => __('Registration Title', 'epv'),
			'subtitle'      => __('Enter text in here', 'epv'),  
			'default'   => 'Press Registration!',              
		),
		array(
			'id'        => 'registration-title-vi',
			'type'      => 'text',
			'title'     => __('Registration Title VI', 'epv'),
			'subtitle'      => __('Enter text in here', 'epv'),  
			'default'   => 'Press Registration!',              
		),
		array(
			'id'        => 'registration-text',
			'type'      => 'text',
			'title'     => __('Registration Text', 'epv'),
			'subtitle'      => __('Enter text in here', 'epv'),  
			'default'   => 'If you are journalist and want to be updated show information, fill out required information and send us!',              
		), 
		array(
			'id'        => 'registration-text-vi',
			'type'      => 'text',
			'title'     => __('Registration Text VI', 'epv'),
			'subtitle'      => __('Enter text in here', 'epv'),  
			'default'   => 'If you are journalist and want to be updated show information, fill out required information and send us!',              
		), 
		array(
			'id'        => 'footer-title',
			'type'      => 'text',
			'title'     => __('Footer Title', 'epv'),
			'subtitle'      => __('Enter text in here', 'epv'),  
			'default'   => 'SES Vietnam Exhibition Services Co., Ltd.',              
		), 
		array(
			'id'        => 'footer-title-vi',
			'type'      => 'text',
			'title'     => __('Footer Title VI', 'epv'),
			'subtitle'      => __('Enter text in here', 'epv'),  
			'default'   => 'SES Vietnam Exhibition Services Co., Ltd.',              
		),   
		array(
			'id'        => 'footer-addr',
			'type'      => 'text',
			'title'     => __('Footer Address ', 'epv'),
			'subtitle'      => __('Enter text in here', 'epv'),  
			'default'   => '10th Floor, Ha Phan Building, 17 Ton That Tung, Pham Ngu Lao Ward, District 1, HCMC',              
		),  
		array(
			'id'        => 'footer-addr-vi',
			'type'      => 'text',
			'title'     => __('Footer Address VI', 'epv'),
			'subtitle'      => __('Enter text in here', 'epv'),  
			'default'   => 'Lầu 10 Tòa nhà Hà Phan, 17-17A-19 Tôn Thất Tùng, phường Phạm Ngũ Lão, quận 1, thành phố Hồ Chí Minh',              
		),  
		array(
			'id'        => 'footer-email',
			'type'      => 'text',
			'title'     => __('Footer Email ', 'epv'),
			'subtitle'      => __('Enter text in here', 'epv'),  
			'default'   => 'electricvietnam@informa.com',              
		),
		array(
			'id'        => 'footer-phone',
			'type'      => 'text',
			'title'     => __('Footer Phone ', 'epv'),
			'subtitle'      => __('Enter text in here', 'epv'),  
			'default'   => '+84 28 3622 2588',              
		),           
		array(
			'id'        => 'copyright',
			'type'      => 'text',
			'title'     => __('Copyright Text', 'epv'),
			'subtitle'      => __('Enter text in here', 'epv'),  
			'default'   => '© 2020 Electric & Power Vietnam all rights reserved',              
		),                  
	),
);

$this->sections[] = array(
	'title'     => __('Exhibitor Highlights', 'epv'),
	'desc'      => __('This is Exhibitor Highlights Logo List!', 'epv'),
	'icon'      => 'el el-braille',
	'fields'    => array(  
		array(
			'id'        => 'exhibitor-highlights',
			'type'        => 'slides',
			'title'     => __('Logo List', 'epv'),
			'show'        => array( 'description' => false,'title' => false, 'url' => true ),
		),
	),
);

$this->sections[] = array(
	'title'     => __('Media Partners & Sponsors', 'epv'),
	'desc'      => __('This is Media Partners & Sponsors Logo List!', 'epv'),
	'icon'      => 'el el-braille',
	'fields'    => array(  
		array(
			'id'        => 'media-partners',
			'type'        => 'slides',
			'title'     => __('Logo List', 'epv'),
			'show'        => array( 'description' => false,'title' => false, 'url' => true ),
		),
	),
);

$this->sections[] = array(
	'title'     => __('Co-located / endorsed/ supported ', 'epv'),
	'desc'      => __('This is Co-located / endorsed/ supported  Logo List!', 'epv'),
	'icon'      => 'el el-braille',
	'fields'    => array(  
		array(
			'id'        => 'co-located',
			'type'        => 'slides',
			'title'     => __('Co-Located List', 'epv'),
			'show'        => array( 'description' => false,'title' => false, 'url' => true ),
		),
		array(
			'id'        => 'endorsed-by',
			'type'        => 'slides',
			'title'     => __('Endorsed By', 'epv'),
			'show'        => array( 'description' => false,'title' => false, 'url' => true ),
		),
		array(
			'id'        => 'supported-by',
			'type'        => 'slides',
			'title'     => __('Supported List', 'epv'),
			'show'        => array( 'description' => false,'title' => false, 'url' => true ),
		),
		array(
			'id'        => 'held-in',
			'type'        => 'slides',
			'title'     => __('Held In', 'epv'),
			'show'        => array( 'description' => false,'title' => false, 'url' => true ),
		),
		array(
			'id'        => 'offical-airline',
			'type'        => 'slides',
			'title'     => __('Offical Airline', 'epv'),
			'show'        => array( 'description' => false,'title' => false, 'url' => true ),
		),
	),
);

$this->sections[] = array(
	'title'     => __('Informa', 'epv'),
	'desc'      => __('This is Informa Information!', 'epv'),
	'icon'      => 'el el-globe',
	'fields'    => array(  
		array(
			'id'        => 'informa-title',
			'type'      => 'text',
			'title'     => __('Informa Title', 'epv'),
			'subtitle'      => __('Enter text in here', 'epv'),  
			'default'   => 'PRVH Series is part of the Informa Markets Division of Informa PLC',              
		),  
		array(
			'id'        => 'informa-text',
			'type' => 'textarea',
			'title'     => __('Informa Title', 'epv'),
			'default'   => 'This site is operated by a business or businesses owned by Informa PLC and all copyright resides with them. Informa PLC’s registered office is 5 Howick Place, London SW1P 1WG. Registered in England and Wales. Number 8860726', 
		),            
	),
);

$this->sections[] = array(
	'title'     => __('Press Release', 'epv'),
	'desc'      => __('This is Press Release Customize!', 'epv'),
	'icon'      => 'el el-tasks',
// 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
	'fields'    => array(  
		array(
			'id'       => 'pressrelease-post',
			'type'     => 'select',
			'data'     => 'posts',
			'args'     => array('post_type' => 'post','cat' => 24,'posts_per_page' => -1),
			'title'    => __('Press Release Post Select', 'epv'),
			'multi'    => true,
		), 
		array(
			'id'       => 'pressrelease-post-vi',
			'type'     => 'select',
			'data'     => 'posts',
			'args'     => array('post_type' => 'post','cat' => 24,'posts_per_page' => -1),
			'title'    => __('Press Release Post VI Select', 'epv'),
			'multi'    => true,
		),                    
	),
);

$this->sections[] = array(
	'title'     => __('Where To Next', 'epv'),
	'icon'      => 'el el-tasks',
	'fields'    => array(  
		array(
			'id'        => 'wheretonext',
			'type'        => 'slides',
			'title'     => __('Where To Next', 'epv'),
			'show'        => array( 'description' => false,'title' => true, 'url' => true ),
		), 
		array(
			'id'        => 'wheretonext-vi',
			'type'        => 'slides',
			'title'     => __('Điểm Đến Tiếp Theo', 'epv'),
			'show'        => array( 'description' => false,'title' => true, 'url' => true ),
		),                   
	),
);

$this->sections[] = array(
	'title'     => __('Video', 'epv'),
	'desc'      => __('This is Video Customize!', 'epv'),
	'icon'      => 'el el-video-alt',
	'fields'    => array(
		array(
			'id'        => 'video',
			'type'        => 'slides',
			'title'     => __('Video List', 'epv'),
			'show'        => array( 'description' => false,'title' => false, 'url' => true ),
			'desc'      => 'Paste youtube link into url fields'
		),
	),
);
$this->sections[] = array(
	'title'     => __('E-Brochures', 'epv'),
	'desc'      => __('This is E-Brochures Option!', 'epv'),
	'icon'      => 'el el-briefcase',
	'fields'    => array(                    
		array(
			'id'        => 'e_brochure_title',
			'type'		=> 'text',
			'title'     => __('E-Brochures Sidebar Titlte', 'epv'),
			'default'   => 'Latest Brochure PRV2020',
		), 
		array(
			'id'        => 'e_brochure_image',
			'type'      => 'media',
			'url'      => true,
			'title'     => __('Select Image', 'epv'),
			'desc'      => __('E-Brochures Sidebar Image', 'epv'),
			'subtitle'  => __('Choose image', 'epv'),
		),
		array(
			'id'        => 'e_brochure_title_vi',
			'type'		=> 'text',
			'title'     => __('E-Brochures Sidebar Titlte VI', 'epv'),
			'default'   => 'Latest Brochure PRV2020',
		), 
		array(
			'id'        => 'e_brochure_image_vi',
			'type'      => 'media',
			'url'      => true,
			'title'     => __('Select Image', 'epv'),
			'desc'      => __('E-Brochures Sidebar Image VI', 'epv'),
			'subtitle'  => __('Choose image', 'epv'),
		),
	),
);
$this->sections[] = array(
	'title'     => __('Contact Information', 'epv'),
	'desc'      => __('This is Social Network Customize!', 'epv'),
	'icon'      => 'el el-globe',
// 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
	'fields'    => array(                    
		array(
			'id'        => 'link1',
			'type'      => 'text',
			'title'     => __('Address (EN)', 'epv'),
			'subtitle'      => __('Enter address to show in Contact Page', 'epv'), 
		),                   
		array(
			'id'        => 'link2',
			'type'      => 'text',
			'title'     => __('Address (VI)', 'epv'),
			'subtitle'      => __('Nhập địa chỉ cho phiên bản tiếng Việt', 'epv'), 
		),                   
		array(
			'id'        => 'link3',
			'type'      => 'text',
			'title'     => __('Telephone', 'epv'),
			'subtitle'      => __('Enter telephone to show in Contact Page', 'epv'),
		),                     
		array(
			'id'        => 'link4',
			'type'      => 'text',
			'title'     => __('Email', 'epv'),
			'subtitle'      => __('Enter email to show in Contact Page', 'epv'), 
		),    
	),
);

$this->sections[] = array(
	'title'     => __('Social Network', 'epv'),
	'desc'      => __('This is Social Network Customize!', 'epv'),
	'icon'      => 'el el-group-alt',
	'fields'    => array(                    
		array(
			'id'        => 'url-facebook',
			'type'      => 'text',
			'title'     => __('Facebook URL', 'epv'),   
			'subtitle'  => __('Hãy nhập Facebook URL.', 'epv'),
			'validate'  => 'url',
			'default'   => '#',              
		),                     
		array(
			'id'        => 'url-instagram',
			'type'      => 'text',
			'title'     => __('Instagram URL', 'epv'),   
			'subtitle'  => __('Hãy nhập Instagram URL.', 'epv'),
			'validate'  => 'url',
			'default'   => '#',              
		), 
		array(
			'id'        => 'url-linkedin',
			'type'      => 'text',
			'title'     => __('Linkedin URL', 'epv'),   
			'subtitle'  => __('Hãy nhập Linkedin URL.', 'epv'),
			'validate'  => 'url',
			'default'   => '#',              
		),                       
		array(
			'id'        => 'url-youtube',
			'type'      => 'text',
			'title'     => __('Youtube URL', 'epv'),   
			'subtitle'  => __('Hãy nhập Youtube URL.', 'epv'),
			'validate'  => 'url',
			'default'   => '#',              
		),    
		array(
			'id'        => 'url-email',
			'type'      => 'text',
			'title'     => __('Email', 'epv'),   
			'subtitle'  => __('Hãy nhập Email.', 'epv'),
			'validate'  => 'url',
			'default'   => '#',              
		),    
	),
);

$theme_info  = '<div class="redux-framework-section-desc">';
$theme_info .= '<p class="redux-framework-theme-data description theme-uri">' . __('<strong>Theme URL:</strong> ', 'epv') . '<a href="' . $this->theme->get('ThemeURI') . '" target="_blank">' . $this->theme->get('ThemeURI') . '</a></p>';
$theme_info .= '<p class="redux-framework-theme-data description theme-author">' . __('<strong>Author:</strong> ', 'epv') . $this->theme->get('Author') . '</p>';
$theme_info .= '<p class="redux-framework-theme-data description theme-version">' . __('<strong>Version:</strong> ', 'epv') . $this->theme->get('Version') . '</p>';
$theme_info .= '<p class="redux-framework-theme-data description theme-description">' . $this->theme->get('Description') . '</p>';
$tabs = $this->theme->get('Tags');
if (!empty($tabs)) {
	$theme_info .= '<p class="redux-framework-theme-data description theme-tags">' . __('<strong>Tags:</strong> ', 'epv') . implode(', ', $tabs) . '</p>';
}
$theme_info .= '</div>';

if (file_exists(dirname(__FILE__) . '/../README.md')) {
	$this->sections['theme_docs'] = array(
		'icon'      => 'el-icon-list-alt',
		'title'     => __('Documentation', 'epv'),
		'fields'    => array(
			array(
				'id'        => '17',
				'type'      => 'raw',
				'markdown'  => true,
				'content'   => file_get_contents(dirname(__FILE__) . '/../README.md')
			),
		),
	);
}                   

$this->sections[] = array(
	'type' => 'divide',
);

$this->sections[] = array(
	'icon'      => 'el-icon-info-sign',
	'title'     => __('Theme Information', 'epv'),
	'desc'      => __('<p class="description">This is the Description. Again HTML is allowed</p>', 'epv'),
	'fields'    => array(
		array(
			'id'        => 'opt-raw-info',
			'type'      => 'raw',
			'content'   => $item_info,
		)
	),
);

if (file_exists(trailingslashit(dirname(__FILE__)) . 'README.html')) {
	$tabs['docs'] = array(
		'icon'      => 'el-icon-book',
		'title'     => __('Documentation', 'epv'),
		'content'   => nl2br(file_get_contents(trailingslashit(dirname(__FILE__)) . 'README.html'))
	);
}
}

public function setHelpTabs() {

// Custom page help tabs, displayed using the help API. Tabs are shown in order of definition.
	$this->args['help_tabs'][] = array(
		'id'        => 'redux-help-tab-1',
		'title'     => __('Theme Information 1', 'epv'),
		'content'   => __('<p>This is the tab content, HTML is allowed.</p>', 'epv')
	);

	$this->args['help_tabs'][] = array(
		'id'        => 'redux-help-tab-2',
		'title'     => __('Theme Information 2', 'epv'),
		'content'   => __('<p>This is the tab content, HTML is allowed.</p>', 'epv')
	);

// Set the help sidebar
	$this->args['help_sidebar'] = __('<p>This is the sidebar content, HTML is allowed.</p>', 'epv');
}

/**

All the possible arguments for Redux.
For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments

* */
public function setArguments() {

$theme = wp_get_theme(); // For use with some settings. Not necessary.

$this->args = array(
	'opt_name' => 'epv_options',
	'global_variable' => 'epv_options',
	'display_name' => 'Settings Theme',
	'display_version' => false,
	'page_slug' => 'epv_options',
	'page_title' => '3conn Options Panel',
	'update_notice' => true,
	'intro_text' => '',
	'footer_text' => '<p>Don\'t forget to save</p>',
	'menu_type' => 'menu',
	'menu_title' => 'Settings Theme',               
	'menu_icon' => 'http://3conn.net/3conn_option_icon.png',
	'allow_sub_menu' => true,               
	'page_priority' => '62',
	'page_parent_post_type' => 'your_post_type',
	'customizer' => true,
	'default_mark' => '*',
	'class' => 'rd_theme_options_panel',
	'hints' => 
	array(
		'icon' => 'el-icon-question-sign',
		'icon_position' => 'right',
		'icon_size' => 'normal',
		'tip_style' => 
		array(
			'color' => 'light',
		),
		'tip_position' => 
		array(
			'my' => 'top left',
			'at' => 'bottom right',
		),
		'tip_effect' => 
		array(
			'show' => 
			array(
				'duration' => '500',
				'event' => 'mouseover',
			),
			'hide' => 
			array(
				'duration' => '500',
				'event' => 'mouseleave unfocus',
			),
		),
	),
	'output' => true,
	'output_tag' => true,
	'compiler' => true,
	'page_icon' => 'icon-themes',
	'page_permissions' => 'manage_options',
	'save_defaults' => true,
	'show_import_export' => true,
	'database' => 'options',
	'transient_time' => '3600',
	'network_sites' => true,
);

}

}

global $reduxConfig;
$reduxConfig = new admin_folder_Redux_Framework_config();
}

/**
Custom function for the callback referenced above
*/
if (!function_exists('admin_folder_my_custom_field')):
	function admin_folder_my_custom_field($field, $value) {
		print_r($field);
		echo '<br/>';
		print_r($value);
	}
endif;

/**
Custom function for the callback validation referenced above
* */
if (!function_exists('admin_folder_validate_callback_function')):
	function admin_folder_validate_callback_function($field, $value, $existing_value) {
		$error = false;
		$value = 'just testing';

/*
do your validation

if(something) {
$value = $value;
} elseif(something else) {
$error = true;
$value = $existing_value;
$field['msg'] = 'your custom error message';
}
*/

$return['value'] = $value;
if ($error == true) {
	$return['error'] = $field;
}
return $return;
}
endif;
