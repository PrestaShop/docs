---
menuTitle: actionOutputHTMLBefore
Title: actionOutputHTMLBefore
hidden: true
hookTitle: Before HTML output
files:
  - classes/controller/FrontController.php
locations:
  - front office
type: action
hookAliases:
---

# Hook actionOutputHTMLBefore

## Information

{{% notice tip %}}
**Before HTML output:** 

This hook is used to filter the whole HTML page before it is rendered (only front)
{{% /notice %}}

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [classes/controller/FrontController.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/controller/FrontController.php)

## Call of the Hook in the origin file

```php
Hook::exec('actionOutputHTMLBefore', ['html' => &$html])
```