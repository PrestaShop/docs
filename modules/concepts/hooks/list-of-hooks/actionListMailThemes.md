---
menuTitle: actionListMailThemes
Title: actionListMailThemes
hidden: true
hookTitle: List the available email themes and layouts
files:
  - src/Core/MailTemplate/FolderThemeCatalog.php
locations:
  - front office
type: action
hookAliases:
hasExample: true
---

# Hook actionListMailThemes

## Information

{{% notice tip %}}
**List the available email themes and layouts:** 

This hook allows to add/remove available email themes (ThemeInterface) and/or to add/remove their layouts (LayoutInterface)
{{% /notice %}}

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [src/Core/MailTemplate/FolderThemeCatalog.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Core/MailTemplate/FolderThemeCatalog.php)

## Call of the Hook in the origin file

```php
dispatchWithParameters(
            ThemeCatalogInterface::LIST_MAIL_THEMES_HOOK,
            ['mailThemes' => $mailThemes]
        )
```

## Example implementation

This hook has been implemented as an example in our [modules examples repository - example_module_mailtheme](https://github.com/PrestaShop/example-modules/blob/master/example_module_mailtheme).