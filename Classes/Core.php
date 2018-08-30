<?php
/**
 * Handler for functionality.
 * This class binds overs together.
 *
 * @since      1.0.0
 * @package    BoostCore
 * @subpackage BoostCore/Classes
 * @author     Matthew Bull <matthewbull@boostonline.co.uk>
 */

namespace BoostCore\Classes;

use BoostCore\Classes\Loader as Loader;
use BoostCore\Classes\Admin as Admin;
//use BoostCore\Classes\Cleanup as Cleanup;

class Core
{
	protected $loader;
	protected $version;

	private static $instance = null;

	public static function instance()
	{
 		null === self::$instance and self::$instance = new self;
        return self::$instance;
	} 

	public function __construct()
	{
		$this->version = '0.3';

		$this->loader = new Loader;

		$this->define_admin_hooks();
		$this->define_login_hooks();
		$this->define_public_hooks();
	}

	/**
	 * Register all of the hooks related to the admin-facing functionality of the plugin.
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks()
	{
		$admin = new Admin($this->version);
		$this->loader->add_action('admin_enqueue_scripts', $admin, 'enqueue_styles');
		$this->loader->add_action('admin_init', $admin, 'remove_default_meta_box');
		$this->loader->add_filter('admin_footer_text', $admin, 'adtrak_footer_content');

		$this->loader->add_action('wp_dashboard_setup', $admin, 'add_dashboard_widgets');

		$this->loader->add_filter('manage_media_columns', $admin, 'adjust_media_library_cols');
		$this->loader->add_action('manage_media_custom_column', $admin, 'adjust_media_library_vals', 10, 2);
	}

	public function define_login_hooks()
	{
		$admin = new Admin($this->version);		
		$this->loader->add_action('login_enqueue_scripts', $admin, 'enqueue_styles');
	}

	/**
	 * Register all of the hooks related to the public-facing functionality of the plugin.
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() 
	{
		//$cleanup = new Cleanup($this->version);

		# clean up head/body
		//$this->loader->add_action('init', $cleanup, 'headers');
		//$this->loader->add_filter('body_class', $cleanup, 'cleanup_body');		

		# clean up scripts
		//$this->loader->add_action('wp_enqueue_scripts', $cleanup, 'js_to_footer');		
		//$this->loader->add_filter('script_loader_src', $cleanup, 'remove_script_version', 15, 1);
		//$this->loader->add_filter('script_loader_tag', $cleanup, 'clean_scripts');

		# clean up styles		
		//$this->loader->add_filter('style_loader_src', $cleanup, 'remove_script_version', 15, 1);
		//$this->loader->add_filter('style_loader_tag', $cleanup, 'clean_stylesheets');

		# clean tags and ids
		//$this->loader->add_filter('get_avatar', $cleanup, 'remove_self_closing_tags');
		//$this->loader->add_filter('comment_id_fields', $cleanup, 'remove_self_closing_tags');
		//$this->loader->add_filter('post_thumbnail_html', $cleanup, 'remove_self_closing_tags');
	}
    
	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 * @since    1.0.0
	 */
	public function run() 
	{
		$this->loader->run();
	}
}