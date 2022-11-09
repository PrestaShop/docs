---
menuTitle: displayInvoiceLegalFreeText
Title: displayInvoiceLegalFreeText
hidden: true
hookTitle: PDF Invoice - Legal Free Text
files:
  - classes/pdf/HTMLTemplateInvoice.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : displayInvoiceLegalFreeText

## Informations

{{% notice tip %}}
**PDF Invoice - Legal Free Text:** 

This hook allows you to modify the legal free text on PDF invoices
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - classes/pdf/HTMLTemplateInvoice.php

## Hook call with parameters

```php
Hook::exec('displayInvoiceLegalFreeText', ['order' => $this->order]);
```