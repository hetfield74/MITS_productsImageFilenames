<?php
/**
 * --------------------------------------------------------------
 * File: MITS_productsImageFilenames.php
 * Date: 11.04.2019
 * Time: 09:29
 *
 * Author: Hetfield
 * Copyright: (c) 2019 - MerZ IT-SerVice
 * Web: https://www.merz-it-service.de
 * Contact: info@merz-it-service.de
 * --------------------------------------------------------------
 */

class MITS_productsImageFilenames {

  function __construct() {
    $this->code = 'MITS_productsImageFilenames';
    $this->title = 'MITS Dateinamen f&uuml;r Artikelbilder &copy; by <span style="padding:2px;background:#ffe;color:#6a9;font-weight:bold;">Hetfield (MerZ IT-SerVice)</span>';
    $this->description = 'Dateinamen f&uuml;r Artikelbilder erstellen nach Dateiname oder Artikelname, Dateiendung bei Bildern in Kleinbuchstaben erzwingen (z.B. .JPG -> .jpg) usw.';
    $this->name = 'MODULE_CATEGORIES_'.strtoupper($this->code);
    $this->enabled = defined($this->name.'_STATUS') && constant($this->name.'_STATUS') == 'true' ? true : false;
    $this->sort_order = defined($this->name.'_SORT_ORDER') ? constant($this->name.'_SORT_ORDER') : '';

    $this->translate();
  }

  function translate() {
    switch ($_SESSION['language_code']) {
      case 'de':
        $this->description = 'Dateinamen f&uuml;r Artikelbilder erstellen nach Dateiname oder Artikelname, Dateiendung bei Bildern in Kleinbuchstaben erzwingen (z.B. .JPG -> .jpg) usw.';
        break;
      default:
        $this->description = 'Dateinamen f&uuml;r Artikelbilder erstellen nach Dateiname oder Artikelname, Dateiendung bei Bildern in Kleinbuchstaben erzwingen (z.B. .JPG -> .jpg) usw.';
        break;
    }
  }

  function check() {
    if (!isset($this->_check)) {
      $check_query = xtc_db_query("select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = '".$this->name."_STATUS'");
      $this->_check = xtc_db_num_rows($check_query);
    }
    return $this->_check;
  }

  function keys() {
    define($this->name.'_STATUS_TITLE', TEXT_DEFAULT_STATUS_TITLE);
    define($this->name.'_STATUS_DESC', TEXT_DEFAULT_STATUS_DESC);
    define($this->name.'_SORT_ORDER_TITLE', TEXT_DEFAULT_SORT_ORDER_TITLE);
    define($this->name.'_SORT_ORDER_DESC', TEXT_DEFAULT_SORT_ORDER_DESC);
    define($this->name.'_ADD_ID_TITLE', TEXT_MITS_PRODUCTS_IMAGEFILENAMES_ADD_ID_TITLE);
    define($this->name.'_ADD_ID_DESC', TEXT_MITS_PRODUCTS_IMAGEFILENAMES_ADD_ID_DESC);
    define($this->name.'_ADD_COUNTER_TITLE', TEXT_MITS_PRODUCTS_IMAGEFILENAMES_ADD_COUNTER_TITLE);
    define($this->name.'_ADD_COUNTER_DESC', TEXT_MITS_PRODUCTS_IMAGEFILENAMES_ADD_COUNTER_DESC);
    define($this->name.'_FILENAME_TITLE', TEXT_MITS_PRODUCTS_IMAGEFILENAMES_FILENAME_TITLE);
    define($this->name.'_FILENAME_DESC', TEXT_MITS_PRODUCTS_IMAGEFILENAMES_FILENAME_DESC);
    define($this->name.'_LOWERNAME_TITLE', TEXT_MITS_PRODUCTS_IMAGEFILENAMES_LOWERNAME_TITLE);
    define($this->name.'_LOWERNAME_DESC', TEXT_MITS_PRODUCTS_IMAGEFILENAMES_LOWERNAME_DESC);
    define($this->name.'_LOWERSUFFIX_TITLE', TEXT_MITS_PRODUCTS_IMAGEFILENAMES_LOWERSUFFIX_TITLE);
    define($this->name.'_LOWERSUFFIX_DESC', TEXT_MITS_PRODUCTS_IMAGEFILENAMES_LOWERSUFFIX_DESC);

    return array(
      $this->name.'_STATUS',
      $this->name.'_SORT_ORDER',
      $this->name.'_FILENAME',
      $this->name.'_ADD_ID',
      $this->name.'_ADD_COUNTER',
      $this->name.'_LOWERNAME',
      $this->name.'_LOWERSUFFIX'
    );
  }

  function install() {
    xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('".$this->name."_STATUS', 'true','6', '1','xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
    xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, date_added) VALUES ('".$this->name."_SORT_ORDER', '10','6', '3', now())");
    xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('".$this->name."_FILENAME', 'Filename',  '6', '4', 'xtc_cfg_select_option(array(\'None\', \'Filename\', \'Productsname\'), ', now())");
    xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('".$this->name."_ADD_ID', 'true','6', '5','xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
    xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('".$this->name."_ADD_COUNTER', 'true','6', '6','xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
    xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('".$this->name."_LOWERNAME', 'true','6', '7','xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
    xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('".$this->name."_LOWERSUFFIX', 'true','6', '8','xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
  }

  function remove() {
    xtc_db_query("DELETE FROM " . TABLE_CONFIGURATION . " WHERE configuration_key LIKE '".$this->name."_%'");
  }

  function image_name($image_name, $data_id, $counter, $suffix, $name_arr, $srcID, $data_arr) {

    include_once(DIR_FS_INC . 'seo_url_href_mask.php');

    // Dateiname des Bildes nach Upload beibehalten oder aus dem Artikelname generieren, ansonsten wirde der Dateiname des Bildes wie gewohnt aus der ID gebildet
    if (constant($this->name . '_FILENAME') == 'Filename') {
      $name = array_shift($name_arr);
      $name = seo_url_href_mask($name);
    } elseif (constant($this->name . '_FILENAME') == 'Productsname') {
      //require_once (DIR_FS_INC . 'xtc_get_products_name.inc.php');
      //$name = xtc_get_products_name($data_id);
      $name = seo_url_href_mask($data_arr['products_name'][$_SESSION['languages_id']]);
    } else {
      $name = '';
    }

    // Dateiendung in Kleinbuchstaben erzwingen (empfohlen)
    if (constant($this->name.'_LOWERSUFFIX') == 'true') {
      $suffix = strtolower($suffix);
    }

    // Trenner mit Zähler hinzufügen (empfohlen)
    if (constant($this->name.'_ADD_COUNTER') == 'true' || constant($this->name . '_FILENAME') == 'None') {
      $separator = (((string)$counter != '') ? '_' . $counter : '');
    } else {
      $separator = '';
    }

    // products_id in dem Dateinamen integrieren (empfohlen) oder Pflicht bei Auswahl FILENAME = None
    if (constant($this->name.'_ADD_ID') == 'true' || constant($this->name . '_FILENAME') == 'None') {
      if(constant($this->name . '_FILENAME') == 'None') {
        $name = $data_id;
      } else {
        $name = $name . '_' . $data_id;
      }
    }

    if (constant($this->name.'_LOWERNAME') == 'true') {
      $name = strtolower($name);
    }

    $image_name = $name . $separator . '.' . $suffix;

    return $image_name;

  }

}