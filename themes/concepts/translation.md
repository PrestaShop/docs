---
title: Translation
weight: 6
aliases:
  - /9/themes/reference/theme-translation
---

# Theme translation

PrestaShop provides a built-in system for translating theme wordings into any language.

## Adding translatable wordings

In Smarty templates, use the `{l}` function with the `d` (domain) parameter. All wordings must be written in English:

```smarty
{l s='Read more' d='Shop.Mytheme'}
```

Replace `Mytheme` with your theme's name.

{{% notice warning %}}
The theme name in the domain must start with a capital letter and contain no other uppercase letters. `Shop.Mytheme` is correct; `Shop.MyTheme` is not.
{{% /notice %}}

### Using placeholders

Use the `sprintf` parameter to insert dynamic values:

```smarty
{l s='%count% items in your cart' d='Shop.Mytheme' sprintf=['%count%' => $cart.products_count]}
{l s='Welcome, %firstname% %lastname%!' d='Shop.Mytheme' sprintf=['%firstname%' => $customer.firstname, '%lastname%' => $customer.lastname]}
```

### Translation domains

PrestaShop uses dot-separated domains to organize translations:

| Domain | Purpose |
|--------|---------|
| `Shop.Mytheme` | Your theme's custom wordings |
| `Shop.Theme.Global` | Shared theme wordings (core) |
| `Shop.Theme.Catalog` | Catalog-related wordings (core) |
| `Shop.Theme.Checkout` | Checkout-related wordings (core) |
| `Shop.Theme.Actions` | Action labels like "Add to cart" (core) |
| `Shop.Theme.CustomerAccount` | Account page wordings (core) |

Use `Shop.Mytheme` for your own wordings. Core domains (`Shop.Theme.*`) are already translated in PrestaShop's language packs. Reuse them when possible to get translations for free:

```smarty
{* Uses existing PrestaShop translations, no need to translate yourself *}
{l s='Add to cart' d='Shop.Theme.Actions'}
{l s='No products available yet' d='Shop.Theme.Catalog'}
```

## Translations in JavaScript

To use translated strings in your theme's JavaScript, pass them from a Smarty template as JavaScript variables:

```smarty
<script>
  var myThemeTranslations = {
    addedToCart: '{l s="Product added to cart" d="Shop.Mytheme" js=1}',
    confirmRemove: '{l s="Are you sure?" d="Shop.Mytheme" js=1}'
  };
</script>
```

The `js=1` parameter escapes quotes for safe embedding in JavaScript strings.

## Translating wordings in the Back Office

Translation involves two distinct steps in **"International" > "Translations"**:

### Install languages

Under **"Add / Update a language"**, install the languages you want to support. This downloads PrestaShop's official language packs, which include translations for all core domains (`Shop.Theme.*`).

### Translate your theme's wordings

Under **"Modify translations"**:

1. Select **"Front office Translations"** as the type.
2. Choose your theme and the target language.
3. Click **"Modify"**, a form appears listing all wordings found in your `.tpl` files.
4. Navigate to **"Shop" > "Your theme name"** in the left column to find your custom domain.
5. Fill in translations and save.

Repeat for each language you want to support.

## Distributing translations

To distribute your theme with translations pre-installed:

1. In **"International" > "Translations"**, scroll to **"Export a language"**.
2. Select your theme and the language to export, then download the ZIP.
3. Extract it and place the `.xlf` files in your theme's `translations/` directory.

When you [export your theme]({{< relref "/9/themes/distribution/exporting" >}}), the `translations/` folder is included automatically.

See the [Smarty helpers reference]({{< relref "/9/themes/reference/smarty-helpers" >}}) for the full `{l}` parameter list.
