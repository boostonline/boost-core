<?php
/**
 * Fired during plugin activation.
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    BoostCore
 * @subpackage BoostCore/Classes
 * @author     Matthew Bull <matthewbull@boostonline.co.uk>
 */

namespace BoostCore\Classes;

class Activator
{
	/**
	 * Short Description. (use period)
	 * @since    1.0.0
	 */
	public static function activate() 
	{
        $source = __DIR__ . '/../views/maintenance.php';
        $dest = ABSPATH . 'wp-content/maintenance.php';
        copy($source, $dest);
        $source = __DIR__ . '/../views/webpreview.php';
        $dest = ABSPATH . 'wp-content/webpreview.php';
        copy($source, $dest);
        $source = __DIR__ . '/../views/db-error.php';
        $dest = ABSPATH . 'wp-content/db-error.php';
        copy($source, $dest);
	}
}