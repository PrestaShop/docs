---
menuTitle: actionAdminLoginControllerSetMedia
Title: actionAdminLoginControllerSetMedia
hidden: true
hookTitle: Set media on admin login page header
files:
  - controllers/admin/AdminLoginController.php
locations:
  - backoffice
type:
  - action
hookAliases:
---

# Hook actionAdminLoginControllerSetMedia

## Information

{{% notice tip %}}
**Set media on admin login page header:** 

This hook is called after adding media to admin login page header
{{% /notice %}}

Hook locations: 
  - backoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/controllers/admin/AdminLoginController.php](controllers/admin/AdminLoginController.php)

## Hook call in codebase

```php
Hook::exec(
            'actionAdminLoginControllerSetMedia',
            [
                'controller' => $this,
            ]
        )
```