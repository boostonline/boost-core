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
	    /* List custom drop-ins */
	    
	    $tocopy = array(
	        array(
                'source' => __DIR__ . '/../views/maintenance.php',
                'dest' => ABSPATH . 'wp-content/maintenance.php'
	        ),
	        array(
                'source' => __DIR__ . '/../views/webpreview.php',
                'dest' => ABSPATH . 'wp-content/webpreview.php'
	        ),
	        array(
                'source' => __DIR__ . '/../views/db-error.php',
                'dest' => ABSPATH . 'wp-content/db-error.php'
	        ),
	        array(
                'source' => __DIR__ . '/../views/400.shtml',
                'dest' => ABSPATH . '400.shtml'
	        ),
	        array(
                'source' => __DIR__ . '/../views/401.shtml',
                'dest' => ABSPATH . '401.shtml'
	        ),
	        array(
                'source' => __DIR__ . '/../views/404.shtml',
                'dest' => ABSPATH . '404.shtml'
	        ),
	        array(
                'source' => __DIR__ . '/../views/500.shtml',
                'dest' => ABSPATH . '500.shtml'
	        )
	   );
	   
	    /* Copy custom drop-ins only if they don't exist */
	   
	    foreach ($tocopy AS $file) {
            if (!file_exists($file['dest'])) {
                copy($file['source'], $file['dest']);
            }
	    }
	   
        /* Create Custom Error Pages in WordPress using HTACCESS
           Get HTACCESS path & dynamic website url */

        $htaccess_file = ABSPATH . '.htaccess';
        $website_url = get_bloginfo('url').'/';
        
        // Check & prevent writing error pages more than once
        $check_file = file_get_contents($htaccess_file);
        $this_string = '# BEGIN WordPress Error Pages';
        
        if( strpos( $check_file, $this_string ) === false) {
        
        // Setup Error page locations dynamically
        $error_pages .= PHP_EOL. PHP_EOL . '# BEGIN WordPress Error Pages'. PHP_EOL. PHP_EOL;
        $error_pages .= 'ErrorDocument 401 '.$website_url.'401.shtml'.PHP_EOL;
        $error_pages .= 'ErrorDocument 403 '.$website_url.'403.shtml'.PHP_EOL;
        $error_pages .= 'ErrorDocument 404 '.$website_url.'404.shtml'.PHP_EOL;
        $error_pages .= 'ErrorDocument 500 '.$website_url.'500.shtml'.PHP_EOL;
        $error_pages .= PHP_EOL. '# END WordPress Error Pages'. PHP_EOL;
        
        // Write the error page locations to HTACCESS
        $htaccess = fopen( $htaccess_file, 'a+');
        fwrite( $htaccess, $error_pages );
        fclose($htaccess);
        
        }
	}
}