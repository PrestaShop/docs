---
title: FormattedTextareaType
---

# FormattedTextareaType

Enables TinyMCE text editor on TextareaType.

## Type options

| Option   | Type | Default value | Description                                                                                                            |
|:---------|:-----|:--------------|:-----------------------------------------------------------------------------------------------------------------------|
| autoload | bool | true          | Whether to automatically load TinyMCE editor, or no.                                                                   |
| limit    | int  | 21844         | Limit of characters in text field. By default value equals to max size of UTF-8 content available in MySQL text column |

## Required Javascript components
    
In order to use TinyMCE editor in the PrestaShop UI Kit, you need to initialize its javascript component once the page is loaded:
```js
$(document).ready(function () {
    window.prestashop.component.initComponents(
        [
            "TinyMCEEditor"
        ],
    );
});
```


## Code example

```php
<?php
// path/to/your/CustomType.php

use PrestaShopBundle\Form\Admin\Type\FormattedTextareaType;

class CustomType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'test_text_field',
                FormattedTextareaType::class
            )
        ;
    }
}
```

## Preview example

{{< figure src="../img/formatted_textarea.png" title="FormattedTextareaType rendered in form example" >}}
