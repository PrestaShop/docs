---
menuTitle: actionAdminProductsListingFieldsModifier
Title: actionAdminProductsListingFieldsModifier
hidden: true
hookTitle: 
files:
  - src/Adapter/Product/AdminProductDataProvider.php
locations:
  - backoffice
types:
  - legacy
---

# Hook : actionAdminProductsListingFieldsModifier

## Informations

Hook locations: 
  - backoffice

Hook types: 
  - legacy

Located in: 
  - src/Adapter/Product/AdminProductDataProvider.php

## Hook call with parameters

```php
Hook::exec('actionAdminProductsListingFieldsModifier', [
            '_ps_version' => AppKernel::VERSION,
            'sql_select' => &$sqlSelect,
            'sql_table' => &$sqlTable,
            'sql_where' => &$sqlWhere,
            'sql_group_by' => &$sqlGroupBy,
            'sql_order' => &$sqlOrder,
            'sql_limit' => &$sqlLimit,
        ]);
```