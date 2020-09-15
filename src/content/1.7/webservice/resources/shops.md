---
title: Shops
---

# Resources for Shops

### Shop

|       Name        |    Format     | Required | Max size |  Description  |
| :---------------- | :------------ | :------: | -------: | :------------ |
| **id_shop_group** |               | ✔️       |          | Shop group ID |
| **id_category**   |               | ✔️       |          |               |
| **active**        | isBool        | ❌        |          |               |
| **deleted**       | isBool        | ❌        |          |               |
| **name**          | isGenericName | ✔️       | 64       |               |
| **color**         | isColor       | ❌        |          |               |
| **theme_name**    | isThemeName   | ❌        |          |               |


### Blank schema

```xml
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <shop>
    <id><![CDATA[]]></id>
    <id_shop_group><![CDATA[]]></id_shop_group>
    <id_category><![CDATA[]]></id_category>
    <active><![CDATA[]]></active>
    <deleted><![CDATA[]]></deleted>
    <name><![CDATA[]]></name>
    <color><![CDATA[]]></color>
    <theme_name><![CDATA[]]></theme_name>
  </shop>
</prestashop>
```

