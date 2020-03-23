---
title: Theme translation
aliases:
  - /themes/smarty/translation.html
---

# How to translate your theme

PrestaShop 1.7 comes with a new translation system for themes.

{{% notice note %}}
The following instructions only apply to PrestaShop 1.7.2 and later. In previous versions, exported themes didn't include the selected and included translations.
{{% /notice %}}

## 1. Add new or customize existing wordings in a theme

Adding new wordings is easy when building your theme. You simply need to edit the `.tpl` file of your choice and add (or customize) a wording. All wordings must always be written in english.

For example:

```smarty
{l s='Read more' d='Shop.Yourthemename'}
```

Change "Yourthemename" to your own theme's name.

{{% notice warning %}}
The theme name must start in a capital letter and have no other upper case letter (eg. "YourThemeName" won't work).
{{% /notice %}}

## 2. Add the desired languages in your shop

It is best to perform the following steps only after your shop is ready to be exported (ie. you're done developing it).

1. On your shop, go to International > Translations

	![Translations section in the menu](../img/translations-menu.png)
	
2. Then go to the "Add / Update a language" section and choose the languages that you wish to support in your theme.

	![Add / Update a language](../img/translations-add-update-language.png)

## 3. Translate your theme's custom translations

Again, on the same "Translations" page as in the previous step, go to the "Modify translations section" and choose:

* Theme translations
* The theme you wish to translate (in this example, we are translating "lifestyle")
* Language to translate to (eg. "French")

![Modify translations](../img/translations-modify.png)

When you click on "Modify", a new page opens up that allows you to translate your theme's wordings. On the left column, go to "Shop" and "your theme name" ("Lifestyle" in this example).

![Translation tree](../img/translations-tree.png)

A form appears on the right, showing all the customized wordings that you added in the `.tpl` files. 

![Translation form](../img/translations-form.png)

At this point, all you need to do is translate them, then redo the process for each one of the languages you want to translate your theme in.

## 4. Export languages

Once all translations are done, you now need to export all of the wordings that you want to include in your theme. For this, go back to the "Translations" page, then scroll to the "Export a language" section:

![Export a language](../img/translations-export-language.png)

Once the .zip file has been downloaded, extract it and add this folder to your theme's translations folder. This way, when you will export your theme, translations will be included with it.

## 5. Export your theme

After all the previous steps have been performed, all that's left to do is export your theme.

1. On your shop, go to Design > Theme & logo.

	![Theme and logo in the menu](../img/translations-theme-and-logo.png)

2. In this page, on the top right corner, click on the "Export current theme" button.

	![Export current theme button](../img/translations-export-current-theme.png)

After this step, the theme will be zipped an ready, and will include the translations that we added before. To verify it, just unzip the zip file and check that all the files are present.
