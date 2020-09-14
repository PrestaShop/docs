---
title: Product options
---

# Resources for Product options

### Product_option

|        Name        |    Format     | Required | Max size | Description |
| :----------------- | :------------ | :------- | :------- | :---------- |
| **is_color_group** | isBool        | ❌        |          |             |
| **group_type**     |               | ✔️       |          |             |
| **position**       | isInt         | ❌        |          |             |
| **name**           | isGenericName | ✔️       | 128      |             |
| **public_name**    | isGenericName | ✔️       | 64       |             |
| **associations**   |               | ❌        |          |             |


### Blank schema

```xml
<?xml version="1.0" encoding="utf-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <product_option>
    <id>
    </id>
    <is_color_group>
    </is_color_group>
    <group_type>
    </group_type>
    <position>
    </position>
    <name>
      <language id="1"/>
      <language id="2"/>
    </name>
    <public_name>
      <language id="1"/>
      <language id="2"/>
    </public_name>
    <associations>
      <product_option_values>
        <product_option_value>
          <id>
          </id>
        </product_option_value>
      </product_option_values>
    </associations>
  </product_option>
</prestashop>
```

