<?php

require_once 'pseudorecur.civix.php';

/**
 * Implements hook_civicrm_config().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function pseudorecur_civicrm_config(&$config) {
  _pseudorecur_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function pseudorecur_civicrm_xmlMenu(&$files) {
  _pseudorecur_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function pseudorecur_civicrm_install() {
  _pseudorecur_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_postInstall
 */
function pseudorecur_civicrm_postInstall() {
  _pseudorecur_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function pseudorecur_civicrm_uninstall() {
  _pseudorecur_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function pseudorecur_civicrm_enable() {
  _pseudorecur_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function pseudorecur_civicrm_disable() {
  _pseudorecur_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function pseudorecur_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _pseudorecur_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function pseudorecur_civicrm_managed(&$entities) {
  _pseudorecur_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function pseudorecur_civicrm_caseTypes(&$caseTypes) {
  _pseudorecur_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_angularModules
 */
function pseudorecur_civicrm_angularModules(&$angularModules) {
  _pseudorecur_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function pseudorecur_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _pseudorecur_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Converts weekly donations into monthly donations
 */
function pseudorecur_civicrm_postProcess($formName, &$form) {
  if (is_a($form, 'CRM_Contribute_Form_Contribution_Main')) {
    $unit = CRM_Utils_Array::value('frequency_unit', $form->_params);
    if ($unit == 'week') {
      $multiplier = 4.3;
      $newUnit = 'month';
      $newAmount = $form->get("amount") * $multiplier;

      $container = &$form->controller->container();
      $container['values']['Main']['frequency_unit'] = $newUnit;
      $form->set('amount', $newAmount);
    }
  }
}

// --- Functions below this ship commented out. Uncomment as required. ---

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_navigationMenu
 *
function pseudorecur_civicrm_navigationMenu(&$menu) {
  _pseudorecur_civix_insert_navigation_menu($menu, NULL, array(
    'label' => ts('The Page', array('domain' => 'eu.wemove.pseudorecur')),
    'name' => 'the_page',
    'url' => 'civicrm/the-page',
    'permission' => 'access CiviReport,access CiviContribute',
    'operator' => 'OR',
    'separator' => 0,
  ));
  _pseudorecur_civix_navigationMenu($menu);
} // */