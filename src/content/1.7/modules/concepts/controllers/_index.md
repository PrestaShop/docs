---
title: Controllers
weight: 4
chapter: true
---

# Controllers

In the previous chapters, we saw how to add content in the existing pages of
the front and back office with hooks & widgets.

As soon as a module needs to implement more than a configuration page,
building controllers will offer a dedicated space for your features.
In a MVC architecture, a Controller manages the synchronization events between
the View and the Model, and keeps them up to date. It receives all the user
events and triggers the actions to perform.

If an action needs data to be changed, the Controller will “ask” the Model to
change the data, and in turn the Model will notify the View that the data has
been changed, so that the View can update itself. Module controllers will
behave like the core ones thanks the class inheritance:

{{< figure src="/images/1.7/module-controllers.png" title="Controller classes inheritance" >}}

The core classes can be found in the `/classes/controller` folder.

## PHP Scripts not going through the PrestaShop or Symfony dispatcher

Implementing a controller instead of a simple PHP script will allow you to 
avoid some issues such as a non-instanciated Context or Symfony Kernel,
especially on the latest version of PrestaShop. That's why, even for unexpected
calls such as CLI calls triggered by a cron jobs, we recommend having a
controller. The trick is to define it as an Ajax call to prevent the page
template to be displayed.
