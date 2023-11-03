---
Title: displayInvoiceLegalFreeText
hidden: true
hookTitle: 'PDF Invoice - Legal Free Text'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/pdf/HTMLTemplateInvoice.php'
        file: classes/pdf/HTMLTemplateInvoice.php
locations:
    - 'front office'
type: display
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook allows you to modify the legal free text on PDF invoices'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('displayInvoiceLegalFreeText', ['order' => $this->order])
```
