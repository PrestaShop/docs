---
menuTitle: actionUpdateLangAfter
Title: actionUpdateLangAfter
hidden: true
hookTitle: Update "lang" tables
files:
  - classes/Language.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : actionUpdateLangAfter

## Informations

{{% notice tip %}}
**Update "lang" tables:** 

Update "lang" tables after adding or updating a language
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - classes/Language.php

## Hook call with parameters

```php
Hook::exec('actionUpdateLangAfter', ['lang' => $language]);
```