---
Title: actionAdminProductsListingFieldsModifier
hidden: true
hookTitle: 
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/classes/controller/AdminController.php'
        file: classes/controller/AdminController.php
locations:
    - 'back office'
type: action
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: ''

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('action' . $this->controller_name . 'ListingFieldsModifier', [
    'select' => &$this->_select,
    'join' => &$this->_join,
    'where' => &$this->_where,
    'group_by' => &$this->_group,
    'order_by' => &$this->_orderBy,
    'order_way' => &$this->_orderWay,
    'fields' => &$this->fields_list,
]);
```
