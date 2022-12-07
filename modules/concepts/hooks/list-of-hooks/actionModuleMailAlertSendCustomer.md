---
menuTitle: actionModuleMailAlertSendCustomer
Title: actionModuleMailAlertSendCustomer
hidden: true
hookTitle: 
files:
  - modules/ps_emailalerts/MailAlert.php
locations:
  - frontoffice
type:
  - action
hookAliases:
---

# Hook actionModuleMailAlertSendCustomer

## Information

Hook locations: 
  - frontoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/modules/ps_emailalerts/MailAlert.php](modules/ps_emailalerts/MailAlert.php)

## Hook call in codebase

```php
Hook::exec(
                'actionModuleMailAlertSendCustomer',
                [
                    'product' => $product_name,
                    'link' => $product_link,
                    'customer' => $customer,
                    'product_obj' => $product,
                ]
            )
```