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
    $convert_tool = '<div style="text-align:center;"><a style="background:#444;color:#fff" target="_blank" href="' . xtc_catalog_href_link('convert_images_to_products_name.php') . '" class="button" onclick="this.blur();">Alte Bilder umbenennen mit Artikelname</strong></a>';
} else {
    $convert_tool = '';
}

$lang_array = array(
  'MODULE_' . $modulname . '_TITLE'                              => 'MITS Dateinamen f&uuml;r Artikelbilder <span style="white-space:nowrap;">&copy; by <span style="padding:2px;background:#ffe;color:#6a9;font-weight:bold;">Hetfield (MerZ IT-SerVice)</span></span>',
  'MODULE_' . $modulname . '_DESCRIPTION'                        => '
        <div>
    <a href="https://www.merz-it-service.de/" target="_blank" title="Gehe zur Homepage von MerZ IT-SerVice">
        <img src="' . HTTPS_SERVER . DIR_WS_CATALOG . (defined('DIR_ADMIN') ? DIR_ADMIN : 'admin/') . 'images/merz-it-service.png" border="0" alt="MerZ IT-SerVice" style="display:block;max-width:100%;height:auto;">
    </a><br /> 
    <p>Mit dieser Erweiterung lassen sich verschiedene Variationen von Dateinamen f&uuml;r Artikelbilder steuern.</p>
    ' . $convert_tool . '
    <div style="text-align:center;">
      <small>Nur auf Github gibt es immer die aktuellste Version des Moduls!</small><br />
      <a style="background:#6a9;color:#444" target="_blank" href="https://github.com/hetfield74/MITS_productsImageFilenames" class="button" onclick="this.blur();">MITS_productsImageFilenames on Github</a>
    </div>
    <p>Bei Fragen, Problemen oder W&uuml;nschen zu diesem Modul oder auch zu anderen Anliegen rund um die modified eCommerce Shopsoftware nehmen Sie einfach Kontakt zu uns auf:</p> 
    <div style="text-align:center;"><a style="background:#6a9;color:#444" target="_blank" href="https://www.merz-it-service.de/Kontakt.html" class="button" onclick="this.blur();">Kontaktseite auf MerZ-IT-SerVice.de</strong></a></div>
  </div>',
  'MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_FILENAME_TITLE' => 'Dateiname bilden:',
  'MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_FILENAME_DESC'  => 'Woraus soll der Dateiname gebildet werden?
    <ul>
    <li>None/deaktiviert: Der Dateiname wird aus der products_id gebildet (Systemstandard)</li>
    <li>Filename: Der Dateiname des hochgeladenen Bildes wird behalten</li>
    <li>Productsname: Der Artikelname bzw. Kategoriename wird in den Dateinamen integriert</li>
    </ul>',
  'MODULE_' . $modulname . '_ADD_ID_TITLE'                       => 'Artikel-ID:',
  'MODULE_' . $modulname . '_ADD_ID_DESC'                        => 'Soll die Artikel-ID (products_id) in den Dateinamen integriert werden? <small>Dies geschieht automatisch bei Dateiname bilden = <i>None</i>.</small>',
  'MODULE_' . $modulname . '_ADD_COUNTER_TITLE'                  => 'Bildz&auml;hler ein?',
  'MODULE_' . $modulname . '_ADD_COUNTER_DESC'                   => 'Soll der Bildz&auml;hler in den Dateinamen integriert werden? Empfohlen um Verwechslungen zu vermeiden, geschieht automatisch bei Dateiname bilden = <i>None</i> und <i>Productsname</i>.',
  'MODULE_' . $modulname . '_LOWERNAME_TITLE'                    => 'Dateiname in Kleinbuchstaben',
  'MODULE_' . $modulname . '_LOWERNAME_DESC'                     => 'Dateiname bei Bildern in Kleinbuchstaben erzwingen?',
  'MODULE_' . $modulname . '_LOWERSUFFIX_TITLE'                  => 'Dateiendung in Kleinbuchstaben',
  'MODULE_' . $modulname . '_LOWERSUFFIX_DESC'                   => 'Dateiendung bei Bildern in Kleinbuchstaben erzwingen (z.B. .JPG -> .jpg)',
  'MODULE_' . $modulname . '_SEPARATOR_TITLE'                    => 'Trennzeichen',
  'MODULE_' . $modulname . '_SEPARATOR_DESC'                     => 'Soll als Trennzeichen im Dateinamen ein Bindestrich (-) oder Unterstrich (_) verwendet werden?',
  'MODULE_' . $modulname . '_STATUS_TITLE'                       => 'Modul aktivieren?',
  'MODULE_' . $modulname . '_STATUS_DESC'                        => 'Modul Status',
  'MODULE_' . $modulname . '_SORT_ORDER_TITLE'                   => 'Sortierreihenfolge',
  'MODULE_' . $modulname . '_SORT_ORDER_DESC'                    => 'Reihenfolge der Verarbeitung. Kleinste Ziffer wird zuerst ausgef&uuml;hrt.'
);

foreach ($lang_array as $key => $val) {
    defined($key) || define($key, $val);
}
