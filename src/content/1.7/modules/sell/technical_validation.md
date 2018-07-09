---
title: Technical validation
---

# Technical validation

## 3 tools to help you get off to a good start

### 1. The Validator

The Validator (http://validator.prestashop.com) is a tool created to check your module is technically compatible with the PrestaShop requirements. You can:

- upload a zip
- or specify the URL of your [Github](https://help.github.com/articles/create-a-repo/) submission.

The Validator then automatically creates a detailed report explaining what needs to be improved in your module. By following this report, you can submit your module error-free!

{{% notice info %}}
**Important!**  
Since version 1.6.1.0, PrestaShop uses the PSR-2 norm. Even if we recommend you to use this norm, it's not mandatory and it won’t be a reason to decline your module. Here are more details in [this blog article](http://build.prestashop.com/news/prestashop-moves-to-psr-2/).
{{% /notice %}}

### 2. Method search engine

**A search engine is available within the Validator** to help you work out which methods are available for the various versions of PrestaShop. Make the most of this and use it to save time!


### 3. The Module Generator

Have you thought about saving time with our [Module Generator](https://validator.prestashop.com/generator) yet? All you have to do is choose your module type and follow the instructions. A skeleton module is then automatically generated to facilitate the creation of your module.
For quicker technical validation!

To finish the technical validation process, manual verification of the module is carried out by our team of developers. They upload, install, configure and verify your module's code.

## 3 steps to passing the technical validation

### 1. A development environment

Create and test your module in a local development environment, with the help of WampServer (Windows) for example. This will allow you to display errors, warnings and other PHP alerts without having to depend on your online server.
To make this easier, PrestaShop features a Dev Mode, which allows you to configure your use of PHP to display error messages. To activate Dev Mode: in the directory/config of your PrestaShop installation, open the file defines.inc.php. The Dev Mode is activated at the very start of the file: you must modify the following line to change the defined value to true (it's set to false by default):

```php
define('_PS_MODE_DEV_', true);
```

**Important:** stores which are up and running must not be used in Dev Mode!

### 2. Follow our good practices

Read our article: [Good practices for developing modules]({{<ref "1.7/modules/creation/good_practices" >}}).

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
