---
title: Module translation
weight: 7
chapter: true
aliases:
  - /1.7/modules/creation/module_translation
  - /module/05-CreatingAPrestaShop17Module/06-ModuleTranslation.html
---

# Module translation

Your module's wordings might be written in English, but internationalization is very important. Translating your module to as many languages as possible makes it more usable for people from other cultures. 

Ideally, you should translate your module in all languages, but this can be beyond most people's reach. Thankfully, PrestaShop provides an interface so that merchants can translate any wording in their shop, including your module's. This section can be found in under _International > Translations_.

The process of preparing your module for translation is called internationalization, or i18n.

## Making your module translatable

The first thing you have to do is make your wordings translatable. This requires adapting your module's code in such a way that all wordings are processed through the translation system, so that they can be displayed in the desired language.

PrestaShop 1.7 introduced a new translation system, which is available for non-native modules as of 1.7.6. Modules that need to be compatible with previous versions can use the previous, "classic" translation system.

Which one will you use?

- [New translation system]({{< ref "new-system" >}}) {{< minver v="1.7.6" >}}
- [Classic translation system]({{< ref "classic-system" >}})

If you're unsure of what's the best system for you, read this [comparison]({{< ref "comparison" >}}).

