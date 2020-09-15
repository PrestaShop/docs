---
title: Product customization fields
---

# Resources for Product customization fields

### Customization_field

|      Name      |    Format    | Required | Max size | Description |
| :------------- | :----------- | :------: | -------: | :---------- |
| **id_product** | isUnsignedId | ✔️       |          | Product ID  |
| **type**       | isUnsignedId | ✔️       |          |             |
| **required**   | isBool       | ✔️       |          |             |
| **is_module**  | isBool       | ❌        |          |             |
| **is_deleted** | isBool       | ❌        |          |             |
| **name**       |              | ✔️       | 255      |             |


### Blank schema

```xml
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <customization_field>
    <id><![CDATA[]]></id>
    <id_product><![CDATA[]]></id_product>
    <type><![CDATA[]]></type>
    <required><![CDATA[]]></required>
    <is_module><![CDATA[]]></is_module>
    <is_deleted><![CDATA[]]></is_deleted>
    <name>
      <language id="1"><![CDATA[]]></language>
      <language id="2"><![CDATA[]]></language>
    </name>
  </customization_field>
</prestashop>
```

