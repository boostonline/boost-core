<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://boostonlineadvertising.co.uk
 * @since             1.0.0
 * @package           BoostCore
 *
 * @wordpress-plugin
 * Plugin Name: 	Boost Core
 * Description: 	Core functionality for WordPress Development.
 * Version: 		0.0.2
 * Author: 		Boost
 * Author URI: 		https://boostonlineadvertising.co.uk
 * License: 		GPL-2.0+
 * License URI:     http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:     boost-core
 * Domain Path:     /languages
 */

# if this file is called directly, abort
if ( ! defined( 'WPINC' ) ) {
	die;
}

# autoloader
require_once __DIR__ . '/vendor/autoload.php';

# define apths
defined('AC_PLUGIN_PATH') or define('AC_PLUGIN_PATH', plugin_dir_path( __FILE__ ));
defined('AC_PLUGIN_URL') or define('AC_PLUGIN_URL', plugin_dir_url( __FILE__ ));

/**
 * The code that runs during plugin activation.
 * This action is documented in classes/Activator.php
 */
function activate_core() 
{
	\BoostCore\Classes\Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in classes/Deactivator.php
 */
function deactivate_core() 
{
	\BoostCore\Classes\Deactivator::deactivate();
}

# github updater
require __DIR__ . '/vendor/yahnis-elsts/plugin-update-checker/plugin-update-checker.php';
$className = PucFactory::getLatestClassVersion('PucGitHubChecker');
$updater = new $className(
    'https://github.com/boostonline/boost-core',
    __FILE__,
    'master'
);

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function ac_run_core() {
	$plugin = \BoostCore\Classes\Core::instance(); 
	$plugin->run();
}

ac_run_core();
