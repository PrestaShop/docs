---
title: Add a language
aliases:
  - /1.7/development/add_a_language
  - /1.7/development/add-a-language
---

# Add a language

Before adding a language in Prestashop, you must check if the language is available in [Crowdin](https://crowdin.com/project/prestashop-official).
After this prerequisite, adding a language in PrestaShop has three steps :

* Update JSON files in Prestashop
* ...
* Update i18n.prestashop.com
  
## Update JSON files in Prestashop
In PrestaShop, there are two files involved in process of languages, there are :

* app/Resources/all_languages.json
* app/Resources/legacy-to-standard-locales.json
  
The first one is used for listing languages supported by PrestaShop in back-office.
The second one is used for migrating locales from old versions to 1.7.

### app/Resources/all_languages.json
In this file, you need to add a new item in the JSON.<br />
The key is the ISO Code, based on the ISO-619-1 standard ([see an unofficial list here][iso-619-1]).
The item is filled with key/values relative to the localization :

* `name` : Name
* `iso_code` : ISO code (2 characters)
* `date_format_lite` : Date format (only date)
* `date_format_full` : Date format (with hours & minutes)
* `is_rtl` : Right to Left Language
* `language_code` :
* `locale` : ISO code (5 characters)

This is a sample : 
```json
  "bz": {
    "name": "Brezhoneg (Breton)",
    "iso_code": "bz",
    "date_format_lite": "Y-m-d",
    "date_format_full": "Y-m-d H:i:s",
    "is_rtl": "0",
    "language_code": "bz",
    "locale": "br-FR"
  },
```

### app/Resources/legacy-to-standard-locales.json

In this file, you need to add a key/value.<br />
The key is the ISO code, based on the ISO-619-1 standard ([see an unofficial list here][iso-619-1]).<br />
The value is the locale.

## Update i18n.prestashop.com
Finally, we need to update i18n.prestashop.com.
Why ? Because this domain stores translations files which are used on the page "Improve > International > Translations" for adding or updating languages. 
<br />
This domain is linked by continuous integration to  the [PrestaShop/TranslationFiles repository](https://github.com/PrestaShop/TranslationFiles/).
For listing languages, Prestashop use the file `available_languages.json` of the current version.

The file update consists to add a key/value : 

* The key is the locale of the language
* The value is the name of the language which be displayed in the back-office.

After the PR was merged, a nightly cron will fetch translations from Crowdin, update the repository with new updates, and deploy translations to i18n.prestashop.com.

[iso-619-1]: https://en.wikipedia.org/wiki/List_of_ISO_639-1_codes