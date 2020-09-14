---
title: Deliveries
---

# Resources for Deliveries

### Delivery

|        Name         |    Format    | Required |  Description   |
| :------------------ | :----------- | :------- | :------------- |
| **id_carrier**      | isUnsignedId | ✔️       | Carrier ID     |
| **id_range_price**  | isUnsignedId | ✔️       | Range price ID |
| **id_range_weight** | isUnsignedId | ✔️       |                |
| **id_zone**         | isUnsignedId | ✔️       | Zone ID        |
| **id_shop**         |              | ❌        | Shop ID        |
| **id_shop_group**   |              | ❌        | Shop group ID  |
| **price**           | isPrice      | ✔️       |                |


### Blank schema

```xml
<?xml version="1.0" encoding="utf-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <delivery>
    <id>
    </id>
    <id_carrier>
    </id_carrier>
    <id_range_price>
    </id_range_price>
    <id_range_weight>
    </id_range_weight>
    <id_zone>
    </id_zone>
    <id_shop>
    </id_shop>
    <id_shop_group>
    </id_shop_group>
    <price>
    </price>
  </delivery>
</prestashop>
```

