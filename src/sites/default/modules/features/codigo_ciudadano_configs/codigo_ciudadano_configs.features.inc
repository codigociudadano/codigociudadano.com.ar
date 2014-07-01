<?php
/**
 * @file
 * codigo_ciudadano_configs.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function codigo_ciudadano_configs_ctools_plugin_api($module = NULL, $api = NULL) {
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}
