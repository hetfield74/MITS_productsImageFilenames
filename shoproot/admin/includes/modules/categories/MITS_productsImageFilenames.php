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
    $this->name = 'MODULE_CATEGORIES_' . strtoupper($this->code);
    $this->version = defined($this->name . '_VERSION') ? constant($this->name . '_VERSION') : '1.1';
    $this->title = constant($this->name . '_TITLE') . ' - v' . $this->version;
    $this->description = constant($this->name . '_DESCRIPTION');
    $this->sort_order = defined($this->name . '_SORT_ORDER') ? constant($this->name . '_SORT_ORDER') : 0;
    $this->enabled = defined($this->name . '_STATUS') && constant($this->name . '_STATUS') == 'true' ? true : false;

    if (!defined($this->name . '_VERSION') && defined($this->name . '_STATUS') && constant($this->name . '_STATUS') == 'true') {
      xtc_db_query("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = '" . $this->version . "' WHERE configuration_key = '" . $this->name . "_VERSION'");
    } elseif(defined($this->name . '_STATUS') && constant($this->name . '_STATUS') == 'true') {
      xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('" . $this->name . "_VERSION', '" . $this->version . "', 6, 99, NULL, now())");
    }
  }

  function check() {
    if (!isset($this->_check)) {
      $check_query = xtc_db_query("SELECT configuration_value FROM " . TABLE_CONFIGURATION . " WHERE configuration_key = '" . $this->name . "_STATUS'");
      $this->_check = xtc_db_num_rows($check_query);
    }
    return $this->_check;
  }

  function keys() {
    defined($this->name . '_STATUS_TITLE') or define($this->name . '_STATUS_TITLE', TEXT_DEFAULT_STATUS_TITLE);
    defined($this->name . '_STATUS_DESC') or define($this->name . '_STATUS_DESC', TEXT_DEFAULT_STATUS_DESC);
    defined($this->name . '_SORT_ORDER_TITLE') or define($this->name . '_SORT_ORDER_TITLE', TEXT_DEFAULT_SORT_ORDER_TITLE);
    defined($this->name . '_SORT_ORDER_DESC') or define($this->name . '_SORT_ORDER_DESC', TEXT_DEFAULT_SORT_ORDER_DESC);

    return array(
      $this->name . '_STATUS',
      $this->name . '_SORT_ORDER',
      $this->name . '_FILENAME',
      $this->name . '_ADD_ID',
      $this->name . '_ADD_COUNTER',
      $this->name . '_LOWERNAME',
      $this->name . '_LOWERSUFFIX'
    );
  }

  function install() {
    xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('" . $this->name . "_STATUS', 'true', 6, 1,'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
    xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, date_added) VALUES ('" . $this->name . "_SORT_ORDER', '10', 6, 3, now())");
    xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('" . $this->name . "_FILENAME', 'Filename', 6, 4, 'xtc_cfg_select_option(array(\'None\', \'Filename\', \'Productsname\'), ', now())");
    xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('" . $this->name . "_ADD_ID', 'true', 6, 5,'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
    xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('" . $this->name . "_ADD_COUNTER', 'true', 6, 6,'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
    xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('" . $this->name . "_LOWERNAME', 'true', 6, 7,'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
    xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('" . $this->name . "_LOWERSUFFIX', 'true', 6, 8,'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
    xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('" . $this->name . "_VERSION', '" . $this->version . "', 6, 99, NULL, now())");
  }

  function remove() {
    xtc_db_query("DELETE FROM " . TABLE_CONFIGURATION . " WHERE configuration_key LIKE '" . $this->name . "_%'");
  }

  function image_name($image_name, $id, $counter, $suffix, $name_arr, $srcID, $data_arr) {

    // Dateiname des Bildes nach Upload beibehalten oder aus dem Artikelname generieren, ansonsten wird der Dateiname des Bildes wie gewohnt aus der ID gebildet
    if (constant($this->name . '_FILENAME') == 'Filename' && isset($name_arr)) {
      $products_name = (is_array($name_arr)) ? array_shift($name_arr) : $name_arr;
      if ($products_name != '') {
        include_once(DIR_FS_INC . 'seo_url_href_mask.php');
        $name = seo_url_href_mask($products_name);
      } else {
        $name = '';
      }
    } elseif (constant($this->name . '_FILENAME') == 'Productsname') {
      if (isset($data_arr['products_name'])) {
        include_once(DIR_FS_INC . 'seo_url_href_mask.php');
        $name = str_replace('/','_', seo_url_href_mask($data_arr['products_name'][$_SESSION['languages_id']]));
      } else {
        $name = '';
      }
    } else {
      $name = '';
    }

    // Dateiendung in Kleinbuchstaben erzwingen (empfohlen)
    if (constant($this->name . '_LOWERSUFFIX') == 'true') {
      $suffix = strtolower($suffix);
    }

    // Trenner mit Zähler hinzufügen (empfohlen)
    if (constant($this->name . '_ADD_COUNTER') == 'true' || constant($this->name . '_FILENAME') == 'None') {
      $separator = (((string)$counter != '') ? '_' . $counter : '');
    } else {
      $separator = '';
    }

    // products_id in dem Dateinamen integrieren (empfohlen) oder Pflicht bei Auswahl FILENAME = None
    if (constant($this->name . '_ADD_ID') == 'true' || constant($this->name . '_FILENAME') == 'None' || $name == '') {
      if (constant($this->name . '_FILENAME') == 'None' || $name == '') {
        $name = $id;
      } else {
        $name = $name . '_' . $id;
      }
    }

    if (constant($this->name . '_LOWERNAME') == 'true') {
      $name = strtolower($name);
    }

    $image_name = $name . $separator . '.' . $suffix;

    return $image_name;

  }

}