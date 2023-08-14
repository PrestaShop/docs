---
title: Types Reference
menuTitle: Types Reference
weight: 20
---

# Types reference

Developers can already use a large list of field types (see [Symfony types](https://symfony.com/doc/4.4/reference/forms/types.html)) that comes from the Symfony framework. In addition to that, PrestaShop adds more reusable field types that developers can use.

| Form type name | Namespace | Description |
| --- | --- | --- |
| `AccordionType` | PrestaShopBundle\Form\Admin\Type | This form type is used as a container of sub forms, each sub form will be rendered as a part of an accordion. |
| `AmountCurrencyType` | PrestaShopBundle\Form\Admin\Type | Amount with currency: combination of a `NumberType` input and a `ChoiceType` input (for currency selection). |
| `ButtonCollectionType` | PrestaShopBundle\Form\Admin\Type | `ButtonCollectionType` is a form type used to group buttons in a common form group which is useful for forms which have multiple submit buttons. |
| `CategoryChoiceTreeType` | PrestaShopBundle\Form\Admin\Type | A `MaterialChoiceTreeType` for categories |
| `ChangePasswordType` | PrestaShopBundle\Form\Admin\Type | `ChangePasswordType` is responsible for defining "change password" form type. |
| `ChoiceCategoriesTreeType` | PrestaShopBundle\Form\Admin\Type | This form class is responsible to create a category selector using Nested sets |
| `ColorPickerType` | PrestaShopBundle\Form\Admin\Type | This form class is responsible to create a color picker field |
| `ConfigurableCountryChoiceType` | PrestaShopBundle\Form\Admin\Type | Class responsible for providing configurable countries list |
| `CountryChoiceType` | PrestaShopBundle\Form\Admin\Type | CountryChoiceType is responsible for providing country choices with -- symbol in front of array. |
| `CustomContentType` | PrestaShopBundle\Form\Admin\Type | Type is used to add any content in any position of the form rather than actual field. |
| `CustomMoneyType` | PrestaShopBundle\Form\Admin\Type | Native Symfony `MoneyType` customised for PrestaShop |
| `DatePickerType` | PrestaShopBundle\Form\Admin\Type | This form class is responsible to create a date picker field |
| `DateRangeType` | PrestaShopBundle\Form\Admin\Type | Combination of two `DatePickerType` fields to create a range of dates. Optional `CheckboxType` to allow unlimited "to" dates. |
| `DeltaQuantityType` | PrestaShopBundle\Form\Admin\Type | Quantity field that displays the initial quantity (not editable) and allows editing with delta quantity instead (ex: +5, -8). The input data of this form type is the initial (as a plain integer) however its output on submit is the delta quantity. |
| `EmailType` | PrestaShopBundle\Form\Admin\Type | Symfony native `EmailType` extended with IDNConverter (InternationalizedDomainNameConverter) feature |
| `EntityItemType` | PrestaShopBundle\Form\Admin\Type | Default entry type used by EntitySearchInputType |
| `EntitySearchInputType` | PrestaShopBundle\Form\Admin\Type | This form type is used for a OneToMany (or ManyToMany) association, it allows to search a list of entities (based on a remote url) and associate it. It is based on the CollectionType form type which provides prototype features to display a custom template for each associated items. |
| `FormattedTextareaType` | PrestaShopBundle\Form\Admin\Type | Class enabling TinyMCE on a Textarea field |
| `GeneratableTextType` | PrestaShopBundle\Form\Admin\Type | It is extension of TextType that adds additonal button which allows generating value for input |
| `IconButtonType` | PrestaShopBundle\Form\Admin\Type | A form button with material icon. |
| `ImagePreviewType` | PrestaShopBundle\Form\Admin\Type | This form type is used to display an image value without providing an interactive input to edit it. It is based on a hidden input so it could be changed programmatically, or be used just to display an image in a form. |
| `IntegerMinMaxFilterType` | PrestaShopBundle\Form\Admin\Type | Defines the integer type two inputs of min and max value - designed to fit grid in grid filter. |
| `IpAddressType` | PrestaShopBundle\Form\Admin\Type | Extended input type for IP addresses. Displays a bouton to add the user's one to the list. |
| `LogSeverityChoiceType` | PrestaShopBundle\Form\Admin\Type | `ChoiceType` of `PrestaShopLogger` Log levels |
| `MoneyWithSuffixType` | PrestaShopBundle\Form\Admin\Type | Class `MoneyWithSuffixType` is a Symfony `MoneyType`, which also has a suffix string right after the currency sign. |
| `NavigationTabType` | PrestaShopBundle\Form\Admin\Type | This form type is used as a container of sub forms, each sub form will be rendered as a part of navigation tab component. Each first level child is used as a different tab, its label is used for the tab name and it's widget as the tab content. |
| `NumberMinMaxFilterType` | PrestaShopBundle\Form\Admin\Type | Defines the number type two inputs of min and max value - designed to fit grid in grid filter. |
| `PriceReductionType` | PrestaShopBundle\Form\Admin\Type | Responsible for creating form for price reduction |
| `RadioWithChoiceChildrenType` | PrestaShopBundle\Form\Admin\Type | Combination of a `RadioType` and a `ChoiceType` fields |
| `ResizableTextType` | PrestaShopBundle\Form\Admin\Type | ResizableTextType adds new sizing options to TextType. |
| `SearchAndResetType` | PrestaShopBundle\Form\Admin\Type | FormType used in rendering of "Search and Reset" action in Grids. |
| `ShopChoiceTreeType` | PrestaShopBundle\Form\Admin\Type | `MaterialChoiceTreeType` customized with shop names |
| `ShopRestrictionCheckboxType` | PrestaShopBundle\Form\Admin\Type | This class displays customized checkbox which is used for shop restriction functionality. |
| `SubmittableDeltaQuantityType` | PrestaShopBundle\Form\Admin\Type | Wraps SubmittableInput and DeltaQuantity components to work together. |
| `SubmittableInputType` | PrestaShopBundle\Form\Admin\Type | Adds a button right into specified input and toggles it's availability on change |
| `SwitchType` | PrestaShopBundle\Form\Admin\Type | Displays a switch (ON / OFF by default). |
| `TextPreviewType` | PrestaShopBundle\Form\Admin\Type | This form type is used to display a text value without providing an interactive input to edit it. It is based on a hidden input so it could be changed programmatically, or be used just to display a data in a form. |
| `TextWithLengthCounterType` | PrestaShopBundle\Form\Admin\Type | Defines reusable text input with max length counter |
| `TextWithRecommendedLengthType` | PrestaShopBundle\Form\Admin\Type | Is used to add field with recommended input length counter to the form. |
| `TranslatableChoiceType` | PrestaShopBundle\Form\Admin\Type | Class TranslatableChoiceType adds translatable choice types with custom inner type to forms. Language selection uses a dropdown. |
| `TranslatableType` | PrestaShopBundle\Form\Admin\Type | Class TranslatableType adds translatable inputs with custom inner type to forms. Language selection uses a dropdown. |
| `TranslateType` | PrestaShopBundle\Form\Admin\Type | This form class is responsible to create a translatable form. Language selection uses tabs. |
| `TypeaheadCustomerCollectionType` | PrestaShopBundle\Form\Admin\Type | This form class is responsible to create a customer. |
| `TypeaheadProductCollectionType` | PrestaShopBundle\Form\Admin\Type | This form class is responsible to create a product, with or without attribute field. |
| `TypeaheadProductPackCollectionType` | PrestaShopBundle\Form\Admin\Type | This form class is responsible to create a product, with or without attribute field. |
| `UnavailableType` | PrestaShopBundle\Form\Admin\Type | This form type is useful during development phase to show part of a form that are not available yet. |
| `YesAndNoChoiceType` | PrestaShopBundle\Form\Admin\Type | Symfony `ChoiceType` with `Yes` and `No` choices. |
| `ZoneChoiceType` | PrestaShopBundle\Form\Admin\Type | Class is responsible for providing configurable zone choices with -- symbol in front of array |
| `ProfileChoiceType` | PrestaShopBundle\Form\Admin\Type\Common\Team | Class ProfileChoiceType is choice type for selecting employee's profile. |
| `MaterialChoiceTableType` | PrestaShopBundle\Form\Admin\Type\Material | Class MaterialChoiceTableType renders checkbox choices using table layout. |
| `MaterialChoiceTreeType` | PrestaShopBundle\Form\Admin\Type\Material | Class MaterialChoiceTreeType renders trees using table layout. |
| `MaterialMultipleChoiceTableType` | PrestaShopBundle\Form\Admin\Type\Material | Class MaterialMultipleChoiceTableType renders multiple checkbox choices using table layout. |

#### Text fields

* [FormattedTextareaType](formatted-textarea)

* [GeneratableTextType](generatable-text)

* [IpAddressType](ip-address)

* ResizableTextType
    
* [TextWithLengthCounterType](text-with-length-counter)

* [TranslatableType](translatable)

* TranslateType

#### Choice fields

* [CategoryChoiceTreeType](category-choice-tree)

* [CountryChoiceType](country-choice)

* [MaterialChoiceTableType](material-choice-table)

* [MaterialChoiceTreeType](material-choice-tree)

* [MaterialMultipleChoiceTableType](material-multiple-choice-table)

* ShopChoiceTreeType

* [SwitchType](switch)

* [YesAndNoChoiceType](yes-and-no-choice)

#### Date and time fields

* [DatePickerType](date-picker)

* [DateRangeType](date-range)

#### Button fields

* SearchAndResetType

#### Other fields

* [ChangePasswordType](change-password)

* [MoneyWithSuffixType](money-with-suffix)

* [IntegerMinMaxFilterType](integer-min-max-filter)
* [NumberMinMaxFilterType](number-min-max-filter)

#### Extensions

* [UnitTypeExtension](unit-type-extension)
Add `unit` option for NumberType and IntegerType
