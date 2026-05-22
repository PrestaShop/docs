---
Title: actionPDFInvoiceRender
hidden: true
hookTitle: 'PDF Invoice - Render'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/classes/PaymentModule.php'
        file: classes/PaymentModule.php
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/classes/order/OrderHistory.php'
        file: classes/order/OrderHistory.php
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/controllers/admin/AdminPdfController.php'
        file: controllers/admin/AdminPdfController.php
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/controllers/front/PdfInvoiceController.php'
        file: controllers/front/PdfInvoiceController.php
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/src/Adapter/PDF/InvoicePdfGenerator.php'
        file: src/Adapter/PDF/InvoicePdfGenerator.php
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/src/Adapter/PDF/OrderInvoicePdfGenerator.php'
        file: src/Adapter/PDF/OrderInvoicePdfGenerator.php
locations:
    - 'front office'
type: action
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is called when a PDF invoice is rendered from the Front Office and the Back Office'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionPDFInvoiceRender', ['order_invoice_list' => $order_invoice_list])
```
