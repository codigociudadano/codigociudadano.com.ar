<?php
/**
 * @package Techotronic
 * @subpackage jQuery Colorbox
 *
 * Plugin Name: jQuery Colorbox
 * Plugin URI: http://www.techotronic.de/plugins/jquery-colorbox/
 * Description: Used to overlay images on the current page. Images in one post are grouped automatically.
 * Version: 4.6
 * Author: Arne Franken
 * Author URI: http://www.techotronic.de/
 * License: GPL
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 */
?>
<?php
//define constants
define('JQUERYCOLORBOX_VERSION', '4.6');
define('COLORBOXLIBRARY_VERSION', '1.3.21');

if (!defined('JQUERYCOLORBOX_PLUGIN_BASENAME')) {
  //jquery-colorbox/jquery-colorbox.php
  define('JQUERYCOLORBOX_PLUGIN_BASENAME', plugin_basename(__FILE__));
}
if (!defined('JQUERYCOLORBOX_PLUGIN_NAME')) {
  //jquery-colorbox
  define('JQUERYCOLORBOX_PLUGIN_NAME', trim(dirname(JQUERYCOLORBOX_PLUGIN_BASENAME), '/'));
}
if (!defined('JQUERYCOLORBOX_TEXTDOMAIN')) {
  define('JQUERYCOLORBOX_TEXTDOMAIN', 'jquery-colorbox');
}
if (!defined('JQUERYCOLORBOX_NAME')) {
  define('JQUERYCOLORBOX_NAME', __('jQuery Colorbox',JQUERYCOLORBOX_TEXTDOMAIN));
}
if (!defined('JQUERYCOLORBOX_PLUGIN_DIR')) {
  // /path/to/wordpress/wp-content/plugins/jquery-colorbox
  define('JQUERYCOLORBOX_PLUGIN_DIR', dirname(__FILE__));
}
if (!defined('JQUERYCOLORBOX_PLUGIN_URL')) {
  // http(s)://www.domain.com/wordpress/wp-content/plugins/jquery-colorbox
  define('JQUERYCOLORBOX_PLUGIN_URL', plugins_url('', __FILE__));
}
if (!defined('JQUERYCOLORBOX_SETTINGSNAME')) {
  define('JQUERYCOLORBOX_SETTINGSNAME', 'jquery-colorbox_settings');
}
if (!defined('JQUERYLIBRARY_VERSION')) {
  define('JQUERYLIBRARY_VERSION', '1.9.0');
}
if (!defined('JQUERYCOLORBOX_USERAGENT')) {
  define('JQUERYCOLORBOX_USERAGENT', 'jQuery Colorbox V' . JQUERYCOLORBOX_VERSION . '; (' . get_bloginfo('url') . ')');
}

/**
 * Main plugin class
 *
 * @since 1.0
 * @author Arne Franken
 */
class JQueryColorbox {

  /**
   * Constructor
   * Plugin initialization
   *
   * @since 1.0
   * @access public
   * @access static
   * @author Arne Franken
   */
  //public static function JQueryColorbox() {
  function JQueryColorbox() {
    if (!function_exists('plugins_url')) {
      return;
    }

    load_plugin_textdomain(JQUERYCOLORBOX_TEXTDOMAIN, false, '/jquery-colorbox/localization/');

    // Create the settings array by merging the user's settings and the defaults
    $usersettings = (array)get_option(JQUERYCOLORBOX_SETTINGSNAME);
    $defaultArray = $this->jQueryColorboxDefaultSettings();

    //check whether stored settings are compatible with current plugin version.
    //if not: overwrite stored settings
    $validSettings = $this->validateSettingsInDatabase($usersettings);
    if(!$validSettings) {
      $this->colorboxSettings = $defaultArray;
      update_option(JQUERYCOLORBOX_SETTINGSNAME, $defaultArray);
    } else {
      $this->colorboxSettings = wp_parse_args($usersettings, $defaultArray);
    }

    // Create list of themes and their human readable names
    $this->colorboxThemes = array(
      'theme1' => __('Theme #1', JQUERYCOLORBOX_TEXTDOMAIN),
      'theme2' => __('Theme #2', JQUERYCOLORBOX_TEXTDOMAIN),
      'theme3' => __('Theme #3', JQUERYCOLORBOX_TEXTDOMAIN),
      'theme4' => __('Theme #4', JQUERYCOLORBOX_TEXTDOMAIN),
      'theme5' => __('Theme #5', JQUERYCOLORBOX_TEXTDOMAIN),
      'theme6' => __('Theme #6', JQUERYCOLORBOX_TEXTDOMAIN),
      'theme7' => __('Theme #7', JQUERYCOLORBOX_TEXTDOMAIN),
      'theme8' => __('Theme #8', JQUERYCOLORBOX_TEXTDOMAIN),
      'theme9' => __('Theme #9', JQUERYCOLORBOX_TEXTDOMAIN),
      'theme10' => __('Theme #10', JQUERYCOLORBOX_TEXTDOMAIN),
      'theme11' => __('Theme #11', JQUERYCOLORBOX_TEXTDOMAIN)
    );

    //        $this->colorboxThemes = array_merge($this->getThemeDirs(),$this->colorboxThemes);

    $dummyThemeNumberArray = array(
      __('Theme #12', JQUERYCOLORBOX_TEXTDOMAIN),
      __('Theme #13', JQUERYCOLORBOX_TEXTDOMAIN),
      __('Theme #14', JQUERYCOLORBOX_TEXTDOMAIN),
      __('Theme #15', JQUERYCOLORBOX_TEXTDOMAIN)
    );

    // create list of units
    $this->colorboxUnits = array(
      '%' => __('percent', JQUERYCOLORBOX_TEXTDOMAIN),
      'px' => __('pixels', JQUERYCOLORBOX_TEXTDOMAIN)
    );

    // create list of units
    $this->colorboxTransitions = array(
      'elastic' => __('elastic', JQUERYCOLORBOX_TEXTDOMAIN),
      'fade' => __('fade', JQUERYCOLORBOX_TEXTDOMAIN),
      'none' => __('none', JQUERYCOLORBOX_TEXTDOMAIN)
    );

    if (is_admin()) {
      require_once 'includes/jquery-colorbox-backend.php';
      new JQueryColorboxBackend($this->colorboxSettings, $this->colorboxThemes, $this->colorboxUnits, $this->colorboxTransitions, $this->jQueryColorboxDefaultSettings());
    } else {
      require_once 'includes/jquery-colorbox-frontend.php';
      new JQueryColorboxFrontend($this->colorboxSettings);
    }

    //register method for uninstall
    if (function_exists('register_uninstall_hook')) {
      register_uninstall_hook(__FILE__, array('JQueryColorbox', 'uninstallJqueryColorbox'));
    }
  }

  // JQueryColorbox()


  /**
   * Checks wheter the settings stored in the database are compatible with current version.
   *
   * @since 2.0
   * @access public
   * @author Arne Franken
   * @param $colorboxSettings array current colorboxSettings.
   *
   * @return bool true if settings work with this plugin version
   */
  //public function validateSettingsInDatabase() {
  function validateSettingsInDatabase($colorboxSettings) {
    if ($colorboxSettings) {
      //if jQueryColorboxVersion does not exist, the plugin is a version prior to 2.0
      //settings are incompatible with 2.0, restore default settings.
      if (!array_key_exists('jQueryColorboxVersion', $colorboxSettings)) {
        //in case future versions require resetting the settings
        //if($jquery_colorbox_settings['jQueryColorboxVersion'] < JQUERYCOLORBOX_VERSION)
        return false;
      }
    }
    return true;
  }

  // validateSettingsInDatabase()

  //=====================================================================================================

  /**
   * This is what an example jQuery Colorbox configuration looks like in the wp_options-table of the database:
   *
   * Database-entry name: "jquery-colorbox_settings"
   *
   * a:29:{
   * s:12:"autoColorbox";s:4:"true";
   * s:22:"autoColorboxJavaScript";s:4:"true";
   * s:13:"autoHideFlash";s:4:"true";
   * s:18:"colorboxWarningOff";s:4:"true";
   * s:13:"colorboxTheme";s:7:"theme11";
   * s:14:"slideshowSpeed";s:4:"2500";
   * s:8:"maxWidth";s:5:"false";s
   * :13:"maxWidthValue";s:0:"";
   * s:12:"maxWidthUnit";s:1:"%";
   * s:9:"maxHeight";s:5:"false";
   * s:14:"maxHeightValue";s:0:"";
   * s:13:"maxHeightUnit";s:1:"%";
   * s:5:"width";s:5:"false";
   * s:10:"widthValue";s:0:"";
   * s:9:"widthUnit";s:1:"%";
   * s:6:"height";s:5:"false";
   * s:11:"heightValue";s:0:"";
   * s:10:"heightUnit";s:1:"%";
   * s:9:"linkWidth";s:6:"custom";
   * s:14:"linkWidthValue";s:2:"80";
   * s:13:"linkWidthUnit";s:1:"%";
   * s:10:"linkHeight";s:6:"custom";
   * s:15:"linkHeightValue";s:2:"80";
   * s:14:"linkHeightUnit";s:1:"%";
   * s:12:"overlayClose";s:4:"true";
   * s:10:"transition";s:7:"elastic";
   * s:5:"speed";s:3:"350";
   * s:7:"opacity";s:4:"0.85";
   * s:21:"jQueryColorboxVersion";s:5:"4.1";
   * }
   */

  /**
   * Default array of plugin settings
   *
   * @since 2.0
   * @access private
   * @author Arne Franken
   *
   * @return array of default settings
   */
  //private function jQueryColorboxDefaultSettings() {
  function jQueryColorboxDefaultSettings() {

    // Create and return array of default settings
    return array(
      'jQueryColorboxVersion' => JQUERYCOLORBOX_VERSION,
      'colorboxTheme' => 'theme1',
      'maxWidth' => 'false',
      'maxWidthValue' => '',
      'maxWidthUnit' => '%',
      'maxHeight' => 'false',
      'maxHeightValue' => '',
      'maxHeightUnit' => '%',
      'height' => 'false',
      'heightValue' => '',
      'heightUnit' => '%',
      'width' => 'false',
      'widthValue' => '',
      'widthUnit' => '%',
      'linkHeight' => 'false',
      'linkHeightValue' => '',
      'linkHeightUnit' => '%',
      'linkWidth' => 'false',
      'linkWidthValue' => '',
      'linkWidthUnit' => '%',
      'initialWidth' => '300',
      'initialHeight' => '100',
      'autoColorbox' => false,
      'autoColorboxGalleries' => false,
      'slideshow' => false,
      'slideshowAuto' => false,
      'scalePhotos' => false,
      'displayScrollbar' => false,
      'draggable' => false,
      'slideshowSpeed' => '2500',
      'opacity' => '0.85',
      'preloading' => false,
      'transition' => 'elastic',
      'speed' => '350',
      'overlayClose' => false,
      'disableLoop' => false,
      'disableKeys' => false,
      'autoHideFlash' => false,
      'colorboxWarningOff' => false,
      'colorboxMetaLinkOff' => false,
      'javascriptInFooter' => false,
      'debugMode' => false,
      'autoColorboxJavaScript' => false,
      'colorboxAddClassToLinks' => false,
      'addZoomOverlay' => false,
      'useGoogleJQuery' => false,
      'removeLinkFromMetaBox' => true
    );
  }

  // jQueryColorboxDefaultSettings()

  /**
   * Delete plugin settings
   *
   * handles deletion from WordPress database
   *
   * @since 4.1
   * @access private
   * @author Arne Franken
   */
  //private function uninstallJqueryColorbox() {
  function uninstallJqueryColorbox() {
    delete_option(JQUERYCOLORBOX_SETTINGSNAME);
  }

  /**
   * currently unused.
   * it was requested a few times that people want to add their own version of a Colorbox skin and the plugin
   * should dynamically load theme directories.
   */
//    function getThemeDirs() {
//        $themesDirPath = JQUERYCOLORBOX_PLUGIN_DIR.'/themes/';
//        if ($themesDir = opendir($themesDirPath)) {
//            while (false !== ($dir = readdir($themesDir))) {
//                if (substr("$dir", 0, 1) != "."){
//                    $themeDirs[$dir] = $dir;
//                }
//            }
//            closedir($themesDir);
//        }
//        asort($themeDirs);
//        return $themeDirs;
//    }

}

// class JQueryColorbox()
?><?php
/**
 * Workaround for PHP4
 * initialize plugin, call constructor
 *
 * @since 1.0
 * @access public
 * @author Arne Franken
 */
function initJQueryColorbox() {
  new JQueryColorbox();
}

// initJQueryColorbox()

// add jQueryColorbox to WordPress initialization
add_action('init', 'initJQueryColorbox', 7);

//static call to constructor is only possible if constructor is 'public static', therefore not PHP4 compatible:
//add_action('init', array('JQueryColorbox','JQueryColorbox'), 7);
?>