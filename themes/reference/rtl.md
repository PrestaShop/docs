---
title: RTL support
---

# RTL support

PrestaShop supports RTL (Right-to-left) themes natively.

## RTL stylesheets

There are two ways of customizing your theme for RTL: either by adding an override file that is only loaded for RTL languages, or by using completely different version of the theme's stylesheets.

### CSS override file

PrestaShop will try to load a css file named `rtl.css` after your theme's ones when displayed in an RTL language. You can use this file to place any style override you need for RTL.

### RTL version

When the shop is displayed in an RTL language, PrestaShop will automatically try and load RTL versions of the theme's stylesheets if they are available, instead of the "normal" ones.

RTL versions are automatically "discovered" by PrestaShop using a simple convention: to obtain the RTL version name, you just need to add `_rtl` to the end of the standard file name.

Example:

| Original name | RTL version name
|---------------|----------
|`theme.css`    | `theme_rtl.css`
|`theme-custom.css` | `theme-custom_rtl.css`

#### Stylesheet generation

PrestaShop can also automagically generate an RTL version of your theme's stylesheets based on the original CSS files.

Follow this steps to generate RTL stylesheets for your theme:

* Open your shop's Back Office.
* Go to the "Design > Theme & Logo" page.
* Scroll down to the "Adaptation to right-to-left languages" section.<br>
 **Note:** this is only visible if you have an RTL language installed on your shop.
* Choose the theme you want to generate stylesheets for.
* Toggle "Generate RTL stylesheet" to "Yes".
* Press "Save".

{{< figure src="../img/RTL-generation-screen.png" title="RTL generation in the back office" >}}

This process will generate `_rtl.css` files for every `.css` file in the theme.

{{% notice info %}}
**PrestaShop won't generate a file if one with the same name already exists.**<br>
If you want to regenerate a file, you have to delete it first.
{{% /notice %}}

##### Polishing it up

Sometimes the automatic transformation won't be enough to get your theme exactly how you want it.

**You should never modify generated `_rtl.css` files** – they are generated automatically by PrestaShop.

If you need to add some specific css to fix your RTL transformed files, use `.rtlfix` files. The content of those files is appended to the RTL version of that file after it's transformed.

This is what PrestaShop does for each `.css` file in the theme:

1. Take a file (let's say it's called `my-file.css`)
2. If `my-file_rtl.css` exists, move on to the next file.
3. Transform `my-file.css` to RTL and save its contents to `my-file_rtl.css`
4. If a file named `my-file.rtlfix` exists, append its contents to `my-file_rtl.css`.
