---
title: Translated configurations
---

# Resources for Translated configurations

### Translated_configuration

|       Name        |    Format    | Required | Max size |  Description  |
| :---------------- | :----------- | :------- | :------- | :------------ |
| **value**         |              | ❌        |          |               |
| **date_add**      | isDate       | ❌        |          |               |
| **date_upd**      | isDate       | ❌        |          |               |
| **name**          | isConfigName | ✔️       | 32       |               |
| **id_shop_group** | isUnsignedId | ❌        |          | Shop group ID |
| **id_shop**       | isUnsignedId | ❌        |          | Shop ID       |


### Blank schema

```xml
<?xml version="1.0" encoding="utf-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <translated_configuration>
    <id>
    </id>
    <value>
      <language id="1"/>
      <language id="2"/>
    </value>
    <date_add>
    </date_add>
    <date_upd>
    </date_upd>
    <name>
    </name>
    <id_shop_group>
    </id_shop_group>
    <id_shop>
    </id_shop>
  </translated_configuration>
</prestashop>
```

