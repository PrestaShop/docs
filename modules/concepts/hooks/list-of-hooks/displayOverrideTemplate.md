---
menuTitle: displayOverrideTemplate
Title: displayOverrideTemplate
hidden: true
hookTitle: Change the default template of current controller
files:
  - classes/controller/FrontController.php
locations:
  - frontoffice
type:
  - display
hookAliases:
---

# Hook displayOverrideTemplate

## Information

{{% notice tip %}}
**Change the default template of current controller:** 


{{% /notice %}}

Hook locations: 
  - frontoffice

Hook type: 
  - display

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/controller/FrontController.php](classes/controller/FrontController.php)

## Hook call in codebase

```php
Hook::exec(
            'displayOverrideTemplate',
            [
                'controller' => $this,
                'template_file' => $template,
                'id' => $params['id'],
                'locale' => $locale,
            ]
        )
```