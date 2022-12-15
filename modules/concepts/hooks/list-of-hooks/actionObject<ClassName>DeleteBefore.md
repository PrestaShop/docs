---
menuTitle: actionObject<ClassName>DeleteBefore
Title: actionObject<ClassName>DeleteBefore
hidden: true
hookTitle: 
files:
  - classes/ObjectModel.php
locations:
  - back office
  - front office
type: action
hookAliases:
---

# Hook actionObject&lt;ClassName>DeleteBefore

## Information

Hook locations: 
  - back office
  - front office

Hook type: action

Located in: 
  - [classes/ObjectModel.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/ObjectModel.php)

## Call of the Hook in the origin file

```php
Hook::exec('actionObject' . $this->getFullyQualifiedName() . 'DeleteBefore', ['object' => $this]);
```