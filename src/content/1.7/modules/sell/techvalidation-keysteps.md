---
title: Tech validation - Key steps
---

# Technical Validation : Key steps

Have you ever wondered how the PrestaShop Addons Team treats the validation ?

We are going to show you how to win time so you can pretty much "validate" your own module before submitting it on the Marketplace Addons.
First you might want to read the [Validation Tools]({{<ref "1.7/modules/sell/technical-tools" >}}) and the [Good Practices]({{<ref "1.7/modules/creation/good-practices" >}}). 

### 1. The Basics

As most of you know, there are 3 types of submittions : New, Update min, Update maj.
We do not handle them with the same standards:

- We are very strict and meticulous when it comes to New modules.
- For major updates, we have the exact same verifications than the New modules.
- For minor updates, we verify the validator and we also have a big Diff Tool to only see the modifications.

Let's now give you more details about how we handle shit.

### 2. Treatment of New and Major updates

What's a "New" Module ? Simple: The first time you ever submit a module to the marketplace.
Please, don't even try to submit your module if you didn't ever use the [Validator](https://validator.prestashop.com/).
That tool is very powerful and useful and it will make everbody win a lot of time.

After fixing every feedback from the Validator, here's a list of extra points we verify: 
-- TO CONTINUE --









## 3 steps to passing the technical validation

### 1. A development environment

Create and test your module in a local development environment, with the help of WampServer (Windows) for example. This will allow you to display errors, warnings and other PHP alerts without having to depend on your online server.
To make this easier, PrestaShop features a Dev Mode, which allows you to configure your use of PHP to display error messages. To activate Dev Mode: in the directory/config of your PrestaShop installation, open the file defines.inc.php. The Dev Mode is activated at the very start of the file: you must modify the following line to change the defined value to true (it's set to false by default):

```php
define('_PS_MODE_DEV_', true);
```

**Important:** stores which are up and running must not be used in Dev Mode!

### 2. Follow our good practices

Read our article: [Good practices for developing modules]({{<ref "1.7/modules/creation/good-practices" >}}).

### 3. Use the Validator to optimize your module

The Validator explains exactly what you need to modify for your module to be compliant with our technical requirements (technical errors, forbidden features or structural problems, etc.).
By following the Validator's recommendations, your module will be on sale sooner!

{{% notice tip %}}
Are the recommendations provided preventing your module from working properly?  
Contact us, we will be happy to help you develop your module!
{{% /notice %}}

If you encounter any problems, you can contact the technical team when submitting your module. Take advantage of their experience to perfect your module!

## Update your modules and create themes for PrestaShop 1.7

All well-written 1.6 modules should work with little to no changes in version 1.7, **except those which target:**

- **The theme/front office** – because we rewrote the way themes are written.
- **Payment modules** – should be especially taken care of, since the payment API has seen a slight update.
- **The BO Product page** – because the DOM of this page has changed.
- **The BO Modules page** – again, because the DOM of this page has changed.

What this means for any shop upgrade is that in order for a PS 1.6 to migrate to PS 1.7, you will have to:

- Rewrite the theme. You can use the Starter Theme or the default theme as a foundation.
- Adapt the Product page modules (CSS and JavaScript).
- Adapt the Modules page modules (CSS and JavaScript).

**Everything you should know is gathered in the following pages:**

- Details on every changes concerning modules on [this article of the Build devblog](http://build.prestashop.com/news/module-development-changes-in-17/);
- The [Theme Developer documentation]({{< ref "1.7/themes" >}}) is being written in the open. Don't hesitate to contribute or ask questions!
- Payment modules:
  - Get inspired by [our payment module demo](https://github.com/PrestaShop/paymentexample) to develop yours and use [our dedicated documentation](http://developers.prestashop.com/module/50-PaymentModules/index.html)!

And of course [our 1.7 Project FAQ](http://build.prestashop.com/news/prestashop-1-7-faq/) that should already be your bedtime reading!

## How to submit a product to the Addons marketplace

After creating the perfect product page using the Contributor Kit, submit your module for technical validation.

### Information

At this stage, you can find the module_key for your module. This is to be entered into the constructor in this format:

```php
public function __construct() {
  // etc.
  $this->module_key = 'c1614c239af92968e5fae97f366e9961';
}
```

This will signal to the seller when an update of your module is available in the back-office.
You should describe the modifications made one by one when an update is made.
Don't forget to indicate which versions of PrestaShop your module is compatible with!

### Your file and the permanent name of your module

The zip archive submitted to our team must contain all the necessary files for your module, and have the same name as your module: if the main file of your module is called "module_name.php", then it should be in the folder "module_name", and the zip file must have the same name - without a version number.

Make sure that the name used for your file and zip is the same that you have given to your product page (so that the online seller can quickly identify your module in the back office of their store). So think carefully about the name you choose for your product (without using either "PrestaShop" or "module"). Feel free to personalize the name, for example with the name of your company or your initials

## What happens next?

Once your module has been verified by the technical team, you will receive an email from us informing you of its status (validated or refused).

If refused, you will be told the points to improve. You can respond directly to the team via a link in the email informing you of the refusal in order to receive further information. Then it's up to you to follow these recommendations and resubmit your module to us!
