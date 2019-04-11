---
title: ChangePasswordType
menuTitle: ChangePasswordType
weight: 2
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

## Preview example

{{< figure src="../img/change_password.png" title="ChangePasswordType rendered in form example" >}}
