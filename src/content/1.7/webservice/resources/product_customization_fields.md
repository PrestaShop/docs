---
title: Product customization fields
---

# Resources for Product customization fields

### Customization_field

|      Name      |    Format    | Required | Max size | Description |
| :------------- | :----------- | :------- | :------- | :---------- |
| **id_product** | isUnsignedId | ✔️       |          | Product ID  |
| **type**       | isUnsignedId | ✔️       |          |             |
| **required**   | isBool       | ✔️       |          |             |
| **is_module**  | isBool       | ❌        |          |             |
| **is_deleted** | isBool       | ❌        |          |             |
| **name**       |              | ✔️       | 255      |             |


### Blank schema

```xml
<?xml version="1.0" encoding="utf-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <customization_field>
    <id>
    </id>
    <id_product>
    </id_product>
    <type>
    </type>
    <required>
    </required>
    <is_module>
    </is_module>
    <is_deleted>
    </is_deleted>
    <name>
      <language id="1"/>
      <language id="2"/>
    </name>
  </customization_field>
</prestashop>
```

