---
title: Introduction to translation
menuTitle: Introduction
weight: 10
---

# Introduction to translation

At its core, translation consists in programmatically transforming a wording into its equivalent in a target language, using a translation dictionary. If the loaded dictionary is in Spanish, the output will be in Spanish.

![Translation concept](../img/translation-concept.png)

## Vocabulary

Before you begin working with translations, you should get familiarized with the following concepts:

**Wording** _(or "message")_
: An abstraction of a phrase that will be translated to any given language. It's usually written as plain English, in order to make it easier to understand.

**Translation Domain**
: Messages are organized in contextual groups called [Translation Domains][translation-domains] to enable more precise translations.

**Message Catalogue** _(or simply "catalogue")_
: A dictionary of wordings translated into a given language. There is one for each supported language.

**Default Message Catalogue**
: A special message catalogue containing all the original wordings before translation. This is where we add new wordings.

**Catalogue Resource**
: A data resource containing a catalogue. It can be an in-memory array, a database, a group of files...

**Translator**
: A service that allows translating wordings to a given language.

[translation-domains]: {{< relref "translation-domains" >}}

## How it works

PrestaShop uses Symfony's [Translator Component](https://symfony.com/doc/4.4/translation.html) to translate wordings. 

### Initialization

This component is initialized for the configured language by loading five Catalogue Resources:

* **Customized translations database** - Located in the `ps_translations` table.
* **Active theme** – XLF files in `./themes/<themename>/translations`.
* **Core** – XLF files in `./translations`.
* **Active modules** – XLF files in `./modules/<modulename>/translations`.
* **Active modules (legacy)** – PHP files in `./modules/<modulename>/translations`.

{{% notice tip %}}
**The catalogue resources above are listed by precedence.** 

Translations located in catalogues at the top of the list will take precedence over the ones placed below.
{{% /notice %}}

### Translation

When the translator is used, it will receive a **wording** and a **translation domain**. The translator will try and find the appropriate translation for that combination of wording and translation domain combination within the loaded catalogues.


{{< figure src="../img/translation-flow.png" title="Translation flow" >}}
