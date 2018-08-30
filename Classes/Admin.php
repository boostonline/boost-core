<?php
/**
 * Handler for admin functionality.
 *
 * @since      1.0.0
 * @package    BoostCore
 * @subpackage BoostCore/Classes
 * @author     Matthew Bull <matthewbull@boostonline.co.uk>
 */

namespace BoostCore\Classes;

class Admin
{
	
	public function __construct($version) 
	{
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the admin area.
	 * @since    1.0.0
	 */
	public function enqueue_styles() 
	{
		wp_enqueue_style('boost-style', AC_PLUGIN_URL . 'assets/css/boost-style.css', [], $this->version, 'all');
	}
	
	public function adjust_media_library_cols($cols)
	{
		$cols["alt"] = "Alt";
		return $cols;
	}

	function adjust_media_library_vals($column_name, $id) {
    	if ($column_name === 'alt')
        	echo get_post_meta( $id, '_wp_attachment_image_alt', true);
	}

	/**
	 * Remove the default meta boxes from the wordpress admin dashboard.
	 * @since    1.0.0
	 */
	public function remove_default_meta_box()
	{
		remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');
		remove_meta_box('dashboard_plugins', 'dashboard', 'normal');
		remove_meta_box('dashboard_primary', 'dashboard', 'normal');
		remove_meta_box('dashboard_secondary', 'dashboard', 'normal');
		remove_meta_box('dashboard_activity', 'dashboard', 'normal');
		remove_meta_box('dashboard_right_now', 'dashboard', 'normal');
		remove_meta_box('dashboard_quick_press', 'dashboard', 'normal');
	}

	/*
     * Add custom footer content
     */
    function adtrak_footer_content()
    {
        $footer_content = '<p>Powered by WordPress and <a href="https://boostonlineadvertising.co.uk/website-design/">Boost</a></p>';
        echo $footer_content;
        remove_filter('update_footer', 'core_update_footer');
    }

	// Function that outputs the contents of the dashboard widget
	function dashboard_widget_hello($post, $callback_args) 
	{
		include_once AC_PLUGIN_PATH . 'widgets/hello.php';
	}

	// Function that outputs the contents of the dashboard widget
	function dashboard_widget_quick_links($post, $callback_args) 
	{
		// echo "Hello, this is the administration of your site. If you require assistance please get in touch!";
		include_once AC_PLUGIN_PATH . 'widgets/quick-links.php';
	}

	// Function used in the action hook
	function add_dashboard_widgets() 
	{
		wp_add_dashboard_widget(
			'hello_dashboard_widget', 
			'Dashboard', 
			[$this, 'dashboard_widget_hello']
		);

		/*if(current_user_can('manage_options')) {
			wp_add_dashboard_widget(
				'shortcuts_dashboard_widget', 
				'Boost: Quick Links', 
				[$this, 'dashboard_widget_quick_links']
			);
		}*/
	}

    //* Add custom message to WordPress login page
    
    function smallenvelop_login_message( $message ) {
        if ( empty($message) ){
            return '';
        } else {
            return $message;
        }
    }

}
