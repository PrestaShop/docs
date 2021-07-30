---
title: Validation checklist
weight: 3
---

Module validation checklist
===========================

First of all, the submitted addon must pass the [validator](https://validator.prestashop.com). Some reports will lead to an automatic decline if found.
The following rules are manually checked by the modules team.

## Common rules

### Code review

#### Module structure is followed

The module respected the [expected structure]({{< ref "1.7/modules/creation/module-file-structure" >}}).

#### License is compatible

A module and its dependencies must be compatible with the OSL (core) and AFL (modules and themes) licenses used to manage and distribute the PrestaShop open source project. Compatible licences are:

* Apache license
* AFL
* MIT
* BSD
* ISC
* EUPL

Additionally, distribution licenses like CC-0 or CC-by-sa are appropriate for artwork (e.g: icons, pictures, fonts, but not only)

#### Core tables are untouched

Module may create all the table they need in the database. However altering core table is forbidden.

In case you wanted to add columns for an existing table, the workaround is to create a new table with a foreign key targetting the primary key of the core table.

#### Other modules are not altered

Modifying core or other modules files is not allowed.

#### File storage in proper directory

Module may add / modify some files on the shop. To avoid issues with file permissions, we recommend storing files in the `var/%env%` directory.

#### Use of iFrames is limited to highly secured websites

The use of iframes is highly discouraged for security reasons, although they are implemented in different part of the core like in [Payment Modules](https://github.com/PrestaShop/paymentexample/blob/master/paymentexample.php#L150).

* Using an iframe authorizes to load content from a site that is not controlled by the PrestaShop app. This is the same problem as authorizing to load javascript files from an external source. If the source is being hacked, the attacker could potentially exploit other failures to take control of all the shops that would have installed the module.

* Therefore we need to check what your processes are, to ensure the security of the content that will be injected by this iframe into all the shops that will install the module. When submitting your module, the validation team will review the reasons why an iFrame is needed for this business and what are the measures taken by the provider to prevent attacks.

#### Module does not rely on external assets

The zip you send to PrestaShop Addons must be totally self-sufficient.

All the content needed by the module to work properly must be present in the archive. No external content should be downloaded by the module after installation.

#### Support goes though the PrestaShop Marketplace

When a module is published on the marketplace, we provide a unique way for all customer to get new updates and to contact the maintainer of the different modules & themes they bought.

Inserting links to an external platform would probably make things easier for a seller, but it would prevent us to help customers and/or seller in case of dispute.

#### SQL requests variables are sanitized

We examine every SQL request to make sure you did cast your variables. Use `(int)` for integers and `pSQL()` for strings.

More details:

* [Using the DBQuery class]({{< ref "1.7/development/components/database/dbquery" >}})
* [Executing your SQL requests]({{< ref "1.7/development/components/database/db" >}})

#### Calls from external services are secured

If you have PHP files to handle ajax or external calls, make sure to secure that file.
To do so, create a unique token during the module's installation and use it during the call verification.

#### Methods with security risks are not used

Using `serialize()` / `unserialize()` is forbidden, as they are a security risk if you do not control the data going through these methods. They may lead to remote code execution, so we recommend using `json_encode()` / `json_decode()` instead.

#### The archive has only one module

Module included in another one are difficult to review & can't have their own release process.

Each module has to be uploaded on the marketplace separately, even if they only work together.

#### A file `index.php` exists in each folder

To prevent someone to reach the content of a repository without, a file `index.php` has to be found in each folder.

As we deal with [a security risk]({{< ref "/1.7/modules/creation#keeping-things-secure" >}}) on some environments, we strongly recommend you comply with this rule. [An "autoindex" tool](https://github.com/jmcollin/autoindex) allows you to add in each folder.

#### HTML code is written in templates

Use Smarty / Twig templates to display HTML code to respect PrestaShop patterns (MVC architecture) and build a code easy to maintain.

* [More details in displaying content]({{< ref "1.7/modules/creation/displaying-content-in-front-office" >}}).

#### Code is written in English

PrestaShop provides a e-commerce software ready use in many languages. The code and displayed texts are written in English, then translated if the user switches to another language.

Like for PrestaShop, the code submitted on the marketplace has to be written in English, even if the only user of this code is likely to from only one country or language. A lang unknown by the reviewer would make the validation impossible to do.

#### Risk of conflicts between modules is low

* Configuration keys

Configuration data is shared between the shop and every module installed. This is convenient if your need to get a value from another part of the shop, but include some risks if two modules stores some data in the same key.

Too avoid conflicts, configuration keys must be prefixed by the module name. For instance, using a configuration key in the module `TheModule` would be:

```php
<?php
Configuration::get('THE_MODULE_PAYMENT_METHODS_ORDER');
Configuration::updateValue('THE_MODULE_PAYMENT_METHODS_ORDER', [...]);
```

instead of

```php
<?php
Configuration::get('PAYMENT_METHODS_ORDER');
Configuration::updateValue('PAYMENT_METHODS_ORDER', [...]);
```

* Classes

This also applies to classes defined outside a namespace.
Having the module name as a prefix will reduce the risk of colision between classes.

#### Ajax / Cron tasks are secured & in a controller

All the AJAX and CRON files must be protected with a unique and secured token to avoid any security issues (outside attacks,...). 
Even the front controllers must be secured with a secured token when you use AJAX in it.

AJAX and CRON scripts must be placed in a controller and not in a separate script to call on its own.
For more details:

* [Documentation]({{< ref "1.7/modules/concepts/controllers/front-controllers" >}}#using-a-front-controller-as-a-cron-task)
* [Original issue leading to the use of ModuleFrontControllers](https://github.com/PrestaShop/PrestaShop/issues/14648)

#### Code in hook is run only when needed

Several hooks are called on all pages of the back-office or front-office. When a module is registered on one of them, it may impact the page performance on low-end servers if it runs too much code.

We ask to keep the code running in your hooks light, and filter the pages you module runs on if necessary.

Examples:

* Module filtering the creation of orders from another module

```php
<?php
    /**
     * Hook executed at the order confirmation
     */
    public function hookOrderConfirmation($params)
    {
        # If created by another module, return.
        if ($params['order']->module !== $this->name) {
            return false;
        }
        
        // [...]
    }
```

* Filter for a hook called on all BO pages:

```php
<?php
    /**
     * Display content ONLY in the admin payment controller
     */
    public function hookDisplayAdminAfterHeader()
    {
        $currentController = $this->context->controller->controller_name;
        if ('AdminPayment' !== $currentController) {
            return false;
        }

        // [...]
        // return $this->display(...)
    }
```

#### Debug statements are cleaned

All the debug tests have to be removed.

Example : `var_dump($a)`, `dump($a)`, `console.log(‘a’)`...

#### Commented code is removed

To have a code easier to maintain / review, you must remove the commented lines of code. Code comments are welcome of course!

Commented code to be removed:

```php
<?php
    public function hookPaymentOptions($params)
    {
        // if (false === $this->active) { // <-- never called, to be removed
        //     return false;
        // }
        if (false === $this->merchantIsValid()) {
            return false;
        }
        // if (false === $this->checkCurrency($params['cart'])) // {
        //     return false;
        // }
        // if (false === $this->isPaymentStep()) {
        //     return false;
        // }

        // [...]
        return $payment_options;
    }
```

Encouraged code comments:

```php
<?php
    /**
     * Add payment option at the checkout in the front office
     *
     * @param array $params return by the hook
     *
     * @return array|false all payment option available
     */
    public function hookPaymentOptions($params)
    {
        // [...]
        return $payment_options;
    }
```

#### Empty & generated files are removed

As they have no consequences in the module execution, empty files can be removed before submission.
Generated files such as log files, invoice or other documents in PDFs etc. should be removed as well, as they:

* increase the weight of your submissions,
* add a risk of overwritten files when deployed on a shop,
* aren't needed to run the module,
* could contain some personal information.

#### Documentation is provided

Documentation is found in the `docs/` folder of the module, and in a format widly used (PDF is recommended, avoid ZIP files which need an additional process of extraction).



### Functional review

#### No PHP errors is thrown in debug mode

A module must be tested on a Prestashop with debug mode enabled in order to spot the slightest mistake.
Validation teams always have this mode enabled and if an alert is raised then the module will be rejected.

On production mode, only PHP errors will be detected as they prevent the page to be fully executed. On development mode, all other levels of messages such as notices & warnings are triggered.






## Payment modules rules

We do have extra rules for Payment Modules as this type of modules require higher security.
Note that there are some modules which create the Order with a pending order status during the payment processing (1), while others wait for the payment system's approval to create it (2). But none of them create an order before the customer passed the payment service (bank, PayPal...).

* Make sure you double check the id_cart before creating the order.
    * The purpose is to make sure another customer cannot validate a cart which isn't his.

* if (2), make sure the amount you use to validateOrder() comes from the external payment system. Do not use Cart->getOrderTotal();
    * For security reasons, always proceed as explained.

* For (2), when receiving a call to process the payment, make sure you double check the source of the call using a signature or a token. Those values must not be known of all. 
