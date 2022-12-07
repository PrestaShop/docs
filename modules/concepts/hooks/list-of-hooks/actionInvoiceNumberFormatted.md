---
menuTitle: actionInvoiceNumberFormatted
Title: actionInvoiceNumberFormatted
hidden: true
hookTitle: 
files:
  - classes/order/OrderInvoice.php
locations:
  - frontoffice
type:
  - action
hookAliases:
---

# Hook actionInvoiceNumberFormatted

## Information

Hook locations: 
  - frontoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/order/OrderInvoice.php](classes/order/OrderInvoice.php)

## Hook call in codebase

```php
Hook::exec('actionInvoiceNumberFormatted', [
            get_class($this) => $this,
            'id_lang' => (int) $id_lang,
            'id_shop' => (int) $id_shop,
            'number' => (int) $this->number,
        ])
```