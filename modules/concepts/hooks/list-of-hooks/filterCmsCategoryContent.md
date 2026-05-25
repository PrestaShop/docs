---
Title: filterCmsCategoryContent
hidden: true
hookTitle: 'Filter the content page category'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/controllers/front/CmsController.php'
        file: controllers/front/CmsController.php
locations:
    - 'front office'
type: action
hookAliases: 
array_return: false
check_exceptions: true
chain: true
origin: core
description: 'This hook is called just before fetching content page category'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
$filteredCmsCategoryContent = Hook::exec(
    'filterCmsCategoryContent',
    ['object' => $cmsCategoryVar],
    null,
    false,
    true,
    false,
    null,
    true
);
```
