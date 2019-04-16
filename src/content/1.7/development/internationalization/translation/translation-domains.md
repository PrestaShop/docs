---
title: Translation Domains
weight: 10
---

# Translation Domains

Sometimes wordings may seem vague when seen out of context. For example, "Delete". Just like that, we can imagine what is it used for, but we don't really have much information about it. What are we deleting? From a translator standpoint, this is very hard, because not only do we not know where it's supposed to be used, but it could be used in several places, with different meanings. 

Depending on the language, it will be more or less easy to translate it just vaguely enough so that the phrase makes sense in every one of those different contexts.

Translation Domains bring an answer to this problem. By allowing to separate wordings in contextual groups, if the same wording appears in more than one domain, then it can be have a different translation in each one of them. This way, translators are better able to adapt the meaning of each wording to the specific context in which they appear.

{{% notice note %}}
This feature was originally described in this [blog post](https://build.prestashop.com/news/new-translation-system-prestashop-17/) and has been updated here.
{{% /notice %}}

## Understanding the Domains' structure

Domains have been organized in 5 major sections: **Shop**, **Admin**, **Modules**, **Email** and **Install**. All the PrestaShop translatable strings are spread across these 5 domains, according to the following definition:

| Domain | Description
| --- | ---
| Admin | Back office and content aimed at merchants
| Email | Emails sent from the shop
| Install | Content from the installation wizard
| Modules | Native modules
| Shop | Default theme, front office and content aimed at customers

These are called "first-level" domains. Domains are further broken down in **at least two** and **up to three** levels or "subdomains", for example:

```text
Shop.Theme.Checkout
```

**There are two exceptions to this rule:** `Installer` and `messages` have only one level. The latter contains all wordings that did not have any domain assigned at the time of release of 1.7.0 and thus have been kept for backwards compatibility.

In the end a domain like `Shop.Theme.Checkout` corresponds to a specific folder in [Crowdin](https://crowdin.com/project/prestashop-official), where you'll find all the strings from the default theme, related to the checkout process (funnel, shopping cart, etc.).

{{% notice tip %}}
Domains are stored as XLIFF files in PrestaShop, with one file per subdomain. [See the full list here](https://github.com/PrestaShop/PrestaShop/tree/develop/app/Resources/translations/default).
{{% /notice %}} 

Read below for more details on how we organized domains and what they contain.

### Install

This is the easiest one, there's only one domain: `Install`. It's the content from the installation wizard.

### Modules

For modules, it's rather simple. We still have a "Modules" folder (first-level), which contains either a file or folder for each module: this the second level.
The third level is here to say whether the string appears in the front office (`Shop`) or the back office (`Admin`).

![Modules Translation Domain](../img/domains-modules.png)

###  Shop

For the front office, it's a little bit more complex. Any string related to the front office goes into the `Shop` domain. That's the first level. Then it's split in various sections, mostly functional. Here's how it works for the second level:

| Domain | Strings
| ---------- | --------
| Emails | The emails sent from the shop to a customer (order confirmation, account creation, etc.)
| PDF | The PDFs sent to a customer (invoice, delivery slip, credit slip, etc.)
| Theme | The strings attached to the default theme "Classic".
| Demo | The content from the demo products and demo pages ("About us", "Terms and conditions of use", etc.). If you remove the de content, you shouldn't need any of these strings. |
| Navigation | Most of the meta titles and page names from the default theme.
| Notifications | The warning, error or success messages that can appear in the shop.
| Forms | The forms available in the shop ("Contact us" page, addresses, etc.)

Each of this domain can be further divided to provide even more context.

##### Shop.Theme

| Domain | Strings
| --- | ---
| Catalog | All the strings needed to display your catalog (product page, categories, etc.).
| Customer Account | Anything related to the management of a customer account and the orders.
| Checkout | Everything related to the act of buying - i.e. if you're in catalog mode, you shouldn't need these strings.
| Actions | All the call-to-actions, buttons or links that you find on the shop and that aren't specific to a page or context.

##### Shop.Demo

| Domain | Strings
| --- | ---
| Catalog | Content for demo product and categories (descriptions).
| Pages | Content inside the demo pages (formerly known as CMS pages).

##### Shop.Notifications

Notifications are split according to their level of alert: `Info`, `Error`, `Warning` or `Success`. They are the messages showing up on your shop.

##### Shop.Forms

| Domain | Strings
| --- | ---
| Labels | The form labels
| Errors | Its corresponding errors (distinct from the theme errors, these one are specific to the form and will display inline)
| Help | Hints to help users fill in the form (special characters, etc.).

###  Admin

Now, let's see how things are organized for the strings from the back office.

| Domain | Strings
| ---------- | --------
| Actions | All the call-to-actions, buttons or links that you find on the back office, and that are quite generic ("Save", "Add "Delete", etc.). Again, if it applies to one page and one functional domain only, then this is not the domain to use.
| Advanced Parameters | Content from the "Advanced Settings" section. Note the lower case "p" in `Admin.Advparameters`
| Catalog | Strings from the "Catalog" section.
| Dashboard | Strings from the Dashboard page.
| Design | Strings from the "Design" section.
| Global | Anything which doesn't fall in the below categories, but is still related to the back office, that can be found in a lot  occurrences ("Max", "Settings", "Enabled", etc.) AND in different parts of the software too. <br/>If a string is specific to a given page, then it shouldn't be in the global domain.
| International | Strings form the "International" section.
| Login | Strings from the Login screen.
| Modules | Strings from the Modules page.
| Navigation | The structure shared by all pages of the back office.
| Notifications | All the warning, error or success messages that can appear in the back office.They must be general notification applying to any part of the software (e.g. "Settings updated").<br/> In case you have a specific notification ("Friendly URLs are currently disabled"), then it should fall under the notification subdomain for its functional domain (here `Admin.Catalog.Notification`).
| Orders & Customers | Strings for the "Orders", "Customers" and "Customer Service" sections from the back office. Note the lower case "c" in `Admin.Orderscustomers`.
| Payment | Strings from the "Payment" section.
| Shipping | Strings from the "Shipping" section.
| Shop Parameters | Content from the "Shop Parameters" section. Note the lower case "p" in `Admin.Shopparameters`.
| Stats | Content from the "Stats" section.

