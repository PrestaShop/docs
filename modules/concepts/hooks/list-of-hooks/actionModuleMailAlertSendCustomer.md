---
menuTitle: actionModuleMailAlertSendCustomer
Title: actionModuleMailAlertSendCustomer
hidden: true
hookTitle: 
files:
  - modules/ps_emailalerts/MailAlert.php
locations:
  - front office
type: action
hookAliases:
---

# Hook actionModuleMailAlertSendCustomer

## Information

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [modules/ps_emailalerts/MailAlert.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/modules/ps_emailalerts/MailAlert.php)

## Call of the Hook in the origin file

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