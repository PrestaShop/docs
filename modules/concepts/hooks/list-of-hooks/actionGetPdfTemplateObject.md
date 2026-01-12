---
Title: actionGetPdfTemplateObject
hidden: true
hookTitle: 'Allows modules to provide custom PDF template objects'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.0.x/classes/pdf/PDF.php'
        file: classes/pdf/PDF.php
locations:
    - 'back office'
type: action
hookAliases:
array_return: true
check_exceptions: false
chain: false
origin: core
description: 'This hook allows modules to override the default PDF template object used for generating PDFs like invoices, delivery slips, and order returns.'

---

{{% hookDescriptor %}}

## Parameters

```php
[
    'object' => $object,        // The source object (Order, OrderReturn, etc.)
    'smarty' => $smarty,        // Smarty template engine instance
    'send_bulk_flag' => $send_bulk_flag,  // Boolean indicating bulk PDF generation
    'template' => $template,    // Template type string (e.g., 'Invoice', 'OrderReturn')
]
```

## Expected return value

Return an `HTMLTemplate` instance to override the default template, or `false` to use the default behavior.

## Call of the Hook in the origin file

```php
$templateObjects = Hook::exec(
    'actionGetPdfTemplateObject',
    [
        'object' => $object,
        'smarty' => $smarty,
        'send_bulk_flag' => $send_bulk_flag,
        'template' => $template,
    ],
    null,
    true
);
```

## Example usage

```php
public function hookActionGetPdfTemplateObject($params)
{
    // Only handle invoices
    if ($params['template'] !== 'Invoice') {
        return false;
    }

    // Return a custom template object
    return new MyCustomInvoiceTemplate(
        $params['object'],
        $params['smarty'],
        $params['send_bulk_flag']
    );
}
```
