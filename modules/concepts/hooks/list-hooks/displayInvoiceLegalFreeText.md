---
menuTitle: displayInvoiceLegalFreeText
title: displayInvoiceLegalFreeText
hidden: true
files:
  - classes/pdf/HTMLTemplateInvoice.php
types:
  - frontoffice
hookTypes:
  - legacy
---

# Hook : displayInvoiceLegalFreeText

Located in :

  - classes/pdf/HTMLTemplateInvoice.php

## Parameters

```php
Hook::exec('displayInvoiceLegalFreeText', ['order' => $this->order]);
```