---
menuTitle: actionPresentProductListing
Title: actionPresentProductListing
hidden: true
hookTitle: Product Listing Presenter
files:
  - src/Adapter/Presenter/Product/ProductListingPresenter.php
locations:
  - front office
type: action
hookAliases:
---

# Hook actionPresentProductListing

## Information

{{% notice tip %}}
**Product Listing Presenter:** 

This hook is called before a product listing is presented
{{% /notice %}}

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [src/Adapter/Presenter/Product/ProductListingPresenter.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Adapter/Presenter/Product/ProductListingPresenter.php)

## Call of the Hook in the origin file

```php
Hook::exec('actionPresentProductListing',
            ['presentedProduct' => &$productListingLazyArray]
        )
```