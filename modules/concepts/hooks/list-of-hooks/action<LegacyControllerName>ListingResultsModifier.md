---
menuTitle: action<LegacyControllerName>ListingResultsModifier
Title: action<LegacyControllerName>ListingResultsModifier
hidden: true
hookTitle: 
files:
  - src/PrestaShopBundle/Bridge/Helper/Listing/HelperBridge/HelperListBridge.php
locations:
  - frontoffice
types:
  - symfony
---

# Hook : action<LegacyControllerName>ListingResultsModifier

## Informations

Hook locations: 
  - frontoffice

Hook types: 
  - symfony

Located in: 
  - src/PrestaShopBundle/Bridge/Helper/Listing/HelperBridge/HelperListBridge.php

## Hook call with parameters

```php
dispatchWithParameters('action' . $helperListConfiguration->legacyControllerName . 'ListingResultsModifier', [
            'list' => &$helperListConfiguration->list,
            'list_total' => &$helperListConfiguration->listTotal,
        ]);
```