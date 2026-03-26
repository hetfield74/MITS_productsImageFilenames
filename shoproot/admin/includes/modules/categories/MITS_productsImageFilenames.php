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
        $this->version = '1.4.0';
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
        $this->dbChanges();
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

        $this->dbChanges();

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
          $const_prefix . 'SEPARATOR',
          $const_prefix . 'SAVE_SIZES',
        );
    }

    /**
     * @return void
     */
    public function dbChanges(): void
    {
        $const_prefix = $this->name . '_';
        if (!defined($const_prefix . 'STATUS')) {
            xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('" . $const_prefix . "STATUS', 'true', 6, 1,'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
        }
        if (!defined($const_prefix . 'SORT_ORDER')) {
            xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, date_added) VALUES ('" . $const_prefix . "SORT_ORDER', '10', 6, 3, now())");
        }
        if (!defined($const_prefix . 'FILENAME')) {
            xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('" . $const_prefix . "FILENAME', 'Filename', 6, 4, 'xtc_cfg_select_option(array(\'None\', \'Filename\', \'Productsname\'), ', now())");
        }
        if (!defined($const_prefix . 'ADD_ID')) {
            xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('" . $const_prefix . "ADD_ID', 'true', 6, 5,'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
        }
        if (!defined($const_prefix . 'ADD_COUNTER')) {
            xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('" . $const_prefix . "ADD_COUNTER', 'true', 6, 6,'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
        }
        if (!defined($const_prefix . 'LOWERNAME')) {
            xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('" . $const_prefix . "LOWERNAME', 'true', 6, 7,'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
        }
        if (!defined($const_prefix . 'LOWERSUFFIX')) {
            xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('" . $const_prefix . "LOWERSUFFIX', 'true', 6, 8,'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
        }
        if (!defined($const_prefix . 'SEPARATOR')) {
            xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('" . $const_prefix . "SEPARATOR', '_', 6, 8,'xtc_cfg_select_option(array(\'-\', \'_\'), ', now())");
        }
        if (!defined($const_prefix . 'SAVE_SIZES')) {
            xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('" . $const_prefix . "SAVE_SIZES', 'true', 6, 9,'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
        }
        if (!defined($const_prefix . 'VERSION')) {
            xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('" . $const_prefix . "VERSION', '" . $this->version . "', 6, 99, NULL, now())");
        } else {
            xtc_db_query("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = '" . $this->version . "' WHERE configuration_key = '" . $const_prefix . "VERSION'");
        }

        if (!$this->columnExists(TABLE_PRODUCTS, 'products_image_sizes')) {
            xtc_db_query("ALTER TABLE " . TABLE_PRODUCTS . " ADD COLUMN products_image_sizes TEXT NULL");
        }
        if (!$this->columnExists(TABLE_CATEGORIES, 'categories_image_sizes')) {
            xtc_db_query("ALTER TABLE " . TABLE_CATEGORIES . " ADD COLUMN categories_image_sizes TEXT NULL");
        }
    }


    /**
     * @param $table
     * @param $column
     * @return bool
     */
    private function columnExists($table, $column): bool
    {
        $res = xtc_db_query("SHOW COLUMNS FROM {$table} LIKE '{$column}'");
        return xtc_db_num_rows($res) > 0;
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
        $cat_images = '';
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

        if (self::strContains($counter, 'list') && !isset($data_arr['products_id'])) {
            $cat_images = '_list';
        } elseif (self::strContains($counter, 'mobile') && !isset($data_arr['products_id'])) {
            $cat_images = '_mobile';
        }

        return $name . $separator . $cat_images . '.' . $suffix;
    }

    /**
     * @param array $products_data Die gesendeten Produktdaten
     * @param int $products_id Die ID des Produkts
     */
    public function insert_product_after(array $products_data, int $products_id): void
    {
        if (defined($this->name . '_SAVE_SIZES') && constant($this->name . '_SAVE_SIZES') == 'true') {
            $image_query = xtc_db_query("SELECT products_image FROM " . TABLE_PRODUCTS . " WHERE products_id = " . (int)$products_id);
            $image_data = xtc_db_fetch_array($image_query);

            $filename = $image_data['products_image'];

            if (empty($filename)) {
                return;
            }

            $types = ['mini', 'thumbnail', 'midi', 'info', 'popup'];
            $image_sizes = [];

            foreach ($types as $type) {
                $constant_name = 'DIR_WS_' . strtoupper($type) . '_IMAGES';
                $path = defined($constant_name) ? constant($constant_name) : 'images/product_images/' . $type . '_images/';

                $full_path = DIR_FS_CATALOG . $path . $filename;

                if (defined('IMAGE_TYPE_EXTENSION') && IMAGE_TYPE_EXTENSION != 'default') {
                    $path_info = pathinfo($full_path);
                    $alt_path = $path_info['dirname'] . '/' . $path_info['filename'] . '.' . IMAGE_TYPE_EXTENSION;
                    if (is_file($alt_path)) {
                        $full_path = $alt_path;
                    }
                }

                if (is_file($full_path)) {
                    $size = getimagesize($full_path);
                    if ($size) {
                        $image_sizes[$type] = [
                          'w' => $size[0],
                          'h' => $size[1]
                        ];
                    }
                }
            }

            if (!empty($image_sizes)) {
                xtc_db_query(
                  "UPDATE " . TABLE_PRODUCTS . " 
                      SET products_image_sizes = '" . xtc_db_input(json_encode($image_sizes)) . "' 
                      WHERE products_id = " . (int)$products_id
                );
            }
        }
    }

    /**
     * Hook für Kategorienbilder
     * @param string $image_name Der Name der Bilddatei
     * @param string $image_type (Optional, falls vom System übergeben)
     */
    public function categories_image_process(string $image_name, string $image_type = ''): void
    {
        if (defined($this->name . '_SAVE_SIZES') && constant($this->name . '_SAVE_SIZES') == 'true') {
            $cID = (isset($_GET['cID'])) ? (int)$_GET['cID'] : 0;

            if ($cID === 0 || empty($image_name)) {
                return;
            }

            $image_sizes = [];
            $path = defined('DIR_WS_CATEGORIES_IMAGES') ? DIR_WS_CATEGORIES_IMAGES : 'images/categories/';

            $suffixes = ['', '_list', '_mobile'];

            $dot_pos = strrpos($image_name, '.');
            $base_name = substr($image_name, 0, $dot_pos);
            $extension = substr($image_name, $dot_pos);

            foreach ($suffixes as $suffix) {
                $current_filename = $base_name . $suffix . $extension;
                $full_path = DIR_FS_CATALOG . $path . $current_filename;

                if (defined('IMAGE_TYPE_EXTENSION') && IMAGE_TYPE_EXTENSION != 'default') {
                    $alt_path = DIR_FS_CATALOG . $path . $base_name . $suffix . '.' . IMAGE_TYPE_EXTENSION;
                    if (is_file($alt_path)) {
                        $full_path = $alt_path;
                    }
                }

                if (is_file($full_path)) {
                    $size = getimagesize($full_path);
                    if ($size) {
                        $key = ($suffix == '') ? 'default' : ltrim($suffix, '_');
                        $image_sizes[$key] = [
                          'w' => $size[0],
                          'h' => $size[1]
                        ];
                    }
                }
            }

            if (!empty($image_sizes)) {
                xtc_db_query("UPDATE " . TABLE_CATEGORIES . " 
                      SET categories_image_sizes = '" . xtc_db_input(json_encode($image_sizes)) . "' 
                      WHERE categories_id = '" . (int)$cID . "'");
            }
        }
    }

    /**
     * Fallback für str_contains() – kompatibel mit PHP 7+
     *
     * @param string $haystack Suchtext
     * @param string $needle Suchbegriff
     * @return bool
     */
    protected static function strContains(string $haystack, string $needle): bool
    {
        return function_exists('str_contains')
          ? str_contains($haystack, $needle)
          : ($needle !== '' && strpos($haystack, $needle) !== false);
    }

}
