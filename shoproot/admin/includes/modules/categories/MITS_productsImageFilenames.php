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

class MITS_productsImageFilenames
{
    public string $code;
    public string $name;
    public string $version;
    public mixed $sort_order;
    public string $title;
    public string $description;
    public mixed $do_update;
    public bool $enabled;
    private bool $_check;

    /**
     *
     */
    public function __construct()
    {
        $this->code = 'MITS_productsImageFilenames';
        $this->name = 'MODULE_CATEGORIES_' . strtoupper($this->code);
        $this->version = '1.3.1';
        $this->sort_order = defined($this->name . '_SORT_ORDER') ? constant($this->name . '_SORT_ORDER') : 0;
        $this->enabled = defined($this->name . '_STATUS') && (constant($this->name . '_STATUS') == 'true');

        if (defined($this->name . '_VERSION') && $this->version != constant($this->name . '_VERSION')) {
            $this->do_update = (defined($this->name . '_UPDATE_AVAILABLE_TITLE')) ? constant($this->name . '_UPDATE_AVAILABLE_TITLE') : '';
        } else {
            $this->do_update = '';
        }

        $this->title = (defined($this->name . '_TITLE') ? constant($this->name . '_TITLE') : $this->code) . ' - v' . $this->version . $this->do_update;
        $this->description = '';
        if ($this->do_update != '') {
            $this->description .= '<a class="button btnbox but_green" style="text-align:center;" onclick="this.blur();" href="' . xtc_href_link(FILENAME_MODULES, 'set=' . $_GET['set'] . '&module=' . $this->code . '&action=update&box=1') . '">' . constant($this->name . '_UPDATE_MODUL') . '</a><br>';
        }
        $this->description .= defined($this->name . '_DESCRIPTION') ? constant($this->name . '_DESCRIPTION') . '<hr style="margin:10px 0">' : '';

        if (!$this->enabled) {
            $this->description .= '<div style="text-align:center;margin:30px 0"><a class="button but_red" style="text-align:center;" onclick="return confirmLink(\'' . constant($this->name . '_CONFIRM_DELETE_MODUL') . '\', \'\' ,this);" href="' . xtc_href_link(FILENAME_MODULES, 'set=categories&module=' . $this->code . '&action=custom') . '">' . constant(
                $this->name . '_DELETE_MODUL'
              ) . '</a></div><br>';
        }
    }

    /**
     * @return true
     */
    public function check()
    {
        if (!isset($this->_check)) {
            if (defined($this->name . '_STATUS')) {
                $this->_check = true;
            } else {
                $check_query = xtc_db_query("SELECT configuration_value FROM " . TABLE_CONFIGURATION . " WHERE configuration_key = '" . $this->name . "_STATUS'");
                $this->_check = xtc_db_num_rows($check_query);
            }
        }
        return $this->_check;
    }

    /**
     * @return void
     */
    public function install(): void
    {
        $const_prefix = $this->name . '_';
        xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('" . $const_prefix . "STATUS', 'true', 6, 1,'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
        xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, date_added) VALUES ('" . $const_prefix . "SORT_ORDER', '10', 6, 3, now())");
        xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('" . $const_prefix . "FILENAME', 'Filename', 6, 4, 'xtc_cfg_select_option(array(\'None\', \'Filename\', \'Productsname\'), ', now())");
        xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('" . $const_prefix . "ADD_ID', 'true', 6, 5,'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
        xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('" . $const_prefix . "ADD_COUNTER', 'true', 6, 6,'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
        xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('" . $const_prefix . "LOWERNAME', 'true', 6, 7,'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
        xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('" . $const_prefix . "LOWERSUFFIX', 'true', 6, 8,'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
        xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('" . $const_prefix . "SEPARATOR', '_', 6, 8,'xtc_cfg_select_option(array(\'-\', \'_\'), ', now())");
        xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('" . $const_prefix . "VERSION', '" . $this->version . "', 6, 99, NULL, now())");
    }

    /**
     * @return void
     */
    public function remove(): void
    {
        xtc_db_query("DELETE FROM " . TABLE_CONFIGURATION . " WHERE configuration_key LIKE '" . $this->name . "_%'");
    }

    /**
     * @return void
     */
    public function update(): void
    {
        global $messageStack;

        $const_prefix = $this->name . '_';

        xtc_db_query("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = '" . $this->version . "' WHERE configuration_key = '" . $this->name . "_VERSION'");

        if (!defined($const_prefix . 'SEPARATOR')) {
            xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('" . $const_prefix . "SEPARATOR', '_', 6, 8,'xtc_cfg_select_option(array(\'-\', \'_\'), ', now())");
        }

        $messageStack->add_session(constant($this->name . '_UPDATE_FINISHED'), 'success');
    }

    /**
     * @return void
     */
    public function custom(): void
    {
        global $messageStack;

        $this->remove();
        $this->removeModulfiles();

        $messageStack->add_session(constant($this->name . '_DELETE_FINISHED'), 'success');
    }

    /**
     * @return string[]
     */
    public function keys(): array
    {
        $const_prefix = $this->name . '_';
        return array(
          $const_prefix . 'STATUS',
          $const_prefix . 'SORT_ORDER',
          $const_prefix . 'FILENAME',
          $const_prefix . 'ADD_ID',
          $const_prefix . 'ADD_COUNTER',
          $const_prefix . 'LOWERNAME',
          $const_prefix . 'LOWERSUFFIX',
          $const_prefix . 'SEPARATOR'
        );
    }

    /**
     * @return void
     */
    protected function removeModulfiles(): void
    {
        $remove_files_array = array(
          DIR_FS_DOCUMENT_ROOT . (defined('DIR_ADMIN') ? DIR_ADMIN : 'admin/') . 'includes/modules/categories/' . $this->code . '.php',
          DIR_FS_DOCUMENT_ROOT . 'lang/english/modules/categories/' . $this->code . '.php',
          DIR_FS_DOCUMENT_ROOT . 'lang/german/modules/categories/' . $this->code . '.php',
        );

        foreach ($remove_files_array as $delete_file) {
            if (is_file($delete_file)) {
                unlink($delete_file);
            }
        }
    }

    /**
     * @param $image_name
     * @param $id
     * @param $counter
     * @param $suffix
     * @param $name_arr
     * @param $srcID
     * @param $data_arr
     * @return string
     */
    public function image_name($image_name, $id, $counter, $suffix, $name_arr, $srcID, $data_arr): string
    {
        $catimages = '';
        $const_prefix = $this->name . '_';

        // Dateiname des Bildes nach Upload beibehalten oder aus dem Artikelname/Kategoriename generieren, ansonsten wird der Dateiname des Bildes wie gewohnt aus der ID gebildet
        if (constant($const_prefix . 'FILENAME') == 'Filename' && isset($name_arr)) {
            $img_file_name = (is_array($name_arr)) ? array_shift($name_arr) : $name_arr;
            if ($img_file_name != '') {
                include_once(DIR_FS_INC . 'seo_url_href_mask.php');
                $name = seo_url_href_mask($img_file_name);
            } else {
                $name = '';
            }
        } elseif (constant($const_prefix . 'FILENAME') == 'Productsname') {
            if (isset($data_arr['products_name'])) {
                include_once(DIR_FS_INC . 'seo_url_href_mask.php');
                $name = str_replace('/', constant($const_prefix . 'SEPARATOR'), seo_url_href_mask($data_arr['products_name'][$_SESSION['languages_id']]));
            } elseif (isset($data_arr['categories_name'])) {
                include_once(DIR_FS_INC . 'seo_url_href_mask.php');
                $name = str_replace('/', constant($const_prefix . 'SEPARATOR'), seo_url_href_mask($data_arr['categories_name'][$_SESSION['languages_id']]));
            } else {
                $name = '';
            }
        } else {
            $name = '';
        }

        // Dateiendung in Kleinbuchstaben erzwingen (empfohlen)
        if (constant($const_prefix . 'LOWERSUFFIX') == 'true') {
            $suffix = strtolower($suffix);
        }

        // Trenner mit Zähler hinzufügen (empfohlen)
        if (constant($const_prefix . 'ADD_COUNTER') == 'false' && constant($const_prefix . 'FILENAME') == 'Filename') {
            $separator = '';
            if (self::strContains($image_name, '_list.') && isset($data_arr['categories_name'])) {
                $catimages = '_list';
            } elseif (self::strContains($image_name, '_mobile.') && isset($data_arr['categories_name'])) {
                $catimages = '_mobile';
            }
        } else {
            $separator = (isset($counter) && (int)$counter > 0) ? constant($const_prefix . 'SEPARATOR') . $counter : '';
        }

        // products_id/categories_id in dem Dateinamen integrieren (empfohlen) oder Pflicht bei Auswahl FILENAME = None
        if (constant($const_prefix . 'ADD_ID') == 'true' || constant($const_prefix . 'FILENAME') == 'None' || $name == '') {
            if (constant($const_prefix . 'FILENAME') == 'None' || $name == '') {
                $name = $id;
            } else {
                $name = $name . constant($const_prefix . 'SEPARATOR') . $id;
            }
        }

        if (constant($const_prefix  . 'LOWERNAME') == 'true') {
            $name = mb_strtolower($name, 'UTF-8');
        }

        return $name . $separator . $catimages . '.' . $suffix;
    }

    /**
     * Fallback für str_contains() – kompatibel mit PHP 7+
     *
     * @param string $haystack Suchtext
     * @param string $needle Suchbegriff
     * @return bool
     */
    protected static function strContains($haystack, $needle): bool
    {
        return function_exists('str_contains')
          ? str_contains($haystack, $needle)
          : ($needle !== '' && strpos($haystack, $needle) !== false);
    }

}
