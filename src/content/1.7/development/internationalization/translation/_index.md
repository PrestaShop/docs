---
title: Translation
weight: 10
---

# Translation

One of the main needs for localization is translating wordings to the another language. PrestaShop is capable of translating wordings to any language, as long as it has the appropriate translations available. 

PrestaShop 1.7 features a new translation system, based on the [Symfony Translation component](https://symfony.com/doc/3.4/translation.html).

{{% notice warning %}}
**This system is only available for Core and Native modules.**

See [here]({{< ref "1.7/modules/creation/module-translation.md" >}}) for 3rd party modules.
{{% /notice %}}

## Overview

The translation system is less complicated than it can seem to be at first glance. To start working with it, you should get familiarized with the following concepts:

**Wording**
: _(Also called "message")_. An abstraction of a phrase that will be translated to any given language. It's usually written as plain English, in order to make it easier to understand.

**Translation Domain**
: A group of wordings. Organizing messages in groups allows for an improved contextualization of wordings.

**Message Catalogue**
: A collection of wordings in a given language. Each supported language has its own catalogue which contains translations for all the wordings in that language.

**Default Message Catalogue**
: The base message catalogue on which the translated message catalogues are based. This is where we add new wordings.

**Catalogue Resource**
: A data source containing a catalogue. It can be an in-memory array, a database, a group of files...

**Translator**
: A service that allows translating wordings to a given language.

## How to translate wordings

{{% notice note %}}
This section provides an quick reference on how to use the Translator. For more information, read Symfony's documentation on [Using the Translator](https://symfony.com/doc/3.4/components/translation/usage.html).
{{% /notice %}}

### PHP files

To translate wordings in PHP files, you first need an instance of the `Translator` service (explained below). Then, you can use the `trans()` method to translate your wording:

```php
echo $translator->trans('This product is no longer available.', [], 'Shop.Notifications.Error');
``` 

The `trans()` method takes three arguments:

- The wording to translate. Keep in mind that it has to be _exactly_ the same as the one in the default catalogue, or the translation won't work.
- An array of replacements, if any. [Learn more here](https://symfony.com/doc/3.4/components/translation/usage.html#component-translation-placeholders).
- The translation domain for that wording.

##### Front Controllers



##### Admin Controllers

Admin Controllers include a helper method named `trans()` that 

```php
$translator = $this->get('translator');
```

### Smarty templates

### Twig templates
