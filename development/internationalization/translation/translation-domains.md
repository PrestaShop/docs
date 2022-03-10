---
title: Translation Domains
weight: 20
---

Each string created for the PrestaShop project must be associated with a translation domain, to be later translated on Crowdin by the community of translators. 

When a minor or major version of PrestaShop is released, all the new strings associated with this version are added to Crowdin to be translated.

[Crowdin](https://crowdin.com/project/prestashop-official) is a localization management platform on which a community of volunteer translators works on no less than 80 translation projects.

# Why organize strings into domains?

Sometimes, a string may appear a bit unclear to translators because of the lack of context. 

**Translation domains aim to give more context to translators, by indicating where the string appears on PrestaShop software.**

And it happens that a word has several translations depending on the context. So, by allowing strings to be separated into contextual groups, if the same string appears in more than one domain, it can have a different translation in each. This way, translators can adapt the meaning of each string to the specific context in which it appears.

# Understanding the structure of domains

Strings are easily recognizable in PrestaShop's code because it is always introduced by `trans(` and followed by a translation domain.

Strings have been organized into **5 main domains** depending on where they appear on PrestaShop software.

| Domain | Description |
| ----------- | ----------- |
| Install | The strings that appear in the installation wizard. |
| Shop   | The strings that appear in the front office (default theme) and the content aimed at customers. | 
| Admin | The strings that appear in the back office and the content aimed at merchants. |
| Modules | The strings that appear in built-in modules. |
| Emails | The strings that appear in emails sent from the store to customers. |

These domains are then broken down into **subdomains**, more or less according to the complexity of their content.

👀 If a domain has subdomains, you must necessarily put the string in the **deepest** subdomain.

For example, the domain `Admin.Actions` doesn't have subdomains, so all the strings of this category would go to the first-level domain. However, `Admin.Notifications` has 3 levels, so you would have to choose a third-level domain depending on whether your string is an error, information, warning, or success message.

## Install

That’s the easiest one, there’s only one domain: if the wording is present in the installation wizard, then it goes to the `Install` domain.

## Shop

The strings that appear in the front office (default theme) and the content aimed at customers go to the `Shop` domain.

This domain is then broken down into **sub-categories**. You can also check [the legend][Shop-legend] to see what type of string each domain and subdomain contains.

{{< figure src="../img/Shop_mindmap.png" title="Shop domain mindmap" >}}

## Admin

The strings that appear in the back office and the content aimed at merchants go to the `Admin` domain.

This domain is then broken down into **sub-categories**. You can also check [the legend][Admin-legend] to see what type of string each domain and subdomain contains.

{{< figure src="../img/Admin_mindmap.png" title="Admin domain mindmap" >}}

## Modules

The strings that appear in a built-in module go the Modules domain.

This domain is then broken down into **sub-categories**. The second level indicates the module's name, and the third level indicates whether the string appears in the front office or the back office.

👀 Some strings might be rather generic (like “Search” or “Settings updated”) and can be shared with other modules or pages. In that case, it's better to use the _Admin._ or _Shop._ domains to avoid unnecessary duplicates.

{{< figure src="../img/Modules_mindmap.png" title="Emails domain mindmap" >}}


## Emails

The strings that appear in the emails sent from the store to customers go to the `Emails` domain. This domain has only one sub-domain, to indicate whether the string appears in the email's subject or body.

That's it! Now you know what type of string each domain contains.

{{< figure src="../img/Emails_mindmap.png" title="Modules domain mindmap" >}}


[Shop-legend]: ../pdf/Shop_legend.pdf
[Admin-legend]: ../pdf/Admin_legend.pdf