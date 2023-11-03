---
title: PriceReductionType
---

# PriceReductionType

Responsible for creating form for price reduction

- Namespace: PrestaShopBundle\Form\Admin\Type
- Reference: [PriceReductionType](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Form/Admin/Type/PriceReductionType.php)

## Type options

| Option       | Type   | Default value                     | Description                                                                               |
| :----------- | :----- | :-------------------------------- | :---------------------------------------------------------------------------------------- |

## Code example

- [CatalogPriceRuleType](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Form/Admin/Sell/CatalogPriceRule/CatalogPriceRuleType.php#L190-L205)

```php
$builder->add('reduction', PriceReductionType::class, [
    'constraints' => [
        new Reduction([
            'invalidPercentageValueMessage' => $this->translator->trans(
                'Reduction value "%value%" is invalid. Allowed values from 0 to %max%',
                ['%max%' => ReductionVO::MAX_ALLOWED_PERCENTAGE . '%'],
                'Admin.Notifications.Error'
            ),
            'invalidAmountValueMessage' => $this->translator->trans(
                'Reduction value "%value%" is invalid. Value cannot be negative',
                [],
                'Admin.Notifications.Error'
            ),
        ]),
    ],
])
```
