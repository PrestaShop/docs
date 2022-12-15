---
menuTitle: actionAdminLoginControllerSetMedia
Title: actionAdminLoginControllerSetMedia
hidden: true
hookTitle: Set media on admin login page header
files:
  - controllers/admin/AdminLoginController.php
locations:
  - back office
type: action
hookAliases:
---

# Hook actionAdminLoginControllerSetMedia

## Information

{{% notice tip %}}
**Set media on admin login page header:** 

This hook is called after adding media to admin login page header
{{% /notice %}}

Hook locations: 
  - back office

Hook type: action

Located in: 
  - [controllers/admin/AdminLoginController.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/controllers/admin/AdminLoginController.php)

## Call of the Hook in the origin file

```php
Hook::exec(
            'actionAdminLoginControllerSetMedia',
            [
                'controller' => $this,
            ]
        )
```