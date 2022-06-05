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

define('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_TITLE', 'MITS Dateinamen f&uuml;r Artikelbilder &copy; by <span style="padding:2px;background:#ffe;color:#6a9;font-weight:bold;">Hetfield (MerZ IT-SerVice)</span>');
define('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_DESCRIPTION', '
  <div>    
    <p>Mit dieser Erweiterung lassen sich verschiedene Variationen von Dateinamen f&uuml;r Artikelbilder steuern.</p>
    <p>Bei Fragen, Problemen oder W&uuml;nschen zu diesem Modul oder auch zu anderen Anliegen rund um die modified eCommerce Shopsoftware nehmen Sie einfach Kontakt zu uns auf:</p> 
    <div style="text-align:center;"><a style="background:#6a9;color:#444" target="_blank" href="https://www.merz-it-service.de/Kontakt.html" class="button" onclick="this.blur();">Kontaktseite auf MerZ-IT-SerVice.de</strong></a></div>
  </div>');
define('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_FILENAME_TITLE','Dateiname bilden:');
define('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_FILENAME_DESC','Woraus soll der Dateiname gebildet werden?
<ul>
<li>None/deaktiviert: Der Dateiname wird aus der products_id gebildet (Systemstandard)</li>
<li>Filename: Der Dateiname des hochgeladenen Bildes wird behalten</li>
<li>Productsname: Der Artikelname wird in den Dateinamen integriert</li>
</ul>');
define('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_ADD_ID_TITLE', 'Artikel-ID:');
define('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_ADD_ID_DESC', 'Soll die Artikel-ID (products_id) in den Dateinamen integriert werden? <small>Dies geschieht automatisch bei Dateiname bilden = None.</small>');
define('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_ADD_COUNTER_TITLE', 'Bildz&auml;hler ein?');
define('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_ADD_COUNTER_DESC', 'Soll der Bildz&auml;hler in den Dateinamen integriert werden? Empfohlen um Verwechslungen zu vermeiden, geschieht automatisch bei Dateiname bilden = None.');
define('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_LOWERNAME_TITLE', 'Dateiname in Kleinbuchstaben');
define('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_LOWERNAME_DESC', 'Dateiname bei Bildern in Kleinbuchstaben erzwingen?');
define('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_LOWERSUFFIX_TITLE', 'Dateiendung in Kleinbuchstaben');
define('MODULE_CATEGORIES_MITS_PRODUCTSIMAGEFILENAMES_LOWERSUFFIX_DESC', 'Dateiendung bei Bildern in Kleinbuchstaben erzwingen (z.B. .JPG -> .jpg)');
