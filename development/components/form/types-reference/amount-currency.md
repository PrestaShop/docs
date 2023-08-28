---
title: AmountCurrencyType
---

# AmountCurrencyType

Amount with currency: combination of a `NumberType` input and a `ChoiceType` input (for currency selection).

- Namespace: `PrestaShopBundle\Form\Admin\Type`
- Reference: [AmountCurrencyType](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Form/Admin/Type/AmountCurrencyType.php)

## Type options

| Option       | Type   | Default value                     | Description                                                                               |
| :----------- | :----- | :-------------------------------- | :---------------------------------------------------------------------------------------- |
| label | `boolean` | `false` |  |
| amount_constraints | `string` | `[]` |  |
| inherit_data | `boolean` | `true` |  |
| currencies | `array` | `[]`  |  |

## Code example

- [OrderPaymentType.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Form/Admin/Sell/Order/OrderPaymentType.php#L113-L122)

```php
$builder
   ->add('amount_currency', AmountCurrencyType::class, [
        'amount_constraints' => [
            new NotNull(),
            new GreaterThan([
                'value' => 0,
                'message' => $this->translator->trans(
                    'Invalid value: the payment must be a positive amount.', [], 'Admin.Notifications.Error'
                ),
            ]),
        ],
        'currencies' => $this->currencySymbolByIdChoiceProvider->getChoices([
            'id_shop' => $this->contextShopId,
        ]),
    ])
```

## Preview example

{{< figure src="../img/amount-currency.png" title="AmountCurrencyType rendered in form example" >}}
