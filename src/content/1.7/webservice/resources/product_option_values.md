---
title: Product option values
---

# Resources for Product option values

### Product_option_value

|          Name          |    Format     | Required | Max size | Description |
| :--------------------- | :------------ | :------- | :------- | :---------- |
| **id_attribute_group** | isUnsignedId  | ✔️       |          |             |
| **color**              | isColor       | ❌        |          |             |
| **position**           | isInt         | ❌        |          |             |
| **name**               | isGenericName | ✔️       | 128      |             |


### Blank schema

```xml
<?xml version="1.0" encoding="utf-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <product_option_value>
    <id>
    </id>
    <id_attribute_group>
    </id_attribute_group>
    <color>
    </color>
    <position>
    </position>
    <name>
      <language id="1"/>
      <language id="2"/>
    </name>
  </product_option_value>
</prestashop>
```

