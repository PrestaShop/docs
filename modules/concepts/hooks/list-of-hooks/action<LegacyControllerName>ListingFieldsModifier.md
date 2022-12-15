---
menuTitle: action<LegacyControllerName>ListingFieldsModifier
Title: action<LegacyControllerName>ListingFieldsModifier
hidden: true
hookTitle: 
files:
  - src/PrestaShopBundle/Bridge/Helper/Listing/HelperBridge/HelperListBridge.php
locations:
  - front office
type: action
hookAliases:
---

# Hook action&lt;LegacyControllerName>ListingFieldsModifier

## Information

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [src/PrestaShopBundle/Bridge/Helper/Listing/HelperBridge/HelperListBridge.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Bridge/Helper/Listing/HelperBridge/HelperListBridge.php)

## Call of the Hook in the origin file

```php
dispatchWithParameters('action' . $helperListConfiguration->legacyControllerName . 'ListingFieldsModifier', [
            'select' => &$helperListConfiguration->select,
            'join' => &$helperListConfiguration->join,
            'where' => &$helperListConfiguration->where,
            'group_by' => &$helperListConfiguration->group,
            'order_by' => &$helperListConfiguration->orderBy,
            'order_way' => &$helperListConfiguration->orderWay,
            'fields' => &$helperListConfiguration->fieldsList,
        ])
```