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
  $convert_tool = '<div style="text-align:center;"><a style="background:#444;color:#fff" target="_blank" href="' . xtc_catalog_href_link('convert_images_to_products_name.php') . '" class="button" onclick="this.blur();">Alte Bilder umbenennen mit Artikelname</strong></a>';
} else {
  $convert_tool = '';
}

defined('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_TITLE') or define('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_TITLE', 'MITS Dateinamen f&uuml;r Artikelbilder &copy; by <span style="padding:2px;background:#ffe;color:#6a9;font-weight:bold;">Hetfield (MerZ IT-SerVice)</span>');
defined('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_DESCRIPTION') or define('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_DESCRIPTION', '
  <div>
    <a href="https://www.merz-it-service.de/" target="_blank" title="Gehe zur Homepage von MerZ IT-SerVice">
        <img src="' . HTTPS_SERVER . DIR_WS_CATALOG . (defined('DIR_ADMIN') ? DIR_ADMIN : 'admin/') . 'images/merz-it-service.png" border="0" alt="MerZ IT-SerVice" style="display:block;max-width:100%;height:auto;">
    </a><br /> 
    <p>Mit dieser Erweiterung lassen sich verschiedene Variationen von Dateinamen f&uuml;r Artikelbilder steuern.</p>
    ' . $convert_tool . '
    <p>Bei Fragen, Problemen oder W&uuml;nschen zu diesem Modul oder auch zu anderen Anliegen rund um die modified eCommerce Shopsoftware nehmen Sie einfach Kontakt zu uns auf:</p> 
    <div style="text-align:center;"><a style="background:#6a9;color:#444" target="_blank" href="https://www.merz-it-service.de/Kontakt.html" class="button" onclick="this.blur();">Kontaktseite auf MerZ-IT-SerVice.de</strong></a></div>
  </div>');
defined('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_FILENAME_TITLE') or define('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_FILENAME_TITLE','Dateiname bilden:');
defined('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_FILENAME_DESC') or define('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_FILENAME_DESC','Woraus soll der Dateiname gebildet werden?
<ul>
<li>None/deaktiviert: Der Dateiname wird aus der products_id gebildet (Systemstandard)</li>
<li>Filename: Der Dateiname des hochgeladenen Bildes wird behalten</li>
<li>Productsname: Der Artikelname bzw. Kategoriename wird in den Dateinamen integriert</li>
</ul>');
defined('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_ADD_ID_TITLE') or define('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_ADD_ID_TITLE', 'Artikel-ID:');
defined('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_ADD_ID_DESC') or define('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_ADD_ID_DESC', 'Soll die Artikel-ID (products_id) in den Dateinamen integriert werden? <small>Dies geschieht automatisch bei Dateiname bilden = <i>None</i>.</small>');
defined('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_ADD_COUNTER_TITLE') or define('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_ADD_COUNTER_TITLE', 'Bildz&auml;hler ein?');
defined('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_ADD_COUNTER_DESC') or define('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_ADD_COUNTER_DESC', 'Soll der Bildz&auml;hler in den Dateinamen integriert werden? Empfohlen um Verwechslungen zu vermeiden, geschieht automatisch bei Dateiname bilden = <i>None</i> und <i>Productsname</i>.');
defined('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_LOWERNAME_TITLE') or define('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_LOWERNAME_TITLE', 'Dateiname in Kleinbuchstaben');
defined('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_LOWERNAME_DESC') or define('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_LOWERNAME_DESC', 'Dateiname bei Bildern in Kleinbuchstaben erzwingen?');
defined('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_LOWERSUFFIX_TITLE') or define('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_LOWERSUFFIX_TITLE', 'Dateiendung in Kleinbuchstaben');
defined('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_LOWERSUFFIX_DESC') or define('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_LOWERSUFFIX_DESC', 'Dateiendung bei Bildern in Kleinbuchstaben erzwingen (z.B. .JPG -> .jpg)');
defined('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_STATUS_TITLE') or define('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_STATUS_TITLE', 'Modul aktivieren?');
defined('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_STATUS_DESC') or define('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_STATUS_DESC', 'Modul Status');
defined('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_SORT_ORDER_TITLE') or define('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_SORT_ORDER_TITLE', 'Sortierreihenfolge');
defined('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_SORT_ORDER_DESC') or define('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_SORT_ORDER_DESC', 'Reihenfolge der Verarbeitung. Kleinste Ziffer wird zuerst ausgef&uuml;hrt.');
