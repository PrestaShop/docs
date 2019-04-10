---
title: Form Types Reference
menuTitle: Form Types Reference
weight: 20
---

## Form types reference

While developing on PrestaShop you can use any form field type that is provided by Symfony framework.
More about Symfony field types: https://symfony.com/doc/current/reference/forms/types.html.
In addition, PrestaShop has some custom reusable field types located in 
`src/PrestaShopBundle/Form/Admin/Type` that should save your time:

#### Text fields

* [FormattedTextareaType](formatted-textarea)

* [GeneratableTextType](generatable-text)

* [IpAddressType](ip-address)

* [ResizableTextType](resizable-text)
    
* [TextWithLengthCounterType](text-with-length-counter)

* [TextWithUnitType](text-with-unit)

* [TranslatableType](translatable)

* [TranslateTextType](translate-text)

* [TranslateType](translate)

#### Choice fields

* [CategoryChoiceTreeType](category-choice-tree)

* [CountryChoiceType](country-choice)

* [MeterialChoiceTableType](meterial-choice-table)

* [MeterialChoiceTreeType](meterial-choice-tree)

* [MeterialMultipleChoiceTableType](meterial-multiple-choice-table)

* [ShopChoiceTreeType](shop-choice)

* [SwitchType](switch)

* [YesAndNoChoiceType](yes-and-no-choice)

#### Date and time fields

* [DatePickerType](date-picker)

* [DateRangeType](date-range)

#### Button fields

* [SearchAndResetType](search-and-reset)

#### Other fields

* [ChangePasswordType](change-password)

* [MoneyWithSuffixType](money-with-suffix)

* [CustomMoneyType](custom-money)
