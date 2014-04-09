<?php
/**
 * @package Techotronic
 * @subpackage jQuery Colorbox
 *
 * @since 4.1
 * @author Arne Franken
 *
 * Left column for settings page
 */
?>
<div class="postbox-container" style="width: 69%;">
  <form name="jquery-colorbox-settings-update" method="post" action="admin-post.php">
    <?php if (function_exists('wp_nonce_field') === true) wp_nonce_field('jquery-colorbox-settings-form'); ?>
    <div id="poststuff">
<?php
      require_once 'sp-plugin-settings.php';
      require_once 'sp-colorbox-settings.php';
  ?>
    </div>
  </form>
<?php
  require_once 'sp-delete-settings.php';
  ?>
</div>