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
	    /* Copy custom drop-ins*/
	    
        $source = __DIR__ . '/../views/maintenance.php';
        $dest = ABSPATH . 'wp-content/maintenance.php';
        copy($source, $dest);
        $source = __DIR__ . '/../views/webpreview.php';
        $dest = ABSPATH . 'wp-content/webpreview.php';
        copy($source, $dest);
        $source = __DIR__ . '/../views/db-error.php';
        $dest = ABSPATH . 'wp-content/db-error.php';
        copy($source, $dest);
        
        /* Create Custom Error Pages in WordPress using HTACCESS
           Get HTACCESS path & dynamic website url */
           
        $path = dirname(__FILE__) . '/../../../../' ;
        $htaccess_file = $path . '.htaccess';
        $website_url = get_bloginfo('url').'/';
        
        // Check & prevent writing error pages more than once
        $check_file = file_get_contents($htaccess_file);
        $this_string = '# BEGIN WordPress Error Pages';
        
        if( strpos( $check_file, $this_string ) === false) {
        
        // Setup Error page locations dynamically
        $error_pages .= PHP_EOL. PHP_EOL . '# BEGIN WordPress Error Pages'. PHP_EOL. PHP_EOL;
        $error_pages .= 'ErrorDocument 401 '.$website_url.'error-401.shtml'.PHP_EOL;
        $error_pages .= 'ErrorDocument 403 '.$website_url.'error-403.shtml'.PHP_EOL;
        $error_pages .= 'ErrorDocument 404 '.$website_url.'error-404.shtml'.PHP_EOL;
        $error_pages .= 'ErrorDocument 500 '.$website_url.'error-500.shtml'.PHP_EOL;
        $error_pages .= PHP_EOL. '# END WordPress Error Pages'. PHP_EOL;
        
        // Write the error page locations to HTACCESS
        $htaccess = fopen( $htaccess_file, 'a+');
        fwrite( $htaccess, $error_pages );
        fclose($htaccess);
        
        }
	}
}