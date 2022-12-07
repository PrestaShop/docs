---
menuTitle: action<LegacyControllerName>ListingResultsModifier
Title: action<LegacyControllerName>ListingResultsModifier
hidden: true
hookTitle: 
files:
  - src/PrestaShopBundle/Bridge/Helper/Listing/HelperBridge/HelperListBridge.php
locations:
  - frontoffice
type:
  - action
hookAliases:
---

# Hook action<LegacyControllerName>ListingResultsModifier

## Information

Hook locations: 
  - frontoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Bridge/Helper/Listing/HelperBridge/HelperListBridge.php](src/PrestaShopBundle/Bridge/Helper/Listing/HelperBridge/HelperListBridge.php)

## Hook call in codebase

```php
dispatchWithParameters('action' . $helperListConfiguration->legacyControllerName . 'ListingResultsModifier', [
            'list' => &$helperListConfiguration->list,
            'list_total' => &$helperListConfiguration->listTotal,
        ])
```