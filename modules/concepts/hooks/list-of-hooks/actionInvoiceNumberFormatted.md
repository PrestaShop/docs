---
menuTitle: actionInvoiceNumberFormatted
Title: actionInvoiceNumberFormatted
hidden: true
hookTitle: 
files:
  - classes/order/OrderInvoice.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : actionInvoiceNumberFormatted

## Informations

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - classes/order/OrderInvoice.php

## Hook call with parameters

```php
Hook::exec('actionInvoiceNumberFormatted', [
            get_class($this) => $this,
            'id_lang' => (int) $id_lang,
            'id_shop' => (int) $id_shop,
            'number' => (int) $this->number,
        ]);
```