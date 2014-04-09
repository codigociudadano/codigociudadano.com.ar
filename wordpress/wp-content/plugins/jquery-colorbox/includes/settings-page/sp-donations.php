<?php
/**
 * @package Techotronic
 * @subpackage jQuery Colorbox
 *
 * @since 4.1
 * @author Arne Franken
 *
 * Donations for settings page
 */
?>
<div id="poststuff">
  <div id="jquery-colorbox-topdonations" class="postbox">
    <h3><?php _e('Top donations', JQUERYCOLORBOX_TEXTDOMAIN); ?></h3>

    <div class="inside">
      <div id="Topdonations">
        <div id="Toploader" align="center"><img src="<?php echo JQUERYCOLORBOX_PLUGIN_URL ?>/images/ajax-loader.gif" alt="loading"/></div>
        <div id="Topdonationslist" style="display: none;"></div>
        <div id="Toperror" style="display: none;"><p><?php _e('Thank you for your donation.', JQUERYCOLORBOX_TEXTDOMAIN); ?></p></div>
      </div>
    </div>
  </div>
</div>
<div id="poststuff">
  <div id="jquery-colorbox-latestdonations" class="postbox">
    <h3><?php _e('Latest donations', JQUERYCOLORBOX_TEXTDOMAIN); ?></h3>

    <div class="inside">
      <div id="Latestdonations">
        <div id="Latestloader" align="center"><img src="<?php echo JQUERYCOLORBOX_PLUGIN_URL ?>/images/ajax-loader.gif" alt="loading"/></div>
        <div id="Latestdonationslist" style="display: none;"></div>
        <div id="Latesterror" style="display: none;"><p><?php _e('Thank you for your donation.', JQUERYCOLORBOX_TEXTDOMAIN); ?></p></div>
      </div>
    </div>
  </div>
</div>