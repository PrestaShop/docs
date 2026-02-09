---
Title: actionUpdateDefaultCombinationAfter
hidden: true
hookTitle: 'React after a product default combination is updated'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/src/Adapter/Product/Combination/Update/DefaultCombinationUpdater.php'
        file: src/Adapter/Product/Combination/Update/DefaultCombinationUpdater.php
locations:
    - 'back office'
type: action
hookAliases:
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is triggered after a product default combination is set (updated in database), allowing modules to react to the new default combination.'
---

{{% hookDescriptor %}}

## Purpose

The `actionUpdateDefaultCombinationAfter` hook allows modules to **react right after** the default combination of a product has been updated.

It is dispatched when a merchant sets a new default combination in the product page (Back Office).

## Parameters available

The hook receives an array of parameters:

| Parameter            | Type | Description |
|--------------------- |------|-------------|
| id_product           | int  | The product ID. |
| id_product_attribute | int  | The ID of the new default combination (product attribute ID). |
| id_shop              | int  | The shop ID (current shop context). |

## Example usage

```php
public function hookActionUpdateDefaultCombinationAfter(array $params): void
{
    $productId = (int) ($params['id_product'] ?? 0);
    $productAttributeId = (int) ($params['id_product_attribute'] ?? 0);
    $shopId = (int) ($params['id_shop'] ?? 0);

    if ($productId <= 0 || $productAttributeId <= 0) {
        return;
    }

    // Your custom code
}
```

## Call of the Hook in the origin file

```php
$this->hookDispatcher->dispatchWithParameters(
    'actionUpdateDefaultCombinationAfter',
    [
        'id_product' => (int) $newDefaultCombination->id_product,
        'id_product_attribute' => (int) $defaultCombinationId->getValue(),
        'id_shop' => $shopConstraint->getShopId()->getValue(),
    ]
);
```
