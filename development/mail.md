---
title: How to send e-mails
weight: 70
---

# How to send e-mails

## Using the `Mail::send()` method

{{% notice note %}}
The `Mail` core class extends [ObjectModel](/1.7/development/database/objectmodel)
{{% /notice %}}

{{% notice note %}}
This example is assuming you are using in a controller named `mycontroller` of a module named `mymodule`
{{% /notice %}}

```php
<?php
class mymodulemycontrollerModuleFrontController extends ModuleFrontController
{

    public function initContent()
    {
        parent::initContent();
        Mail::Send(
            (int)(Configuration::get('PS_LANG_DEFAULT')), // defaut language id
            'contact', // email template file to be use
            ' Module Installation', // email subject
            array(
                '{email}' => Configuration::get('PS_SHOP_EMAIL'), // sender email address
                '{message}' => 'Hello world' // email content
            ),
            Configuration::get('PS_SHOP_EMAIL'), // receiver email address
            NULL, //receiver name
            NULL, //from email address
            NULL  //from name
        );
    }
}
```

{{% notice tip %}}
Prestashop will use the Shop Configuration to decide if use `smtp` connection or php `mail` function so check it out on backoffice or in `app/config/parameter.php`
{{% /notice %}}

## Add custom template

`Mail::send` has some parameters. You can specify your emails templates path of your module in parameter `templatePath`.

In your module you must create the subfolder `mails` and then a sub folder with languages. Example: `modules\yourmodulename\mails\en` for english.

In this folder you do create 2 files: one with extension `.html` and one with extension `.txt`.

The name of the template files is in second parameter. In the under example the template name is `contact`. So you do create 2 files in mails subfolders of your module: `modules\yourmodulename\mails\en\contact.html` and `modules\yourmodulename\mails\en\contact.txt`.

After installation, the templates email files are moved under the active folder theme: `theme\classic\modules\yourmodulename\mails\en\....`.

```php
<?php
class mymodulemycontrollerModuleFrontController extends ModuleFrontController
{

    public function initContent()
    {
        parent::initContent();
        Mail::Send(
            (int)(Configuration::get('PS_LANG_DEFAULT')), // defaut language id
            'contact', // email template file to be use
            ' Module Installation', // email subject
            array(
                '{email}' => Configuration::get('PS_SHOP_EMAIL'), // sender email address
                '{message}' => 'Hello world' // email content
            ),
            Configuration::get('PS_SHOP_EMAIL'), // receiver email address
            NULL, //receiver name
            NULL, //from email address
            NULL,  //from name
            NULL, //file attachment
            NULL, //mode smtp
            _PS_MODULE_DIR_ . 'yourmodulename/mails' //custom template path
        );
    }
}
```
