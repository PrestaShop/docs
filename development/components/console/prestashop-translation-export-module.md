---
title: prestashop:translation:export-module
category: Translations
description: Export module translations to XLF files
weight: 10
---

# prestashop:translation:export-module

{{< minver v="9.1" title="true" >}}

## Description

This command exports module translations to XLF (XLIFF) files that can be distributed with a module package. It allows module developers to extract translations from the database and package them for distribution.

## Usage

```bash
php bin/console prestashop:translation:export-module <module> [locale] [options]
```

### Arguments

- **module** (required): Technical name of the module to export translations for (e.g., `ps_banner`, `mymodule`)
- **locale** (optional): Locale code or ISO code for the translations (e.g., `en-US`, `fr-FR`, `pl-PL`, or just `fr`, `en`, `pl`). If not specified, all available locales will be exported.

### Options

- **--auto-install, -a**: Automatically install the module if it's not already installed before exporting

## Examples

### Export all locales for a module

Export translations for all available languages:

```bash
php bin/console prestashop:translation:export-module ps_banner
```

This creates a ZIP file containing XLF files for all locales (e.g., `en-US`, `fr-FR`, `es-ES`, etc.).

### Export a specific locale

Export only French translations:

```bash
php bin/console prestashop:translation:export-module ps_banner fr-FR
```

Or using ISO code:

```bash
php bin/console prestashop:translation:export-module ps_banner fr
```

### Export with auto-install

Export translations and install the module first if needed:

```bash
php bin/console prestashop:translation:export-module mymodule --auto-install
```

## Output

The command generates a ZIP file containing:
- XLF translation files organized by locale
- Proper directory structure: `translations/<locale>/Modules<Modulename><Domain>.<locale>.xlf`

**Example structure:**
```
mymodule-translations.zip
└── translations/
    ├── en-US/
    │   ├── ModulesMymoduleAdmin.en-US.xlf
    │   └── ModulesMymoduleShop.en-US.xlf
    └── fr-FR/
        ├── ModulesMymoduleAdmin.fr-FR.xlf
        └── ModulesMymoduleShop.fr-FR.xlf
```

## Distribution workflow

1. **Translate** your module in the Back Office (International > Translations)
2. **Export** translations using this command
3. **Extract** the ZIP file
4. **Place** the `translations` folder in your module root directory
5. **Distribute** your module with the translations folder included

When users install your module, PrestaShop will automatically use these translation files.

## Error Handling

The command will fail if:
- The specified module does not exist
- The module is not installed (unless `--auto-install` is used)
- The specified locale is invalid or not installed
- File system permissions prevent writing the export

## Related commands

- [prestashop:translation:find-duplicates]({{< relref "prestashop-translation-find-duplicates" >}}): Find duplicate translations

## Use cases

- Packaging translations with your module for distribution
- Creating translation backups
- Migrating translations between PrestaShop installations
- Generating translation files for version control
- Preparing module releases for the PrestaShop Addons marketplace

## See also

- [Module translation documentation]({{< relref "/9/modules/creation/module-translation" >}})
- [New translation system]({{< relref "/9/modules/creation/module-translation/new-system#exporting-translations" >}})
