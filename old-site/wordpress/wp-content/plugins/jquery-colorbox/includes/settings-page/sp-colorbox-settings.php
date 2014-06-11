<?php
/**
 * @package Techotronic
 * @subpackage jQuery Colorbox
 *
 * @since 4.1
 * @author Arne Franken
 *
 * Colorbox Settings for settings page
 */
?>
<div id="jquery-colorbox-plugin-settings" class="postbox">
  <h3 id="colorbox-settings"><?php _e('Colorbox settings', JQUERYCOLORBOX_TEXTDOMAIN); ?></h3>

  <div class="inside">

    <table class="form-table">
      <tr valign="top">
        <th scope="row">
          <label for="jquery-colorbox-theme"><?php _e('Theme', JQUERYCOLORBOX_TEXTDOMAIN); ?></label>
        </th>
        <td>
          <select name="<?php echo JQUERYCOLORBOX_SETTINGSNAME ?>[colorboxTheme]" id="jquery-colorbox-theme" class="postform" style="margin:0">
      <?php
                          foreach ($this->colorboxThemes as $theme => $name) {
        echo '<option value="' . esc_attr($theme) . '"';
        selected($this->colorboxSettings['colorboxTheme'], $theme);
        echo '>' . htmlspecialchars($name) . "</option>\n";
      }
        ?>
          </select>
          <br/><?php _e('Select the theme you want to use on your blog.', JQUERYCOLORBOX_TEXTDOMAIN); ?>
        </td>
      </tr>
      <tr>
        <th scope="row">
          <label for="jquery-colorbox-theme_screenshot_image"><?php _e('Theme screenshot', JQUERYCOLORBOX_TEXTDOMAIN); ?>:</label>
        </th>
        <td height="310px">
          <div id="jquery-colorbox-theme_screenshot_image">
            <img src="<?php echo JQUERYCOLORBOX_PLUGIN_URL; echo '/screenshot-'; preg_match('/\d+$/i', $this->colorboxSettings['colorboxTheme'], $matches); echo $matches[0] ?>.jpg"/>
          </div>
        </td>
      </tr>

      <tr>
        <th scope="row">
          <label for="jquery-colorbox-slideshow"><?php _e('Add Slideshow to groups', JQUERYCOLORBOX_TEXTDOMAIN); ?>:</label>
        </th>
        <td>
          <input type="checkbox" name="<?php echo JQUERYCOLORBOX_SETTINGSNAME ?>[slideshow]" id="jquery-colorbox-slideshow" value="true" <?php echo ($this->colorboxSettings['slideshow'])
                  ? 'checked="checked"' : '';?>/>
          <br/><?php printf(__('Add Slideshow functionality for %1$s Groups', JQUERYCOLORBOX_TEXTDOMAIN), JQUERYCOLORBOX_NAME); ?>
        </td>
      </tr>
      <tr>
        <th scope="row">
          <label for="jquery-colorbox-slideshowAuto"><?php _e('Start Slideshow automatically', JQUERYCOLORBOX_TEXTDOMAIN); ?>:</label>
        </th>
        <td>
          <input type="checkbox" name="<?php echo JQUERYCOLORBOX_SETTINGSNAME ?>[slideshowAuto]" id="jquery-colorbox-slideshowAuto" value="true" <?php echo ($this->colorboxSettings['slideshowAuto'])
                  ? 'checked="checked"' : '';?>/>
          <br/><?php printf(__('Start Slideshow automatically if slideshow functionality is added to %1$s Groups', JQUERYCOLORBOX_TEXTDOMAIN), JQUERYCOLORBOX_NAME); ?>
        </td>
      </tr>
      <tr>
        <th scope="row">
          <label for="jquery-colorbox-slideshowSpeed"><?php _e('Speed of the slideshow', JQUERYCOLORBOX_TEXTDOMAIN); ?>:</label>
        </th>
        <td>
          <input type="text" name="<?php echo JQUERYCOLORBOX_SETTINGSNAME ?>[slideshowSpeed]" id="jquery-colorbox-slideshowSpeed" value="<?php echo $this->colorboxSettings['slideshowSpeed'] ?>" size="5" maxlength="5"/><?php _e('milliseconds', JQUERYCOLORBOX_TEXTDOMAIN); ?>
          <br/><?php _e('Sets the speed of the slideshow, in milliseconds', JQUERYCOLORBOX_TEXTDOMAIN); ?>.
        </td>
      </tr>
      <!--tr>
                  <th scope="row">
                      <label for="jquery-colorbox-disableLoop"><?php __('Disable loop', JQUERYCOLORBOX_TEXTDOMAIN); ?>:</label>
                  </th>
                  <td>
                      <input type="checkbox" name="<?php //echo JQUERYCOLORBOX_SETTINGSNAME ?>[disableLoop]" id="jquery-colorbox-disableLoop" value="true" <?php //echo ($this->colorboxSettings['disableLoop']) ? 'checked="checked"' : '';?>/>
                      <br/><?php __('Disable looping through image groups', JQUERYCOLORBOX_TEXTDOMAIN); ?>.
                  </td>
              </tr-->
      <!--tr>
                  <th scope="row">
                      <label for="jquery-colorbox-disableKeys"><?php __('Disable keys', JQUERYCOLORBOX_TEXTDOMAIN); ?>:</label>
                  </th>
                  <td>
                      <input type="checkbox" name="<?php //echo JQUERYCOLORBOX_SETTINGSNAME ?>[disableKeys]" id="jquery-colorbox-disableKeys" value="true" <?php //echo ($this->colorboxSettings['disableKeys']) ? 'checked="checked"' : '';?>/>
                      <br/><?php __('Disable ESC to close Colorbox and arrow keys to go to next and previous images', JQUERYCOLORBOX_TEXTDOMAIN); ?>.
                  </td>
              </tr-->
      <tr>
        <th scope="row">
          <label for="jquery-colorbox-maxWidthValue"><?php _e('Maximum width of an image', JQUERYCOLORBOX_TEXTDOMAIN); ?>:</label>
        </th>
        <td>
          <input type="radio" name="<?php echo JQUERYCOLORBOX_SETTINGSNAME ?>[maxWidth]" id="jquery-colorbox-maxWidth-false-radio" value="false" <?php echo ($this->colorboxSettings['maxWidth']) == 'false'
                ? 'checked="checked"' : ''; ?>"/>
          <label for="jquery-colorbox-maxWidth-false-radio"><?php _e('Do not set width', JQUERYCOLORBOX_TEXTDOMAIN); ?>.</label>
          <br/>
          <input type="radio" name="<?php echo JQUERYCOLORBOX_SETTINGSNAME ?>[maxWidth]" id="jquery-colorbox-maxWidth-custom-radio" value="custom" <?php echo ($this->colorboxSettings['maxWidth']) == 'custom'
                ? 'checked="checked"' : ''; ?>"/>
          <label for="jquery-colorbox-maxWidth-custom-radio"><?php _e('Set maximum width of an image', JQUERYCOLORBOX_TEXTDOMAIN); ?>.</label>
          <input type="text" name="<?php echo JQUERYCOLORBOX_SETTINGSNAME ?>[maxWidthValue]" id="jquery-colorbox-maxWidthValue" value="<?php echo $this->colorboxSettings['maxWidthValue'] ?>" size="5" maxlength="5"/>
          <select name="<?php echo JQUERYCOLORBOX_SETTINGSNAME ?>[maxWidthUnit]" id="jquery-colorbox-maxWidth-unit" class="postform" style="margin:0">
      <?php
                      foreach ($this->colorboxUnits as $unit => $name) {
        echo '<option value="' . esc_attr($unit) . '"';
        selected($this->colorboxSettings['maxWidthUnit'], $unit);
        echo '>' . htmlspecialchars($name) . "</option>\n";
      }
        ?>
          </select>
          <br/><?php _e('Set the maximum width of the image in the Colorbox in relation to the browser window in percent or pixels. If maximum width is not set, image is as wide as the Colorbox', JQUERYCOLORBOX_TEXTDOMAIN); ?>.
        </td>
      </tr>
      <tr>
        <th scope="row">
          <label for="jquery-colorbox-maxHeightValue"><?php _e('Maximum height of an image', JQUERYCOLORBOX_TEXTDOMAIN); ?>:</label>
        </th>
        <td>
          <input type="radio" name="<?php echo JQUERYCOLORBOX_SETTINGSNAME ?>[maxHeight]" id="jquery-colorbox-maxHeight-false-radio" value="false" <?php echo ($this->colorboxSettings['maxHeight']) == 'false'
                ? 'checked="checked"' : ''; ?>"/>
          <label for="jquery-colorbox-maxHeight-false-radio"><?php _e('Do not set height', JQUERYCOLORBOX_TEXTDOMAIN); ?>.</label>
          <br/>
          <input type="radio" name="<?php echo JQUERYCOLORBOX_SETTINGSNAME ?>[maxHeight]" id="jquery-colorbox-maxHeight-custom-radio" value="custom" <?php echo ($this->colorboxSettings['maxHeight']) == 'custom'
                ? 'checked="checked"' : ''; ?>"/>
          <label for="jquery-colorbox-maxHeight-custom-radio"><?php _e('Set maximum height of an image', JQUERYCOLORBOX_TEXTDOMAIN); ?>.</label>
          <input type="text" name="<?php echo JQUERYCOLORBOX_SETTINGSNAME ?>[maxHeightValue]" id="jquery-colorbox-maxHeightValue" value="<?php echo $this->colorboxSettings['maxHeightValue'] ?>" size="5" maxlength="5"/>
          <select name="<?php echo JQUERYCOLORBOX_SETTINGSNAME ?>[maxHeightUnit]" id="jquery-colorbox-maxHeight-unit" class="postform" style="margin:0">
      <?php
                      foreach ($this->colorboxUnits as $unit => $name) {
        echo '<option value="' . esc_attr($unit) . '"';
        selected($this->colorboxSettings['maxHeightUnit'], $unit);
        echo '>' . htmlspecialchars($name) . "</option>\n";
      }
        ?>
          </select>
          <br/><?php _e('Set the maximum height of the image in the Colorbox in relation to the browser window to a value in percent or pixels. If maximum height is not set, the image is as high as the Colorbox', JQUERYCOLORBOX_TEXTDOMAIN); ?>.
        </td>
      </tr>
      <tr>
        <th scope="row">
          <label for="jquery-colorbox-widthValue"><?php _e('Maximum width of the Colorbox', JQUERYCOLORBOX_TEXTDOMAIN); ?>:</label>
        </th>
        <td>
          <input type="radio" name="<?php echo JQUERYCOLORBOX_SETTINGSNAME ?>[width]" id="jquery-colorbox-width-false-radio" value="false" <?php echo ($this->colorboxSettings['width']) == 'false'
                ? 'checked="checked"' : ''; ?>"/>
          <label for="jquery-colorbox-width-false-radio"><?php _e('Do not set width', JQUERYCOLORBOX_TEXTDOMAIN); ?>.</label>
          <br/>
          <input type="radio" name="<?php echo JQUERYCOLORBOX_SETTINGSNAME ?>[width]" id="jquery-colorbox-width-custom-radio" value="custom" <?php echo ($this->colorboxSettings['width']) == 'custom'
                ? 'checked="checked"' : ''; ?>"/>
          <label for="jquery-colorbox-width-custom-radio"><?php _e('Set width of the Colorbox', JQUERYCOLORBOX_TEXTDOMAIN); ?>.</label>
          <input type="text" name="<?php echo JQUERYCOLORBOX_SETTINGSNAME ?>[widthValue]" id="jquery-colorbox-widthValue" value="<?php echo $this->colorboxSettings['widthValue'] ?>" size="5" maxlength="5"/>
          <select name="<?php echo JQUERYCOLORBOX_SETTINGSNAME ?>[widthUnit]" id="jquery-colorbox-width-unit" class="postform" style="margin:0">
      <?php
                      foreach ($this->colorboxUnits as $unit => $name) {
        echo '<option value="' . esc_attr($unit) . '"';
        selected($this->colorboxSettings['widthUnit'], $unit);
        echo '>' . htmlspecialchars($name) . "</option>\n";
      }
        ?>
          </select>
          <br/><?php _e('Set the maximum width of the Colorbox itself in relation to the browser window to a value between in percent or pixels. If the image is bigger than the colorbox, scrollbars are displayed. If width is not set, the Colorbox will be as wide as the picture in it', JQUERYCOLORBOX_TEXTDOMAIN); ?>.
        </td>
      </tr>
      <tr>
        <th scope="row">
          <label for="jquery-colorbox-heightValue"><?php _e('Maximum height of the Colorbox', JQUERYCOLORBOX_TEXTDOMAIN); ?>:</label>
        </th>
        <td>
          <input type="radio" name="<?php echo JQUERYCOLORBOX_SETTINGSNAME ?>[height]" id="jquery-colorbox-height-false-radio" value="false" <?php echo ($this->colorboxSettings['height']) == 'false'
                ? 'checked="checked"' : ''; ?>"/>
          <label for="jquery-colorbox-height-false-radio"><?php _e('Do not set height', JQUERYCOLORBOX_TEXTDOMAIN); ?>.</label>
          <br/>
          <input type="radio" name="<?php echo JQUERYCOLORBOX_SETTINGSNAME ?>[height]" id="jquery-colorbox-height-custom-radio" value="custom" <?php echo ($this->colorboxSettings['height']) == 'custom'
                ? 'checked="checked"' : ''; ?>"/>
          <label for="jquery-colorbox-height-custom-radio"><?php _e('Set height of the Colorbox', JQUERYCOLORBOX_TEXTDOMAIN); ?>.</label>
          <input type="text" name="<?php echo JQUERYCOLORBOX_SETTINGSNAME ?>[heightValue]" id="jquery-colorbox-heightValue" value="<?php echo $this->colorboxSettings['heightValue'] ?>" size="5" maxlength="5"/>
          <select name="<?php echo JQUERYCOLORBOX_SETTINGSNAME ?>[heightUnit]" id="jquery-colorbox-height-unit" class="postform" style="margin:0">
      <?php
                      foreach ($this->colorboxUnits as $unit => $name) {
        echo '<option value="' . esc_attr($unit) . '"';
        selected($this->colorboxSettings['heightUnit'], $unit);
        echo '>' . htmlspecialchars($name) . "</option>\n";
      }
        ?>
          </select>
          <br/><?php _e('Set the maximum height of the Colorbox itself in relation to the browser window to a value between in percent or pixels. If the image is bigger than the colorbox, scrollbars are displayed. If height is not set, the Colorbox will be as high as the picture in it', JQUERYCOLORBOX_TEXTDOMAIN); ?>.
        </td>
      </tr>
      <tr>
        <th scope="row">
          <label for="jquery-colorbox-linkWidthValue"><?php _e('Maximum width of the Colorbox used for links', JQUERYCOLORBOX_TEXTDOMAIN); ?>:</label>
        </th>
        <td>
          <input type="radio" name="<?php echo JQUERYCOLORBOX_SETTINGSNAME ?>[linkWidth]" id="jquery-colorbox-link-width-false-radio" value="false" <?php echo ($this->colorboxSettings['linkWidth']) == 'false'
                ? 'checked="checked"' : ''; ?>"/>
          <label for="jquery-colorbox-link-width-false-radio"><?php _e('Do not set width', JQUERYCOLORBOX_TEXTDOMAIN); ?>.</label>
          <br/>
          <input type="radio" name="<?php echo JQUERYCOLORBOX_SETTINGSNAME ?>[linkWidth]" id="jquery-colorbox-link-width-custom-radio" value="custom" <?php echo ($this->colorboxSettings['linkWidth']) == 'custom'
                ? 'checked="checked"' : ''; ?>"/>
          <label for="jquery-colorbox-link-width-custom-radio"><?php _e('Set width of the Colorbox', JQUERYCOLORBOX_TEXTDOMAIN); ?>.</label>
          <input type="text" name="<?php echo JQUERYCOLORBOX_SETTINGSNAME ?>[linkWidthValue]" id="jquery-colorbox-linkWidthValue" value="<?php echo $this->colorboxSettings['linkWidthValue'] ?>" size="5" maxlength="5"/>
          <select name="<?php echo JQUERYCOLORBOX_SETTINGSNAME ?>[linkWidthUnit]" id="jquery-colorbox-width-unit" class="postform" style="margin:0">
      <?php
                      foreach ($this->colorboxUnits as $unit => $name) {
        echo '<option value="' . esc_attr($unit) . '"';
        selected($this->colorboxSettings['linkWidthUnit'], $unit);
        echo '>' . htmlspecialchars($name) . "</option>\n";
      }
        ?>
          </select>
          <br/><?php _e('Set the maximum width of the Colorbox itself in relation to the browser window to a value between in percent or pixels. If the image is bigger than the colorbox, scrollbars are displayed. If width is not set, the Colorbox will be as wide as the picture in it', JQUERYCOLORBOX_TEXTDOMAIN); ?>.
        </td>
      </tr>
      <tr>
        <th scope="row">
          <label for="jquery-colorbox-linkHeightValue"><?php _e('Maximum height of the Colorbox used for links', JQUERYCOLORBOX_TEXTDOMAIN); ?>:</label>
        </th>
        <td>
          <input type="radio" name="<?php echo JQUERYCOLORBOX_SETTINGSNAME ?>[linkHeight]" id="jquery-colorbox-link-height-false-radio" value="false" <?php echo ($this->colorboxSettings['linkHeight']) == 'false'
                ? 'checked="checked"' : ''; ?>"/>
          <label for="jquery-colorbox-link-height-false-radio"><?php _e('Do not set height', JQUERYCOLORBOX_TEXTDOMAIN); ?>.</label>
          <br/>
          <input type="radio" name="<?php echo JQUERYCOLORBOX_SETTINGSNAME ?>[linkHeight]" id="jquery-colorbox-link-height-custom-radio" value="custom" <?php echo ($this->colorboxSettings['linkHeight']) == 'custom'
                ? 'checked="checked"' : ''; ?>"/>
          <label for="jquery-colorbox-link-height-custom-radio"><?php _e('Set height of the Colorbox', JQUERYCOLORBOX_TEXTDOMAIN); ?>.</label>
          <input type="text" name="<?php echo JQUERYCOLORBOX_SETTINGSNAME ?>[linkHeightValue]" id="jquery-colorbox-linkHeightValue" value="<?php echo $this->colorboxSettings['linkHeightValue'] ?>" size="5" maxlength="5"/>
          <select name="<?php echo JQUERYCOLORBOX_SETTINGSNAME ?>[linkHeightUnit]" id="jquery-colorbox-link-height-unit" class="postform" style="margin:0">
      <?php
                      foreach ($this->colorboxUnits as $unit => $name) {
        echo '<option value="' . esc_attr($unit) . '"';
        selected($this->colorboxSettings['linkHeightUnit'], $unit);
        echo '>' . htmlspecialchars($name) . "</option>\n";
      }
        ?>
          </select>
          <br/><?php _e('Set the maximum height of the Colorbox itself in relation to the browser window to a value between in percent or pixels. If the image is bigger than the colorbox, scrollbars are displayed. If height is not set, the Colorbox will be as high as the picture in it', JQUERYCOLORBOX_TEXTDOMAIN); ?>.
        </td>
      </tr>
      <!--                <tr>-->
      <!--                    <th scope="row">-->
      <!--                        <label for="jquery-colorbox-initialWidth">--><?php __('Initial width of the Colorbox', JQUERYCOLORBOX_TEXTDOMAIN); ?><!--:</label>-->
      <!--                    </th>-->
      <!--                    <td>-->
      <!--                        <input type="text" name="--><?php //echo JQUERYCOLORBOX_SETTINGSNAME ?><!--[initialWidth]" id="jquery-colorbox-initialWidth" value="--><?php //echo $this->colorboxSettings['initialWidth'] ?><!--" size="5" maxlength="5"/>--><?php __('pixels', JQUERYCOLORBOX_TEXTDOMAIN) ?>
      <!--                        <br/>--><?php __('Set the maximum width of the Colorbox before the content is loaded', JQUERYCOLORBOX_TEXTDOMAIN); ?><!--.-->
      <!--                    </td>-->
      <!--                </tr>-->
      <!--                <tr>-->
      <!--                    <th scope="row">-->
      <!--                        <label for="jquery-colorbox-initialHeight">--><?php __('Initial height of the Colorbox', JQUERYCOLORBOX_TEXTDOMAIN); ?><!--:</label>-->
      <!--                    </th>-->
      <!--                    <td>-->
      <!--                        <input type="text" name="--><?php //echo JQUERYCOLORBOX_SETTINGSNAME ?><!--[initialHeight]" id="jquery-colorbox-initialHeight" value="--><?php //echo $this->colorboxSettings['initialHeight'] ?><!--" size="5" maxlength="5"/>--><?php __('pixels', JQUERYCOLORBOX_TEXTDOMAIN) ?>
      <!--                        <br/>--><?php __('Set the maximum height of the Colorbox before the content is loaded', JQUERYCOLORBOX_TEXTDOMAIN); ?><!--.-->
      <!--                    </td>-->
      <!--                </tr>-->
      <tr>
        <th scope="row">
          <label for="jquery-colorbox-scalePhotos"><?php _e('Resize images', JQUERYCOLORBOX_TEXTDOMAIN); ?>:</label>
        </th>
        <td>
          <input type="checkbox" name="<?php echo JQUERYCOLORBOX_SETTINGSNAME ?>[scalePhotos]" id="jquery-colorbox-scalePhotos" value="true" <?php echo ($this->colorboxSettings['scalePhotos'])
                  ? 'checked="checked"' : '';?>/>
          <br/><?php _e('If enabled and if maximum width of images, maximum height of images, width of the Colorbox, or height of the Colorbox have been defined, ColorBox will scale photos to fit within the those values', JQUERYCOLORBOX_TEXTDOMAIN); ?>.
        </td>
      </tr>
      <tr>
        <th scope="row">
          <label for="jquery-colorbox-overlayClose"><?php _e('Close Colorbox on overlay click', JQUERYCOLORBOX_TEXTDOMAIN); ?>:</label>
        </th>
        <td>
          <input type="checkbox" name="<?php echo JQUERYCOLORBOX_SETTINGSNAME ?>[overlayClose]" id="jquery-colorbox-overlayClose" value="true" <?php echo ($this->colorboxSettings['overlayClose'])
                  ? 'checked="checked"' : '';?>/>
          <br/><?php _e('If checked, enables closing ColorBox by clicking on the background overlay', JQUERYCOLORBOX_TEXTDOMAIN); ?>.
        </td>
      </tr>
      <tr>
        <th scope="row">
          <label for="jquery-colorbox-preloading"><?php _e('Preload images', JQUERYCOLORBOX_TEXTDOMAIN); ?>:</label>
        </th>
        <td>
          <input type="checkbox" name="<?php echo JQUERYCOLORBOX_SETTINGSNAME ?>[preloading]" id="jquery-colorbox-preloading" value="true" <?php echo ($this->colorboxSettings['preloading'])
                  ? 'checked="checked"' : '';?>/>
          <br/><?php _e('Allows for preloading of "next" and "previous" content in a group, after the current content has finished loading. Uncheck box to disable.', JQUERYCOLORBOX_TEXTDOMAIN); ?>.
        </td>
      </tr>
      <tr>
        <th scope="row">
          <label for="jquery-colorbox-transition"><?php _e('Transition type', JQUERYCOLORBOX_TEXTDOMAIN); ?>:</label>
        </th>
        <td>
          <select name="<?php echo JQUERYCOLORBOX_SETTINGSNAME ?>[transition]" id="jquery-colorbox-transition" class="postform" style="margin:0">
      <?php
                      foreach ($this->colorboxTransitions as $unit => $name) {
        echo '<option value="' . esc_attr($unit) . '"';
        selected($this->colorboxSettings['transition'], $unit);
        echo '>' . htmlspecialchars($name) . "</option>\n";
      }
        ?>
          </select>
          <br/><?php _e('The transition type of the Colorbox. Can be set to "elastic", "fade", or "none"', JQUERYCOLORBOX_TEXTDOMAIN); ?>.
        </td>
      </tr>
      <tr>
        <th scope="row">
          <label for="jquery-colorbox-speed"><?php _e('Transition speed', JQUERYCOLORBOX_TEXTDOMAIN); ?>:</label>
        </th>
        <td>
          <input type="text" name="<?php echo JQUERYCOLORBOX_SETTINGSNAME ?>[speed]" id="jquery-colorbox-speed" value="<?php echo $this->colorboxSettings['speed'] ?>" size="5" maxlength="5"/><?php _e('milliseconds', JQUERYCOLORBOX_TEXTDOMAIN); ?>
          <br/><?php _e('Sets the speed of the "fade" and "elastic" transitions, in milliseconds', JQUERYCOLORBOX_TEXTDOMAIN); ?>.
        </td>
      </tr>
      <tr>
        <th scope="row">
          <label for="jquery-colorbox-opacity"><?php _e('Opacity', JQUERYCOLORBOX_TEXTDOMAIN); ?>:</label>
        </th>
        <td>
          <input type="text" name="<?php echo JQUERYCOLORBOX_SETTINGSNAME ?>[opacity]" id="jquery-colorbox-opacity" value="<?php echo $this->colorboxSettings['opacity'] ?>" size="4" maxlength="4"/>
          <br/><?php _e('The overlay opacity level. Range: 0 to 1', JQUERYCOLORBOX_TEXTDOMAIN); ?>.
        </td>
      </tr>
    </table>
    <p class="submit">
      <input type="hidden" name="action" value="jQueryColorboxUpdateSettings"/>
      <input type="submit" name="jQueryColorboxUpdateSettings" class="button-primary" value="<?php _e('Save Changes'); ?>"/>
    </p>

  </div>
</div>