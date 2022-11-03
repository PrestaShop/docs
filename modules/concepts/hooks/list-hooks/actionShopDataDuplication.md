---
menuTitle: actionShopDataDuplication
title: actionShopDataDuplication
hidden: true
files:
  - classes/shop/Shop.php
types:
  - frontoffice
hookTypes:
  - legacy
---

# Hook : actionShopDataDuplication

Located in :

  - classes/shop/Shop.php

## Parameters

```php
Hook::exec('actionShopDataDuplication', [
                        'old_id_shop' => (int) $old_id,
                        'new_id_shop' => (int) $this->id,
                    ], $m['id_module']);
                }
            }
        }
    }

    /**
     * @param int $id
     *
     * @return array
     */
    public static function getCategories($id = 0, $only_id = true)
    {
        // build query
        $query = new DbQuery();
        if ($only_id) {
            $query->select('cs.`id_category`');
        } else {
            $query->select('DISTINCT cs.`id_category`, cl.`name`, cl.`link_rewrite`');
        }
        $query->from('category_shop', 'cs');
        $query->leftJoin('category_lang', 'cl', 'cl.`id_category` = cs.`id_category` AND cl.`id_lang` = ' . (int) Context::getContext()->language->id);
        $query->where('cs.`id_shop` = ' . (int) $id);
        $result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($query);

        if ($only_id) {
            $array = [];
            foreach ($result as $row) {
                $array[] = $row['id_category'];
            }
            $array = array_unique($array);
        } else {
            return $result;
        }

        return $array;
    }

    /**
     * @param string $entity
     * @param int $id_shop
     *
     * @return array|bool
     */
    public static function getEntityIds($entity, $id_shop, $active = false, $delete = false)
    {
        if (!Shop::isTableAssociated($entity)) {
            return false;
        }

        return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS(
            'SELECT entity.`id_' . bqSQL($entity) . '`
            FROM `' . _DB_PREFIX_ . bqSQL($entity) . '_shop`es
            LEFT JOIN ' . _DB_PREFIX_ . bqSQL($entity) . ' entity
                ON (entity.`id_' . bqSQL($entity) . '` = es.`id_' . bqSQL($entity) . '`)
            WHERE es.`id_shop` = ' . (int) $id_shop .
            ($active ? ' AND entity.`active` = 1' : '') .
            ($delete ? ' AND entity.deleted = 0' : '')
        );
    }

    /**
     * @param string $host
     *
     * @return array
     *
     * @throws PrestaShopDatabaseException
     */
    private static function findShopByHost($host)
    {
        $sql = 'SELECT s.id_shop, CONCAT(su.physical_uri, su.virtual_uri) AS uri, su.domain, su.main
                    FROM ' . _DB_PREFIX_ . 'shop_url su
                    LEFT JOIN ' . _DB_PREFIX_ . 'shop s ON (s.id_shop = su.id_shop)
                    WHERE (su.domain = \'' . pSQL($host) . '\' OR su.domain_ssl = \'' . pSQL($host) . '\')
                        AND s.active = 1
                        AND s.deleted = 0
                    ORDER BY LENGTH(CONCAT(su.physical_uri, su.virtual_uri)) DESC';

        $result = Db::getInstance()->executeS($sql);
```