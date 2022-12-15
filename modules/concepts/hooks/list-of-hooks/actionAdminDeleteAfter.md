---
menuTitle: actionAdminDeleteAfter
Title: actionAdminDeleteAfter
hidden: true
hookTitle: 
files:
  - src/PrestaShopBundle/Controller/Admin/ProductController.php
locations:
  - back office
type: action
hookAliases:
---

# Hook actionAdminDeleteAfter

## Information

Hook locations: 
  - back office

Hook type: action

Located in: 
  - [src/PrestaShopBundle/Controller/Admin/ProductController.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Controller/Admin/ProductController.php)

## Call of the Hook in the origin file

```php
dispatchWithParameters(
                        'actionAdminDeleteAfter',
                        $hookEventParameters
                    )
```