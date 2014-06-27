<?php

/**
 * Formulario de los links sociales.
 * 
 * @return array | form
 */
function cc_admin_social_links_settings() {
  $form = array();
  $form['#theme'] = 'system_settings_form';
  
  $profile_settings = variable_get('cc_cms_social_profile_links', array());
  $social_profiles = cc_cms_social_profile_info();

  foreach ($social_profiles as $key => $profile) {
    $form['test'][$key] = array(
      '#type' => 'textfield',
      '#title' => $profile['title'],
      '#size' => 40,
      '#field_prefix' => $profile['base_url'],
      '#default_value' => isset($profile_settings[$key]) ? $profile_settings[$key] : '',
    );
  }
  $form['actions']['#type'] = 'actions';
  $form['actions']['submit'] = array(
    '#type' => 'submit',
    '#value' => t('Save configuration'),
  ); 
  
  return $form;
}

/**
 * Submit de formulario de los links sociales.
 * 
 * @param array $form
 * @param arrray $form_state
 */
function cc_admin_social_links_settings_submit($form, &$form_state) {
  form_state_values_clean($form_state);
  variable_set('cc_cms_social_profile_links', $form_state['values']);  
}
