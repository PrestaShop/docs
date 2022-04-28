---
title: Module / theme functional checklist
weight: 6
pre: "<b>6. </b>"
chapter: true
---

### Chapter 6

# Module / theme functional checklist

The functional testing checklist includes prerequisites, activities, resources, etc. in a sequential and guided way to cover the need to satisfy the functional requirements in all possible dimensions.

### Compatibility:
Your module/theme should be compatible with [PHP and Prestashop compatibility chart]({{< ref "1.7/basics/installation/system-requirements/#php-compatibility-chart" >}})

###Configure button:
Display the quick option button after installing the module from the Module catalog page. 

###Error / Success message:
* Display a confirmation or an error alert when the merchant saves a form. 
* Display an error message when the merchant leaves the obligatory fields empty.
* Display an error message when the merchant chooses the wrong file type.

Example: a PDF file instead of a picture (display an error message when the merchant puts a wrong input value).

* Display an error message when the merchant puts a wrong input value.

###POP-UPS:
* Testing all text pop-ups.
* Verification of the messages for updating and deleting.
* Text messages on errors in case of incorrect input.

###Inputs:
All input types must be checked before saving them. Be sure that:
* You can only put numbers in a numeric field.
* Email input must accept only email format.
* The real number must include both rational and irrational numbers.

###Social Networks:
You can not put external social network links.
All external social network links must be removed and redirected to PrestaShop social networks.

Facebook: https://www.facebook.com/prestashop

Instagram: https://www.instagram.com/prestashop/

Twitter:  https://twitter.com/PrestaShop 

###Cron link:
Check that the cron link access does not contain any errors.

###Documentation:
Each module/theme must have detailed documentation with screenshots to facilitate its use step by step.

Screenshots must be translated according to the language of the document.

The documentation link in the configuration page must be inside the module.

###Test credentials:
Provide us the necessary test credentials (API key, merchant ID, login, password…) in order to test the module.

All the steps to get the test credentials must be detailed in the documentation.

###Logos header & footer:
Must keep the default shop logo or put text with the possibility of changing the wording.

###Responsive:
Check your theme with different screen resolutions, browsers, operating systems, and mobile platforms.

###Debug mode:
Enable debug mode when testing the module/theme and fix any associated errors that appear.

###Forcing background:
The merchant is able to change the background of the theme (create a module to change the background through the back office).

###DEVTOOLS
* Testing for errors in a console.
* Checking that current styles are uploaded.
* Checking if all images and graphical elements are displayed.
