---
title: Module translation
weight: 7
chapter: true
aliases:
  - /1.7/modules/creation/module_translation
  - /module/05-CreatingAPrestaShop17Module/06-ModuleTranslation.html
---

# Module translation

Your module's wordings are written in English, but internationalization is very important. Translating your module to as many languages as possible makes it more usable for people from non-english speaking cultures. 

Ideally, you should translate your module in all the languages that are installed on your shop. This can be a tedious task, but a whole system has been put in place in order to help you out.

PrestaShop provides an interface so that merchants can translate any wordings in their shop, including you module's. This section can be found in under _International > Translations_.

The process of preparing your module for translation is called internationalization, or i18n.

## Making your module translatable

PrestaShop provides a simple way to translate your wordings. It needs two things:

1. A way of being made aware whenever a wording is used on your module.
2. A list of wordings used on your module, translated in a given language.

The first thing you have to do is make your wordings translatable. This requires adapting your module's code in such a way that all wordings are processed trough the translation system, so that they can be displayed in the desired language.

PrestaShop 1.7 introduced a new translation system, which is available for third party modules as of 1.7.6. Modules that need to be compatible with previous versions can use the previous, "classic" translation system.

Which one will you use?

- [New translation system]({{< ref "new-system.md" >}}) {{< minver v="1.7.6" >}}
- [Classic translation system]({{< ref "classic-system.md" >}}) (1.7.5 and lower)

