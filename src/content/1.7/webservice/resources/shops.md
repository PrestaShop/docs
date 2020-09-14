---
title: Shops
---

# Resources for Shops

### Shop

|       Name        |    Format     | Required | Max size |  Description  |
| :---------------- | :------------ | :------- | :------- | :------------ |
| **id_shop_group** |               | ✔️       |          | Shop group ID |
| **id_category**   |               | ✔️       |          |               |
| **active**        | isBool        | ❌        |          |               |
| **deleted**       | isBool        | ❌        |          |               |
| **name**          | isGenericName | ✔️       | 64       |               |
| **color**         | isColor       | ❌        |          |               |
| **theme_name**    | isThemeName   | ❌        |          |               |


### Blank schema

```xml
<?xml version="1.0" encoding="utf-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <shop>
    <id>
    </id>
    <id_shop_group>
    </id_shop_group>
    <id_category>
    </id_category>
    <active>
    </active>
    <deleted>
    </deleted>
    <name>
    </name>
    <color>
    </color>
    <theme_name>
    </theme_name>
  </shop>
</prestashop>
```

