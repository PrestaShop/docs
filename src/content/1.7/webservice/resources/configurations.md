---
title: Configurations
---

# Resources for Configurations

### Configuration

|       Name        |    Format    | Required | Max size |  Description  |
| :---------------- | :----------- | :------- | :------- | :------------ |
| **value**         |              | ❌        |          |               |
| **name**          | isConfigName | ✔️       | 254      |               |
| **id_shop_group** | isUnsignedId | ❌        |          | Shop group ID |
| **id_shop**       | isUnsignedId | ❌        |          | Shop ID       |
| **date_add**      | isDate       | ❌        |          |               |
| **date_upd**      | isDate       | ❌        |          |               |


### Blank schema

```xml
<?xml version="1.0" encoding="utf-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <configuration>
    <id>
    </id>
    <value>
    </value>
    <name>
    </name>
    <id_shop_group>
    </id_shop_group>
    <id_shop>
    </id_shop>
    <date_add>
    </date_add>
    <date_upd>
    </date_upd>
  </configuration>
</prestashop>
```

