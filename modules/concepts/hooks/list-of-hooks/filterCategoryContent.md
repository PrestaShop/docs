---
Title: filterCategoryContent
hidden: true
hookTitle: 'Filter the content page category'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/controllers/front/listing/CategoryController.php'
        file: controllers/front/listing/CategoryController.php
locations:
    - 'front office'
type: action
hookAliases: 
array_return: $array_return = false
check_exceptions: $check_exceptions = true
chain: $chain = true
origin: core
description: 'This hook is called just before fetching content page category'

---

{{% hookDescriptor %}}

## Parameters details

```php
    <?php
    array(
        'object' => (object) Category object
    ),
```

## Call of the Hook in the origin file

```php
$filteredCategory = Hook::exec(
    'filterCategoryContent',
    ['object' => $categoryVar],
    $id_module = null,
    $array_return = false,
    $check_exceptions = true,
    $use_push = false,
    $id_shop = null,
    $chain = true
);
```
