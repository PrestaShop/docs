---
Title: actionAdminLoginControllerSetMedia
hidden: true
hookTitle: 'Set media on admin login page header'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/src/PrestaShopBundle/Twig/Component/Login/LoginHeadTag.php'
        file: src/PrestaShopBundle/Twig/Component/Login/LoginHeadTag.php
locations:
    - 'back office'
type: action
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is called after adding media to admin login page header'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
$this->hookDispatcher->dispatchWithParameters(
            'actionAdminLoginControllerSetMedia',
            [
                'controller' => $this->legacyControllerContext,
            ]
        );
```
