---
Title: displayAdminListAfter
hidden: true
hookTitle: ''
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/admin-dev/themes/default/template/controllers/countries/helpers/list/list_footer.tpl'
        file: admin-dev/themes/default/template/controllers/countries/helpers/list/list_footer.tpl
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/admin-dev/themes/default/template/controllers/tax_rules/helpers/list/list_footer.tpl'
        file: admin-dev/themes/default/template/controllers/tax_rules/helpers/list/list_footer.tpl
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/admin-dev/themes/default/template/helpers/list/list_footer.tpl'
        file: admin-dev/themes/default/template/helpers/list/list_footer.tpl
locations:
    - 'back office'
type: display
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: ''

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{hook h='displayAdminListAfter'}
```
