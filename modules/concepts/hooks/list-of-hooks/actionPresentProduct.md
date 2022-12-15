---
menuTitle: actionPresentProduct
Title: actionPresentProduct
hidden: true
hookTitle: Product Presenter
files:
  - src/Adapter/Presenter/Product/ProductPresenter.php
locations:
  - front office
type: action
hookAliases:
---

# Hook actionPresentProduct

## Information

{{% notice tip %}}
**Product Presenter:** 

This hook is called before a product is presented
{{% /notice %}}

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [src/Adapter/Presenter/Product/ProductPresenter.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Adapter/Presenter/Product/ProductPresenter.php)

## Call of the Hook in the origin file

```php
Hook::exec('actionPresentProduct',
            ['presentedProduct' => &$productLazyArray]
        )
```