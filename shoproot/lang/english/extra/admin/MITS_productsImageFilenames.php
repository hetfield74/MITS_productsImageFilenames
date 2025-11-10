<?php
/**
 * --------------------------------------------------------------
 * File: MITS_productsImageFilenames.php
 * Date: 11.04.2019
 * Time: 10:29
 *
 * Author: Hetfield
 * Copyright: (c) 2019 - MerZ IT-SerVice
 * Web: https://www.merz-it-service.de
 * Contact: info@merz-it-service.de
 * --------------------------------------------------------------
 */

$modul_code = strtoupper("MITS_productsImageFilenames");
$modul_type = 'CATEGORIES_';
$modulname = $modul_type . $modul_code;

if (defined('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_STATUS') && MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_STATUS == 'true' && is_file(DIR_FS_DOCUMENT_ROOT . 'convert_images_to_products_name.php')) {
    $convert_tool = '<div style="text-align:center;"><a style="background:#444;color:#fff" target="_blank" href="' . xtc_catalog_href_link('convert_images_to_products_name.php') . '" class="button" onclick="this.blur();">Rename old pictures with article name</strong></a>';
} else {
    $convert_tool = '';
}

$lang_array = array(
  'MODULE_' . $modulname . '_TITLE'                              => 'MITS File names for article and categorie pictures <span style="white-space:nowrap;">&copy; by <span style="padding:2px;background:#ffe;color:#6a9;font-weight:bold;">Hetfield (MerZ IT-SerVice)</span></span>',
  'MODULE_' . $modulname . '_DESCRIPTION'                        => '
  <div>
    <a href="https://www.merz-it-service.de/" target="_blank" title="go to the website from MerZ IT-SerVice">
        <img src="' . HTTPS_SERVER . DIR_WS_CATALOG . (defined('DIR_ADMIN') ? DIR_ADMIN : 'admin/') . 'images/merz-it-service.png" border="0" alt="MerZ IT-SerVice" style="display:block;max-width:100%;height:auto;">
    </a><br /> 
    <p>With this expansion, different variations of file names can be controlled for article images.</p>
    ' . $convert_tool . '
    <div style="text-align:center;">
      <small>Only on Github is there always the latest version of the module!</small><br />
      <a style="background:#6a9;color:#444" target="_blank" href="https://github.com/hetfield74/MITS_productsImageFilenames" class="button" onclick="this.blur();">MITS_productsImageFilenames on Github</a>
    </div>
    <p>If you have any questions, problems or wishes for this module or other concerns about the modified eCommerce shopsoftware, simply contact us:</p> 
    <div style="text-align:center;"><a style="background:#6a9;color:#444" target="_blank" href="https://www.merz-it-service.de/Kontakt.html" class="button" onclick="this.blur();">Contact page on merz-it-service.de</strong></a></div>
  </div>',
  'MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_FILENAME_TITLE' => 'Dateiname bilden:',
  'MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_FILENAME_DESC'  => 'What should the file name be formed from?
    <ul>
    <li>None/Deactivated: The file name is formed from the products_id (system standard)</li>
    <li>Filename: The file name of the uploaded image will be kept</li>
    <li>Productsname: The article name or category name is integrated into the file name</li>
    </ul>',
  'MODULE_' . $modulname . '_ADD_ID_TITLE'                       => 'Article-ID:',
  'MODULE_' . $modulname . '_ADD_ID_DESC'                        => 'Should the article ID (Products_ID) be integrated into the file name? <small> This happens automatically with file name = <i>None</i>. </small>',
  'MODULE_' . $modulname . '_ADD_COUNTER_TITLE'                  => 'Image counter?',
  'MODULE_' . $modulname . '_ADD_COUNTER_DESC'                   => 'Should the image counter be integrated into the file name? Recommended to avoid confusion is automatically formed in file name = <i>None</i> and <i>Productsname</i>.',
  'MODULE_' . $modulname . '_LOWERNAME_TITLE'                    => 'File name in small letters',
  'MODULE_' . $modulname . '_LOWERNAME_DESC'                     => 'Forced the file name for pictures in small letters?',
  'MODULE_' . $modulname . '_LOWERSUFFIX_TITLE'                  => 'File extension in small letters',
  'MODULE_' . $modulname . '_LOWERSUFFIX_DESC'                   => 'Forced the file extension for images in small letters (e.g. .JPG -> .jpg)',
  'MODULE_' . $modulname . '_SEPARATOR_TITLE'                    => 'Trennzeichen',
  'MODULE_' . $modulname . '_SEPARATOR_DESC'                     => 'Soll als Trennzeichen im Dateinamen ein Bindestrich (-) oder Unterstrich (_) verwendet werden?',
  'MODULE_' . $modulname . '_STATUS_TITLE'                       => 'Enable module?',
  'MODULE_' . $modulname . '_STATUS_DESC'                        => 'Modules status',
  'MODULE_' . $modulname . '_SORT_ORDER_TITLE'                   => 'Sort order',
  'MODULE_' . $modulname . '_SORT_ORDER_DESC'                    => 'Order of processing. Smallest number is executed first.',
  'MODULE_' . $modulname . '_UPDATE_AVAILABLE_TITLE'             => ' <span style="font-weight:bold;color:#900;background:#ff6;padding:2px;border:1px solid #900;">Please carry out module updates!</span>',
  'MODULE_' . $modulname . '_UPDATE_AVAILABLE_DESC'              => '',
  'MODULE_' . $modulname . '_UPDATE_FINISHED'                    => 'The Modul MITS File names for article and categorie pictures module has been updated.',
  'MODULE_' . $modulname . '_UPDATE_ERROR'                       => 'Error',
  'MODULE_' . $modulname . '_UPDATE_MODUL'                       => 'Update module',
  'MODULE_' . $modulname . '_DELETE_MODUL'                       => 'The MITS File names for article and categorie pictures module has been deleted from the server.',
  'MODULE_' . $modulname . '_CONFIRM_DELETE_MODUL'               => 'Are you sure you want to delete the MITS File names for article and categorie pictures module and all files from the server?',
  'MODULE_' . $modulname . '_DELETE_FINISHED'                    => 'The MITS File names for article and categorie pictures module has been deleted from the server.',
);

foreach ($lang_array as $key => $val) {
    defined($key) || define($key, $val);
}
