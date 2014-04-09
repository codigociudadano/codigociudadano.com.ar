<?php
/**
 * @package Techotronic
 * @subpackage jQuery Colorbox
 *
 * @since 4.1
 * @author Arne Franken
 *
 * Plugin Settings for settings page
 */
?>
<div id="jquery-colorbox-settings" class="postbox">
  <h3 id="plugin-settings"><?php _e('Plugin settings', JQUERYCOLORBOX_TEXTDOMAIN); ?></h3>

  <div class="inside">

    <table class="form-table">
      <tr>
        <th scope="row">
          <label for="jquery-colorbox-autoColorbox"><?php printf(__('Automate %1$s for all images in pages, posts and galleries', JQUERYCOLORBOX_TEXTDOMAIN), JQUERYCOLORBOX_NAME); ?>:</label>
        </th>
        <td>
          <input type="checkbox" name="<?php echo JQUERYCOLORBOX_SETTINGSNAME ?>[autoColorbox]" id="jquery-colorbox-autoColorbox" value="true" <?php echo ($this->colorboxSettings['autoColorbox'])
                  ? 'checked="checked"' : '';?>/>
          <br/><?php _e('Automatically add colorbox-class to images in posts and pages. Also adds colorbox-class to galleries. Images in one page or post are grouped automatically.', JQUERYCOLORBOX_TEXTDOMAIN); ?>
        </td>
      </tr>
      <tr>
        <th scope="row">
          <label for="jquery-colorbox-autoColorboxGalleries"><?php printf(__('Automate %1$s for images in WordPress galleries only', JQUERYCOLORBOX_TEXTDOMAIN), JQUERYCOLORBOX_NAME); ?>:</label>
        </th>
        <td>
          <input type="checkbox" name="<?php echo JQUERYCOLORBOX_SETTINGSNAME ?>[autoColorboxGalleries]" id="jquery-colorbox-autoColorboxGalleries" value="true" <?php echo ($this->colorboxSettings['autoColorboxGalleries'])
                  ? 'checked="checked"' : '';?>/>
          <br/><?php _e('Automatically add colorbox-class to images in WordPress galleries, but nowhere else. Images in one page or post are grouped automatically.', JQUERYCOLORBOX_TEXTDOMAIN); ?>
        </td>
      </tr>
      <tr>
        <th scope="row">
          <label for="jquery-colorbox-autoColorboxJavaScript"><?php printf(__('Automate %1$s for all other images', JQUERYCOLORBOX_TEXTDOMAIN), JQUERYCOLORBOX_NAME); ?>:</label>
        </th>
        <td>
          <input type="checkbox" name="<?php echo JQUERYCOLORBOX_SETTINGSNAME ?>[autoColorboxJavaScript]" id="jquery-colorbox-autoColorboxJavaScript" value="true" <?php echo ($this->colorboxSettings['autoColorboxJavaScript'])
                  ? 'checked="checked"' : '';?>/>
          <br/><?php _e('Automatically add colorbox-class to all images that are not in posts and pages (e.g. the sidebar).', JQUERYCOLORBOX_TEXTDOMAIN); ?>
        </td>
      </tr>
      <!--        <tr>-->
      <!--            <th scope="row">-->
      <!--                <label for="jquery-colorbox-colorboxAddClassToLinks">--><?php __('Automate %1$s for all text links to images', JQUERYCOLORBOX_TEXTDOMAIN) //printf(__('Automate %1$s for all text links to images', JQUERYCOLORBOX_TEXTDOMAIN), JQUERYCOLORBOX_NAME); ?><!--:</label>-->
      <!--            </th>-->
      <!--            <td>-->
      <!--                <input type="checkbox" name="--><?php //echo JQUERYCOLORBOX_SETTINGSNAME ?><!--[colorboxAddClassToLinks]" id="jquery-colorbox-colorboxAddClassToLinks" value="true" --><?php //echo ($this->colorboxSettings['colorboxAddClassToLinks']) ? 'checked="checked"' : '';?><!--/>-->
      <!--                <br/>--><?php __('Automatically add colorbox-link-class to all links that point to images.', JQUERYCOLORBOX_TEXTDOMAIN); //_e('Automatically add colorbox-link-class to all links that point to images.', JQUERYCOLORBOX_TEXTDOMAIN); ?>
      <!--            </td>-->
      <!--        </tr>-->
      <tr>
        <th scope="row">
          <label for="jquery-colorbox-autoHideFlash"><?php _e('Automate hiding of flash objects', JQUERYCOLORBOX_TEXTDOMAIN); ?>:</label>
        </th>
        <td>
          <input type="checkbox" name="<?php echo JQUERYCOLORBOX_SETTINGSNAME ?>[autoHideFlash]" id="jquery-colorbox-autoHideFlash" value="true" <?php echo ($this->colorboxSettings['autoHideFlash'])
                  ? 'checked="checked"' : '';?>/>
          <br/><?php _e('Automatically hide embeded flash objects behind the Colorbox layer.', JQUERYCOLORBOX_TEXTDOMAIN); ?>
        </td>
      </tr>
      <tr>
        <th scope="row">
          <label
              for="jquery-colorbox-addZoomOverlay"><?php _e('Add Zoom overlay to pictures', JQUERYCOLORBOX_TEXTDOMAIN); ?>:</label>
        </th>
        <td>
          <input type="checkbox" name="<?php echo JQUERYCOLORBOX_SETTINGSNAME ?>[addZoomOverlay]"
                 id="jquery-colorbox-addZoomOverlay"
                 value="true" <?php echo ($this->colorboxSettings['addZoomOverlay']) ? 'checked="checked"' : '';?>/>
          <br/><?php _e('Add Zoom overlay to pictures that open in a Colorbox.', JQUERYCOLORBOX_TEXTDOMAIN); ?>
        </td>
      </tr>
      <tr>
        <th scope="row">
          <label
              for="jquery-colorbox-useGoogleJQuery"><?php printf(__('Use jQuery library from Google', JQUERYCOLORBOX_TEXTDOMAIN),JQUERYLIBRARY_VERSION); ?>:</label>
        </th>
        <td>
          <input type="checkbox" name="<?php echo JQUERYCOLORBOX_SETTINGSNAME ?>[useGoogleJQuery]"
                 id="jquery-colorbox-useGoogleJQuery"
                 value="true" <?php echo ($this->colorboxSettings['useGoogleJQuery']) ? 'checked="checked"' : '';?>/>
          <br/><?php printf(__('Use jQuery library version %1$s from Google instead of the one that comes with WordPress.', JQUERYCOLORBOX_TEXTDOMAIN),JQUERYLIBRARY_VERSION); ?>
        </td>
      </tr>
      <tr>
        <th scope="row">
          <label
              for="jquery-colorbox-javascriptInFooter"><?php _e('Add JavaScript to footer', JQUERYCOLORBOX_TEXTDOMAIN); ?>:</label>
        </th>
        <td>
          <input type="checkbox" name="<?php echo JQUERYCOLORBOX_SETTINGSNAME ?>[javascriptInFooter]"
                 id="jquery-colorbox-javascriptInFooter"
                 value="true" <?php echo ($this->colorboxSettings['javascriptInFooter']) ? 'checked="checked"' : '';?>/>
          <br/><?php _e('Add JavaScript to footer instead of the header.', JQUERYCOLORBOX_TEXTDOMAIN); ?>
        </td>
      </tr>
      <tr>
        <th scope="row">
          <label for="jquery-colorbox-removeLinkFromMetaBox"><?php _e('Remove link from Meta-box', JQUERYCOLORBOX_TEXTDOMAIN); ?>:</label>
        </th>
        <td>
          <input type="checkbox" name="<?php echo JQUERYCOLORBOX_SETTINGSNAME ?>[removeLinkFromMetaBox]" id="jquery-colorbox-removeLinkFromMetaBox" value="true" <?php echo ($this->colorboxSettings['removeLinkFromMetaBox']) ? 'checked="checked"' : '';?>/>
          <br/><?php _e('Remove the link to the developers site from the WordPress meta-box.', JQUERYCOLORBOX_TEXTDOMAIN); ?>
        </td>
      </tr>
      <!--tr>
            <th scope="row">
                <label for="jquery-colorbox-debugMode"><?php __('Activate debug mode', JQUERYCOLORBOX_TEXTDOMAIN); ?>:</label>
            </th>
            <td>
                <input type="checkbox" name="<?php //echo JQUERYCOLORBOX_SETTINGSNAME ?>[debugMode]" id="jquery-colorbox-debugMode" value="true" <?php //echo ($this->colorboxSettings['debugMode']) ? 'checked="checked"' : '';?>/>
                <br/><?php __('Adds debug information and non-minified JavaScript to the page. Useful for troubleshooting.', JQUERYCOLORBOX_TEXTDOMAIN); ?>
            </td>
        </tr-->
      <tr>
        <th scope="row">
          <label for="jquery-colorbox-colorboxWarningOff"><?php printf(__('Disable warning', JQUERYCOLORBOX_TEXTDOMAIN), JQUERYCOLORBOX_NAME); ?>:</label>
        </th>
        <td>
          <input type="checkbox" name="<?php echo JQUERYCOLORBOX_SETTINGSNAME ?>[colorboxWarningOff]" id="jquery-colorbox-colorboxWarningOff" value="true" <?php echo ($this->colorboxSettings['colorboxWarningOff'])
                  ? 'checked="checked"' : '';?>/>
          <br/><?php _e('Disables the warning that is displayed if the plugin is activated but the auto-colorbox feature for all images is turned off.', JQUERYCOLORBOX_TEXTDOMAIN); ?>
        </td>
      </tr>
    </table>
    <p class="submit">
      <input type="hidden" name="action" value="jQueryColorboxUpdateSettings"/>
      <input type="submit" name="jQueryColorboxUpdateSettings" class="button-primary" value="<?php _e('Save Changes'); ?>"/>
    </p>
  </div>
</div>