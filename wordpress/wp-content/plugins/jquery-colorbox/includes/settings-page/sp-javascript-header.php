<?php
/**
 * @package Techotronic
 * @subpackage jQuery Colorbox
 *
 * @since 4.1
 * @author Arne Franken
 *
 * JavaScript for settings page
 */
?>
<script type="text/javascript">
  //<![CDATA[
  jQuery(document).ready(function($) {

    //delete value from maxWidthValue if maxWidth radio button is selected
    $("input[name='<?php echo JQUERYCOLORBOX_SETTINGSNAME ?>[maxWidth]']").click(function() {
      if ("jquery-colorbox-maxWidth-custom-radio" != $(this).attr("id"))
        $("input[name='<?php echo JQUERYCOLORBOX_SETTINGSNAME ?>[maxWidthValue]']").val("");
    });

    //set maxWidth radio button if cursor is set into maxWidthValue
    $("input[name='<?php echo JQUERYCOLORBOX_SETTINGSNAME ?>[maxWidthValue]']").focus(function() {
      $("#jquery-colorbox-maxWidth-custom-radio").attr("checked", "checked");
    });

    //delete value from maxHeightValue if maxHeight radio button is selected
    $("input[name='<?php echo JQUERYCOLORBOX_SETTINGSNAME ?>[maxHeight]']").click(function() {
      if ("jquery-colorbox-maxHeight-custom-radio" != $(this).attr("id"))
        $("input[name='<?php echo JQUERYCOLORBOX_SETTINGSNAME ?>[maxHeightValue]']").val("");
    });
    //set maxHeight radio button if cursor is set into maxHeightValue
    $("input[name='<?php echo JQUERYCOLORBOX_SETTINGSNAME ?>[maxHeightValue]']").focus(function() {
      $("#jquery-colorbox-maxHeight-custom-radio").attr("checked", "checked");
    });

    //delete value from widthValue if width radio button is selected
    $("input[name='<?php echo JQUERYCOLORBOX_SETTINGSNAME ?>[width]']").click(function() {
      if ("jquery-colorbox-width-custom-radio" != $(this).attr("id"))
        $("input[name='<?php echo JQUERYCOLORBOX_SETTINGSNAME ?>[widthValue]']").val("");
    });
    //set width radio button if cursor is set into widthValue
    $("input[name='<?php echo JQUERYCOLORBOX_SETTINGSNAME ?>[widthValue]']").focus(function() {
      $("#jquery-colorbox-width-custom-radio").attr("checked", "checked");
    });

    //delete value from heightValue if height radio button is selected
    $("input[name='<?php echo JQUERYCOLORBOX_SETTINGSNAME ?>[height]']").click(function() {
      if ("jquery-colorbox-height-custom-radio" != $(this).attr("id"))
        $("input[name='<?php echo JQUERYCOLORBOX_SETTINGSNAME ?>[heightValue]']").val("");
    });
    //set height radio button if cursor is set into heightValue
    $("input[name='<?php echo JQUERYCOLORBOX_SETTINGSNAME ?>[heightValue]']").focus(function() {
      $("#jquery-colorbox-height-custom-radio").attr("checked", "checked");
    });

    //delete value from widthValue if width radio button is selected
    $("input[name='<?php echo JQUERYCOLORBOX_SETTINGSNAME ?>[linkWidth]']").click(function() {
      if ("jquery-colorbox-link-width-custom-radio" != $(this).attr("id"))
        $("input[name='<?php echo JQUERYCOLORBOX_SETTINGSNAME ?>[linkWidthValue]']").val("");
    });
    //set width radio button if cursor is set into widthValue
    $("input[name='<?php echo JQUERYCOLORBOX_SETTINGSNAME ?>[linkWidthValue]']").focus(function() {
      $("#jquery-colorbox-link-width-custom-radio").attr("checked", "checked");
    });

    //delete value from heightValue if height radio button is selected
    $("input[name='<?php echo JQUERYCOLORBOX_SETTINGSNAME ?>[linkHeight]']").click(function() {
      if ("jquery-colorbox-link-height-custom-radio" != $(this).attr("id"))
        $("input[name='<?php echo JQUERYCOLORBOX_SETTINGSNAME ?>[linkHeightValue]']").val("");
    });
    //set height radio button if cursor is set into heightValue
    $("input[name='<?php echo JQUERYCOLORBOX_SETTINGSNAME ?>[linkHeightValue]']").focus(function() {
      $("#jquery-colorbox-link-height-custom-radio").attr("checked", "checked");
    });

    //only one of the checkboxes is allowed to be selected.
    $("input[name='<?php echo JQUERYCOLORBOX_SETTINGSNAME ?>[autoColorbox]']").click(function() {
      if ($("input[name='<?php echo JQUERYCOLORBOX_SETTINGSNAME ?>[autoColorbox]']").is(':checked')) {
        $("#jquery-colorbox-autoColorboxGalleries").attr("checked", false);
      }
    });
    $("input[name='<?php echo JQUERYCOLORBOX_SETTINGSNAME ?>[autoColorboxGalleries]']").click(function() {
      if ($("input[name='<?php echo JQUERYCOLORBOX_SETTINGSNAME ?>[autoColorboxGalleries]']").is(':checked')) {
        $("#jquery-colorbox-autoColorbox").attr("checked", false);
      }
    });

    //deactivate warning if auto Colorbox is activated
    $("input[name='<?php echo JQUERYCOLORBOX_SETTINGSNAME ?>[autoColorbox]']").click(function() {
      if ($("input[name='<?php echo JQUERYCOLORBOX_SETTINGSNAME ?>[autoColorbox]']").is(':checked')) {
        $("#jquery-colorbox-colorboxWarningOff").attr("checked", true);
      }
    });

    //activate warning if auto Colorbox is deactivated
    $("input[name='<?php echo JQUERYCOLORBOX_SETTINGSNAME ?>[autoColorbox]']").click(function() {
      if (!$("input[name='<?php echo JQUERYCOLORBOX_SETTINGSNAME ?>[autoColorbox]']").is(':checked')) {
        $("#jquery-colorbox-colorboxWarningOff").attr("checked", false);
      }
    });

    //change screenshot if new theme is selected
    $("#jquery-colorbox-theme").change(function() {
      var src = $("option:selected", this).val().match(/\d+$/i);
      if (src != "") {
        var $imgTag = "<img src=\"" + "<?php echo JQUERYCOLORBOX_PLUGIN_URL; echo '/screenshot-'; ?>" + src + ".jpg\" />";
        $("#jquery-colorbox-theme_screenshot_image").empty().html($imgTag).fadeIn();
      }
    });
  });
  //]]>
</script>