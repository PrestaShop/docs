---
menuTitle: actionAdminDuplicateBefore
Title: actionAdminDuplicateBefore
hidden: true
hookTitle: 
files:
  - src/PrestaShopBundle/Controller/Admin/ProductController.php
locations:
  - backoffice
type:
  - action
hookAliases:
---

# Hook actionAdminDuplicateBefore

## Information

Hook locations: 
  - backoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Controller/Admin/ProductController.php](src/PrestaShopBundle/Controller/Admin/ProductController.php)

## Hook call in codebase

```php
dispatchWithParameters(
                        'actionAdminDuplicateBefore',
                        $hookEventParameters
                    )
```