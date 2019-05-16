---
title: The Email Theme component
menuTitle: Email Theme
weight: 2
---

# The Email Theme component
{{< minver v="1.7.6" title="true" >}}

## Introduction

Up until now PrestaShop used static templates to manage its emails. These templates had to be created for each
language and were downloaded on language installation and stored in the `mails` folder.

This had a few drawbacks, you needed to download email packs each time you were installing a new language,
and if the language has not been managed you often end up with emails in english. This gets even more complicated when you
use an email theme which is therefore limited to the languages it was able to create.

That's why we started a large refacto of this email feature, to avoid having too many breacking changes we still rely
on static email templates, which are used by the `Mail::send` method, however these templates are now dynamically generated
each time you install a new language. This is the first step to improving emailing in PrestaShop, as the feature gets developed
further we will add more advanced customization in email templates.

### Vocabulary

As terms like layouts, templates and so can be confusing we are going to clarify them in this page to be sure you know what we are referring to:

* **layouts** are the files that will be **rendered** by Twig they can use logic statements, translation tools, extend other base layouts or include components, ... They are the basic files that compose your email theme and are located in the folders `mails/themes/classic`, `mails/themes/modern`, ...
* **templates** are the static files (html or txt) that will be **generated** by our `MailThemeGenerator`, they contain no logic and are translated for **ONE** language. They are the files used by the `Mail` class when you send a mail and are located in the folders `mails/en`, `mails/fr`, ...

## Architecture

### Folder structure

The new email themes layout files are stored in the `mails/themes` folder, the `1.7.6` version comes with two email themes:

* **classic** (the legacy email theme that was integrated with PrestaShop up until the 1.7.6 version)
* **modern** (a new email theme with a more modern and more responsive design)

Each of these folder contains twig layouts which are organized in a conventional way:

```bash
...
├── mails
|   ├── themes
|   |   ├── modern
|   |   |   ├── assets # Contains the assets used in your layouts (optional)
|   |   |   ├── components # Contains block parts or base layouts for your email theme (optional)
|   |   |   |   ├── footer.html.twig
|   |   |   |   ├── layout.html.twig
|   |   |   ├── core # Contains layouts for Core transactional mails
|   |   |   |   ├── account.html.twig # HTML layout for "account" transactional mail
|   |   |   |   ├── account.txt.twig # TXT layout for "account" transactional mail
|   |   |   |   ├── bankwire.html.twig # HTML layout for "account" transactional mail
|   |   |   |   ├── cheque.txt.twig # TXT layout for "account" transactional mail
|   |   |   |   ├── contact.html.twig # TXT layout for "account" transactional mail
|   |   |   ├── modules
|   |   |   |   ├── followup # Module's name
|   |   |   |   |   ├── followup_1.html.twig
|   |   |   |   |   ├── followup_2.html.twig
|   |   |   |   ├── ps_emailalerts # Module's name
|   |   |   |   |   ├── new_order.html.twig
|   |   |   |   |   ├── followup_2.html.twig
...
```

As you can see there are two types of layouts (and similarly templates), **HTML** layouts (which can contain tags for attractive design, images, links, ...)
and **TXT** which only contain raw text, used for old email browsers or non interactive environment. The name of our layouts use the following convention:
`{layout_name}.{layout_type}.twig`, for example:

* `account.html.twig` : layout for the `account` mail with `html` type
* `cheque.txt.twig` : layout for the `cheque` mail with `txt` type

As you may have noticed, some of our layouts have both types (e.g.: `account`) whereas others only have html or txt type (`banwire`, `cheque`, ...).
This is because you are not forced to define both types as they will be used as a fallback for each other:

* if you only have the **html** type, the same layout will be stripped and the raw text will be used as your **txt** layout
* if you only have the **txt** type, the same layout will be used for **html** layout (and you won't have images or other rich elements)

{{% notice note %}}
As a consequence of this fallback system, and since we mostly want rich HTML emails, most email themes will only contain html layouts and txt ones
will be automatically generated from them.
{{% /notice %}}

### Workflow

The workflow to generate is a bit complex, it has been divided into multiple classes to separate each operation which simplifies testing and code understanding.

* **GenerateThemeMailTemplatesCommand** is the starting point that launches the email generation, it is merely a container of the generation settings
* **GenerateThemeMailTemplatesCommandHandler** is the command bus handler in charge of executing the generation
* **FolderThemeCatalog** is the class in charge of scanning the themes from folder structure it returns a type `ThemeCollection`
* **MailTemplateGenerator** is the class driving the generation of a `ThemeInterface` for the requested `LanguageInterface`
* **MailTemplateTwigRenderer** is the component which actually renders the layout, based on the Twig renderer, it also applies some `TransformationInterface` afterwards
* **LayoutVariablesBuilder** is in charge of building the variables that will be used by the twig layouts

{{< figure src="../img/email_generation_workflow.png" title="Email Generation Workflow (it is advised to open it in another tab as the image is quite big)" >}}

> You can update this schema using the [source XML file](/schemas/1.7/email_generation_workflow.xml) importable in services like [draw.io](https://draw.io).

### Available hooks

As you can see in the workflow a few hooks are available in the email generation for you include your own themes, layouts, variables, transformations, ...

* **actionGetMailThemeFolder** allows you to override a mail theme folder (`mails/theme/{themeName}`)
* **actionListMailThemes** allows you to modify the `ThemeCollection` (add, remove, modify a theme or its layouts)
* **actionBuildMailLayoutVariables** allows you to modify the variables of a specific layout
* **actionGetMailLayoutTransformations** allows you to modify the transformations applied to a specific layout

## Learn more

### Tutorials

* [How to add a layout from my module?](./tutorials/add-a-layout-from-module)
