---
Title: actionAdminControllerSetMedia
hidden: true
hookTitle: files:
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/classes/controller/AdminController.php'
        file: classes/controller/AdminController.php
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/src/PrestaShopBundle/Twig/Component/HeadTag.php'
        file: src/PrestaShopBundle/Twig/Component/HeadTag.php
locations:
    - 'back office'
type: action
hookAliases: 
hasExample: true
array_return: false
check_exceptions: false
chain: false
origin: core
description: ''

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionAdminControllerSetMedia')
```

## Example implementation
This hook has been implemented as an example in our 
[modules examples repository - demoextendgrid](https://github.com/PrestaShop/example-modules/tree/master/demoextendgrid).

{{% callout type="warning" %}}
In PrestaShop 9, this hook is dispatched from a Twig component. 
The methods `addJqueryPlugin()` and `addJqueryUI()` may not be available 
on migrated Symfony pages. Use `addJS()` and `addCSS()` instead.
{{% /callout %}}