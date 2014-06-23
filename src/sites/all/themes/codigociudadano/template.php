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
