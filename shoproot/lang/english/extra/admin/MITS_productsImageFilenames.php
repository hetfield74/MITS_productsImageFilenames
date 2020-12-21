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


define('TEXT_MITS_PRODUCTS_IMAGEFILENAMES_FILENAME_TITLE','Dateiname bilden:');
define('TEXT_MITS_PRODUCTS_IMAGEFILENAMES_FILENAME_DESC','Woraus soll der Dateiname gebildet werden?
<ul>
<li>None: Der Dateiname wird aus der products_id gebildet (Systemstandrad)</li>
<li>Filename: Der Dateiname des hochgeladenen Bildes wird behalten</li>
<li>Productsname: Der Artikelname wird in den Dateinamen integriert</li>
</ul>');
define('TEXT_MITS_PRODUCTS_IMAGEFILENAMES_ADD_ID_TITLE','Artikel-ID:');
define('TEXT_MITS_PRODUCTS_IMAGEFILENAMES_ADD_ID_DESC','Soll die Artikel-ID (products_id) in den Dateinamen integriert werden? <small>Dies geschieht automatisch bei Dateiname bilden = None.</small>');
define('TEXT_MITS_PRODUCTS_IMAGEFILENAMES_ADD_COUNTER_TITLE','Bildz&auml;hler ein?');
define('TEXT_MITS_PRODUCTS_IMAGEFILENAMES_ADD_COUNTER_DESC','Soll der Bildz&auml;hler in den Dateinamen integriert werden? Empfohlen um Verwechslungen zu vermeiden, geschieht automatisch bei Dateiname bilden = None.');
define('TEXT_MITS_PRODUCTS_IMAGEFILENAMES_LOWERNAME_TITLE','Dateiname in Kleinbuchstaben');
define('TEXT_MITS_PRODUCTS_IMAGEFILENAMES_LOWERNAME_DESC','Dateiname bei Bildern in Kleinbuchstaben erzwingen?');
define('TEXT_MITS_PRODUCTS_IMAGEFILENAMES_LOWERSUFFIX_TITLE','Dateiendung in Kleinbuchstaben');
define('TEXT_MITS_PRODUCTS_IMAGEFILENAMES_LOWERSUFFIX_DESC','Dateiendung bei Bildern in Kleinbuchstaben erzwingen (z.B. .JPG -> .jpg)');