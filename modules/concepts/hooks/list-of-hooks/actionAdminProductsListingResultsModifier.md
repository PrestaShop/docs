---
Title: actionAdminProductsListingResultsModifier
hidden: true
hookTitle: 
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/classes/controller/AdminController.php'
        file: classes/controller/AdminController.php
locations:
    - 'back office'
type: action
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: ''

---

{{% hookDescriptor %}}

## Parameters details

```php
    <?php
    array(
      '_ps_version' => (string) PrestaShop version,
      'products' => &(PDOStatement),
      'total' => (int),
    );
```

## Call of the Hook in the origin file

```php
Hook::exec('action' . $this->controller_name . 'ListingResultsModifier', [ 'list' => &$this->_list, 'list_total' => &$this->_listTotal, ])
```
