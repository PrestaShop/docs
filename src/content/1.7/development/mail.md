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
