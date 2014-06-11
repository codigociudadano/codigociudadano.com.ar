<?php
/**
 * @package Techotronic
 * @subpackage jQuery Colorbox
 *
 * @since 4.1
 * @author Arne Franken
 *
 * Object that handles all actions in the WordPress backend
 */
class JQueryColorboxBackend {

  /**
   * Constructor
   *
   * @since 4.1
   * @access public
   * @access static
   * @author Arne Franken
   *
   * @param string[] $colorboxSettings user settings
   * @param string[] $colorboxThemes plugin themes
   * @param string[] $colorboxUnits plugin units
   * @param string[] $colorboxTransitions plugin transitions
   * @param string[] $colorboxDefaultSettings default settings
   */
  //public static function JQueryColorboxBackend( $colorboxSettings, $colorboxThemes, $colorboxUnits, $colorboxTransitions, $colorboxDefaultSettings ) {
  function JQueryColorboxBackend($colorboxSettings, $colorboxThemes, $colorboxUnits, $colorboxTransitions, $colorboxDefaultSettings) {

    $this->colorboxSettings = $colorboxSettings;
    $this->colorboxThemes = $colorboxThemes;
    $this->colorboxUnits = $colorboxUnits;
    $this->colorboxTransitions = $colorboxTransitions;
    $this->colorboxDefaultSettings = $colorboxDefaultSettings;

    add_action('admin_post_jQueryColorboxDeleteSettings', array(& $this, 'jQueryColorboxDeleteSettings'));
    add_action('admin_post_jQueryColorboxUpdateSettings', array(& $this, 'jQueryColorboxUpdateSettings'));
    // add options page
    add_action('admin_menu', array(& $this, 'registerAdminMenu'));
    add_action('admin_notices', array(& $this, 'registerAdminWarning'));

    //add style selector dropdown to TinyMCE
    add_filter('mce_buttons_2', array(& $this, 'addStyleSelectorBox'), 100);
    //add Colorbox CSS class to TinyMCE dropdown box
    add_filter('mce_css', array(& $this, 'addColorboxLinkClass'), 100);

    //only instanciate donationloader and load JavaScript if we are on this plugin's settingspage
    if (isset($_GET['page']) && $_GET['page'] == JQUERYCOLORBOX_PLUGIN_BASENAME) {
      require_once 'donationloader.php';
      $donationLoader = new JQueryColorboxDonationLoader();
      add_action('admin_print_scripts', array(& $donationLoader, 'registerDonationJavaScript'));
    }
  }


  /**
   * Render plugin Settings page
   *
   * @since 1.0
   * @access public
   * @author Arne Franken
   */
  //public function renderSettingsPage() {
  function renderSettingsPage() {
    require_once 'settings-page.php';
  }

  //renderSettingsPage()

  /**
   * Registers the plugin Settings Page in the Admin Menu
   *
   * @since 1.3.3
   * @access public
   * @author Arne Franken
   */
  //public function registerAdminMenu() {
  function registerAdminMenu() {
    $return_message = '';

    if (function_exists('add_management_page') && current_user_can('manage_options')) {
      // update, uninstall message
      if (strpos($_SERVER['REQUEST_URI'], 'jquery-colorbox.php') && isset($_GET['jQueryColorboxUpdateSettings'])) {
        $return_message = sprintf(__('Successfully updated %1$s settings.', JQUERYCOLORBOX_TEXTDOMAIN), JQUERYCOLORBOX_NAME);
      } elseif (strpos($_SERVER['REQUEST_URI'], 'jquery-colorbox.php') && isset($_GET['jQueryColorboxDeleteSettings'])) {
        $return_message = sprintf(__('%1$s settings were successfully deleted.', JQUERYCOLORBOX_TEXTDOMAIN), JQUERYCOLORBOX_NAME);
      }
    }
    $this->registerAdminNotice($return_message);

    $this->registerSettingsPage();
  }

  // registerAdminMenu()

  /**
   * Registers the warning for admins
   *
   * @since 2.5
   * @access public
   * @author Arne Franken
   */
  //public function registerAdminWarning() {
  function registerAdminWarning() {
    if ($this->colorboxSettings['colorboxWarningOff'] || $this->colorboxSettings['autoColorbox']) {
      return;
    }
    ?>
  <div class="updated" style="background-color:#f66;">
    <p>
      <a href="options-general.php?page=<?php echo JQUERYCOLORBOX_PLUGIN_BASENAME ?>"><?php echo JQUERYCOLORBOX_NAME ?></a> <?php _e('needs attention: the plugin is not activated to work for all images.', JQUERYCOLORBOX_TEXTDOMAIN)?>
    </p>
  </div>
  <?php

  }

  // registerAdminWarning()

  /**
   * Add settings link to plugin management page
   *
   * @since 1.0
   * @access public
   * @author Arne Franken
   *
   * @param  string[] $action_links original links
   * @return string[] with link to settings page
   */
  //public function addPluginActionLinks($action_links) {
  function addPluginActionLinks($action_links) {
    $settings_link = '<a href="options-general.php?page=' . JQUERYCOLORBOX_PLUGIN_BASENAME . '">' . __('Settings', JQUERYCOLORBOX_TEXTDOMAIN) . '</a>';
    array_unshift($action_links, $settings_link);

    return $action_links;
  }

  //addPluginActionLinks()


  /**
   * Update plugin settings wrapper
   *
   * handles checks and redirect
   *
   * @since 1.3.3
   * @access public
   * @author Arne Franken
   */
  //public function jQueryColorboxUpdateSettings() {
  function jQueryColorboxUpdateSettings() {

    if (!current_user_can('manage_options'))
      wp_die(__('Did not update settings, you do not have the necessary rights.', JQUERYCOLORBOX_TEXTDOMAIN));

    //cross check the given referer for nonce set in settings form
    check_admin_referer('jquery-colorbox-settings-form');
    //get settings from plugins admin page
    $this->colorboxSettings = $_POST[JQUERYCOLORBOX_SETTINGSNAME];
    //have to add jQueryColorboxVersion here because it is not included in the HTML form
    $this->colorboxSettings['jQueryColorboxVersion'] = JQUERYCOLORBOX_VERSION;
    $this->updateSettingsInDatabase();
    $referrer = str_replace(array('&jQueryColorboxUpdateSettings', '&jQueryColorboxDeleteSettings'), '', $_POST['_wp_http_referer']);
    wp_redirect($referrer . '&jQueryColorboxUpdateSettings');
  }

  // jQueryColorboxUpdateSettings()

  /**
   * Delete plugin settings wrapper
   *
   * handles checks and redirect
   *
   * @since 1.3.3
   * @access public
   * @author Arne Franken
   */
  //public function jQueryColorboxDeleteSettings() {
  function jQueryColorboxDeleteSettings() {

    if (current_user_can('manage_options') && isset($_POST['delete_settings-true'])) {
      //cross check the given referer for nonce set in delete settings form
      check_admin_referer('jquery-delete_settings-form');
      $this->deleteSettingsFromDatabase();
      //$this->colorboxSettings = $this->jQueryColorboxDefaultSettings();
    } else {
      wp_die(sprintf(__('Did not delete %1$s settings. Either you dont have the nececssary rights or you didnt check the checkbox.', JQUERYCOLORBOX_TEXTDOMAIN), JQUERYCOLORBOX_NAME));
    }
    //clean up referrer
    $referrer = str_replace(array('&jQueryColorboxUpdateSettings', '&jQueryColorboxDeleteSettings'), '', $_POST['_wp_http_referer']);
    wp_redirect($referrer . '&jQueryColorboxDeleteSettings');
  }

  // jQueryColorboxDeleteSettings()

  /**
   * adds Colorbox CSS class to TinyMCE style selector dropdown box
   *
   * @since 3.7
   * @access public
   * @author Arne Franken
   *
   * @param  string $initialCssFiles
   * @return string
   */
  //public function addColorboxLinkClass($defaultCss) {
  function addColorboxLinkClass($initialCssFiles) {
    $modifiedCssFiles = $initialCssFiles;

    $modifiedCssFiles .= ','.JQUERYCOLORBOX_PLUGIN_URL.'/css/jquery-colorbox.css';
    return $modifiedCssFiles;
  }

  // addColorboxLinkClasses()

  /**
   * Adds style selector option to TinyMCE
   *
   * @since 4.0
   * @access public
   * @author Arne Franken
   *
   * @param string[] $array
   * @return string[] modified array
   */
  //public function addStyleSelectorBox($array) {
  function addStyleSelectorBox($array) {
    if (!in_array('styleselect', $array)) {
      array_push($array, 'styleselect');
    }
    return $array;
  }

  // addStyleSelectorBox()

  //=====================================================================================================

  /**
   * Registers Admin Notices
   *
   * @since 2.0
   * @access private
   * @author Arne Franken
   *
   * @param string $notice to register notice with.
   */
  //private function registerAdminNotice($notice) {
  function registerAdminNotice($notice) {
    if ($notice != '') {
      $message = '<div class="updated fade"><p>' . $notice . '</p></div>';
      add_action('admin_notices', create_function('', "echo '$message';"));
    }
  }

  // registerAdminNotice()

  /**
   * Register the settings page in WordPress
   *
   * @since 1.0
   * @access private
   * @author Arne Franken
   */
  //private function registerSettingsPage() {
  function registerSettingsPage() {
    if (current_user_can('manage_options')) {
      add_filter('plugin_action_links_' . JQUERYCOLORBOX_PLUGIN_BASENAME, array(& $this, 'addPluginActionLinks'));
      add_options_page(JQUERYCOLORBOX_NAME, JQUERYCOLORBOX_NAME, 'manage_options', JQUERYCOLORBOX_PLUGIN_BASENAME, array(& $this, 'renderSettingsPage'));
    }
  }

  //registerSettingsPage()

  /**
   * Update plugin settings
   *
   * handles updating settings in the WordPress database
   *
   * @since 1.3.3
   * @access private
   * @author Arne Franken
   */
  //private function updateSettingsInDatabase() {
  function updateSettingsInDatabase() {
    update_option(JQUERYCOLORBOX_SETTINGSNAME, $this->colorboxSettings);
  }

  //updateSettings()

  /**
   * Delete plugin settings
   *
   * handles deletion from WordPress database
   *
   * @since 1.3.3
   * @access private
   * @author Arne Franken
   */
  //private function deleteSettingsFromDatabase() {
  function deleteSettingsFromDatabase() {
    delete_option(JQUERYCOLORBOX_SETTINGSNAME);
  }

  // deleteSettings()

  /**
   * gets current URL to return to after donating
   *
   * @since 3.5
   * @access private
   * @author Arne Franken
   */
  //private function getReturnLocation(){
  function getReturnLocation() {
    $currentLocation = "http";
    $currentLocation .= ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? "s" : "") . "://";
    $currentLocation .= $_SERVER['SERVER_NAME'];
    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
      if ($_SERVER['SERVER_PORT'] != '443') {
        $currentLocation .= ":" . $_SERVER['SERVER_PORT'];
      }
    }
    else {
      if ($_SERVER['SERVER_PORT'] != '80') {
        $currentLocation .= ":" . $_SERVER['SERVER_PORT'];
      }
    }
    $currentLocation .= $_SERVER['REQUEST_URI'];
    echo $currentLocation;
  }

  // getReturnLocation()

}

// class JQueryColorboxBackend()
?>