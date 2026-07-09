---
Title: displaySubcategories
hidden: true
hookTitle: 'Display content in subcategory list'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.2.x/themes/hummingbird/templates/catalog/_partials/subcategories.tpl'
        file: themes/hummingbird/templates/catalog/_partials/subcategories.tpl
locations:
    - 'front office'
type: display
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hooks allows you to display additional items in a list of subcategories in front office. Related blog posts, links to other categories, landing pages etc.'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{hook h='displaySubcategories' displaySubcategoryImages=$displaySubcategoryImages};
```
