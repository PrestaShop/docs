---
Title: actionUpdateCartAddress
hidden: true
hookTitle: 'Triggers after changing address on the cart'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/classes/Cart.php'
        file: classes/Cart.php
locations:
    - 'front office'
type: action
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is called after address is changed on the cart'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionUpdateCartAddress', ['cart' => $this, 'oldAddressId' => (int) $id_address, 'newAddressId' => (int) $id_address_new])
```
