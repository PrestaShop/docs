---
menuTitle: action<LegacyControllerName>ListingResultsModifier
Title: action<LegacyControllerName>ListingResultsModifier
hidden: true
hookTitle: 
files:
  - src/PrestaShopBundle/Bridge/Helper/Listing/HelperBridge/HelperListBridge.php
locations:
  - front office
type: action
hookAliases:
---

# Hook action&lt;LegacyControllerName>ListingResultsModifier

## Information

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [src/PrestaShopBundle/Bridge/Helper/Listing/HelperBridge/HelperListBridge.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Bridge/Helper/Listing/HelperBridge/HelperListBridge.php)

## Call of the Hook in the origin file

```php
dispatchWithParameters('action' . $helperListConfiguration->legacyControllerName . 'ListingResultsModifier', [
            'list' => &$helperListConfiguration->list,
            'list_total' => &$helperListConfiguration->listTotal,
        ])
```