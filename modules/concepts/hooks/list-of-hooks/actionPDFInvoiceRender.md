---
menuTitle: actionPDFInvoiceRender
Title: actionPDFInvoiceRender
hidden: true
hookTitle: 
files:
  - src/Adapter/PDF/OrderInvoicePdfGenerator.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : actionPDFInvoiceRender

## Informations

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - src/Adapter/PDF/OrderInvoicePdfGenerator.php

## Hook call with parameters

```php
Hook::exec('actionPDFInvoiceRender', ['order_invoice_list' => $order_invoice_list]);
```