---
menuTitle: action<Controller>ListingResultsModifier
Title: action<Controller>ListingResultsModifier
hidden: true
hookTitle: 
files:
  - classes/controller/AdminController.php
locations:
  - back office
type: action
hookAliases:
---

# Hook action&lt;Controller>ListingResultsModifier

## Information

Hook locations: 
  - back office

Hook type: action

Located in: 
  - [classes/controller/AdminController.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/controller/AdminController.php)

## Call of the Hook in the origin file

```php
Hook::exec('action' . $this->controller_name . 'ListingResultsModifier', [
            'list' => &$this->_list,
            'list_total' => &$this->_listTotal,
        ])
```