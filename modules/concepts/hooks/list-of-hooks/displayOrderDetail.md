---
Title: displayOrderDetail
hidden: true
hookTitle: 'Order detail'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/controllers/front/GuestTrackingController.php'
        file: controllers/front/GuestTrackingController.php
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/controllers/front/OrderDetailController.php'
        file: controllers/front/OrderDetailController.php
    -
      theme: hummingbird
      url: https://github.com/PrestaShop/hummingbird/blob/develop/templates/customer/order-detail.tpl
      file: themes/hummingbird/templates/customer/order-detail.tpl
locations:
    - 'front office'
type: display
hookAliases:
    - orderDetailDisplayed
array_return: false
check_exceptions: false
chain: false
origin: core
description: "This hook is displayed within the order's details in Front Office"

---

{{% hookDescriptor %}}

## Parameters details

```php
    <?php
    array(
      'order' => (object) Order object
    );
```

## Call of the Hook in the origin file

```php
'HOOK_DISPLAYORDERDETAIL' => Hook::exec('displayOrderDetail', ['order' => $this->order]), ])
```
