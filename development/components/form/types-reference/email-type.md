---
title: EmailType
---

# EmailType

Symfony native EmailType extended with IDNConverter (InternationalizedDomainNameConverter) feature

- Namespace: PrestaShopBundle\Form\Admin\Type
- Reference: [EmailType](https://github.com/PrestaShop/PrestaShop/blob/9.1.x/src/PrestaShopBundle/Form/Admin/Type/EmailType.php)

## Type options

| Option       | Type   | Default value                     | Description                                                                               |
| :----------- | :----- | :-------------------------------- | :---------------------------------------------------------------------------------------- |

## Code example

- [EmployeeType](https://github.com/PrestaShop/PrestaShop/blob/9.1.0/src/PrestaShopBundle/Form/Admin/Configure/AdvancedParameters/Employee/EmployeeType.php#L140-L149)

```php
$builder->add('email', EmailType::class, [
                'label' => $this->trans('Email address', [], 'Admin.Global'),
                'constraints' => [
                    $this->getNotBlankConstraint(),
                    $this->getLengthConstraint(EmployeeEmail::MAX_LENGTH),
                    new Email([
                        'message' => $this->trans('This field is invalid', [], 'Admin.Notifications.Error'),
                    ]),
                ],
            ])
```

## Preview example

{{< figure src="../img/email-type.png" title="EmailType rendered in form example" >}}
