<?php
/**
 * @package Techotronic
 * @subpackage Donation Loader
 *
 * @version 1.0
 * @author Arne Franken
 *
 * Object that handles Ajax to Xml RPC calls
 */
if (!defined('JQUERYCOLORBOX_DONATIONLOADER_XMLRPC_URL')) {
  define('JQUERYCOLORBOX_DONATIONLOADER_XMLRPC_URL', 'http://www.techotronic.de/wordpress/xmlrpc.php');
}
if (!defined('JQUERYCOLORBOX_DONATIONLOADER_CACHETIME')) {
  //cachetime in seconds, 60 minutes
  define('JQUERYCOLORBOX_DONATIONLOADER_CACHETIME', 6000);
}
//has to have pluginname-prefix because Class names can't be used twice...
class JQueryColorboxDonationLoader {
  var $donationLoaderUserAgent = JQUERYCOLORBOX_USERAGENT;
  var $donationLoaderPluginName = "jq_colorbox";
  var $donationLoaderPluginUrl = JQUERYCOLORBOX_PLUGIN_URL;

  /**
   * Constructor
   *
   * @since 1.0
   * @access public
   * @access static
   * @author Arne Franken
   *
   * @return void
   */
  function JQueryColorboxDonationLoader() {
    //not logged in users can trigger the action
    //add_action( 'wp_ajax_nopriv_action', 'methodName' );
    //only logged in users can trigger the action
    //add_action( 'wp_ajax_action', array($this, 'methodName') );
    add_action( 'wp_ajax_load-JQueryColorboxTopDonations', array($this, 'getJQueryColorboxTopDonations') );
    add_action( 'wp_ajax_load-JQueryColorboxLatestDonations', array($this, 'getJQueryColorboxLatestDonations') );
  }

  // JQueryColorboxDonationLoader()

  /**
   * XML RPC Test, not used
   *
   * @since 1.0
   * @access private
   * @author Arne Franken
   *
   * @return void
   */
  //public function getTest() {
//  function getTest() {
//    $this->doGetDonations(xmlrpc_encode_request('demo.sayHello','doesntMatter'));
//  }

  // getTest()

  /**
   * Get top donations
   *
   * @since 1.0
   * @access private
   * @author Arne Franken
   *
   * @return void
   */
  //public function getJQueryColorboxTopDonations() {
  function getJQueryColorboxTopDonations() {
    $this->getAndReturnDonations('manageDonations.getTopDonations','top');
  }

  // getJQueryColorboxTopDonations()

  /**
   * Get latest donations
   *
   * @since 1.0
   * @access private
   * @author Arne Franken
   *
   * @return void
   */
  //public function getJQueryColorboxLatestDonations() {
  function getJQueryColorboxLatestDonations() {
    $this->getAndReturnDonations('manageDonations.getLatestDonations','latest');
  }

  // getJQueryColorboxLatestDonations()

  /**
   * Build JavaScript array for loading donations.
   * Also registers JavaScript file.
   *
   * @since 1.0
   * @access public
   * @author Arne Franken
   *
   * @return void
   */
  //public function registerDonationJavaScript() {
  function registerDonationJavaScript() {
    $javaScriptArray = array('ajaxurl' => admin_url( 'admin-ajax.php' ),
    'pluginName' => $this->donationLoaderPluginName);

    wp_register_script('donation', $this->donationLoaderPluginUrl . '/js/donation.js', array('jquery'));
    wp_enqueue_script('donation');
    wp_localize_script('donation', 'Donation', $javaScriptArray);
  }

  // registerDonationJavaScript()

  //=====================================================================================================

  /**
   * Generic donation getter.
   * Wrap the XML RPC call and return the value to the Ajax call
   * Caches the serialized response for $cacheTime seconds.
   *
   * @since 1.0
   * @access private
   * @author Arne Franken
   *
   * @param string $remoteProcedureCall RPC method name
   * @param string $identifier cache-identifier for the request
   * 
   * @return void
   */
  //private function getAndReturnDonations($remoteProcedureCall,$identifier) {
  function getAndReturnDonations($remoteProcedureCall,$identifier) {

    // get the submitted parameters
    $pluginName = $_POST['pluginName'];

    $key = $identifier . '_' . $pluginName;

    //try to get response from DB cache
    if ( false === ($response = get_site_transient($key) ) ) {
      // response not found in DB cache, generate response
      if(class_exists('IXR_Client')) {
        $ixrClient = new IXR_Client(JQUERYCOLORBOX_DONATIONLOADER_XMLRPC_URL);
        $ixrClient->useragent = JQUERYCOLORBOX_USERAGENT;
        $ixrClient->query($remoteProcedureCall,$pluginName);

        $response = $ixrClient->getResponse();
      }
      set_site_transient($key, serialize($response), JQUERYCOLORBOX_DONATIONLOADER_CACHETIME);
    } else {
      $response = unserialize($response);
    }

    // header content-type must match the one used in the jQuery.post call.
    //header( "content-type: application/json" );
    header( "content-type: text/html" );

    // echo instead of return, $response is given back to the Ajax call.
    echo $response;
    // IMPORTANT: don't forget to "exit"
    exit;
  }

  // getAndReturnDonations()
}

// DonationLoader()
?>