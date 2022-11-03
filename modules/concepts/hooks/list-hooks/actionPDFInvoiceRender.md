---
menuTitle: actionPDFInvoiceRender
title: actionPDFInvoiceRender
hidden: true
files:
  - src/Adapter/PDF/OrderInvoicePdfGenerator.php
types:
  - frontoffice
hookTypes:
  - legacy
---

# Hook : actionPDFInvoiceRender

Located in :

  - src/Adapter/PDF/OrderInvoicePdfGenerator.php

## Parameters

```php
Hook::exec('actionPDFInvoiceRender', ['order_invoice_list' => $order_invoice_list]);
```