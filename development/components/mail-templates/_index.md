---
title: The Mail Template component
menuTitle: Mail Templates
---

# The Mail Template component
{{< minver v="1.7.6" title="true" >}}

## Introduction

PrestaShop's email notification system is based on static template files, one for each kind of message (like account creation, order confirmation, etc), which are stored in the `mails` folder. In order to localize these messages, PrestaShop needs a copy of each template, translated to every supported language. Shops download these translated versions when installing a new language pack. 

This system has a few drawbacks. Shops need to download email packs every time a new language is installed,
and if a template had not been translated to that language, you ended up with emails in English. This gets even more complicated when you use an email theme (from Addons or a freelance designer) which is therefore limited to the languages the authors translated by themselves. Also, any customization performed in a template has to be replicated for every installed language.

Starting on 1.7.6, this feature has been significantly revamped. To avoid introducing breaking changes, the system still relies on static email templates, which are used by the `Mail::send` method. However, instead of downloading translated copies of each template, these files are now dynamically generated whenever you install a new language, using base templates, or _layouts_. 

This is the first step to improving the email system in PrestaShop. As the feature gets further improved we will add more advanced customization for email templates.

### Vocabulary

Terms like "layouts", "templates" and "themes" can be confusing, so let's clarify them:

* **Mail themes** are groups of **Layouts** with a given style, stored in the `mails/themes/` directory.
  
    You can have many mail themes installed, but only one active at a time.

* **Layouts** are files that will be **rendered** using Twig to generate ready-to-use mail **Templates**.

    They can use logic statements, translate wordings, extend other base layouts or include components. They are the basic files that make up your **Mail theme**.

* **Templates** are static, translated files (html or txt) that will be **generated** by `MailThemeGenerator` from **Layouts** of a given **Mail theme** in a given language.

    They contain no logic and are translated for **ONE** language. These are the files used by the `Mail` class when you send a mail and are located in the `mails/` directory, grouped by language (`mails/en/`, `mails/fr/`, ...).

## Architecture

### Folder structure

The new email themes layout files are stored in the `mails/themes/` folder. PrestaShop 1.7.6 is bundled with two email themes:

* **classic** – The default email theme that was bundled with PrestaShop up until the 1.7.5 version.
* **modern** – A new email theme with a modern, responsive design.

Each of these folder contains twig layouts which are organized in a conventional way:

```bash
...
├── mails
|   ├── themes
|   |   ├── modern
|   |   |   ├── assets                          # Contains the assets used in your layouts (optional)
|   |   |   ├── components                      # Contains block parts or base layouts for your email theme (optional)
|   |   |   |   ├── footer.html.twig
|   |   |   |   ├── layout.html.twig
|   |   |   ├── core                            # Contains layouts for Core transactional mails
|   |   |   |   ├── account.html.twig           # HTML layout for "account" transactional mail
|   |   |   |   ├── account.txt.twig            # TXT layout for "account" transactional mail
|   |   |   |   ├── bankwire.html.twig          # HTML layout for "bankwire" transactional mail
|   |   |   |   ├── cheque.txt.twig             # TXT layout for "cheque" transactional mail
|   |   |   |   ├── contact.html.twig           # HTML layout for "contact" transactional mail
|   |   |   ├── modules                         # Contains layouts specific to a given module
|   |   |   |   ├── followup                    # Module name
|   |   |   |   |   ├── followup_1.html.twig
|   |   |   |   |   ├── followup_2.html.twig
|   |   |   |   ├── ps_emailalerts              # Module name
|   |   |   |   |   ├── new_order.html.twig
|   |   |   |   |   ├── followup_2.html.twig
...
```

As you can see there are two types of layouts, one for each type of template:

- **HTML** layouts, which generate HTML templates and can contain tags for attractive design, images, links, etc.
- **TXT** layouts, which only contain plain text, used for old email clients or non interactive environments.
 
 The layout name should respect the following convention: `{layout_name}.{layout_type}.twig`
 
 For example:

* `account.html.twig` : layout for the `account` mail template in its `html` version
* `cheque.txt.twig` : layout for the `cheque` mail template in its `txt` version

As you may have noticed, some of our layouts have both types (e.g.: `account`) whereas others only have html or txt type (`bankwire`, `cheque`, ...).
This is because you are not forced to define both types as they will be used as a fallback for each other:

* If only the **html** type is available, the same layout will be stripped of html tags and the resulting plain text will be used as your **txt** layout.
* If only the **txt** type is available, the same layout will be used for **html** layout (but it won't have images nor any other rich elements).

{{% notice note %}}
Thanks to this fallback system, and since we mostly want rich HTML emails, most email themes will only contain html layouts, and txt layouts will be automatically generated from them.
{{% /notice %}}

### Themes and Layouts

PrestaShop uses objects to manipulate email themes and layouts, they implement the following interfaces:

- `PrestaShop\PrestaShop\Core\MailTemplate\ThemeInterface` – Describes a theme and provides a list of its layouts
- `PrestaShop\PrestaShop\Core\MailTemplate\Layout\LayoutInterface` – Describes a theme layout (name, file paths, related module...)

These interfaces have a corresponding collection that is used in the core services and provided via hooks:

- `PrestaShop\PrestaShop\Core\MailTemplate\ThemeCollectionInterface`
- `PrestaShop\PrestaShop\Core\MailTemplate\Layout\LayoutCollectionInterface` 

Of course, PrestaShop provides concrete implementations which you are encouraged to reuse:

- `PrestaShop\PrestaShop\Core\MailTemplate\Theme`
- `PrestaShop\PrestaShop\Core\MailTemplate\ThemeCollection`
- `PrestaShop\PrestaShop\Core\MailTemplate\Layout\Layout`
- `PrestaShop\PrestaShop\Core\MailTemplate\Layout\LayoutCollection`

### Generation workflow

The templates from layouts generation workflow is a bit complex, here are the main components:

* **GenerateThemeMailTemplatesCommand** describes the generation settings (eg. which theme are we generating and in which language).
* **GenerateThemeMailTemplatesCommandHandler** is the command bus handler in charge of executing the generation using the configured `MailTemplateGenerator`.
* **FolderThemeCatalog** provides a `ThemeCollection`, which is built by scanning mail themes in folders.
* **MailTemplateGenerator** drives the generation of a `ThemeInterface` for the requested `LanguageInterface`.
* **MailTemplateTwigRenderer** actually renders the layout using the Twig renderer, and post-processes the result by applying any existing `TransformationInterface`.
* **LayoutVariablesBuilder** provides variables to be used in the Twig layouts.

{{< figure src="./img/email_generation_workflow.svg" title="Email Generation Workflow (it is advised to open it in another tab as the image is quite big)" >}}

{{% notice note %}}
You can update this schema using the [source XML file](/1.7/schemas/email_generation_workflow.xml) importable in services like [draw.io](https://draw.io).
{{% /notice %}}

### Available hooks

As you can see in the workflow, the email generation process includes a few hooks that allow you to include your own themes, layouts, variables and transformations:

* **actionListMailThemes** allows you to modify the `ThemeCollection` (add, remove, modify a theme or/and its layouts)
* **actionBuildMailLayoutVariables** allows you to modify the variables of a specific layout
* **actionGetMailLayoutTransformations** allows you to modify the transformations applied to a specific layout

### Template variables

{{% notice warning %}}
**Layout variables are NOT template variables**

Always keep in mind that the variables provided by the `LayoutVariablesBuilder` will only be available during template **generation**, meaning that their value will be fixed into the exported static templates, and won't change dynamically when your emails are being sent. They should not be confused with _template variables_ (like firstname,
lastname, ...) which are replaced at the last moment when the email is sent by the `Mail::send` function.
{{% /notice %}}

Here is a quick resume of the differences:

|               | Layout                    | Template                        
| ------------- |:------------------------- |:--------------------------------
| Renderer      | Twig                      | Swift_Plugins_DecoratorPlugin   
| Syntax        | `{{ variable }}`          | `{ variable }`                  
| Interpreted   | On generation             | When the email is being sent    
| Target        | All users/customers       | Specific user/action            
| Use cases     | Design, translations, ... | Customization (user, order, ...)

{{% notice note %}}
On the same principle, you can add Twig logic in your templates, like conditions on email types, or even your own
layout variables to deal with customization — but it will only be useful during email generation. So don't use any Twig
logic to adapt the templates for a specific user or order.
{{% /notice %}}

## Translation

One of the main advantages of email generation is the possibility to use translations in the layouts, here is an example:

```twig
  <table width="100%">
    <tr>
      <td align="center" class="titleblock">
        <font size="2" face="Open-sans, sans-serif" color="#555454">
          <span class="title">{{ 'This is a translated string'|trans({}, 'EmailsBody', locale)|raw }}</span>
        </font>
      </td>
    </tr>
  </table>
```

## Templates generation

### Automatic generation

So now that you know how the generation process works, you might wonder **when** exactly does it happen? There are a few cases when generation is **automatic**:

* In `Language` class and more particularly during the calls to `Language::downloadAndInstallLanguagePack`, `Language::installLanguagePack` and of course `Language::installEmailsLanguagePack` which is now **deprecated**
* In `PrestaShopBundle\Install\Upgrade::run` when languages are updated

### Manual generation

Of course sometimes you still want to manually generate your emails (new theme installed, changes in some layouts, ...), then you can use:

* In the Symfony command `prestashop:mail:generate` if you want to launch a CLI generation
* In the "Design > Email Theme" page when you use the form to launch the generation manually (once per language)

## Choosing the default theme

Your shop can only use one theme at a time, so if you go to the "Design > Email Theme" page you will be able to choose your default email theme.
This default theme will be used each time the generation process is launched automatically (language installation, upgrade, ...).

The default theme starting from `1.7.6` will be the **modern** theme, the *classic* theme was provided for backward compatibility and as an example.

### Troubleshooting

##### I changed my default theme but my emails didn't change.

Indeed when you select your default theme you simply update your configuration, so any **future** generation will use the theme you selected.

However no generation process is launched when you select a theme, so if you want to generate your emails with your newly selected theme you need to do it manually in the "Generate emails" form.

{{% notice info %}}
The form only generates **one** language, so you will have to repeat the action for each Language installed on your shop.
{{% /notice %}}

##### I tried to generate emails with a new theme, but my templates are still in the previous one.

There are two possibilities for this issue:

**1. Overwrite already-generated templates**

As you may have noticed, the `GenerateThemeMailTemplatesCommand` and the "Generate emails" form have an **overwrite** option. We need this option because some shops may have installed email themes, or customized their templates manually. For that reason by default the generation process **does not export a template if it already exists**.
If you want to replace the former templates you need to enable the `overwrite` option. 

![Overwrite templates option](./img/overwrite_templates.png)

{{% notice warning %}}
Be careful, using this option will replace **all the existing templates**!
{{% /notice %}}

**2. Overwrite the shop theme's mail templates** 

As you may know, your PrestaShop theme (the **shop's theme**, not the email theme) can include mail templates which override the shop's default ones. Those templates are not contained in the default `mails` folder, but the in `themes/{my_theme}/mails/` folder. Even if you generate your new mail theme (be it automatically or manually), the shop theme's templates will have higher priority and will be used instead of your mail theme's. 

In that case, generate your mail theme manually and to select the shop theme you want to overwrite. Templates will be generated in its folder and will be used from now (don't forget to enable the `overwrite` option if you want to replace them).

![Select the theme you want to overwrite](./img/select_shop_theme.png)

{{% notice warning %}}
Be aware this operation will **permanently modify** your shop theme's files!
{{% /notice %}}


## Learn more

### Reference

* Here is an [example module](https://github.com/PrestaShop/example-modules/tree/master/example_module_mailtheme) showing how to integrate with the email generation workflow

### Module Tutorials

* [How to extend a layout in a theme from a module]({{< ref "1.7/modules/concepts/mail-templates/extend-a-layout-from-module" >}})
* [How to add a layout in a theme from a module]({{< ref "1.7/modules/concepts/mail-templates/add-a-layout-from-module" >}})
* [How to add an email theme from a module]({{< ref "1.7/modules/concepts/mail-templates/add-a-theme-from-module" >}})
* [How to add layout variables from a module]({{< ref "1.7/modules/concepts/mail-templates/add-layout-variables-from-module" >}})
* [How to apply a transformation from a module]({{< ref "1.7/modules/concepts/mail-templates/apply-transformation-from-module" >}})
