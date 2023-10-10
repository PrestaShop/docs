---
menuTitle: actionShopDataDuplication
Title: actionShopDataDuplication
hidden: true
hookTitle: 
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/shop/Shop.php'
        file: classes/shop/Shop.php
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
Hook::exec('actionShopDataDuplication', [
                        'old_id_shop' => (int) $old_id,
                        'new_id_shop' => (int) $this->id,
                    ], $m['id_module'])
```
