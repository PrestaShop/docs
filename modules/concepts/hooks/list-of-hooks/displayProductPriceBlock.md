---
Title: displayProductPriceBlock
hidden: true
hookTitle: displayProductPriceBlock
files:
    -
      theme: hummingbird
      url: https://github.com/PrestaShop/hummingbird/blob/develop/templates/catalog/_partials/miniatures/product.tpl
      file: themes/hummingbird/templates/catalog/_partials/miniatures/product.tpl
    -
      theme: classic
      url: https://github.com/PrestaShop/classic-theme/blob/develop/templates/catalog/_partials/miniatures/product.tpl
      file: themes/classic/templates/catalog/_partials/miniatures/product.tpl
    -
      theme: hummingbird
      url: https://github.com/PrestaShop/hummingbird/blob/develop/templates/catalog/_partials/product-prices.tpl
      file: themes/hummingbird/templates/catalog/_partials/product-prices.tpl
    -
      theme: classic
      url: https://github.com/PrestaShop/classic-theme/blob/develop/templates/catalog/_partials/product-prices.tpl
      file: themes/classic/templates/catalog/_partials/product-prices.tpl
    -
      theme: classic
      url: https://github.com/PrestaShop/classic-theme/blob/develop/templates/checkout/_partials/cart-detailed-product-line.tpl
      file: themes/classic/templates/checkout/_partials/cart-detailed-product-line.tpl
    -
      theme: hummingbird
      url: https://github.com/PrestaShop/hummingbird/blob/develop/templates/checkout/_partials/cart-detailed-product-line.tpl
      file: themes/hummingbird/templates/checkout/_partials/cart-detailed-product-line.tpl
    -
      theme: classic
      url: https://github.com/PrestaShop/classic-theme/blob/develop/templates/checkout/_partials/cart-summary-product-line.tpl
      file: themes/classic/templates/checkout/_partials/cart-summary-product-line.tpl
    -
      theme: hummingbird
      url: https://github.com/PrestaShop/hummingbird/blob/develop/templates/checkout/_partials/cart-summary-product-line.tpl
      file: themes/hummingbird/templates/checkout/_partials/cart-summary-product-line.tpl
    -
      theme: classic
      url: https://github.com/PrestaShop/classic-theme/blob/develop/templates/checkout/_partials/order-confirmation-table-multishipment.tpl
      file: themes/classic/templates/checkout/_partials/order-confirmation-table-multishipment.tpl
    -
      theme: hummingbird
      url: https://github.com/PrestaShop/hummingbird/blob/develop/templates/checkout/_partials/order-confirmation-table-multishipment.tpl
      file: themes/hummingbird/templates/checkout/_partials/order-confirmation-table-multishipment.tpl
    -
      theme: classic
      url: https://github.com/PrestaShop/classic-theme/blob/develop/templates/checkout/_partials/order-confirmation-table.tpl
      file: themes/classic/templates/checkout/_partials/order-confirmation-table.tpl
    -
      theme: hummingbird
      url: https://github.com/PrestaShop/hummingbird/blob/develop/templates/checkout/_partials/order-confirmation-table.tpl
      file: themes/hummingbird/templates/checkout/_partials/order-confirmation-table.tpl
locations:
    - front office
type: display
hookAliases: 
origin: theme
array_return: false
check_exceptions: false
chain: false
description: 

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{hook h='displayProductPriceBlock' product=$product type="before_price"}
```
