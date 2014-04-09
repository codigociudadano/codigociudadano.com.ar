<?php
/**
 * @package Techotronic
 * @subpackage jQuery Colorbox
 *
 * @since 3.1
 * @author Arne Franken
 *
 * HTML for settings page
 */
?>
<?php
    require_once 'settings-page/sp-javascript-header.php';
?>
<div class="wrap">
  <div>
    <?php screen_icon(); ?>
    <h2><?php printf(__('%1$s Settings', JQUERYCOLORBOX_TEXTDOMAIN), JQUERYCOLORBOX_NAME); ?></h2>
    <br class="clear"/>

    <?php settings_fields(JQUERYCOLORBOX_SETTINGSNAME); ?>

<?php
    require_once 'settings-page/sp-left-column.php';
    require_once 'settings-page/sp-right-column.php';
    ?>
  </div>
<?php
  require_once 'settings-page/sp-footer.php';
  ?>
</div>