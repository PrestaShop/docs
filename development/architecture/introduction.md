---
title: Introduction to PrestaShop's Architecture
menuTitle: Introduction
weight: 10
summary: "Learn how PrestaShop is structured: back-end, front-end, business stack, themes and modules"
---

# Introduction to PrestaShop's Architecture

PrestaShop is a big project, with several moving parts. In this article you will learn how they are structured and how they work together.
 
{{% notice note %}}
Part of this article was originally published in 2019 as a [blog post](https://build.prestashop-project.org/news/prestashop-in-2019-and-beyond-part-1-current-architecture/). It has been updated and adapted for documentation purposes here.
{{% /notice %}}

## Overview

{{< figure src="../img/architecture-overview.png" title="Basic overview of PrestaShop 8's architecture" >}}

PrestaShop's architecture can be separated in two main logical sections, represented as blue columns in the figure above:

- The **Front Office** (or "FO") – the public-facing site of a shop,
- The **Back Office** (or "BO") – where merchants manage their shop.

Each of these sections can be themselves separated in two parts, which are common to all web applications:

- The **front-end** – the part that essentially runs in the *browser*,
- The **back-end** – which runs in the *server*.

This separation has been depicted using a dotted horizontal line.

### Back-end

If we analyze how the back-end is structured, we can find some common elements to BO and FO:

- Database
- Core Business
- Modules

Like most traditional web applications, PrestaShop is heavily **Database**-driven. This means that all data is stored there. Regardless of whether it's used in the BO or FO, the database is the [Single Source of Truth][SSOT].

{{% notice note %}}
In the figure above, the database has been placed a little outside the diagram to point out to the fact that it's a system of its own that could be on a separate server, in a cluster, etc.
{{% /notice %}}

The purple cloud depicted above the Database is what we call the **Core Business**. It's the big ensemble of code that manages what makes PrestaShop PrestaShop, also referred as "business logic". It includes models, controllers, helper classes, and the like.

PrestaShop controllers will generally output HTML pages, but on some cases they can output JSON or even XML. The structure of those pages is defined by **Themes** (depicted as pink blocks overlapping both the front-end and the back-end), which transform controller-provided data into HTML. This is true both for the FO and BO.

Although PrestaShop 8 is bundled with default themes for FO and BO, only the FO supports third-party themes.

PrestaShop provides two API interfaces:

- **BO API** – used to serve information to [VueJS][vuejs]-based pages (currently Translations and Stock management),
- **Web services** – used to integrate 3rd party services.

While Web services can output XML or JSON data, the BO API is JSON-only.

Finally, **Modules** are independent, optional packages that can extend and customize PrestaShop in many ways. They interact with the Core either by _hooking_ into extension points which are placed throughout the code, or by _replacing_ core components with their own.

{{% notice note %}}
While in this diagram we have placed Modules on the Back-end side, they can actually have an impact on Front-end as well.
{{% /notice %}}

### Front-end

On the front side, implementations can vary a lot depending on the theme. Some themes are HTML-based and rely on little amount of scripting. Other themes are more advanced and Javascript-heavy.

This is discussed in further detail in the [Themes section](#themes).

## The Core Business stack

While controllers will be different in BO and FO, pretty much all of PrestaShop's PHP code is shared between those two environments. This code is split in four logical subsystems:

- **Legacy code** – located in `/classes` and `/controllers`
- **Core code** – located in `/src/Core`
- **Adapter code** – located in `/src/Adapter`
- **Symfony code** (or "PrestaShop Bundle") – located in `/src/PrestaShopBundle`

The **Legacy subsystem** contains the historical, non-namespaced code inherited from previous versions. It's [progressively being replaced since 1.6.1][architecture-1610] by the **Core subsystem**, which uses namespaces and is based on [SOLID principles][SOLID]. 

The **Adapter subsystem** acts as a bridge to legacy classes, which are often static, in order to [allow them to be injected][dependency-inversion] in Core classes.

Finally, the Symfony-based subsystem called **PrestaShop Bundle** is a Symfony bundle that contains Symfony-specific functionality like controllers, forms, views, etc.

In the following figure, we can appreciate the four subsystems described above:

{{< figure src="../img/core-stack.png" title="The core business stack" >}}

### Interaction between subsystems

While this separation may seem excessively complex, it belongs to a transition phase that is necessary to allow the project to move forward progressively. Here's how.

Notice the dotted yellow zone labeled _temporary code_. It means that code within that zone will sooner or later be moved to the Core or PrestaShop Bundle stack. Once the zone it's empty, it will be deleted. Of course, such a change won't be done in a minor version, so you can expect these four stacks to be present for the whole lifetime of PrestaShop 8.

If you look closely at the relationships between each stack, you'll see that code outside the _temporary code zone_ does not interact directly with legacy classes. As explained before, the Adapter layer sits between the Legacy and the "new" code to ease up the transition of code from the Legacy stack to the Core stack.

##### How does that work?

Whenever a Core (or PrestaShopBundle) class needs something provided by a Legacy class, instead of using the Legacy class directly, it delegates that task to an Adapter, which itself uses the Legacy class (see [Adapter pattern][adapter-pattern]).

Here's where it gets interesting. Generally, these Adapters implement an interface declared in Core (even though it hasn't always been the case, new classes do). Making consumers of that Adapter depend on the _interface_ instead of the Adapter class itself (see [Dependency Inversion principle][dependency-inversion]) will allow to reimplement Adapter classes in Core progressively, without having to change the existing code that depends on them.

{{% notice note %}}
**Why not use the Legacy class directly?**

Most legacy classes are static, and since by definition they cannot be injected, it would result in coupled, untestable code. In addition, the ones that are not static generally still have too many responsibilities (see [Single responsibility principle][SRP]) and/or too many public methods or properties (see [Open/closed principle][OCP]), so they cannot be made to implement a proper interface.

[SRP]: https://en.wikipedia.org/wiki/Single_responsibility_principle
[OCP]: https://en.wikipedia.org/wiki/Open/closed_principle

{{% /notice %}}


### Controllers

PrestaShop is based on the [Model-View-Controller (MVC) pattern][MVC], where Controllers are in charge of handling requests and returning responses, ideally delegating the hard work on dedicated services.

Controllers are divided in two big families: those that handle requests in FO, and those that handle requests in BO.

{{< figure src="../img/controllers.png" title="Core controllers" >}}

Controllers can belong to either the **Legacy subsystem** or to the **PrestaShop Bundle**. The first ones are referred to as "legacy controllers" and the latter as "Symfony controllers". However, Symfony controllers are only available in BO.

#### FO Controllers

FO controllers are all based on the `FrontController` class. Modules can declare FO controllers of their own, which must extend the `ModuleFrontController` class (which is based on `FrontController` as well).

#### BO Controllers

BO controllers are a little more complex, since they can be either legacy or Symfony based. 

Legacy BO controllers are based on the `AdminController` class, whereas Symfony controllers are based on the `FrameworkBundleAdminController` class. Modules can declare BO controllers of their own, and they can be either legacy or symfony based as well. Legacy module controllers must extend the  `ModuleAdminController` class (which is based on `AdminController`), and Symfony modules must simply extend `FrameworkBundleAdminController`.

Finally, some BO pages like Stocks and Translation are API based. These controllers are based on the `ApiController` class.

As the migration to Symfony progresses, legacy BO controllers are being migrated from the legacy stack to the PrestaShop Bundle stack. Once the BO migration is complete, there will no longer be any legacy controller in the BO.

{{% notice note %}}
There are no controllers for Web services. This system is mainly configuration-based and very tightly coupled to `ObjectModel`.
{{% /notice %}}

#### Comparison table

<table>
<thead>
<tr>
<th align="center">Family</th>
<th align="center">Subsystem</th>
<th align="center">Type</th>
<th>Base controller class</th>
</tr>
</thead>
<tbody>
<tr>
<td align="center" rowspan="2">FO</td>
<td align="center" rowspan="2">Legacy</td>
<td align="center">Native</td>
<td><code>FrontController</code></td>
</tr>
<tr>
<td align="center">Module</td>
<td><code>ModuleFrontController</code> (based on <code>FrontController</code>)</td>
</tr>
<tr>
<td align="center" rowspan="5">BO</td>
<td align="center" rowspan="2">Legacy</td>
<td align="center">Native</td>
<td><code>AdminController</code></td>
</tr>
<tr>
<td align="center">Module</td>
<td><code>ModuleAdminController</code> (based on <code>AdminController</code>)</td>
</tr>
<tr>
<td align="center" rowspan="3">Symfony</td>
<td align="center">Native</td>
<td><code>FrameworkBundleAdminController</code></td>
</tr>
<tr>
<td align="center">Native (BO API)</td>
<td><code>ApiController</code></td>
</tr>
<tr>
<td align="center">Module</td>
<td><code>FrameworkBundleAdminController</code></td>
</tr>
</tbody>
</table>

## Themes

Legacy controllers use Smarty for templating, while Symfony controllers use Twig.

There are two kinds of themes in PrestaShop: **FO themes** and **BO themes**.

### FO themes

FO themes define the appearance of the Front Office. 

PrestaShop comes bundled with a default FO theme, called "Classic", but merchant can choose to use a different theme.

Since FO themes work on top of legacy controllers, they are based on the [Smarty templating engine][smarty]. They all integrate a shared core javascript library which is called `core.js`, which has jQuery 3 bundled in.

_Classic_ is based on [Bootstrap][bootstrap] 4 alpha 5. A great number of themes are based on it using the [Child theme feature][child-theme].

{{% notice note %}}
Unfortunately, _Classic_ [cannot be updated to recent Bootstrap versions](https://github.com/PrestaShop/PrestaShop/issues/14533#issuecomment-511464778) due to big breaking changes introduced by Bootstrap since the original release of PrestaShop 1.7.0.
{{% /notice %}}

Additionally, FO themes can redefine the layout of modules by [overriding their templates][theme-module-override].

### BO themes
 
BO themes define the appearance of the Back Office.

Even though BO themes are not interchangeable, PrestaShop comes bundled with two of them: **default** and **new theme**. 

So why are there two? Legacy controllers are based on Smarty, like FO controller. Symfony controllers, conversely, are based on the [Twig templating engine][twig]. As a result, there's a theme for each one: legacy controllers use the **default** theme, while Symfony ones use the **new theme**. As controllers are progressively being migrated to Symfony, templates are moved from the **default** to the **new theme** and converted from Smarty to Twig.

In addition, the **default** theme is based on Bootstrap 3, while the **new theme** is based on [PrestaShop's UI kit][uikit] (available on [GitHub][github]), which itself is based on Bootstrap 4. They both integrate jQuery 3.

{{% callout %}}
##### Mixed Smarty and Twig

Here's what was said when [announcing the architecture of 1.7][introducing-symfony]:

> Twig is Symfony's templating language. In version 1.7, it will be used for all pages that are rewritten to use Symfony [...], but NOT for the global interface (menu, header, etc.) nor the non-rewritten pages, which will still use Smarty. The two templating engines will be available, side by side, during the transition phase.

This means that the global interface is handled by the **default** theme, _even in Symfony pages_. Because they use both Twig _and_ Smarty, this partially explains why some Symfony pages may sometimes be slower than legacy ones. 

Rest assured, this is a _temporary issue_ which will be solved when everything has been migrated to Twig and Symfony.

[introducing-symfony]: http://build.prestashop-project.org/news/prestashop-1-7-and-symfony/
{{% /callout %}}

Finally, there's [Vue pages][introducing-vue]. Vue pages are hybrid: half-Symfony, half-API based BO pages. In those pages, the page's skeleton is first rendered by a Symfony controller (therefore, based on the **new theme**), and then a VueJS application takes over in the browser and draws its content based on data sent by the BO API.

As stated before, currently only the Stock management and Translation pages are built on this technology. Even though we think that this is [the way of the future][future-architecture], we find that going down this path in minor version releases would produce too many major extensibility and backwards incompatibility issues. Therefore, there will probably be no new Vue/BO API pages in PrestaShop 8.


## Modules

The **Modules** system provides a plug-in approach to added functionality. As explained before, it mainly relies on specific extension points called "Hooks," but their influence and deeply rooted relationships can go much further than that.

If you look at the Modules block at the center of the figure at the top of the page, you'll notice that there are lots of arrows coming and going from it. Let's explore these relationships.

Like we said, the main path for Module integration is Hooks, which are placed throughout the system. Modules can attach to them in order to provide or alter features.

There are two types of hooks:

- **Display hooks** – Integrated mainly (but not exclusively) in templates, they allow modules to inject content that will be displayed somewhere in a page.
- **Action hooks** – Allow modules to be informed of something happening in the system, and optionally alter the system's behavior by modifying provided data.

The module system provides several other features:

- Module controllers – Modules can add new routes and custom pages in the FO or BO.
- Payment options – Payment modules can add payment options in the checkout process.
- Declaring and sharing services – Modules can use and declare Symfony services.

Modules can also be used to customize PrestaShop:

- Class override system – This system allows a module to replace any class in the Legacy stack.
- BO template overrides – Allows to replace templates from the **new theme** in the BO.
- Service overrides – Modules can replace Core services with their own.
- CSS and JS injection – Modules can also inject style and javascript code into a page.

In addition, modules can be customized by Themes. Themes supporting a given module can override the module's own FO templates in order to improve their integration.

As you can see, the module system has many features, making modules very powerful. Modules have full access to the Core system, and the integration can go very deep into the Core. This power comes with a cost: the deeper the integration and customization, the more risk of upgrade and interoperability issues there is.

## Detailed diagram

Now you know PrestaShop is much more complex than it can seem to be at first sight.
 
Remember the overview at the top of the article? Have a look at this more detailed version now:

{{< figure src="../img/architecture-comprehensive-overview-current.png" title="Comprehensive overview" >}}



[SSOT]: https://en.wikipedia.org/wiki/Single_source_of_truth
[vuejs]: https://vuejs.org/
[introduction]: https://build.prestashop-project.org/news/prestashop-in-2019-and-beyond-introduction/
[architecture-1610]: https://build.prestashop-project.org/news/new-architecture-1-6-1-0/
[child-themes]: https://build.prestashop-project.org/news/Child-Themes-Feature/
[uikit]: https://build.prestashop-project.org/news/PrestaShop-UI-Kit/
[introducing-vue]: https://build.prestashop-project.org/news/introducing-vuejs-symfony-api/
[future-architecture]: https://build.prestashop-project.org/news/prestashop-in-2019-and-beyond-part-3-the-future-architecture/
[SOLID]: https://en.wikipedia.org/wiki/SOLID
[adapter-pattern]: https://sourcemaking.com/design_patterns/adapter
[dependency-inversion]: https://en.wikipedia.org/wiki/Dependency_inversion_principle
[SRP]: https://en.wikipedia.org/wiki/Single_responsibility_principle
[OCP]: https://en.wikipedia.org/wiki/Open/closed_principle
[MVC]: https://en.wikipedia.org/wiki/Model%E2%80%93view%E2%80%93controller
[smarty]: https://www.smarty.net/
[bootstrap]: https://getbootstrap.com/
[child-theme]: {{< ref "/8/themes/reference/template-inheritance/parent-child-feature" >}}
[theme-module-override]: {{< ref "/8/themes/reference/overriding-modules" >}}
[twig]: https://twig.symfony.com/
[github]: https://github.com/PrestaShop/prestashop-ui-kit/
[autoupgrade]: https://github.com/PrestaShop/autoupgrade/
