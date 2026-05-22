---
Title: actionShopDataDuplication
hidden: true
hookTitle: files:
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/classes/shop/Shop.php'
        file: classes/shop/Shop.php
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/controllers/admin/AdminShopController.php'
        file: controllers/admin/AdminShopController.php
locations:
    - 'front office'
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
      'old_id_shop' => (int) Old shop ID,
      'new_id_shop' => (int) New shop ID
    );
```

## Call of the Hook in the origin file

```php
$modules_list = Hook::getHookModuleExecList('actionShopDataDuplication')
```
