<?php

/**
 * Sobreescribe o inserta variables en el theme.
 */

/**
 * Implements THEME_preprocess_page hook.
 */
function codigociudadano_preprocess_page(&$vars) {
  if ($vars['is_front']) {
    $vars['title']="";
    unset($vars['page']['content']['system_main']['default_message']);
  }
  $block = block_load('cc_cms', 'cc-cms-social-profiles');
  $vars['cc_cms_social_links'] = drupal_render(_block_get_renderable_array(_block_render_blocks(array($block))));
}

/**
 * Renderiza el formulario de drupal.
 * 
 * @return string | formulario de busqueda
 */
function render_search_form() {
    $block = module_invoke('search', 'block_view', 'search');
    return render($block);
}
