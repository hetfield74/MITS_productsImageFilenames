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

if (defined('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_STATUS') && MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_STATUS == 'true' && is_file(DIR_FS_DOCUMENT_ROOT . 'convert_images_to_products_name.php')) {
  $convert_tool = '<div style="text-align:center;"><a style="background:#444;color:#fff" target="_blank" href="' . xtc_catalog_href_link('convert_images_to_products_name.php') . '" class="button" onclick="this.blur();">Rename old pictures with article name</strong></a>';
} else {
  $convert_tool = '';
}

defined('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_TITLE') or define('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_TITLE', 'MITS File names for article pictures &copy; by <span style="padding:2px;background:#ffe;color:#6a9;font-weight:bold;">Hetfield (MerZ IT-SerVice)</span>');
defined('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_DESCRIPTION') or define('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_DESCRIPTION', '
  <div>
    <a href="https://www.merz-it-service.de/" target="_blank" title="go to the website from MerZ IT-SerVice">
      <img src="' . HTTPS_SERVER . DIR_WS_CATALOG . (defined('DIR_ADMIN') ? DIR_ADMIN : 'admin/') . 'images/merz-it-service.png" border="0" alt="MerZ IT-SerVice" style="display:block;max-width:100%;height:auto;">
    </a><br />
    <p>With this expansion, different variations of file names can be controlled for article images.</p>
    ' . $convert_tool . '
    <p>If you have any questions, problems or wishes for this module or other concerns about the modified eCommerce shopsoftware, simply contact us:</p> 
    <div style="text-align:center;"><a style="background:#6a9;color:#444" target="_blank" href="https://www.merz-it-service.de/Kontakt.html" class="button" onclick="this.blur();">Contact page on merz-it-service.de</strong></a></div>
  </div>');
defined('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_FILENAME_TITLE') or define('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_FILENAME_TITLE','Form file name:');
defined('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_FILENAME_DESC') or define('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_FILENAME_DESC','What should the file name be formed from?
<ul>
<li>None/Deactivated: The file name is formed from the products_id (system standard)</li>
<li>Filename: The file name of the uploaded image will be kept</li>
<li>Productsname: The article name or category name is integrated into the file name</li>
</ul>');
defined('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_ADD_ID_TITLE') or define('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_ADD_ID_TITLE', 'Article-ID:');
defined('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_ADD_ID_DESC') or define('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_ADD_ID_DESC', 'Should the article ID (Products_ID) be integrated into the file name? <small> This happens automatically with file name = <i>None</i>. </small>');
defined('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_ADD_COUNTER_TITLE') or define('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_ADD_COUNTER_TITLE', 'Image counter?');
defined('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_ADD_COUNTER_DESC') or define('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_ADD_COUNTER_DESC', 'Should the image counter be integrated into the file name? Recommended to avoid confusion is automatically formed in file name = <i>None</i> and <i>Productsname</i>.');
defined('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_LOWERNAME_TITLE') or define('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_LOWERNAME_TITLE', 'File name in small letters');
defined('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_LOWERNAME_DESC') or define('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_LOWERNAME_DESC', 'Forced the file name for pictures in small letters?');
defined('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_LOWERSUFFIX_TITLE') or define('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_LOWERSUFFIX_TITLE', 'File extension in small letters');
defined('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_LOWERSUFFIX_DESC') or define('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_LOWERSUFFIX_DESC', 'Forced the file extension for images in small letters (e.g. .JPG -> .jpg)');
defined('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_STATUS_TITLE') or define('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_STATUS_TITLE', 'Enable module?');
defined('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_STATUS_DESC') or define('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_STATUS_DESC', 'Modules status');
defined('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_SORT_ORDER_TITLE') or define('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_SORT_ORDER_TITLE', 'Sort order');
defined('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_SORT_ORDER_DESC') or define('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_SORT_ORDER_DESC', 'Order of processing. Smallest number is executed first.');
