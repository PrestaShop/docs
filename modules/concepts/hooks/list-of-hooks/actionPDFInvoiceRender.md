---
menuTitle: actionPDFInvoiceRender
Title: actionPDFInvoiceRender
hidden: true
hookTitle: 
files:
  - src/Adapter/PDF/OrderInvoicePdfGenerator.php
locations:
  - front office
type: action
hookAliases:
---

# Hook actionPDFInvoiceRender

## Information

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [src/Adapter/PDF/OrderInvoicePdfGenerator.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Adapter/PDF/OrderInvoicePdfGenerator.php)

## Call of the Hook in the origin file

```php
Hook::exec('actionPDFInvoiceRender', ['order_invoice_list' => $order_invoice_list])
```