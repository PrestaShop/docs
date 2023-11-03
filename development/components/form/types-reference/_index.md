---
title: Types Reference
menuTitle: Types Reference
weight: 20
---

# Types reference

Developers can already use a large list of field types (see [Symfony types](https://symfony.com/doc/4.4/reference/forms/types.html)) that comes from the Symfony framework. In addition to that, PrestaShop adds more reusable field types that developers can use.

| Form type name | Namespace | Description |
| --- | --- | --- |
| [`AccordionType`](accordion-type) | PrestaShopBundle\Form\Admin\Type | This form type is used as a container of sub forms, each sub form will be rendered as a part of an accordion. |
| [`AmountCurrencyType`](amount-currency) | PrestaShopBundle\Form\Admin\Type | Amount with currency: combination of a `NumberType` input and a `ChoiceType` input (for currency selection). |
| [`ButtonCollectionType`](button-collection) | PrestaShopBundle\Form\Admin\Type | `ButtonCollectionType` is a form type used to group buttons in a common form group which is useful for forms which have multiple submit buttons. |
| [`CategoryChoiceTreeType`](category-choice-tree) | PrestaShopBundle\Form\Admin\Type | A `MaterialChoiceTreeType` for categories |
| [`ChangePasswordType`](change-password) | PrestaShopBundle\Form\Admin\Type | `ChangePasswordType` is responsible for defining "change password" form type. |
| [`ChoiceCategoriesTreeType`](choice-category-tree) | PrestaShopBundle\Form\Admin\Type | This form class is responsible to create a category selector using Nested sets |
| [`ColorPickerType`](color-picker-type) | PrestaShopBundle\Form\Admin\Type | This form class is responsible to create a color picker field |
| [`ConfigurableCountryChoiceType`](configurable-country-choice-type) | PrestaShopBundle\Form\Admin\Type | Class responsible for providing configurable countries list |
| [`CountryChoiceType`](country-choice) | PrestaShopBundle\Form\Admin\Type | CountryChoiceType is responsible for providing country choices with -- symbol in front of array. |
| [`CustomContentType`](custom-content-type) | PrestaShopBundle\Form\Admin\Type | Type is used to add any content in any position of the form rather than actual field. |
| [`CustomMoneyType`](custom-money-type) | PrestaShopBundle\Form\Admin\Type | Native Symfony `MoneyType` customised for PrestaShop |
| [`DatePickerType`](date-picker) | PrestaShopBundle\Form\Admin\Type | This form class is responsible to create a date picker field |
| [`DateRangeType`](date-range) | PrestaShopBundle\Form\Admin\Type | Combination of two `DatePickerType` fields to create a range of dates. Optional `CheckboxType` to allow unlimited "to" dates. |
| [`DeltaQuantityType`](delta-quantity-type) | PrestaShopBundle\Form\Admin\Type | Quantity field that displays the initial quantity (not editable) and allows editing with delta quantity instead (ex: +5, -8). The input data of this form type is the initial (as a plain integer) however its output on submit is the delta quantity. |
| [`EmailType`](email-type) | PrestaShopBundle\Form\Admin\Type | Symfony native `EmailType` extended with IDNConverter (InternationalizedDomainNameConverter) feature |
| [`EntityItemType`](entity-item-type) | PrestaShopBundle\Form\Admin\Type | Default entry type used by EntitySearchInputType |
| [`EntitySearchInputType`](entity-search-input-type) | PrestaShopBundle\Form\Admin\Type | This form type is used for a OneToMany (or ManyToMany) association, it allows to search a list of entities (based on a remote url) and associate it. It is based on the CollectionType form type which provides prototype features to display a custom template for each associated items. |
| [`FormattedTextareaType`](formatted-textarea) | PrestaShopBundle\Form\Admin\Type | Class enabling TinyMCE on a Textarea field |
| [`GeneratableTextType`](generatable-text) | PrestaShopBundle\Form\Admin\Type | It is extension of TextType that adds additonal button which allows generating value for input |
| [`IconButtonType`](icon-button-type) | PrestaShopBundle\Form\Admin\Type | A form button with material icon. |
| [`ImagePreviewType`](image-preview-type) | PrestaShopBundle\Form\Admin\Type | This form type is used to display an image value without providing an interactive input to edit it. It is based on a hidden input so it could be changed programmatically, or be used just to display an image in a form. |
| [`IntegerMinMaxFilterType`](integer-min-max-filter) | PrestaShopBundle\Form\Admin\Type | Defines the integer type two inputs of min and max value - designed to fit grid in grid filter. |
| [`IpAddressType`](ip-address) | PrestaShopBundle\Form\Admin\Type | Extended input type for IP addresses. Displays a bouton to add the user's one to the list. |
| [`LogSeverityChoiceType`](log-severity-type) | PrestaShopBundle\Form\Admin\Type | `ChoiceType` of `PrestaShopLogger` Log levels |
| [`MoneyWithSuffixType`](money-with-suffix) | PrestaShopBundle\Form\Admin\Type | Class `MoneyWithSuffixType` is a Symfony `MoneyType`, which also has a suffix string right after the currency sign. |
| [`NavigationTabType`](navigation-tab-type) | PrestaShopBundle\Form\Admin\Type | This form type is used as a container of sub forms, each sub form will be rendered as a part of navigation tab component. Each first level child is used as a different tab, its label is used for the tab name and it's widget as the tab content. |
| [`NumberMinMaxFilterType`](number-min-max-filter) | PrestaShopBundle\Form\Admin\Type | Defines the number type two inputs of min and max value - designed to fit grid in grid filter. |
| [`PriceReductionType`](price-reduction-type) | PrestaShopBundle\Form\Admin\Type | Responsible for creating form for price reduction |
| [`RadioWithChoiceChildrenType`](radio-with-choice-children-type) | PrestaShopBundle\Form\Admin\Type | Combination of a `RadioType` and a `ChoiceType` fields |
| [`ResizableTextType`](resizable-text-type) | PrestaShopBundle\Form\Admin\Type | ResizableTextType adds new sizing options to TextType. |
| [`SearchAndResetType`](search-and-reset-type) | PrestaShopBundle\Form\Admin\Type | FormType used in rendering of "Search and Reset" action in Grids. |
| [`ShopChoiceTreeType`](shop-choice-tree) | PrestaShopBundle\Form\Admin\Type | `MaterialChoiceTreeType` customized with shop names |
| [`ShopRestrictionCheckboxType`](shop-restriction-checkbox-type) | PrestaShopBundle\Form\Admin\Type | This class displays customized checkbox which is used for shop restriction functionality. |
| [`SubmittableDeltaQuantityType`](submittable-delta-quantity-type) | PrestaShopBundle\Form\Admin\Type | Wraps SubmittableInput and DeltaQuantity components to work together. |
| [`SubmittableInputType`](submittable-input-type) | PrestaShopBundle\Form\Admin\Type | Adds a button right into specified input and toggles it's availability on change |
| [`SwitchType`](switch) | PrestaShopBundle\Form\Admin\Type | Displays a switch (ON / OFF by default). |
| [`TextPreviewType`](text-preview-type) | PrestaShopBundle\Form\Admin\Type | This form type is used to display a text value without providing an interactive input to edit it. It is based on a hidden input so it could be changed programmatically, or be used just to display a data in a form. |
| [`TextWithLengthCounterType`](text-with-length-counter) | PrestaShopBundle\Form\Admin\Type | Defines reusable text input with max length counter |
| [`TextWithRecommendedLengthType`](text-with-recommended-length-type) | PrestaShopBundle\Form\Admin\Type | Is used to add field with recommended input length counter to the form. |
| [`TranslatableChoiceType`](translatable-choice-type) | PrestaShopBundle\Form\Admin\Type | Class TranslatableChoiceType adds translatable choice types with custom inner type to forms. Language selection uses a dropdown. |
| [`TranslatableType`](translatable) | PrestaShopBundle\Form\Admin\Type | Class TranslatableType adds translatable inputs with custom inner type to forms. Language selection uses a dropdown. |
| [`TranslateType`](translate-type) | PrestaShopBundle\Form\Admin\Type | This form class is responsible to create a translatable form. Language selection uses tabs. |
| [`TypeaheadCustomerCollectionType`](typeahead-customer-collection-type) | PrestaShopBundle\Form\Admin\Type | This form class is responsible to create a customer. |
| [`TypeaheadProductCollectionType`](typeahead-product-collection-type) | PrestaShopBundle\Form\Admin\Type | This form class is responsible to create a product, with or without attribute field. |
| [`TypeaheadProductPackCollectionType`](typeahead-product-pack-collection-type) | PrestaShopBundle\Form\Admin\Type | This form class is responsible to create a product, with or without attribute field. |
| [`UnavailableType`](unavailable-type) | PrestaShopBundle\Form\Admin\Type | This form type is useful during development phase to show part of a form that are not available yet. |
| [`YesAndNoChoiceType`](yes-and-no-choice) | PrestaShopBundle\Form\Admin\Type | Symfony `ChoiceType` with `Yes` and `No` choices. |
| [`ZoneChoiceType`](zone-choice-type) | PrestaShopBundle\Form\Admin\Type | Class is responsible for providing configurable zone choices with -- symbol in front of array |
| [`ProfileChoiceType`](profile-choice-type) | PrestaShopBundle\Form\Admin\Type\Common\Team | Class ProfileChoiceType is choice type for selecting employee's profile. |
| [`MaterialChoiceTableType`](material-choice-table) | PrestaShopBundle\Form\Admin\Type\Material | Class MaterialChoiceTableType renders checkbox choices using table layout. |
| [`MaterialChoiceTreeType`](material-choice-tree) | PrestaShopBundle\Form\Admin\Type\Material | Class MaterialChoiceTreeType renders trees using table layout. |
| [`MaterialMultipleChoiceTableType`](material-multiple-choice-table) | PrestaShopBundle\Form\Admin\Type\Material | Class MaterialMultipleChoiceTableType renders multiple checkbox choices using table layout. |
| [`UnitTypeExtension`](unit-type-extension) | PrestaShopBundle\Form\Admin\Extension | Class UnitTypeExtension adds an Unit to an `IntegerType` or a `NumberType` |
