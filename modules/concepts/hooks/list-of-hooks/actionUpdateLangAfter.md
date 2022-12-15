---
menuTitle: actionUpdateLangAfter
Title: actionUpdateLangAfter
hidden: true
hookTitle: Update "lang" tables
files:
  - classes/Language.php
locations:
  - front office
type: action
hookAliases:
---

# Hook actionUpdateLangAfter

## Information

{{% notice tip %}}
**Update "lang" tables:** 

Update "lang" tables after adding or updating a language
{{% /notice %}}

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [classes/Language.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Language.php)

## Call of the Hook in the origin file

```php
Hook::exec('actionUpdateLangAfter', ['lang' => $language])
```