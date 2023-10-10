---
menuTitle: actionPDFInvoiceRender
Title: actionPDFInvoiceRender
hidden: true
hookTitle: 
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Adapter/PDF/OrderInvoicePdfGenerator.php'
        file: src/Adapter/PDF/OrderInvoicePdfGenerator.php
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
Hook::exec('actionPDFInvoiceRender', ['order_invoice_list' => $order_invoice_list])
```
