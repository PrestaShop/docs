---
menuTitle: actionPresentProduct
Title: actionPresentProduct
hidden: true
hookTitle: Product Presenter
files:
  - src/Adapter/Presenter/Product/ProductPresenter.php
locations:
  - frontoffice
type:
  - action
hookAliases:
---

# Hook actionPresentProduct

## Information

{{% notice tip %}}
**Product Presenter:** 

This hook is called before a product is presented
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Adapter/Presenter/Product/ProductPresenter.php](src/Adapter/Presenter/Product/ProductPresenter.php)

## Hook call in codebase

```php
Hook::exec('actionPresentProduct',
            ['presentedProduct' => &$productLazyArray]
        )
```