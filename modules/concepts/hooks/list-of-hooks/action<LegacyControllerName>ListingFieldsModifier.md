---
menuTitle: action<LegacyControllerName>ListingFieldsModifier
Title: action<LegacyControllerName>ListingFieldsModifier
hidden: true
hookTitle: 
files:
  - src/PrestaShopBundle/Bridge/Helper/Listing/HelperBridge/HelperListBridge.php
locations:
  - frontoffice
types:
  - symfony
---

# Hook : action<LegacyControllerName>ListingFieldsModifier

## Informations

Hook locations: 
  - frontoffice

Hook types: 
  - symfony

Located in: 
  - src/PrestaShopBundle/Bridge/Helper/Listing/HelperBridge/HelperListBridge.php

## Hook call with parameters

```php
dispatchWithParameters('action' . $helperListConfiguration->legacyControllerName . 'ListingFieldsModifier', [
            'select' => &$helperListConfiguration->select,
            'join' => &$helperListConfiguration->join,
            'where' => &$helperListConfiguration->where,
            'group_by' => &$helperListConfiguration->group,
            'order_by' => &$helperListConfiguration->orderBy,
            'order_way' => &$helperListConfiguration->orderWay,
            'fields' => &$helperListConfiguration->fieldsList,
        ]);
```