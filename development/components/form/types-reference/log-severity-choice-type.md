---
title: LogSeverityChoiceType
---

# LogSeverityChoiceType

ChoiceType of PrestaShopLogger Log levels

- Namespace: PrestaShopBundle\Form\Admin\Type
- Reference: [LogSeverityChoiceType](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Form/Admin/Type/LogSeverityChoiceType.php)

## Type options

| Option       | Type   | Default value                     | Description                                                                               |
| :----------- | :----- | :-------------------------------- | :---------------------------------------------------------------------------------------- |

## Code example

- [LogsByEmailType](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Form/Admin/Configure/AdvancedParameters/Logs/LogsByEmailType.php#L46-L59)

```php
$builder->add('logs_by_email', LogSeverityChoiceType::class, [
    'placeholder' => $this->trans(
        'None',
        'Admin.Global'
    ),
    'label' => $this->trans(
        'Minimum severity level',
        'Admin.Advparameters.Feature'
    ),
    'help' => $this->trans(
        'Click on "None" to disable log alerts by email or enter the recipients of these emails in the following field.',
        'Admin.Advparameters.Help'
    ),
])
```

## Preview example

{{< figure src="../img/log-severity-choice-type.png" title="LogSeverityChoiceType rendered in form example" >}}
