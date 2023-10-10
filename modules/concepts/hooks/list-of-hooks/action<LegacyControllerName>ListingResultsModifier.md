---
menuTitle: action<LegacyControllerName>ListingResultsModifier
Title: action<LegacyControllerName>ListingResultsModifier
hidden: true
hookTitle: 
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Bridge/Helper/Listing/HelperBridge/HelperListBridge.php'
        file: src/PrestaShopBundle/Bridge/Helper/Listing/HelperBridge/HelperListBridge.php
locations:
    - 'front office'
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
dispatchWithParameters('action' . $helperListConfiguration->legacyControllerName . 'ListingResultsModifier', [
            'list' => &$helperListConfiguration->list,
            'list_total' => &$helperListConfiguration->listTotal,
        ])
```
