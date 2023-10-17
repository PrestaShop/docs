---
Title: actionInvoiceNumberFormatted
hidden: true
hookTitle: 
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/order/OrderInvoice.php'
        file: classes/order/OrderInvoice.php
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

## Call of the Hook in the origin file

```php
Hook::exec('actionInvoiceNumberFormatted', [
            get_class($this) => $this,
            'id_lang' => (int) $id_lang,
            'id_shop' => (int) $id_shop,
            'number' => (int) $this->number,
        ])
```
