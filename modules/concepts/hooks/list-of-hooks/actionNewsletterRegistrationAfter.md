---
menuTitle: actionNewsletterRegistrationAfter
Title: actionNewsletterRegistrationAfter
hidden: true
hookTitle: 
files:
  - modules/ps_emailsubscription/ps_emailsubscription.php
locations:
  - frontoffice
type:
  - action
hookAliases:
---

# Hook actionNewsletterRegistrationAfter

## Information

Hook locations: 
  - frontoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/modules/ps_emailsubscription/ps_emailsubscription.php](modules/ps_emailsubscription/ps_emailsubscription.php)

## Hook call in codebase

```php
Hook::exec(
            'actionNewsletterRegistrationAfter',
            [
                'hookName' => $hookName,
                'email' => $_POST['email'],
                'action' => $_POST['action'],
                'error' => &$this->error,
            ]
        )
```