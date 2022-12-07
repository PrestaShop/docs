---
menuTitle: actionOutputHTMLBefore
Title: actionOutputHTMLBefore
hidden: true
hookTitle: Before HTML output
files:
  - classes/controller/FrontController.php
locations:
  - frontoffice
type:
  - action
hookAliases:
---

# Hook actionOutputHTMLBefore

## Information

{{% notice tip %}}
**Before HTML output:** 

This hook is used to filter the whole HTML page before it is rendered (only front)
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/controller/FrontController.php](classes/controller/FrontController.php)

## Hook call in codebase

```php
Hook::exec('actionOutputHTMLBefore', ['html' => &$html])
```