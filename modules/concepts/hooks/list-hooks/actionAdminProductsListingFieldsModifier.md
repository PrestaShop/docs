---
menuTitle: actionAdminProductsListingFieldsModifier
title: actionAdminProductsListingFieldsModifier
hidden: true
files:
  - src/Adapter/Product/AdminProductDataProvider.php
types:
  - backoffice
hookTypes:
  - legacy
---

# Hook : actionAdminProductsListingFieldsModifier

Located in :

  - src/Adapter/Product/AdminProductDataProvider.php

## Parameters

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