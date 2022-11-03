---
menuTitle: displayCustomization
title: displayCustomization
hidden: true
files:
  - classes/Product.php
types:
  - frontoffice
hookTypes:
  - legacy
---

# Hook : displayCustomization

Located in :

  - classes/Product.php

## Parameters

```php
Hook::exec('displayCustomization', ['customization' => $row], (int) $row['id_module']);
            }
            $customized_datas[(int) $row['id_product']][(int) $row['id_product_attribute']][(int) $row['id_address_delivery']][(int) $row['id_customization']]['datas'][(int) $row['type']][] = $row;
        }

        if (!$result = Db::getInstance()->executeS(
            'SELECT `id_product`, `id_product_attribute`, `id_customization`, `id_address_delivery`, `quantity`, `quantity_refunded`, `quantity_returned`
            FROM `' . _DB_PREFIX_ . 'customization`
            WHERE `id_cart` = ' . (int) $id_cart .
            ((int) $id_customization ? ' AND `id_customization` = ' . (int) $id_customization : '') .
            ($only_in_cart ? ' AND `in_cart` = 1' : '')
        )) {
            return false;
        }

        foreach ($result as $row) {
            $customized_datas[(int) $row['id_product']][(int) $row['id_product_attribute']][(int) $row['id_address_delivery']][(int) $row['id_customization']]['quantity'] = (int) $row['quantity'];
            $customized_datas[(int) $row['id_product']][(int) $row['id_product_attribute']][(int) $row['id_address_delivery']][(int) $row['id_customization']]['quantity_refunded'] = (int) $row['quantity_refunded'];
            $customized_datas[(int) $row['id_product']][(int) $row['id_product_attribute']][(int) $row['id_address_delivery']][(int) $row['id_customization']]['quantity_returned'] = (int) $row['quantity_returned'];
            $customized_datas[(int) $row['id_product']][(int) $row['id_product_attribute']][(int) $row['id_address_delivery']][(int) $row['id_customization']]['id_customization'] = (int) $row['id_customization'];
        }

        return $customized_datas;
    }

    /**
     * @param array $products
     * @param array $customized_datas
     */
    public static function addCustomizationPrice(&$products, &$customized_datas)
    {
        if (!$customized_datas) {
            return;
        }

        foreach ($products as &$product_update) {
            if (!Customization::isFeatureActive()) {
                $product_update['customizationQuantityTotal'] = 0;
                $product_update['customizationQuantityRefunded'] = 0;
                $product_update['customizationQuantityReturned'] = 0;
            } else {
                $customization_quantity = 0;
                $customization_quantity_refunded = 0;
                $customization_quantity_returned = 0;

                /* Compatibility */
                $product_id = isset($product_update['id_product']) ? (int) $product_update['id_product'] : (int) $product_update['product_id'];
                $product_attribute_id = isset($product_update['id_product_attribute']) ? (int) $product_update['id_product_attribute'] : (int) $product_update['product_attribute_id'];
                $id_address_delivery = (int) $product_update['id_address_delivery'];
                $product_quantity = isset($product_update['cart_quantity']) ? (int) $product_update['cart_quantity'] : (int) $product_update['product_quantity'];
                $price = isset($product_update['price']) ? $product_update['price'] : $product_update['product_price'];
                if (isset($product_update['price_wt']) && $product_update['price_wt']) {
                    $price_wt = $product_update['price_wt'];
                } else {
                    $price_wt = $price * (1 + ((isset($product_update['tax_rate']) ? $product_update['tax_rate'] : $product_update['rate']) * 0.01));
                }

                if (!isset($customized_datas[$product_id][$product_attribute_id][$id_address_delivery])) {
                    $id_address_delivery = 0;
                }
                if (isset($customized_datas[$product_id][$product_attribute_id][$id_address_delivery])) {
                    foreach ($customized_datas[$product_id][$product_attribute_id][$id_address_delivery] as $customization) {
                        if ((int) $product_update['id_customization'] && $customization['id_customization'] != $product_update['id_customization']) {
                            continue;
                        }
                        $customization_quantity += (int) $customization['quantity'];
                        $customization_quantity_refunded += (int) $customization['quantity_refunded'];
                        $customization_quantity_returned += (int) $customization['quantity_returned'];
                    }
                }

                $product_update['customizationQuantityTotal'] = $customization_quantity;
                $product_update['customizationQuantityRefunded'] = $customization_quantity_refunded;
                $product_update['customizationQuantityReturned'] = $customization_quantity_returned;

                if ($customization_quantity) {
                    $product_update['total_wt'] = $price_wt * ($product_quantity - $customization_quantity);
                    $product_update['total_customization_wt'] = $price_wt * $customization_quantity;
                    $product_update['total'] = $price * ($product_quantity - $customization_quantity);
                    $product_update['total_customization'] = $price * $customization_quantity;
                }
            }
        }
    }

    /**
     * Add customization price for a single product
     *
     * @param array $product Product data
     * @param array $customized_datas Customized data
     */
    public static function addProductCustomizationPrice(&$product, &$customized_datas)
    {
        if (!$customized_datas) {
            return;
        }

        $products = [$product];
        self::addCustomizationPrice($products, $customized_datas);
        $product = $products[0];
    }

    /**
     * Customization fields label management
     *
     * @param string $field
     * @param string $value
     *
     * @return array|false
     */
    protected function _checkLabelField($field, $value)
    {
        if (!Validate::isLabel($value)) {
            return false;
        }
        $tmp = explode('_', $field);
        if (count($tmp) < 4) {
            return false;
        }

        return $tmp;
    }

    /**
     * @return bool
     */
    protected function _deleteOldLabels()
    {
        $max = [
            Product::CUSTOMIZE_FILE => (int) $this->uploadable_files,
            Product::CUSTOMIZE_TEXTFIELD => (int) $this->text_fields,
        ];

        /* Get customization field ids */
        if ((
            $result = Db::getInstance()->executeS(
            'SELECT `id_customization_field`, `type`
            FROM `' . _DB_PREFIX_ . 'customization_field`
            WHERE `id_product` = ' . (int) $this->id . '
            ORDER BY `id_customization_field`'
            )
        ) === false) {
            return false;
        }

        if (empty($result)) {
            return true;
        }

        $customization_fields = [
            Product::CUSTOMIZE_FILE => [],
            Product::CUSTOMIZE_TEXTFIELD => [],
        ];

        foreach ($result as $row) {
            $customization_fields[(int) $row['type']][] = (int) $row['id_customization_field'];
        }

        $extra_file = count($customization_fields[Product::CUSTOMIZE_FILE]) - $max[Product::CUSTOMIZE_FILE];
        $extra_text = count($customization_fields[Product::CUSTOMIZE_TEXTFIELD]) - $max[Product::CUSTOMIZE_TEXTFIELD];

        /* If too much inside the database, deletion */
        if ($extra_file > 0 && count($customization_fields[Product::CUSTOMIZE_FILE]) - $extra_file >= 0 &&
        (!Db::getInstance()->execute(
            'DELETE `' . _DB_PREFIX_ . 'customization_field`,`' . _DB_PREFIX_ . 'customization_field_lang`
            FROM `' . _DB_PREFIX_ . 'customization_field` JOIN `' . _DB_PREFIX_ . 'customization_field_lang`
            WHERE `' . _DB_PREFIX_ . 'customization_field`.`id_product` = ' . (int) $this->id . '
            AND `' . _DB_PREFIX_ . 'customization_field`.`type` = ' . Product::CUSTOMIZE_FILE . '
            AND `' . _DB_PREFIX_ . 'customization_field_lang`.`id_customization_field` = `' . _DB_PREFIX_ . 'customization_field`.`id_customization_field`
            AND `' . _DB_PREFIX_ . 'customization_field`.`id_customization_field` >= ' . (int) $customization_fields[Product::CUSTOMIZE_FILE][count($customization_fields[Product::CUSTOMIZE_FILE]) - $extra_file]
        ))) {
            return false;
        }

        if ($extra_text > 0 && count($customization_fields[Product::CUSTOMIZE_TEXTFIELD]) - $extra_text >= 0 &&
        (!Db::getInstance()->execute(
            'DELETE `' . _DB_PREFIX_ . 'customization_field`,`' . _DB_PREFIX_ . 'customization_field_lang`
            FROM `' . _DB_PREFIX_ . 'customization_field` JOIN `' . _DB_PREFIX_ . 'customization_field_lang`
            WHERE `' . _DB_PREFIX_ . 'customization_field`.`id_product` = ' . (int) $this->id . '
            AND `' . _DB_PREFIX_ . 'customization_field`.`type` = ' . Product::CUSTOMIZE_TEXTFIELD . '
            AND `' . _DB_PREFIX_ . 'customization_field_lang`.`id_customization_field` = `' . _DB_PREFIX_ . 'customization_field`.`id_customization_field`
            AND `' . _DB_PREFIX_ . 'customization_field`.`id_customization_field` >= ' . (int) $customization_fields[Product::CUSTOMIZE_TEXTFIELD][count($customization_fields[Product::CUSTOMIZE_TEXTFIELD]) - $extra_text]
        ))) {
            return false;
        }

        // Refresh cache of feature detachable
        Configuration::updateGlobalValue('PS_CUSTOMIZATION_FEATURE_ACTIVE', Customization::isCurrentlyUsed());

        return true;
    }

    /**
     * @param array $languages An array of language data
     * @param int $type Product::CUSTOMIZE_FILE or Product::CUSTOMIZE_TEXTFIELD
     *
     * @return bool
     */
    protected function _createLabel($languages, $type)
    {
        // Label insertion
        if (!Db::getInstance()->execute('
            INSERT INTO `' . _DB_PREFIX_ . 'customization_field` (`id_product`, `type`, `required`)
            VALUES (' . (int) $this->id . ', ' . (int) $type . ', 0)') ||
            !$id_customization_field = (int) Db::getInstance()->Insert_ID()) {
            return false;
        }

        // Multilingual label name creation
        $values = '';

        foreach ($languages as $language) {
            foreach (Shop::getContextListShopID() as $id_shop) {
                $values .= '(' . (int) $id_customization_field . ', ' . (int) $language['id_lang'] . ', ' . (int) $id_shop . ',\'\'), ';
            }
        }

        $values = rtrim($values, ', ');
        if (!Db::getInstance()->execute('
            INSERT INTO `' . _DB_PREFIX_ . 'customization_field_lang` (`id_customization_field`, `id_lang`, `id_shop`, `name`)
            VALUES ' . $values)) {
            return false;
        }

        // Set cache of feature detachable to true
        Configuration::updateGlobalValue('PS_CUSTOMIZATION_FEATURE_ACTIVE', '1');

        return true;
    }

    /**
     * @param int $uploadable_files
     * @param int $text_fields
     *
     * @return bool
     */
    public function createLabels($uploadable_files, $text_fields)
    {
        $languages = Language::getLanguages();
        if ((int) $uploadable_files > 0) {
            for ($i = 0; $i < (int) $uploadable_files; ++$i) {
                if (!$this->_createLabel($languages, Product::CUSTOMIZE_FILE)) {
                    return false;
                }
            }
        }

        if ((int) $text_fields > 0) {
            for ($i = 0; $i < (int) $text_fields; ++$i) {
                if (!$this->_createLabel($languages, Product::CUSTOMIZE_TEXTFIELD)) {
                    return false;
                }
            }
        }

        return true;
    }

    /**
     * @return bool
     */
    public function updateLabels()
    {
        $has_required_fields = 0;
        foreach ($_POST as $field => $value) {
            /* Label update */
            if (strncmp($field, 'label_', 6) == 0) {
                if (!$tmp = $this->_checkLabelField($field, $value)) {
                    return false;
                }
                /* Multilingual label name update */
                if (Shop::isFeatureActive()) {
                    foreach (Shop::getContextListShopID() as $id_shop) {
                        if (!Db::getInstance()->execute('INSERT INTO `' . _DB_PREFIX_ . 'customization_field_lang`
                        (`id_customization_field`, `id_lang`, `id_shop`, `name`) VALUES (' . (int) $tmp[2] . ', ' . (int) $tmp[3] . ', ' . (int) $id_shop . ', \'' . pSQL($value) . '\')
                        ON DUPLICATE KEY UPDATE `name` = \'' . pSQL($value) . '\'')) {
                            return false;
                        }
                    }
                } elseif (!Db::getInstance()->execute('
                    INSERT INTO `' . _DB_PREFIX_ . 'customization_field_lang`
                    (`id_customization_field`, `id_lang`, `name`) VALUES (' . (int) $tmp[2] . ', ' . (int) $tmp[3] . ', \'' . pSQL($value) . '\')
                    ON DUPLICATE KEY UPDATE `name` = \'' . pSQL($value) . '\'')) {
                    return false;
                }

                $is_required = isset($_POST['require_' . (int) $tmp[1] . '_' . (int) $tmp[2]]) ? 1 : 0;
                $has_required_fields |= $is_required;
                /* Require option update */
                if (!Db::getInstance()->execute(
                    'UPDATE `' . _DB_PREFIX_ . 'customization_field`
                    SET `required` = ' . (int) $is_required . '
                    WHERE `id_customization_field` = ' . (int) $tmp[2]
                )) {
                    return false;
                }
            }
        }

        if ($has_required_fields && !ObjectModel::updateMultishopTable('product', ['customizable' => 2], 'a.id_product = ' . (int) $this->id)) {
            return false;
        }

        if (!$this->_deleteOldLabels()) {
            return false;
        }

        return true;
    }

    /**
     * @param int|false $id_lang Language identifier
     * @param int|null $id_shop Shop identifier
     *
     * @return array|bool
     */
    public function getCustomizationFields($id_lang = false, $id_shop = null)
    {
        if (!Customization::isFeatureActive()) {
            return false;
        }

        if (Shop::isFeatureActive() && !$id_shop) {
            $id_shop = (int) Context::getContext()->shop->id;
        }

        // Hide the modules fields in the front-office
        // When a module adds a customization programmatically, it should set the `is_module` to 1
        $context = Context::getContext();
        $front = isset($context->controller->controller_type) && in_array($context->controller->controller_type, ['front']);

        if (!$result = Db::getInstance()->executeS(
            'SELECT cf.`id_customization_field`, cf.`type`, cf.`required`, cfl.`name`, cfl.`id_lang`
            FROM `' . _DB_PREFIX_ . 'customization_field` cf
            NATURAL JOIN `' . _DB_PREFIX_ . 'customization_field_lang` cfl
            WHERE cf.`id_product` = ' . (int) $this->id . ($id_lang ? ' AND cfl.`id_lang` = ' . (int) $id_lang : '') .
            ($id_shop ? ' AND cfl.`id_shop` = ' . (int) $id_shop : '') .
            ($front ? ' AND !cf.`is_module`' : '') . '
            AND cf.`is_deleted` = 0
            ORDER BY cf.`id_customization_field`')
        ) {
            return false;
        }

        if ($id_lang) {
            return $result;
        }

        $customization_fields = [];
        foreach ($result as $row) {
            $customization_fields[(int) $row['type']][(int) $row['id_customization_field']][(int) $row['id_lang']] = $row;
        }

        return $customization_fields;
    }

    /**
     * check if product has an activated and required customizationFields.
     *
     * @return bool
     *
     * @throws PrestaShopDatabaseException
     */
    public function hasActivatedRequiredCustomizableFields()
    {
        if (!Customization::isFeatureActive()) {
            return false;
        }

        return (bool) Db::getInstance()->executeS(
            '
            SELECT 1
            FROM `' . _DB_PREFIX_ . 'customization_field`
            WHERE `id_product` = ' . (int) $this->id . '
            AND `required` = 1
            AND `is_deleted` = 0'
        );
    }

    /**
     * @return array
     */
    public function getCustomizationFieldIds()
    {
        if (!Customization::isFeatureActive()) {
            return [];
        }

        return Db::getInstance()->executeS('
            SELECT `id_customization_field`, `type`, `required`
            FROM `' . _DB_PREFIX_ . 'customization_field`
            WHERE `id_product` = ' . (int) $this->id);
    }

    /**
     * @return array
     */
    public function getNonDeletedCustomizationFieldIds()
    {
        if (!Customization::isFeatureActive()) {
            return [];
        }

        $results = Db::getInstance()->executeS('
            SELECT `id_customization_field`
            FROM `' . _DB_PREFIX_ . 'customization_field`
            WHERE `is_deleted` = 0
            AND `id_product` = ' . (int) $this->id
        );

        return array_map(function ($result) {
            return (int) $result['id_customization_field'];
        }, $results);
    }

    /**
     * @param int $fieldType |null
     *
     * @return int
     *
     * @throws PrestaShopDatabaseException
     */
    public function countCustomizationFields(?int $fieldType = null): int
    {
        $query = '
            SELECT COUNT(`id_customization_field`) as customizations_count
            FROM `' . _DB_PREFIX_ . 'customization_field`
            WHERE `is_deleted` = 0
            AND `id_product` = ' . (int) $this->id
        ;

        if (null !== $fieldType) {
            $query .= sprintf(' AND type = %d', $fieldType);
        }

        $results = Db::getInstance()->executeS($query);

        if (empty($results)) {
            return 0;
        }

        return (int) reset($results)['customizations_count'];
    }

    /**
     * @return array
     */
    public function getRequiredCustomizableFields()
    {
        if (!Customization::isFeatureActive()) {
            return [];
        }

        return Product::getRequiredCustomizableFieldsStatic($this->id);
    }

    /**
     * @param int $id Product identifier
     *
     * @return array
     */
    public static function getRequiredCustomizableFieldsStatic($id)
    {
        if (!$id || !Customization::isFeatureActive()) {
            return [];
        }

        return Db::getInstance()->executeS(
            '
            SELECT `id_customization_field`, `type`
            FROM `' . _DB_PREFIX_ . 'customization_field`
            WHERE `id_product` = ' . (int) $id . '
            AND `required` = 1 AND `is_deleted` = 0'
        );
    }

    /**
     * @param Context|null $context
     *
     * @return bool
     */
    public function hasAllRequiredCustomizableFields(Context $context = null)
    {
        if (!Customization::isFeatureActive()) {
            return true;
        }
        if (!$context) {
            $context = Context::getContext();
        }

        $fields = $context->cart->getProductCustomization($this->id, null, true);
        $required_fields = $this->getRequiredCustomizableFields();

        $fields_present = [];
        foreach ($fields as $field) {
            $fields_present[] = ['id_customization_field' => $field['index'], 'type' => $field['type']];
        }

        foreach ($required_fields as $required_field) {
            if (!in_array($required_field, $fields_present)) {
                return false;
            }
        }

        return true;
    }

    /**
     * Return the list of old temp products.
     *
     * @return array
     */
    public static function getOldTempProducts()
    {
        $sql = 'SELECT id_product FROM `' . _DB_PREFIX_ . 'product` WHERE state=' . Product::STATE_TEMP . ' AND date_upd < NOW() - INTERVAL 1 DAY';

        return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql, true, false);
    }

    /**
     * Checks if the product is in at least one of the submited categories.
     *
     * @param int $id_product Product identifier
     * @param array $categories array of category arrays
     *
     * @return bool is the product in at least one category
     */
    public static function idIsOnCategoryId($id_product, $categories)
    {
        if (!((int) $id_product > 0) || !is_array($categories) || empty($categories)) {
            return false;
        }
        $sql = 'SELECT id_product FROM `' . _DB_PREFIX_ . 'category_product` WHERE `id_product` = ' . (int) $id_product . ' AND `id_category` IN (';
        foreach ($categories as $category) {
            $sql .= (int) $category['id_category'] . ',';
        }
        $sql = rtrim($sql, ',') . ')';

        $hash = md5($sql);
        if (!isset(self::$_incat[$hash])) {
            if (!Db::getInstance(_PS_USE_SQL_SLAVE_)->getValue($sql)) {
                return false;
            }
            self::$_incat[$hash] = (Db::getInstance(_PS_USE_SQL_SLAVE_)->numRows() > 0 ? true : false);
        }

        return self::$_incat[$hash];
    }

    /**
     * @return string
     */
    public function getNoPackPrice()
    {
        $context = Context::getContext();

        return Tools::getContextLocale($context)->formatPrice(Pack::noPackPrice((int) $this->id), $context->currency->iso_code);
    }

    /**
     * @param int $id_customer Customer identifier
     *
     * @return bool
     */
    public function checkAccess($id_customer)
    {
        return Product::checkAccessStatic((int) $this->id, (int) $id_customer);
    }

    /**
     * @param int $id_product Product identifier
     * @param int|bool $id_customer Customer identifier
     *
     * @return bool
     */
    public static function checkAccessStatic($id_product, $id_customer)
    {
        if (!Group::isFeatureActive()) {
            return true;
        }

        $cache_id = 'Product::checkAccess_' . (int) $id_product . '-' . (int) $id_customer . (!$id_customer ? '-' . (int) Group::getCurrent()->id : '');
        if (!Cache::isStored($cache_id)) {
            if (!$id_customer) {
                $result = (bool) Db::getInstance(_PS_USE_SQL_SLAVE_)->getValue('
                SELECT ctg.`id_group`
                FROM `' . _DB_PREFIX_ . 'category_product` cp
                INNER JOIN `' . _DB_PREFIX_ . 'category_group` ctg ON (ctg.`id_category` = cp.`id_category`)
                WHERE cp.`id_product` = ' . (int) $id_product . ' AND ctg.`id_group` = ' . (int) Group::getCurrent()->id);
            } else {
                $result = (bool) Db::getInstance(_PS_USE_SQL_SLAVE_)->getValue('
                SELECT cg.`id_group`
                FROM `' . _DB_PREFIX_ . 'category_product` cp
                INNER JOIN `' . _DB_PREFIX_ . 'category_group` ctg ON (ctg.`id_category` = cp.`id_category`)
                INNER JOIN `' . _DB_PREFIX_ . 'customer_group` cg ON (cg.`id_group` = ctg.`id_group`)
                WHERE cp.`id_product` = ' . (int) $id_product . ' AND cg.`id_customer` = ' . (int) $id_customer);
            }

            Cache::store($cache_id, $result);

            return $result;
        }

        return Cache::retrieve($cache_id);
    }

    /**
     * Add a stock movement for current product.
     *
     * Since 1.5, this method only permit to add/remove available quantities of the current product in the current shop
     *
     * @see StockManager if you want to manage real stock
     * @see StockAvailable if you want to manage available quantities for sale on your shop(s)
     * @deprecated since 1.5.0
     *
     * @param int $quantity
     * @param int $id_reason StockMvtReason identifier - useless
     * @param int|null $id_product_attribute Attribute identifier
     * @param int|null $id_order Order identifier - DEPRECATED
     * @param int|null $id_employee Employee identifier - DEPRECATED
     *
     * @return bool
     */
    public function addStockMvt($quantity, $id_reason, $id_product_attribute = null, $id_order = null, $id_employee = null)
    {
        if (!$this->id || !$id_reason) {
            return false;
        }

        if ($id_product_attribute == null) {
            $id_product_attribute = 0;
        }

        $reason = new StockMvtReason((int) $id_reason);
        if (!Validate::isLoadedObject($reason)) {
            return false;
        }

        $quantity = abs((int) $quantity) * $reason->sign;

        return StockAvailable::updateQuantity($this->id, $id_product_attribute, $quantity);
    }

    /**
     * @deprecated since 1.5.0
     *
     * @param int $id_lang Language identifier
     *
     * @return array
     */
    public function getStockMvts($id_lang)
    {
        Tools::displayAsDeprecated();

        return Db::getInstance()->executeS('
            SELECT sm.id_stock_mvt, sm.date_add, sm.quantity, sm.id_order,
            CONCAT(pl.name, \' \', GROUP_CONCAT(IFNULL(al.name, \'\'), \'\')) product_name, CONCAT(e.lastname, \' \', e.firstname) employee, mrl.name reason
            FROM `' . _DB_PREFIX_ . 'stock_mvt` sm
            LEFT JOIN `' . _DB_PREFIX_ . 'product_lang` pl ON (
                sm.id_product = pl.id_product
                AND pl.id_lang = ' . (int) $id_lang . Shop::addSqlRestrictionOnLang('pl') . '
            )
            LEFT JOIN `' . _DB_PREFIX_ . 'stock_mvt_reason_lang` mrl ON (
                sm.id_stock_mvt_reason = mrl.id_stock_mvt_reason
                AND mrl.id_lang = ' . (int) $id_lang . '
            )
            LEFT JOIN `' . _DB_PREFIX_ . 'employee` e ON (
                e.id_employee = sm.id_employee
            )
            LEFT JOIN `' . _DB_PREFIX_ . 'product_attribute_combination` pac ON (
                pac.id_product_attribute = sm.id_product_attribute
            )
            LEFT JOIN `' . _DB_PREFIX_ . 'attribute_lang` al ON (
                al.id_attribute = pac.id_attribute
                AND al.id_lang = ' . (int) $id_lang . '
            )
            WHERE sm.id_product=' . (int) $this->id . '
            GROUP BY sm.id_stock_mvt
        ');
    }

    /**
     * @param int $id_product Product identifier
     *
     * @return array
     */
    public static function getUrlRewriteInformations($id_product)
    {
        return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
            SELECT pl.`id_lang`, pl.`link_rewrite`, p.`ean13`, cl.`link_rewrite` AS category_rewrite
            FROM `' . _DB_PREFIX_ . 'product` p
            LEFT JOIN `' . _DB_PREFIX_ . 'product_lang` pl ON (p.`id_product` = pl.`id_product`' . Shop::addSqlRestrictionOnLang('pl') . ')
            ' . Shop::addSqlAssociation('product', 'p') . '
            LEFT JOIN `' . _DB_PREFIX_ . 'lang` l ON (pl.`id_lang` = l.`id_lang`)
            LEFT JOIN `' . _DB_PREFIX_ . 'category_lang` cl ON (cl.`id_category` = product_shop.`id_category_default`  AND cl.`id_lang` = pl.`id_lang`' . Shop::addSqlRestrictionOnLang('cl') . ')
            WHERE p.`id_product` = ' . (int) $id_product . '
            AND l.`active` = 1
        ');
    }

    /**
     * @return int TaxRulesGroup identifier
     */
    public function getIdTaxRulesGroup()
    {
        return $this->id_tax_rules_group;
    }

    /**
     * @param int $id_product Product identifier
     * @param Context|null $context
     *
     * @return int TaxRulesGroup identifier
     */
    public static function getIdTaxRulesGroupByIdProduct($id_product, Context $context = null)
    {
        if (!$context) {
            $context = Context::getContext();
        }
        $key = 'product_id_tax_rules_group_' . (int) $id_product . '_' . (int) $context->shop->id;
        if (!Cache::isStored($key)) {
            $result = Db::getInstance(_PS_USE_SQL_SLAVE_)->getValue('
                            SELECT `id_tax_rules_group`
                            FROM `' . _DB_PREFIX_ . 'product_shop`
                            WHERE `id_product` = ' . (int) $id_product . ' AND id_shop=' . (int) $context->shop->id);
            Cache::store($key, (int) $result);

            return (int) $result;
        }

        return Cache::retrieve($key);
    }

    /**
     * Returns tax rate.
     *
     * @param Address|null $address
     *
     * @return float The total taxes rate applied to the product
     */
    public function getTaxesRate(Address $address = null)
    {
        if (!$address || !$address->id_country) {
            $address = Address::initialize();
        }

        $tax_manager = TaxManagerFactory::getManager($address, $this->id_tax_rules_group);
        $tax_calculator = $tax_manager->getTaxCalculator();

        return $tax_calculator->getTotalRate();
    }

    /**
     * Webservice getter : get product features association.
     *
     * @return array
     */
    public function getWsProductFeatures()
    {
        $rows = $this->getFeatures();
        foreach ($rows as $keyrow => $row) {
            foreach ($row as $keyfeature => $feature) {
                if ($keyfeature == 'id_feature') {
                    $rows[$keyrow]['id'] = $feature;
                    unset($rows[$keyrow]['id_feature']);
                }
                unset(
                    $rows[$keyrow]['id_product'],
                    $rows[$keyrow]['custom']
                );
            }
            asort($rows[$keyrow]);
        }

        return $rows;
    }

    /**
     * Webservice setter : set product features association.
     *
     * @param array $product_features Feature data
     *
     * @return bool
     */
    public function setWsProductFeatures($product_features)
    {
        Db::getInstance()->execute(
            '
            DELETE FROM `' . _DB_PREFIX_ . 'feature_product`
            WHERE `id_product` = ' . (int) $this->id
        );
        foreach ($product_features as $product_feature) {
            $this->addFeaturesToDB($product_feature['id'], $product_feature['id_feature_value']);
        }

        return true;
    }

    /**
     * Webservice getter : get virtual field default combination.
     *
     * @return int Default Attribute identifier
     */
    public function getWsDefaultCombination()
    {
        return Product::getDefaultAttribute($this->id);
    }

    /**
     * Webservice setter : set virtual field default combination.
     *
     * @param int $id_combination Default Attribute identifier
     *
     * @return bool
     */
    public function setWsDefaultCombination($id_combination)
    {
        $this->deleteDefaultAttributes();

        return $this->setDefaultAttribute((int) $id_combination);
    }

    /**
     * Webservice getter : get category ids of current product for association.
     *
     * @return array
     */
    public function getWsCategories()
    {
        $result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS(
            'SELECT cp.`id_category` AS id
            FROM `' . _DB_PREFIX_ . 'category_product` cp
            LEFT JOIN `' . _DB_PREFIX_ . 'category` c ON (c.id_category = cp.id_category)
            ' . Shop::addSqlAssociation('category', 'c') . '
            WHERE cp.`id_product` = ' . (int) $this->id
        );

        return $result;
    }

    /**
     * Webservice setter : set category ids of current product for association.
     *
     * @param array $category_ids category ids
     *
     * @return bool
     */
    public function setWsCategories($category_ids)
    {
        $ids = [];
        foreach ($category_ids as $value) {
            if ($value instanceof Category) {
                $ids[] = (int) $value->id;
            } elseif (is_array($value) && array_key_exists('id', $value)) {
                $ids[] = (int) $value['id'];
            } else {
                $ids[] = (int) $value;
            }
        }
        $ids = array_unique($ids);

        $positions = Db::getInstance()->executeS(
                'SELECT `id_category`, `position`
                FROM `' . _DB_PREFIX_ . 'category_product`
                WHERE `id_product` = ' . (int) $this->id
        );

        $max_positions = Db::getInstance()->executeS(
                'SELECT `id_category`, max(`position`) as maximum
                FROM `' . _DB_PREFIX_ . 'category_product`
                GROUP BY id_category'
        );

        $positions_lookup = [];
        $max_position_lookup = [];

        foreach ($positions as $row) {
            $positions_lookup[(int) $row['id_category']] = (int) $row['position'];
        }
        foreach ($max_positions as $row) {
            $max_position_lookup[(int) $row['id_category']] = (int) $row['maximum'];
        }

        $return = true;
        if ($this->deleteCategories() && !empty($ids)) {
            $sql_values = [];
            foreach ($ids as $id) {
                $pos = 1;
                if (array_key_exists((int) $id, $positions_lookup)) {
                    $pos = (int) $positions_lookup[(int) $id];
                } elseif (array_key_exists((int) $id, $max_position_lookup)) {
                    $pos = (int) $max_position_lookup[(int) $id] + 1;
                }

                $sql_values[] = '(' . (int) $id . ', ' . (int) $this->id . ', ' . $pos . ')';
            }

            $return = Db::getInstance()->execute(
                '
                INSERT INTO `' . _DB_PREFIX_ . 'category_product` (`id_category`, `id_product`, `position`)
                VALUES ' . implode(',', $sql_values)
            );
        }

        Hook::exec('actionProductUpdate', ['id_product' => (int) $this->id]);

        return $return;
    }

    /**
     * Webservice getter : get product accessories ids of current product for association.
     *
     * @return array
     */
    public function getWsAccessories()
    {
        $result = Db::getInstance()->executeS(
            'SELECT p.`id_product` AS id
            FROM `' . _DB_PREFIX_ . 'accessory` a
            LEFT JOIN `' . _DB_PREFIX_ . 'product` p ON (p.id_product = a.id_product_2)
            ' . Shop::addSqlAssociation('product', 'p') . '
            WHERE a.`id_product_1` = ' . (int) $this->id
        );

        return $result;
    }

    /**
     * Webservice setter : set product accessories ids of current product for association.
     *
     * @param array $accessories product ids
     *
     * @return bool
     */
    public function setWsAccessories($accessories)
    {
        $this->deleteAccessories();
        foreach ($accessories as $accessory) {
            Db::getInstance()->execute('INSERT INTO `' . _DB_PREFIX_ . 'accessory` (`id_product_1`, `id_product_2`) VALUES (' . (int) $this->id . ', ' . (int) $accessory['id'] . ')');
        }

        return true;
    }

    /**
     * Webservice getter : get combination ids of current product for association.
     *
     * @return array
     */
    public function getWsCombinations()
    {
        $result = Db::getInstance()->executeS(
            'SELECT pa.`id_product_attribute` as id
            FROM `' . _DB_PREFIX_ . 'product_attribute` pa
            ' . Shop::addSqlAssociation('product_attribute', 'pa') . '
            WHERE pa.`id_product` = ' . (int) $this->id
        );

        return $result;
    }

    /**
     * Webservice setter : set combination ids of current product for association.
     *
     * @param array $combinations combination ids
     *
     * @return bool
     */
    public function setWsCombinations($combinations)
    {
        // No hook exec
        $ids_new = [];
        foreach ($combinations as $combination) {
            $ids_new[] = (int) $combination['id'];
        }

        $ids_orig = [];
        $original = Db::getInstance()->executeS(
            'SELECT pa.`id_product_attribute` as id
            FROM `' . _DB_PREFIX_ . 'product_attribute` pa
            ' . Shop::addSqlAssociation('product_attribute', 'pa') . '
            WHERE pa.`id_product` = ' . (int) $this->id
        );

        if (is_array($original)) {
            foreach ($original as $id) {
                $ids_orig[] = $id['id'];
            }
        }

        $all_ids = [];
        $all = Db::getInstance()->executeS('SELECT pa.`id_product_attribute` as id FROM `' . _DB_PREFIX_ . 'product_attribute` pa ' . Shop::addSqlAssociation('product_attribute', 'pa'));
        if (is_array($all)) {
            foreach ($all as $id) {
                $all_ids[] = $id['id'];
            }
        }

        $to_add = [];
        foreach ($ids_new as $id) {
            if (!in_array($id, $ids_orig)) {
                $to_add[] = $id;
            }
        }

        $to_delete = [];
        foreach ($ids_orig as $id) {
            if (!in_array($id, $ids_new)) {
                $to_delete[] = $id;
            }
        }

        // Delete rows
        if (count($to_delete) > 0) {
            foreach ($to_delete as $id) {
                $combination = new Combination($id);
                $combination->delete();
            }
        }

        foreach ($to_add as $id) {
            // Update id_product if exists else create
            if (in_array($id, $all_ids)) {
                Db::getInstance()->execute('UPDATE `' . _DB_PREFIX_ . 'product_attribute` SET id_product = ' . (int) $this->id . ' WHERE id_product_attribute=' . $id);
            } else {
                Db::getInstance()->execute('INSERT INTO `' . _DB_PREFIX_ . 'product_attribute` (`id_product`) VALUES (' . (int) $this->id . ')');
            }
        }

        return true;
    }

    /**
     * Webservice getter : get product option ids of current product for association.
     *
     * @return array
     */
    public function getWsProductOptionValues()
    {
        $result = Db::getInstance()->executeS('SELECT DISTINCT pac.id_attribute as id
            FROM `' . _DB_PREFIX_ . 'product_attribute` pa
            ' . Shop::addSqlAssociation('product_attribute', 'pa') . '
            LEFT JOIN `' . _DB_PREFIX_ . 'product_attribute_combination` pac ON (pac.id_product_attribute = pa.id_product_attribute)
            WHERE pa.id_product = ' . (int) $this->id);

        return $result;
    }

    /**
     * Webservice getter : get virtual field position in category.
     *
     * @return int|string
     */
    public function getWsPositionInCategory()
    {
        $result = Db::getInstance()->executeS(
            'SELECT `position`
            FROM `' . _DB_PREFIX_ . 'category_product`
            WHERE `id_category` = ' . (int) $this->id_category_default . '
            AND `id_product` = ' . (int) $this->id);
        if (count($result) > 0) {
            return $result[0]['position'];
        }

        return '';
    }

    /**
     * Webservice setter : set virtual field position in category.
     *
     * @param int $position
     *
     * @return bool
     */
    public function setWsPositionInCategory($position)
    {
        if ($position <= 0) {
            WebserviceRequest::getInstance()->setError(
                500,
                $this->trans(
                    'You cannot set 0 or a negative position, the minimum is 1.',
                    [],
                    'Admin.Catalog.Notification'
                ),
                134
            );

            return false;
        }

        $result = Db::getInstance()->executeS(
            'SELECT `id_product` ' .
            'FROM `' . _DB_PREFIX_ . 'category_product` ' .
            'WHERE `id_category` = ' . (int) $this->id_category_default . '  ' .
            'ORDER BY `position`'
        );

        if ($position > count($result)) {
            WebserviceRequest::getInstance()->setError(
                500,
                $this->trans(
                    'You cannot set a position greater than the total number of products in the category, starting at 1.',
                    [],
                    'Admin.Catalog.Notification'
                ),
                135
            );

            return false;
        }

        // result is indexed by recordset order and not position. positions start at index 1 so we need an empty element
        array_unshift($result, null);
        foreach ($result as &$value) {
            $value = $value['id_product'];
        }

        $current_position = $this->getWsPositionInCategory();

        if ($current_position && isset($result[$current_position])) {
            $save = $result[$current_position];
            unset($result[$current_position]);
            array_splice($result, (int) $position, 0, $save);
        }

        foreach ($result as $position => $id_product) {
            Db::getInstance()->update('category_product', [
                'position' => $position,
            ], '`id_category` = ' . (int) $this->id_category_default . ' AND `id_product` = ' . (int) $id_product);
        }

        return true;
    }

    /**
     * Webservice getter : get virtual field id_default_image in category.
     *
     * @return int|string|null
     */
    public function getCoverWs()
    {
        $result = $this->getCover($this->id);

        return $result ? $result['id_image'] : null;
    }

    /**
     * Webservice setter : set virtual field id_default_image in category.
     *
     * @param int $id_image
     *
     * @return bool
     */
    public function setCoverWs($id_image)
    {
        Db::getInstance()->execute('UPDATE `' . _DB_PREFIX_ . 'image_shop` image_shop, `' . _DB_PREFIX_ . 'image` i
            SET image_shop.`cover` = NULL
            WHERE i.`id_product` = ' . (int) $this->id . ' AND i.id_image = image_shop.id_image
            AND image_shop.id_shop=' . (int) Context::getContext()->shop->id);

        Db::getInstance()->execute('UPDATE `' . _DB_PREFIX_ . 'image_shop`
            SET `cover` = 1 WHERE `id_image` = ' . (int) $id_image);

        return true;
    }

    /**
     * Webservice getter : get image ids of current product for association.
     *
     * @return array
     */
    public function getWsImages()
    {
        return Db::getInstance()->executeS('
            SELECT i.`id_image` as id
            FROM `' . _DB_PREFIX_ . 'image` i
            ' . Shop::addSqlAssociation('image', 'i') . '
            WHERE i.`id_product` = ' . (int) $this->id . '
            ORDER BY i.`position`');
    }

    /**
     * Webservice getter : Get StockAvailable identifier and Attribute identifier
     *
     * @return array
     */
    public function getWsStockAvailables()
    {
        return Db::getInstance()->executeS('SELECT `id_stock_available` id, `id_product_attribute`
            FROM `' . _DB_PREFIX_ . 'stock_available`
            WHERE `id_product`=' . (int) $this->id . StockAvailable::addSqlShopRestriction());
    }

    /**
     * Webservice getter: Get product attachments ids of current product for association
     *
     * @return array<int, array{id: string}>
     */
    public function getWsAttachments(): array
    {
        return Db::getInstance()->executeS(
            'SELECT a.`id_attachment` AS id ' .
            'FROM `' . _DB_PREFIX_ . 'product_attachment` pa ' .
            'INNER JOIN `' . _DB_PREFIX_ . 'attachment` a ON (pa.id_attachment = a.id_attachment) ' .
            Shop::addSqlAssociation('attachment', 'a') . ' ' .
            'WHERE pa.`id_product` = ' . (int) $this->id
        );
    }

    /**
     * Webservice setter: set product attachments ids of current product for association
     *
     * @param array<array{id: int|string}> $attachments ids
     */
    public function setWsAttachments(array $attachments): bool
    {
        $this->deleteAttachments(true);
        foreach ($attachments as $attachment) {
            Db::getInstance()->execute('INSERT INTO `' . _DB_PREFIX_ . 'product_attachment`
    				(`id_product`, `id_attachment`) VALUES (' . (int) $this->id . ', ' . (int) $attachment['id'] . ')');
        }
        Product::updateCacheAttachment((int) $this->id);

        return true;
    }

    public function getWsTags()
    {
        return Db::getInstance()->executeS('
            SELECT `id_tag` as id
            FROM `' . _DB_PREFIX_ . 'product_tag`
            WHERE `id_product` = ' . (int) $this->id);
    }

    /**
     * Webservice setter : set tag ids of current product for association.
     *
     * @param array $tag_ids Tag identifiers
     *
     * @return bool
     */
    public function setWsTags($tag_ids)
    {
        $ids = [];
        foreach ($tag_ids as $value) {
            $ids[] = $value['id'];
        }
        if ($this->deleteWsTags()) {
            if ($ids) {
                $sql_values = [];
                $ids = array_map('intval', $ids);
                foreach ($ids as $position => $id) {
                    $id_lang = Db::getInstance()->getValue('SELECT `id_lang` FROM `' . _DB_PREFIX_ . 'tag` WHERE `id_tag`=' . (int) $id);
                    $sql_values[] = '(' . (int) $this->id . ', ' . (int) $id . ', ' . (int) $id_lang . ')';
                }
                $result = Db::getInstance()->execute(
                    '
                    INSERT INTO `' . _DB_PREFIX_ . 'product_tag` (`id_product`, `id_tag`, `id_lang`)
                    VALUES ' . implode(',', $sql_values)
                );

                return $result;
            }
        }

        return true;
    }

    /**
     * Delete products tags entries without delete tags for webservice usage.
     *
     * @return bool Deletion result
     */
    public function deleteWsTags()
    {
        return Db::getInstance()->delete('product_tag', 'id_product = ' . (int) $this->id);
    }

    /**
     * @return string
     */
    public function getWsManufacturerName()
    {
        return Manufacturer::getNameById((int) $this->id_manufacturer);
    }

    /**
     * @return bool
     */
    public static function resetEcoTax()
    {
        return ObjectModel::updateMultishopTable('product', [
            'ecotax' => 0,
        ]);
    }

    /**
     * Set Group reduction if needed.
     */
    public function setGroupReduction()
    {
        return GroupReduction::setProductReduction($this->id);
    }

    /**
     * Checks if reference exists.
     *
     * @param string $reference Product reference
     *
     * @return bool
     */
    public function existsRefInDatabase($reference)
    {
        $row = Db::getInstance()->getRow('
        SELECT `reference`
        FROM `' . _DB_PREFIX_ . 'product` p
        WHERE p.reference = "' . pSQL($reference) . '"', false);

        return isset($row['reference']);
    }

    /**
     * Get all product attributes ids.
     *
     * @since 1.5.0
     *
     * @param int $id_product Product identifier
     * @param bool $shop_only
     *
     * @return array Attribute identifiers list
     */
    public static function getProductAttributesIds($id_product, $shop_only = false)
    {
        return Db::getInstance()->executeS('
        SELECT pa.id_product_attribute
        FROM `' . _DB_PREFIX_ . 'product_attribute` pa' .
        ($shop_only ? Shop::addSqlAssociation('product_attribute', 'pa') : '') . '
        WHERE pa.`id_product` = ' . (int) $id_product);
    }

    /**
     * Get label by lang and value by lang too.
     *
     * @param int $id_product Product identifier
     * @param int $id_product_attribute Attribute identifier
     *
     * @return array
     */
    public static function getAttributesParams($id_product, $id_product_attribute)
    {
        if ($id_product_attribute == 0) {
            return [];
        }
        $id_lang = (int) Context::getContext()->language->id;
        $cache_id = 'Product::getAttributesParams_' . (int) $id_product . '-' . (int) $id_product_attribute . '-' . (int) $id_lang;

        if (!Cache::isStored($cache_id)) {
            $result = Db::getInstance()->executeS('
            SELECT a.`id_attribute`, a.`id_attribute_group`, al.`name`, agl.`name` as `group`, pa.`reference`, pa.`ean13`, pa.`isbn`, pa.`upc`, pa.`mpn`
            FROM `' . _DB_PREFIX_ . 'attribute` a
            LEFT JOIN `' . _DB_PREFIX_ . 'attribute_lang` al
                ON (al.`id_attribute` = a.`id_attribute` AND al.`id_lang` = ' . (int) $id_lang . ')
            LEFT JOIN `' . _DB_PREFIX_ . 'product_attribute_combination` pac
                ON (pac.`id_attribute` = a.`id_attribute`)
            LEFT JOIN `' . _DB_PREFIX_ . 'product_attribute` pa
                ON (pa.`id_product_attribute` = pac.`id_product_attribute`)
            ' . Shop::addSqlAssociation('product_attribute', 'pa') . '
            LEFT JOIN `' . _DB_PREFIX_ . 'attribute_group_lang` agl
                ON (a.`id_attribute_group` = agl.`id_attribute_group` AND agl.`id_lang` = ' . (int) $id_lang . ')
            WHERE pa.`id_product` = ' . (int) $id_product . '
                AND pac.`id_product_attribute` = ' . (int) $id_product_attribute . '
                AND agl.`id_lang` = ' . (int) $id_lang);
            Cache::store($cache_id, $result);
        } else {
            $result = Cache::retrieve($cache_id);
        }

        return $result;
    }

    /**
     * @param int $id_product Product identifier
     *
     * @return array
     */
    public static function getAttributesInformationsByProduct($id_product)
    {
        $result = Db::getInstance()->executeS('
        SELECT DISTINCT a.`id_attribute`, a.`id_attribute_group`, al.`name` as `attribute`, agl.`name` as `group`,pa.`reference`, pa.`ean13`, pa.`isbn`, pa.`upc`, pa.`mpn`
        FROM `' . _DB_PREFIX_ . 'attribute` a
        LEFT JOIN `' . _DB_PREFIX_ . 'attribute_lang` al
            ON (a.`id_attribute` = al.`id_attribute` AND al.`id_lang` = ' . (int) Context::getContext()->language->id . ')
        LEFT JOIN `' . _DB_PREFIX_ . 'attribute_group_lang` agl
            ON (a.`id_attribute_group` = agl.`id_attribute_group` AND agl.`id_lang` = ' . (int) Context::getContext()->language->id . ')
        LEFT JOIN `' . _DB_PREFIX_ . 'product_attribute_combination` pac
            ON (a.`id_attribute` = pac.`id_attribute`)
        LEFT JOIN `' . _DB_PREFIX_ . 'product_attribute` pa
            ON (pac.`id_product_attribute` = pa.`id_product_attribute`)
        ' . Shop::addSqlAssociation('product_attribute', 'pa') . '
        ' . Shop::addSqlAssociation('attribute', 'pac') . '
        WHERE pa.`id_product` = ' . (int) $id_product);

        return $result;
    }

    /**
     * @return bool
     */
    public function hasCombinations()
    {
        if (null === $this->id || 0 >= $this->id) {
            return false;
        }
        $attributes = self::getAttributesInformationsByProduct($this->id);

        return !empty($attributes);
    }

    /**
     * Get an id_product_attribute by an id_product and one or more
     * id_attribute.
     *
     * e.g: id_product 8 with id_attribute 4 (size medium) and
     * id_attribute 5 (color blue) returns id_product_attribute 9 which
     * is the dress size medium and color blue.
     *
     * @param int $idProduct Product identifier
     * @param int|int[] $idAttributes Attribute identifier(s)
     * @param bool $findBest
     *
     * @return int
     *
     * @throws PrestaShopException
     */
    public static function getIdProductAttributeByIdAttributes($idProduct, $idAttributes, $findBest = false)
    {
        $idProduct = (int) $idProduct;

        if (!is_array($idAttributes) && is_numeric($idAttributes)) {
            $idAttributes = [(int) $idAttributes];
        }

        if (!is_array($idAttributes) || empty($idAttributes)) {
            throw new PrestaShopException(sprintf('Invalid parameter $idAttributes with value: "%s"', print_r($idAttributes, true)));
        }

        $idAttributesImploded = implode(',', array_map('intval', $idAttributes));
        $idProductAttribute = Db::getInstance()->getValue(
            'SELECT pac.`id_product_attribute`
                FROM `' . _DB_PREFIX_ . 'product_attribute_combination` pac
                INNER JOIN `' . _DB_PREFIX_ . 'product_attribute` pa ON pa.id_product_attribute = pac.id_product_attribute
                WHERE pa.id_product = ' . $idProduct . '
                AND pac.id_attribute IN (' . $idAttributesImploded . ')
                GROUP BY pac.`id_product_attribute`
                HAVING COUNT(pa.id_product) = ' . count($idAttributes)
        );

        if ($idProductAttribute === false && $findBest) {
            //find the best possible combination
            //first we order $idAttributes by the group position
            $orderred = [];
            $result = Db::getInstance()->executeS(
                'SELECT a.`id_attribute`
                FROM `' . _DB_PREFIX_ . 'attribute` a
                INNER JOIN `' . _DB_PREFIX_ . 'attribute_group` g ON a.`id_attribute_group` = g.`id_attribute_group`
                WHERE a.`id_attribute` IN (' . $idAttributesImploded . ')
                ORDER BY g.`position` ASC'
            );

            foreach ($result as $row) {
                $orderred[] = $row['id_attribute'];
            }

            while ($idProductAttribute === false && count($orderred) > 1) {
                array_pop($orderred);
                $idProductAttribute = Db::getInstance()->getValue(
                    'SELECT pac.`id_product_attribute`
                    FROM `' . _DB_PREFIX_ . 'product_attribute_combination` pac
                    INNER JOIN `' . _DB_PREFIX_ . 'product_attribute` pa ON pa.id_product_attribute = pac.id_product_attribute
                    WHERE pa.id_product = ' . (int) $idProduct . '
                    AND pac.id_attribute IN (' . implode(',', array_map('intval', $orderred)) . ')
                    GROUP BY pac.id_product_attribute
                    HAVING COUNT(pa.id_product) = ' . count($orderred)
                );
            }
        }

        if (empty($idProductAttribute)) {
            throw new PrestaShopObjectNotFoundException('Cannot retrieve the id_product_attribute');
        }

        return (int) $idProductAttribute;
    }

    /**
     * Get the combination url anchor of the product.
     *
     * @param int $id_product_attribute Attribute identifier
     * @param bool $with_id
     *
     * @return string
     */
    public function getAnchor($id_product_attribute, $with_id = false)
    {
        $attributes = Product::getAttributesParams($this->id, $id_product_attribute);
        $anchor = '#';
        $sep = Configuration::get('PS_ATTRIBUTE_ANCHOR_SEPARATOR');
        foreach ($attributes as &$a) {
            foreach ($a as &$b) {
                $b = str_replace($sep, '_', Tools::link_rewrite((string) $b));
            }
            $anchor .= '/' . ($with_id && isset($a['id_attribute']) && $a['id_attribute'] ? (int) $a['id_attribute'] . $sep : '') . $a['group'] . $sep . $a['name'];
        }

        return $anchor;
    }

    /**
     * Gets the name of a given product, in the given lang.
     *
     * @since 1.5.0
     *
     * @param int $id_product Product identifier
     * @param int|null $id_product_attribute Attribute identifier
     * @param int|null $id_lang Language identifier
     *
     * @return string
     */
    public static function getProductName($id_product, $id_product_attribute = null, $id_lang = null)
    {
        // use the lang in the context if $id_lang is not defined
        if (!$id_lang) {
            $id_lang = (int) Context::getContext()->language->id;
        }

        // creates the query object
        $query = new DbQuery();

        // selects different names, if it is a combination
        if ($id_product_attribute) {
            $query->select('IFNULL(CONCAT(pl.name, \' : \', GROUP_CONCAT(DISTINCT agl.`name`, \' - \', al.name SEPARATOR \', \')),pl.name) as name');
        } else {
            $query->select('DISTINCT pl.name as name');
        }

        // adds joins & where clauses for combinations
        if ($id_product_attribute) {
            $query->from('product_attribute', 'pa');
            $query->join(Shop::addSqlAssociation('product_attribute', 'pa'));
            $query->innerJoin('product_lang', 'pl', 'pl.id_product = pa.id_product AND pl.id_lang = ' . (int) $id_lang . Shop::addSqlRestrictionOnLang('pl'));
            $query->leftJoin('product_attribute_combination', 'pac', 'pac.id_product_attribute = pa.id_product_attribute');
            $query->leftJoin('attribute', 'atr', 'atr.id_attribute = pac.id_attribute');
            $query->leftJoin('attribute_lang', 'al', 'al.id_attribute = atr.id_attribute AND al.id_lang = ' . (int) $id_lang);
            $query->leftJoin('attribute_group_lang', 'agl', 'agl.id_attribute_group = atr.id_attribute_group AND agl.id_lang = ' . (int) $id_lang);
            $query->where('pa.id_product = ' . (int) $id_product . ' AND pa.id_product_attribute = ' . (int) $id_product_attribute);
        } else {
            // or just adds a 'where' clause for a simple product

            $query->from('product_lang', 'pl');
            $query->where('pl.id_product = ' . (int) $id_product);
            $query->where('pl.id_lang = ' . (int) $id_lang . Shop::addSqlRestrictionOnLang('pl'));
        }

        return Db::getInstance()->getValue($query);
    }

    /**
     * @param bool $autodate
     * @param bool $null_values
     *
     * @return bool
     */
    public function addWs($autodate = true, $null_values = false)
    {
        $success = $this->add($autodate, $null_values);
        if ($success && Configuration::get('PS_SEARCH_INDEXATION')) {
            Search::indexation(false, $this->id);
        }

        return $success;
    }

    /**
     * @param bool $null_values
     *
     * @return bool
     */
    public function updateWs($null_values = false)
    {
        if (null === $this->price) {
            $this->price = Product::getPriceStatic((int) $this->id, false, null, 6, null, false, true, 1, false, null, null, null, $this->specificPrice);
        }

        if (null === $this->unit_price_ratio) {
            $this->unit_price_ratio = ($this->unit_price != 0 ? $this->price / $this->unit_price : 0);
        }

        $success = parent::update($null_values);
        if ($success && Configuration::get('PS_SEARCH_INDEXATION')) {
            Search::indexation(false, $this->id);
        }
        Hook::exec('actionProductUpdate', ['id_product' => (int) $this->id]);

        return $success;
    }

    /**
     * For a given product, returns its real quantity.
     *
     * @since 1.5.0
     *
     * @param int $id_product Product identifier
     * @param int $id_product_attribute Attribute identifier
     * @param int $id_warehouse Warehouse identifier
     * @param int|null $id_shop Shop identifier
     *
     * @return int real_quantity
     */
    public static function getRealQuantity($id_product, $id_product_attribute = 0, $id_warehouse = 0, $id_shop = null)
    {
        static $manager = null;

        if (Configuration::get('PS_ADVANCED_STOCK_MANAGEMENT') && null === $manager) {
            $manager = StockManagerFactory::getManager();
        }

        if (Configuration::get('PS_ADVANCED_STOCK_MANAGEMENT') && Product::usesAdvancedStockManagement($id_product) &&
            StockAvailable::dependsOnStock($id_product, $id_shop)) {
            return $manager->getProductRealQuantities($id_product, $id_product_attribute, $id_warehouse, true);
        } else {
            return StockAvailable::getQuantityAvailableByProduct($id_product, $id_product_attribute, $id_shop);
        }
    }

    /**
     * For a given product, tells if it uses the advanced stock management.
     *
     * @since 1.5.0
     *
     * @param int $id_product Product identifier
     *
     * @return bool
     */
    public static function usesAdvancedStockManagement($id_product)
    {
        $query = new DbQuery();
        $query->select('product_shop.advanced_stock_management');
        $query->from('product', 'p');
        $query->join(Shop::addSqlAssociation('product', 'p'));
        $query->where('p.id_product = ' . (int) $id_product);

        return (bool) Db::getInstance()->getValue($query);
    }

    /**
     * This method allows to flush price cache.
     *
     * @since 1.5.0
     */
    public static function flushPriceCache()
    {
        self::$_prices = [];
        self::$_pricesLevel2 = [];
    }

    /**
     * Get list of parent categories.
     *
     * @since 1.5.0
     *
     * @param int|null $id_lang Language identifier
     *
     * @return array
     */
    public function getParentCategories($id_lang = null)
    {
        if (!$id_lang) {
            $id_lang = Context::getContext()->language->id;
        }

        $interval = Category::getInterval($this->id_category_default);
        $sql = new DbQuery();
        $sql->from('category', 'c');
        $sql->leftJoin('category_lang', 'cl', 'c.id_category = cl.id_category AND id_lang = ' . (int) $id_lang . Shop::addSqlRestrictionOnLang('cl'));
        $sql->where('c.nleft <= ' . (int) $interval['nleft'] . ' AND c.nright >= ' . (int) $interval['nright']);
        $sql->orderBy('c.nleft');

        return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
    }

    /**
     * Fill the variables used for stock management.
     */
    public function loadStockData()
    {
        if (false === Validate::isLoadedObject($this)) {
            return;
        }

        // Default product quantity is available quantity to sell in current shop
        $this->quantity = StockAvailable::getQuantityAvailableByProduct($this->id, 0);
        $this->out_of_stock = StockAvailable::outOfStock($this->id);
        $this->depends_on_stock = StockAvailable::dependsOnStock($this->id);
        $this->location = StockAvailable::getLocation($this->id) ?: '';

        if (Context::getContext()->shop->getContext() == Shop::CONTEXT_GROUP && Context::getContext()->shop->getContextShopGroup()->share_stock == 1) {
            $this->advanced_stock_management = $this->useAdvancedStockManagement();
        }
    }

    /**
     * Get Advanced Stock Management status for this product
     *
     * @return bool 0 for disabled, 1 for enabled
     */
    public function useAdvancedStockManagement()
    {
        return (bool) Db::getInstance()->getValue(
            'SELECT `advanced_stock_management`
                FROM ' . _DB_PREFIX_ . 'product_shop
                WHERE id_product=' . (int) $this->id . Shop::addSqlRestriction()
            );
    }

    /**
     * Set Advanced Stock Management status for this product
     *
     * @param bool $value false for disabled, true for enabled
     */
    public function setAdvancedStockManagement($value)
    {
        $this->advanced_stock_management = (bool) $value;
        if (Context::getContext()->shop->getContext() == Shop::CONTEXT_GROUP
            && Context::getContext()->shop->getContextShopGroup()->share_stock == 1) {
            Db::getInstance()->execute(
                '
                UPDATE `' . _DB_PREFIX_ . 'product_shop`
                SET `advanced_stock_management`=' . (int) $value . '
                WHERE id_product=' . (int) $this->id . Shop::addSqlRestriction()
            );
        } else {
            $this->setFieldsToUpdate(['advanced_stock_management' => true]);
            $this->save();
        }
    }

    /**
     * Get the default category according to the shop.
     *
     * @return array{id_category_default: int}|int
     */
    public function getDefaultCategory()
    {
        $default_category = Db::getInstance()->getValue(
            'SELECT product_shop.`id_category_default`
            FROM `' . _DB_PREFIX_ . 'product` p
            ' . Shop::addSqlAssociation('product', 'p') . '
            WHERE p.`id_product` = ' . (int) $this->id
        );

        if (!$default_category) {
            return ['id_category_default' => Context::getContext()->shop->id_category];
        } else {
            return (int) $default_category;
        }
    }

    /**
     * Get Shop identifiers
     *
     * @param int $id_product Product identifier
     *
     * @return array
     */
    public static function getShopsByProduct($id_product)
    {
        return Db::getInstance()->executeS('
            SELECT `id_shop`
            FROM `' . _DB_PREFIX_ . 'product_shop`
            WHERE `id_product` = ' . (int) $id_product);
    }

    /**
     * Remove all downloadable files for product and its attributes.
     *
     * @return bool
     */
    public function deleteDownload()
    {
        $result = true;
        $collection_download = new PrestaShopCollection('ProductDownload');
        $collection_download->where('id_product', '=', $this->id);
        /** @var ProductDownload $product_download */
        foreach ($collection_download as $product_download) {
            $result &= $product_download->delete($product_download->checkFile());
        }

        return $result;
    }

    /**
     * Get the product type (simple, virtual, pack).
     *
     * @since in 1.5.0
     *
     * @return int
     */
    public function getType()
    {
        if (!$this->id) {
            return Product::PTYPE_SIMPLE;
        }
        if (Pack::isPack($this->id)) {
            return Product::PTYPE_PACK;
        }
        if ($this->is_virtual) {
            return Product::PTYPE_VIRTUAL;
        }

        return Product::PTYPE_SIMPLE;
    }

    /**
     * @return bool
     */
    public function hasAttributesInOtherShops()
    {
        return (bool) Db::getInstance(_PS_USE_SQL_SLAVE_)->getValue(
            '
            SELECT pa.id_product_attribute
            FROM `' . _DB_PREFIX_ . 'product_attribute` pa
            LEFT JOIN `' . _DB_PREFIX_ . 'product_attribute_shop` pas ON (pa.`id_product_attribute` = pas.`id_product_attribute`)
            WHERE pa.`id_product` = ' . (int) $this->id
        );
    }

    /**
     * @return string TaxRulesGroup identifier most used
     */
    public static function getIdTaxRulesGroupMostUsed()
    {
        return Db::getInstance()->getValue(
            '
                    SELECT id_tax_rules_group
                    FROM (
                        SELECT COUNT(*) n, product_shop.id_tax_rules_group
                        FROM ' . _DB_PREFIX_ . 'product p
                        ' . Shop::addSqlAssociation('product', 'p') . '
                        JOIN ' . _DB_PREFIX_ . 'tax_rules_group trg ON (product_shop.id_tax_rules_group = trg.id_tax_rules_group)
                        WHERE trg.active = 1 AND trg.deleted = 0
                        GROUP BY product_shop.id_tax_rules_group
                        ORDER BY n DESC
                        LIMIT 1
                    ) most_used'
                );
    }

    /**
     * For a given ean13 reference, returns the corresponding id.
     *
     * @param string $ean13
     *
     * @return int|string Product identifier
     */
    public static function getIdByEan13($ean13)
    {
        if (empty($ean13)) {
            return 0;
        }

        if (!Validate::isEan13($ean13)) {
            return 0;
        }

        $query = new DbQuery();
        $query->select('p.id_product');
        $query->from('product', 'p');
        $query->where('p.ean13 = \'' . pSQL($ean13) . '\'');

        return Db::getInstance(_PS_USE_SQL_SLAVE_)->getValue($query);
    }

    /**
     * For a given reference, returns the corresponding id.
     *
     * @param string $reference
     *
     * @return int|string Product identifier
     */
    public static function getIdByReference($reference)
    {
        if (empty($reference)) {
            return 0;
        }

        if (!Validate::isReference($reference)) {
            return 0;
        }

        $query = new DbQuery();
        $query->select('p.id_product');
        $query->from('product', 'p');
        $query->where('p.reference = \'' . pSQL($reference) . '\'');

        return Db::getInstance(_PS_USE_SQL_SLAVE_)->getValue($query);
    }

    /**
     * @return string simple, pack, virtual
     */
    public function getWsType()
    {
        $type_information = [
            Product::PTYPE_SIMPLE => 'simple',
            Product::PTYPE_PACK => 'pack',
            Product::PTYPE_VIRTUAL => 'virtual',
        ];

        return $type_information[$this->getType()];
    }

    /**
     * Create the link rewrite if not exists or invalid on product creation
     *
     * @return bool
     */
    public function modifierWsLinkRewrite()
    {
        if (empty($this->link_rewrite)) {
            $this->link_rewrite = [];
        }

        foreach ($this->name as $id_lang => $name) {
            if (empty($this->link_rewrite[$id_lang])) {
                $this->link_rewrite[$id_lang] = Tools::link_rewrite($name);
            } elseif (!Validate::isLinkRewrite($this->link_rewrite[$id_lang])) {
                $this->link_rewrite[$id_lang] = Tools::link_rewrite($this->link_rewrite[$id_lang]);
            }
        }

        return true;
    }

    /**
     * @return array
     */
    public function getWsProductBundle()
    {
        return Db::getInstance()->executeS('SELECT id_product_item as id, id_product_attribute_item as id_product_attribute, quantity FROM ' . _DB_PREFIX_ . 'pack WHERE id_product_pack = ' . (int) $this->id);
    }

    /**
     * @param string $type_str simple, pack, virtual
     *
     * @return bool
     */
    public function setWsType($type_str)
    {
        $reverse_type_information = [
            'simple' => Product::PTYPE_SIMPLE,
            'pack' => Product::PTYPE_PACK,
            'virtual' => Product::PTYPE_VIRTUAL,
        ];

        if (!isset($reverse_type_information[$type_str])) {
            return false;
        }

        $type = $reverse_type_information[$type_str];

        if (Pack::isPack((int) $this->id) && $type != Product::PTYPE_PACK) {
            Pack::deleteItems($this->id);
        }

        $this->cache_is_pack = ($type == Product::PTYPE_PACK);
        $this->is_virtual = ($type == Product::PTYPE_VIRTUAL);
        $this->product_type = $this->getDynamicProductType();

        return true;
    }

    /**
     * @param array $items
     *
     * @return bool
     */
    public function setWsProductBundle($items)
    {
        if ($this->is_virtual) {
            return false;
        }

        Pack::deleteItems($this->id);

        foreach ($items as $item) {
            // Combination of a product is optional, and can be omitted.
            if (!isset($item['product_attribute_id'])) {
                $item['product_attribute_id'] = 0;
            }
            if ((int) $item['id'] > 0) {
                Pack::addItem($this->id, (int) $item['id'], (int) $item['quantity'], (int) $item['product_attribute_id']);
            }
        }

        return true;
    }

    /**
     * @param int $id_attribute Attribute identifier
     * @param int $id_shop Shop identifier
     *
     * @return string Attribute identifier
     */
    public function isColorUnavailable($id_attribute, $id_shop)
    {
        return Db::getInstance()->getValue(
            '
            SELECT sa.id_product_attribute
            FROM ' . _DB_PREFIX_ . 'stock_available sa
            WHERE id_product=' . (int) $this->id . ' AND quantity <= 0
            ' . StockAvailable::addSqlShopRestriction(null, $id_shop, 'sa') . '
            AND EXISTS (
                SELECT 1
                FROM ' . _DB_PREFIX_ . 'product_attribute pa
                JOIN ' . _DB_PREFIX_ . 'product_attribute_shop product_attribute_shop
                    ON (product_attribute_shop.id_product_attribute = pa.id_product_attribute AND product_attribute_shop.id_shop=' . (int) $id_shop . ')
                JOIN ' . _DB_PREFIX_ . 'product_attribute_combination pac
                    ON (pac.id_product_attribute AND product_attribute_shop.id_product_attribute)
                WHERE sa.id_product_attribute = pa.id_product_attribute AND pa.id_product=' . (int) $this->id . ' AND pac.id_attribute=' . (int) $id_attribute . '
            )'
        );
    }

    /**
     * @param int $id_product Product identifier
     * @param bool $full
     *
     * @return string
     */
    public static function getColorsListCacheId($id_product, $full = true)
    {
        $cache_id = 'productlist_colors';
        if ($id_product) {
            $cache_id .= '|' . (int) $id_product;
        }

        if ($full) {
            $cache_id .= '|' . (int) Context::getContext()->shop->id . '|' . (int) Context::getContext()->cookie->id_lang;
        }

        return $cache_id;
    }

    /**
     * @param int $id_product Product identifier
     * @param int $pack_stock_type value of Pack stock type, see constants defined in Pack class
     *
     * @return bool
     */
    public static function setPackStockType($id_product, $pack_stock_type)
    {
        return Db::getInstance()->execute('UPDATE ' . _DB_PREFIX_ . 'product p
        ' . Shop::addSqlAssociation('product', 'p') . ' SET product_shop.pack_stock_type = ' . (int) $pack_stock_type . ' WHERE p.`id_product` = ' . (int) $id_product);
    }

    /**
     * Gets a list of IDs from a list of IDs/Refs. The result will avoid duplicates, and checks if given IDs/Refs exists in DB.
     * Useful when a product list should be checked before a bulk operation on them (Only 1 query => performances).
     *
     * @param int|string|int[]|string[] $ids_or_refs Product identifier(s) or reference(s)
     *
     * @return array|false Product identifiers, without duplicate and only existing ones
     */
    public static function getExistingIdsFromIdsOrRefs($ids_or_refs)
    {
        // separate IDs and Refs
        $ids = [];
        $refs = [];
        $whereStatements = [];
        foreach ((is_array($ids_or_refs) ? $ids_or_refs : [$ids_or_refs]) as $id_or_ref) {
            if (is_numeric($id_or_ref)) {
                $ids[] = (int) $id_or_ref;
            } elseif (is_string($id_or_ref)) {
                $refs[] = '\'' . pSQL($id_or_ref) . '\'';
            }
        }

        // construct WHERE statement with OR combination
        if (count($ids) > 0) {
            $whereStatements[] = ' p.id_product IN (' . implode(',', $ids) . ') ';
        }
        if (count($refs) > 0) {
            $whereStatements[] = ' p.reference IN (' . implode(',', $refs) . ') ';
        }
        if (!count($whereStatements)) {
            return false;
        }

        $results = Db::getInstance()->executeS('
        SELECT DISTINCT `id_product`
        FROM `' . _DB_PREFIX_ . 'product` p
        WHERE ' . implode(' OR ', $whereStatements));

        // simplify array since there is 1 useless dimension.
        // FIXME : find a better way to avoid this, directly in SQL?
        foreach ($results as $k => $v) {
            $results[$k] = (int) $v['id_product'];
        }

        return $results;
    }

    /**
     * Get object of redirect_type.
     *
     * @return string|false category, product, false if unknown redirect_type
     */
    public function getRedirectType()
    {
        switch ($this->redirect_type) {
            case RedirectType::TYPE_CATEGORY_PERMANENT:
            case RedirectType::TYPE_CATEGORY_TEMPORARY:
                return 'category';

            case RedirectType::TYPE_PRODUCT_PERMANENT:
            case RedirectType::TYPE_PRODUCT_TEMPORARY:
                return 'product';
        }

        return false;
    }

    /**
     * Return an array of customization fields IDs.
     *
     * @return array|false
     */
    public function getUsedCustomizationFieldsIds()
    {
        return Db::getInstance()->executeS(
            'SELECT cd.`index` FROM `' . _DB_PREFIX_ . 'customized_data` cd
            LEFT JOIN `' . _DB_PREFIX_ . 'customization_field` cf ON cf.`id_customization_field` = cd.`index`
            WHERE cf.`id_product` = ' . (int) $this->id
        );
    }

    /**
     * Remove unused customization for the product.
     *
     * @param array $customizationIds - Array of customization fields IDs
     *
     * @return bool
     *
     * @throws PrestaShopDatabaseException
     */
    public function deleteUnusedCustomizationFields($customizationIds)
    {
        $return = true;
        if (is_array($customizationIds) && !empty($customizationIds)) {
            $toDeleteIds = implode(',', $customizationIds);
            $return &= Db::getInstance()->execute('DELETE FROM `' . _DB_PREFIX_ . 'customization_field` WHERE
            `id_product` = ' . (int) $this->id . ' AND `id_customization_field` IN (' . $toDeleteIds . ')');

            $return &= Db::getInstance()->execute('DELETE FROM `' . _DB_PREFIX_ . 'customization_field_lang` WHERE
            `id_customization_field` IN (' . $toDeleteIds . ')');
        }

        if (!$return) {
            throw new PrestaShopDatabaseException('An error occurred while deletion the customization fields');
        }

        return $return;
    }

    /**
     * Update the customization fields to be deleted if not used.
     *
     * @param array $customizationIds - Array of excluded customization fields IDs
     *
     * @return bool
     *
     * @throws PrestaShopDatabaseException
     */
    public function softDeleteCustomizationFields($customizationIds)
    {
        $updateQuery = 'UPDATE `' . _DB_PREFIX_ . 'customization_field` cf
            SET cf.`is_deleted` = 1
            WHERE
            cf.`id_product` = ' . (int) $this->id . '
            AND cf.`is_deleted` = 0 ';

        if (is_array($customizationIds) && !empty($customizationIds)) {
            $updateQuery .= 'AND cf.`id_customization_field` NOT IN (' . implode(',', array_map('intval', $customizationIds)) . ')';
        }

        $return = Db::getInstance()->execute($updateQuery);

        if (!$return) {
            throw new PrestaShopDatabaseException('An error occurred while soft deletion the customization fields');
        }

        return $return;
    }

    /**
     * Update default supplier data
     *
     * @param int $idSupplier
     * @param float $wholesalePrice
     * @param string $supplierReference
     *
     * @return bool
     */
    public function updateDefaultSupplierData(int $idSupplier, string $supplierReference, float $wholesalePrice): bool
    {
        if (!$this->id) {
            return false;
        }

        $sql = 'UPDATE `' . _DB_PREFIX_ . 'product` ' .
             'SET ' .
             'id_supplier = %d, ' .
             'supplier_reference = "%s", ' .
             'wholesale_price = "%s" ' .
             'WHERE id_product = %d';

        return Db::getInstance()->execute(
            sprintf(
                $sql,
                $idSupplier,
                pSQL($supplierReference),
                $wholesalePrice,
                $this->id
            )
        );
    }

    /**
     * Get Product ecotax
     *
     * @param int $precision
     * @param bool $include_tax
     * @param bool $formated
     *
     * @return string|float
     */
    public function getEcotax($precision = null, $include_tax = true, $formated = false)
    {
        $context = Context::getContext();
        $currency = $context->currency;
        $precision = $precision ?? $currency->precision;
        $ecotax_rate = $include_tax ? (float) Tax::getProductEcotaxRate() : 0;
        $ecotax = Tools::ps_round(
            (float) $this->ecotax * (1 + $ecotax_rate / 100),
            $precision,
            null
        );

        return $formated ? $context->getCurrentLocale()->formatPrice($ecotax, $currency->iso_code) : $ecotax;
    }

    /**
     * @return string
     */
    public function getProductType(): string
    {
        // Default value is the one saved, but in case it is not set we use dynamic definition
        if (!empty($this->product_type) && in_array($this->product_type, ProductType::AVAILABLE_TYPES)) {
            return $this->product_type;
        }

        return $this->getDynamicProductType();
```