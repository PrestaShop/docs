---
title: Localization packs
---

# Localization packs

Wordings in the software are exported into [Crowdin][crowdin], a translation platform. This allows contributors to translate these into all supported languages.

Each night, a cron job fetches translations from Crowdin, updates the [PrestaShop/TranslationFiles repository][translation-files-repo] with new updates, and deploys translations to domain i18n.prestashop.com.

i18n.prestashop.com is a domain hosted by PrestaShop company to store all supported Languages Localization Packages. This is the domain where localization packs are downloaded when you use the "Download a Language Pack" feature in Back Office.

## About supported languages

Most existing languages are available in [Crowdin][crowdin] for translation, but not all are available in PrestaShop.

This is because some languages have a low completion level on Crowdin.

## Activate support for a new language in PrestaShop

If the Crowdin translators for a given language are very active and would like to see the results of their Crowdin translations quickly in their own shop, here is the process to add the support of a language.

If the language is not available in [Crowdin](https://crowdin.com/project/prestashop-official), you have to contact the Crowdin PrestaShop manager for opening a project in the concerned language.

This can be done following two steps:

* Update **the JSON configuration** of the PrestaShop project
* Update i18n.prestashop.com content
  
### Update required JSON configuration files in the PrestaShop project

In PrestaShop, processing of languages is controlled by JSON configuration:

* `app/Resources/all_languages.json`
* `app/Resources/legacy-to-standard-locales.json`
  
The first one is used for listing languages supported by PrestaShop in back office.

The second one is used to match the legacy 2-letter codes used for locales to the standard IETF language tags.

#### How to update `app/Resources/all_languages.json`?

In this file, you need to add a new item in the JSON.

The key is the ISO Code, based on the ISO-639-1 standard ([see an unofficial list here][iso-639-1]).
The item is filled with key/values relative to the localization :

* `name` : Name
* `iso_code` : ISO code (2 characters)
* `date_format_lite` : Date format (only date)
* `date_format_full` : Date format (with hours & minutes)
* `is_rtl` : Right to Left Language
* `language_code` : Language code
* `locale` : ISO code (5 characters) : two-letter language code ([ISO 639-1][iso-639-1]) and the two-letter country code ([ISO 3166-1 alpha-2](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2))

This is a sample : 
```json
  "da": {
    "name": "Dansk (Danish)",
    "iso_code": "da",
    "date_format_lite": "Y-m-d",
    "date_format_full": "Y-m-d H:i:s",
    "is_rtl": "0",
    "language_code": "da-dk",
    "locale": "da-DK"
  }
```

#### How to update `app/Resources/legacy-to-standard-locales.json`?

In this file, you need to add a key/value.

The key is the ISO code, based on the ISO-639-1 standard ([see an unofficial list here][iso-639-1]). The value is the locale.

This is a sample : 
```json
  "da": "da-DK"
```

### Update the content on PrestaShop Languages Localization Packages (i18n.prestashop.com)

i18n.prestashop.com domain stores the translations files that are used by PrestaShop.

This is the list you can read on International > Translations Back Office page, when adding or updating languages.

This content of i18n.prestashop.com is controlled by the GitHub repository [PrestaShop/TranslationFiles][translation-files-repo].

The list of available languages is controlled by the file `available_languages.json` of the current version.

You must submit a Pull Request in which you add a key/value: 

* The key is the locale of the language
* The value is the name of the language which be displayed in the back office.

This is a sample : 
```json
  "da-DK": "Danish (Denmark)"
```

After the Pull Request has been approved and merged, a nightly cron job will fetch translations from Crowdin, update the repository with new updates, and deploy translations to i18n.prestashop.com.

[iso-639-1]: https://en.wikipedia.org/wiki/List_of_ISO_639-1_codes
[crowdin]: https://crowdin.com/project/prestashop-official
[translation-files-repo]: https://github.com/PrestaShop/TranslationFiles/
