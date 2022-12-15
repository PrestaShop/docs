---
menuTitle: actionInvoiceNumberFormatted
Title: actionInvoiceNumberFormatted
hidden: true
hookTitle: 
files:
  - classes/order/OrderInvoice.php
locations:
  - front office
type: action
hookAliases:
---

# Hook actionInvoiceNumberFormatted

## Information

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [classes/order/OrderInvoice.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/order/OrderInvoice.php)

## Call of the Hook in the origin file

```php
Hook::exec('actionInvoiceNumberFormatted', [
            get_class($this) => $this,
            'id_lang' => (int) $id_lang,
            'id_shop' => (int) $id_shop,
            'number' => (int) $this->number,
        ])
```