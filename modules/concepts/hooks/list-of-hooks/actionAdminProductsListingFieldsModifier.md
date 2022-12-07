---
menuTitle: actionAdminProductsListingFieldsModifier
Title: actionAdminProductsListingFieldsModifier
hidden: true
hookTitle: 
files:
  - src/Adapter/Product/AdminProductDataProvider.php
locations:
  - backoffice
type:
  - action
hookAliases:
---

# Hook actionAdminProductsListingFieldsModifier

## Information

Hook locations: 
  - backoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Adapter/Product/AdminProductDataProvider.php](src/Adapter/Product/AdminProductDataProvider.php)

## Parameters details

```php
    <?php
    array(
      '_ps_version' => (string) PrestaShop version,
      'sql_select' => &(array),
      'sql_table' => &(array),
      'sql_where' => &(array),
      'sql_order' => &(array),
      'sql_limit' => &(string),
    );
```

## Hook call in codebase

```php
Hook::exec('actionAdminProductsListingFieldsModifier', [
            '_ps_version' => AppKernel::VERSION,
            'sql_select' => &$sqlSelect,
            'sql_table' => &$sqlTable,
            'sql_where' => &$sqlWhere,
            'sql_group_by' => &$sqlGroupBy,
            'sql_order' => &$sqlOrder,
            'sql_limit' => &$sqlLimit,
        ])
```