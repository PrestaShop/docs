---
title: Activate a language in PrestaShop
aliases:
  - /1.7/development/activate_a_language_in_prestashop
  - /1.7/development/activate-a-language-in-prestashop
---

# Activate a language in PrestaShop

Most languages are available in [Crowdin](https://crowdin.com/project/prestashop-official) for translation, but not all are available in PrestaShop (International > Translations > Add a language).
Indeed, because of a low completion level on [Crowdin](https://crowdin.com/project/prestashop-official), we do not send the translations to PrestaShop. However, it can smart to add a language if its translators are very active and want to see the results of their Crowdin translations quickly in their own shop.
If the language is not available in [Crowdin](https://crowdin.com/project/prestashop-official), you have to contact [Louise Bonnard on Crowdin](https://crowdin.com/profile/LouiseBonnard) for opening a project in the concerned language. 
For that, it needs to be added as a new supported language in PrestaShop, and it takes two steps:

* Update required JSON configuration files in the PrestaShop project
* Trigger the update of API in charge of the languages downloadable packets (i18n.prestashop.com)
  
## Update required JSON configuration files in the PrestaShop project
In PrestaShop, two JSON control the processing of languages:

* app/Resources/all_languages.json
* app/Resources/legacy-to-standard-locales.json
  
The first one is used for listing languages supported by PrestaShop in back office.
The second one is used for migrating locales from old versions to 1.7.

### How to update app/Resources/all_languages.json?
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
  },
```

### How to update app/Resources/legacy-to-standard-locales.json?

In this file, you need to add a key/value.

The key is the ISO code, based on the ISO-639-1 standard ([see an unofficial list here][iso-639-1]). The value is the locale.

This is a sample : 
```json
  "da": "da-DK",
```

## How to trigger the content update on PrestaShop Languages Localisation Packages i18n.prestashop.com ?
Finally, we need to update i18n.prestashop.com.
Why? Because this domain stores the translations files that are used on the International > Translations page of the back office, when adding or updating languages.

This web service update is controlled by the [PrestaShop/TranslationFiles repository](https://github.com/PrestaShop/TranslationFiles/).
The list of available languages is controlled by the file `available_languages.json` of the current version.

You must submit a PR in which you add a key/value: 

* The key is the locale of the language
* The value is the name of the language which be displayed in the back office.

This is a sample : 
```json
  "da-DK": "Danish (Denmark)",
```

After the PR was merged, a nightly cron will fetch translations from Crowdin, update the repository with new updates, and deploy translations to i18n.prestashop.com.

[iso-639-1]: https://en.wikipedia.org/wiki/List_of_ISO_639-1_codes