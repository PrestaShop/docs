---
menuTitle: overrideLayoutTemplate
Title: overrideLayoutTemplate
hidden: true
hookTitle: 
files:
  - classes/controller/FrontController.php
locations:
  - frontoffice
type:
  - 
hookAliases:
---

# Hook overrideLayoutTemplate

## Information

Hook locations: 
  - frontoffice

Hook type: 
  - 

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/controller/FrontController.php](classes/controller/FrontController.php)

## Hook call in codebase

```php
Hook::exec(
            'overrideLayoutTemplate',
            [
                'default_layout' => $layout,
                'entity' => $entity,
                'locale' => $this->context->language->locale,
                'controller' => $this,
                'content_only' => $content_only,
            ]
        )
```