---
Title: actionGetPdfRenderer
hidden: true
hookTitle: 'Allows modules to provide a custom PDF renderer'
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
description: 'This hook allows modules to provide a custom PDF renderer (PDFGenerator) for generating PDF documents like invoices, delivery slips, and order returns.'

---

{{% hookDescriptor %}}

## Parameters

```php
[
    'template' => $template,      // Template type string (e.g., 'Invoice', 'OrderReturn')
    'orientation' => $orientation, // Page orientation ('P' for portrait, 'L' for landscape)
]
```

## Expected return value

Return a `PDFGenerator` instance to use a custom renderer, or `null` to use the default TCPDF-based renderer.

## Call of the Hook in the origin file

```php
$renderers = Hook::exec(
    'actionGetPdfRenderer',
    [
        'template' => $template,
        'orientation' => $orientation,
    ],
    null,
    true
);
```

## Example usage

```php
public function hookActionGetPdfRenderer($params)
{
    // Use a custom PDF library for all templates
    return new MyCustomPdfGenerator($params['orientation']);
}
```

## Use cases

This hook is useful when you need to:

- Use a different PDF library (e.g., Dompdf, mPDF) instead of the default TCPDF
- Apply custom PDF settings globally (fonts, margins, headers)
- Implement PDF/A compliance for archiving
- Add watermarks or security features to all generated PDFs
