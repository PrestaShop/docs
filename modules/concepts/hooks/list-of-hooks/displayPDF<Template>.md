---
Title: displayPDF<Template>
hidden: true
hookTitle: 'Add content to PDF templates'
files:
    - 
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.1.x/pdf/delivery-slip.tpl'
        file: 'pdf/delivery-slip.tpl'
    - 
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.1.x/pdf/invoice-b2b.tpl'
        file: 'pdf/invoice-b2b.tpl'
    - 
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.1.x/pdf/invoice.tpl'
        file: 'pdf/invoice.tpl'
    - 
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.1.x/pdf/order-return.tpl'
        file: 'pdf/order-return.tpl'
    - 
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.1.x/pdf/order-slip.tpl'
        file: 'pdf/order-slip.tpl'
locations:
    - 'front office'
    - 'back office'
type: display
hookAliases:
origin: theme
array_return: false
check_exceptions: false
chain: false
description: 'Allows to add content in HTML to PDF templates'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
<!-- Hook -->
{if isset($HOOK_DISPLAY_PDF)}
    <tr>
        <td colspan="12" height="30">&nbsp;</td>
    </tr>

    <tr>
        <td colspan="12">
            {$HOOK_DISPLAY_PDF}
        </td>
    </tr>
{/if}
```

This hook is a dynamic hook, generated in `classes/pdf/HTMLTemplate.php`: 

```php
$template = ucfirst(str_replace('HTMLTemplate', '', get_class($this)));
$hook_name = 'displayPDF' . $template;

$this->smarty->assign([
    'HOOK_DISPLAY_PDF' => Hook::exec(
        $hook_name,
        [
            'object' => $object,
            // The smarty instance is a clone that does NOT escape HTML
            'smarty' => $this->smarty,
        ]
    ),
]);
```