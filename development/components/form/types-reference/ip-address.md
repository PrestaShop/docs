---
title: IpAddressType
---

# IpAddressType

Extends TextType with additional button which inserts current device ip address to input.

## Type options

None.

## Required Javascript components

| Component                                                     | Description                                 |
|:--------------------------------------------------------------|:--------------------------------------------|
| ../admin-dev/themes/new-theme/js/maintenance-page/ip-input.js | Inserts current device ip address to input. |


## Code example

```php
<?php
// path/to/your/CustomType.php

use PrestaShopBundle\Form\Admin\Type\IpAddressType;

class CustomType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'my_ip',
                IpAddressType::class
            )
        ;
    }
}
```

Then in Javascript you have to enable `IpInput` component.

```js
import IpInput from 'admin-dev/themes/new-theme/js/maintenance-page/ip-input';

// initialize the component
IpInput.init();
```

## Preview example

{{< figure src="../img/ip_address.png" title="IpAddressType rendered in form example" >}}
