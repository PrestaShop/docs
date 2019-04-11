---
title: ChangePasswordType
menuTitle: ChangePasswordType
weight: 2
---

### ChangePasswordType

ChangePasswordType consists of multiple fields listed bellow. It is used to create form for changing password
and has a built-in new password generator which requires Javascript components.

#### Type fields

| Field                       | Type                                                                                    |
| --------------------------- | ----------------------------------------------------------------------------------------|
| **change_password_button**  | [ButtonType](https://symfony.com/doc/current/reference/forms/types/button.html)         | 
| **old_password**            | [PasswordType](https://symfony.com/doc/current/reference/forms/types/password.html)     |
| **new_password**            | [RepeatedType](https://symfony.com/doc/current/reference/forms/types/repeated.html)     |
| **generated_password**      | [TextType](https://symfony.com/doc/current/reference/forms/types/text.html)             |
| **generate_password_button**| [ButtonType](https://symfony.com/doc/current/reference/forms/types/button.html)         |
| **cancel_button**           | [ButtonType](https://symfony.com/doc/current/reference/forms/types/button.html)         |

#### Custom options

| Option                      | Type (default value)                      | Description                                     |
| ----------------------------| ------------------------------------------|-------------------------------------------------|
| **required**                | **bool**(false)                           | Defines if type is required or not              |


#### Required Javascript components
    
    * ../admin-dev/themes/new-theme/js/components/form/change-password-control.js
    * ../admin-dev/themes/new-theme/js/components/change-password-handler.js

#### Example

```php
    // ...
    use Symfony\Component\Form\Extension\Core\Type\TextType;
    use Symfony\Component\Validator\Constraints\Email;
    use PrestaShopBundle\Form\Admin\Type\ChangePasswordType;
    // ...
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class, [
                'constraints' => [
                    $this->getNotBlankConstraint(),
                    $this->getLengthConstraint(FirstName::MAX_LENGTH),
                ],
            ])
            ->add('lastname', TextType::class, [
                'constraints' => [
                    $this->getNotBlankConstraint(),
                    $this->getLengthConstraint(LastName::MAX_LENGTH),
                ],
            ])
            ->add('email', EmailType::class, [
                'constraints' => [
                    $this->getNotBlankConstraint(),
                    $this->getLengthConstraint(EmployeeEmail::MAX_LENGTH),
                    new Email([
                        'message' => $this->trans('This field is invalid', [], 'Admin.Notifications.Error'),
                    ]),
                ],
            ])
            ->add('change_password', ChangePasswordType::class)
        ;
    }
```
