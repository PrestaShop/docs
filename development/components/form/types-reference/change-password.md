---
title: ChangePasswordType
---

# ChangePasswordType

ChangePasswordType is used to create form for changing password and has a built-in new password generator which requires Javascript components.

## Required Javascript components
| Component                                                                   | Description                                                                                                             |
|:----------------------------------------------------------------------------|:------------------------------------------------------------------------------------------------------------------------|
| ../admin-dev/themes/new-theme/js/components/form/change-password-control.js | Generates random passwords, validates new password and it's confirmation, displays error messages related to validation |

## Code example

```php
<?php
// path/to/your/CustomType.php
    
use PrestaShopBundle\Form\Admin\Type\ChangePasswordType;
use Symfony\Component\Form\AbstractType;

class CustomType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('change_password', ChangePasswordType::class)
        ;
    }
}
```

Then in Javascript you have to enable `ChangePasswordControl` component.

```js
import ChangePasswordControl from 'admin-dev/themes/new-theme/js/components/form/change-password-control';

// This component requires many css selectors for targeting.
// These css attributes names depends on you, but it should be placed on correct elements to work properly.
new ChangePasswordControl(
    '.js-change-password-block', // parent element in which other 'ChangePasswordType' inputs are rendered.
    '.js-change-password', // button which shows the whole form on click and is hidden afterwards.
    '.js-change-password-cancel', // button which cancels the form and shows 'change-password' button again.
    '.js-generate-password-button', // button which generates new password on click.
    '.js-old-password', // input of old password.
    '.js-new-password', // input of new password.
    '.js-password-confirm', // new password confirmation input.
    '.js-generated_password', // input in which the new generated password should be displayed.
    '.js-password-strength' // element in which password strength feedback should be displayed.
);
```

## Preview example

{{< figure src="../img/change_password_closed.png" title="ChangePasswordType show/hide button rendered in form" >}}
{{< figure src="../img/change_password_opened.png" title="ChangePasswordType rendered in form" >}}
