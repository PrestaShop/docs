---
menuTitle: actionInvoiceNumberFormatted
title: actionInvoiceNumberFormatted
hidden: true
files:
  - classes/order/OrderInvoice.php
types:
  - frontoffice
hookTypes:
  - legacy
---

# Hook : actionInvoiceNumberFormatted

Located in :

  - classes/order/OrderInvoice.php

## Parameters

```php
Hook::exec('actionInvoiceNumberFormatted', [
            get_class($this) => $this,
            'id_lang' => (int) $id_lang,
            'id_shop' => (int) $id_shop,
            'number' => (int) $this->number,
        ]);
```