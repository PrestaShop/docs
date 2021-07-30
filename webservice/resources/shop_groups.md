---
title: Shop groups
---

# Resources for Shop groups

### Shop_group

|        Name        |    Format     | Required | Max size | Description |
| :----------------- | :------------ | :------: | -------: | :---------- |
| **name**           | isGenericName | ✔️       | 64       |             |
| **color**          | isColor       | ❌        |          |             |
| **share_customer** | isBool        | ❌        |          |             |
| **share_order**    | isBool        | ❌        |          |             |
| **share_stock**    | isBool        | ❌        |          |             |
| **active**         | isBool        | ❌        |          |             |
| **deleted**        | isBool        | ❌        |          |             |


### Blank schema

```xml
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <shop_group>
    <id><![CDATA[]]></id>
    <name><![CDATA[]]></name>
    <color><![CDATA[]]></color>
    <share_customer><![CDATA[]]></share_customer>
    <share_order><![CDATA[]]></share_order>
    <share_stock><![CDATA[]]></share_stock>
    <active><![CDATA[]]></active>
    <deleted><![CDATA[]]></deleted>
  </shop_group>
</prestashop>
```

