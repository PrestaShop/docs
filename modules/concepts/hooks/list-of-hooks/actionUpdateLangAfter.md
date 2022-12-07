---
menuTitle: actionUpdateLangAfter
Title: actionUpdateLangAfter
hidden: true
hookTitle: Update "lang" tables
files:
  - classes/Language.php
locations:
  - frontoffice
type:
  - action
hookAliases:
---

# Hook actionUpdateLangAfter

## Information

{{% notice tip %}}
**Update "lang" tables:** 

Update "lang" tables after adding or updating a language
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Language.php](classes/Language.php)

## Hook call in codebase

```php
Hook::exec('actionUpdateLangAfter', ['lang' => $language])
```