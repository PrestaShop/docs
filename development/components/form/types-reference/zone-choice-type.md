---
title: ZoneChoiceType
---

# ZoneChoiceType

Class is responsible for providing configurable zone choices with -- symbol in front of array

- Namespace: PrestaShopBundle\Form\Admin\Type
- Reference: [ZoneChoiceType](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Form/Admin/Type/ZoneChoiceType.php)

## Type options

| Option       | Type   | Default value                     | Description                                                                               |
| :----------- | :----- | :-------------------------------- | :---------------------------------------------------------------------------------------- |

## Code example

- [StateGridDefinitionFactory](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Core/Grid/Definition/Factory/StateGridDefinitionFactory.php#L203-L209)

```php
return (new FilterCollection())    
    ->add(
        (new Filter('id_zone', ZoneChoiceType::class))
        ->setTypeOptions([
            'required' => false,
        ])
        ->setAssociatedColumn('zone_name')
    )
```

## Preview example

{{< figure src="../img/zone-choice-type.png" title="ZoneChoiceType rendered in form using textarea" >}}