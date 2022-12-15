---
menuTitle: displayOverrideTemplate
Title: displayOverrideTemplate
hidden: true
hookTitle: Change the default template of current controller
files:
  - classes/controller/FrontController.php
locations:
  - front office
type: display
hookAliases:
---

# Hook displayOverrideTemplate

## Information

{{% notice tip %}}
**Change the default template of current controller:** 


{{% /notice %}}

Hook locations: 
  - front office

Hook type: display

Located in: 
  - [classes/controller/FrontController.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/controller/FrontController.php)

## Call of the Hook in the origin file

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