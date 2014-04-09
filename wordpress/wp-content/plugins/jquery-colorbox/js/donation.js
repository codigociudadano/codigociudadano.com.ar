/**
 * @package Techotronic
 * @subpackage Donationloader
 *
 * @since 1.0
 * @author Arne Franken
 *
 * DonationLoader Javascript
 */

/**
 * call donation loader on page load.
 */
jQuery(document).ready(function() {
  loadTopDonations();
  loadLatestDonations();
});

/**
 * loadTopDonations
 */
(function(jQuery) {
    loadTopDonations = function() {
      loadDonations('Top');
    }
})(jQuery);

// loadTopDonations()

/**
 * loadLatestDonations
 */
(function(jQuery) {
    loadLatestDonations = function() {
      loadDonations('Latest');
    }
})(jQuery);

// loadLatestDonations()

/**
 * loadDonations
 *
 * actually load donations
 */
(function(jQuery) {
    loadDonations = function($type) {
      var listDivId = '#' + $type + 'donationslist';
      var loaderDivId = '#' + $type +'loader';
      var errorDivId = '#' + $type + 'error';
      var action = 'load-JQueryColorbox' + $type + 'Donations';
      jQuery.post(
        Donation.ajaxurl,
        {
            // here we declare the parameters to send along with the request
            // this means the following action hooks will be fired:
            // wp_ajax_nopriv_action and wp_ajax_action
            action : action,

            // other parameters can be added along with "action"
            pluginName : Donation.pluginName,
            type: $type
        },
        function( response ) {

          if(response!=='') {
            jQuery(loaderDivId).hide('slow');
            jQuery(listDivId).empty().html(response).show('slow');
          } else {
            jQuery(loaderDivId).hide('slow');
            jQuery(errorDivId).show('slow');
          }
        },"html"
      );
    }
})(jQuery);

// loadDonations()