---
menuTitle: displayInvoiceLegalFreeText
Title: displayInvoiceLegalFreeText
hidden: true
hookTitle: PDF Invoice - Legal Free Text
files:
  - classes/pdf/HTMLTemplateInvoice.php
locations:
  - front office
type: display
hookAliases:
---

# Hook displayInvoiceLegalFreeText

## Information

{{% notice tip %}}
**PDF Invoice - Legal Free Text:** 

This hook allows you to modify the legal free text on PDF invoices
{{% /notice %}}

Hook locations: 
  - front office

Hook type: display

Located in: 
  - [classes/pdf/HTMLTemplateInvoice.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/pdf/HTMLTemplateInvoice.php)

## Call of the Hook in the origin file

```php
Hook::exec('displayInvoiceLegalFreeText', ['order' => $this->order])
```