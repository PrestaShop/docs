---
Title: actionOrderReturn
hidden: true
hookTitle: 'Returned product'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/controllers/front/OrderFollowController.php'
        file: controllers/front/OrderFollowController.php
locations:
    - 'front office'
type: action
hookAliases:
    - orderReturn
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is displayed when a customer returns a product '

---

{{% hookDescriptor %}}

## Parameters details

```php
    <?php
    array(
      'orderReturn' => (object) OrderReturn
    );
```

## Call of the Hook in the origin file

```php
Hook::exec('actionOrderReturn', ['orderReturn' => $orderReturn])
```
