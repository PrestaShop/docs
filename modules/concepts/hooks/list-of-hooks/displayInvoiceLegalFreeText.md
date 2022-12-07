---
menuTitle: displayInvoiceLegalFreeText
Title: displayInvoiceLegalFreeText
hidden: true
hookTitle: PDF Invoice - Legal Free Text
files:
  - classes/pdf/HTMLTemplateInvoice.php
locations:
  - frontoffice
type:
  - display
hookAliases:
---

# Hook displayInvoiceLegalFreeText

## Information

{{% notice tip %}}
**PDF Invoice - Legal Free Text:** 

This hook allows you to modify the legal free text on PDF invoices
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook type: 
  - display

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/pdf/HTMLTemplateInvoice.php](classes/pdf/HTMLTemplateInvoice.php)

## Hook call in codebase

```php
Hook::exec('displayInvoiceLegalFreeText', ['order' => $this->order])
```