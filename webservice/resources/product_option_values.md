---
title: Product option values
---

# Resources for Product option values

### Product_option_value

|          Name          |    Format     | Required | Max size | Description |
| :--------------------- | :------------ | :------: | -------: | :---------- |
| **id_attribute_group** | isUnsignedId  | ✔️       |          |             |
| **color**              | isColor       | ❌        |          |             |
| **position**           | isInt         | ❌        |          |             |
| **name**               | isGenericName | ✔️       | 128      |             |


### Blank schema

```xml
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <product_option_value>
    <id><![CDATA[]]></id>
    <id_attribute_group><![CDATA[]]></id_attribute_group>
    <color><![CDATA[]]></color>
    <position><![CDATA[]]></position>
    <name>
      <language id="1"><![CDATA[]]></language>
      <language id="2"><![CDATA[]]></language>
    </name>
  </product_option_value>
</prestashop>
```

