<?php
/**
 * Fired during plugin deactivation.
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    BoostCore
 * @subpackage BoostCore/Classes
 * @author     Matthew Bull <matthewbull@boostonline.co.uk>
 */

namespace BoostCore\Classes;

class Deactivator
{
	/**
	 * Short Description. (use period)
	 * @since    1.0.0
	 */
	public static function deactivate() 
	{
        unlink(ABSPATH . 'wp-content/maintenance.php');
        unlink(ABSPATH . 'wp-content/webpreview.php');
        unlink(ABSPATH . 'wp-content/db-error.php');
	}
}