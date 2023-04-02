---
title: Context
---

# Context component

The Context is a component first introduced with version 1.5 of PrestaShop. Its two goals are:

- preventing developers from using global variables.
- enabling them to change the context of some methods.

The Context is a registry for PHP variables that were previously accessed as globals. It aims to standardize the way these variables are accessed, and to make the code more robust by getting rid of global vars.

It is a light implementation of the Registry design pattern: it is a class that stores the main PrestaShop information, such as the current cookie, the customer, the employee, the cart, Smarty, etc.

## What is stored by the Context?

These objects are always accessible through the context:

- **Language.** Set with the customer or employee language.
- **Country.** Default country.
- **Currency.** Set with the customer currency or the shop's default currency.
- **Shop.** Current shop.
- **Cookie.** Cookie instance.
- **Link.** Link instance.
- **Smarty.** Smarty instance.
- **CurrentLocale.**  [Current Locale]({{< relref "/8/development/components/locale" >}}).

These objects are only accessible for the customer Context:

- **Customer.** Existing customer retrieved from the cookie or default customer.
- **Cart.** Current cart.
- **Controller.** Current controller instance.

These objects are only accessible for the administrator Context:

- **Employee.** Current employee.

## How to access the Context?

From inside a `Controller` subclass or a `Module` subclass, the Context should be called with this shortcut: `$this->context`.

From anywhere else, you can get the Context instance by calling `Context::getContext()`.

## How is the Context initialized?

The context is initialized with data coming from the cookie or from the database. For example, to create the Language object, the context looks for an `id_lang` value in the cookie. If it doesn't find one, it will retrieve the default language id from the database.

