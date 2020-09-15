---
title: Contacts
---

# Resources for Contacts

### Contact

|         Name         |    Format     | Required | Max size | Description |
| :------------------- | :------------ | :------: | -------: | :---------- |
| **email**            | isEmail       | ❌        | 255      |             |
| **customer_service** | isBool        | ❌        |          |             |
| **name**             | isGenericName | ✔️       | 255      |             |
| **description**      | isCleanHtml   | ❌        |          |             |


### Blank schema

```xml
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <contact>
    <id><![CDATA[]]></id>
    <email><![CDATA[]]></email>
    <customer_service><![CDATA[]]></customer_service>
    <name>
      <language id="1"><![CDATA[]]></language>
      <language id="2"><![CDATA[]]></language>
    </name>
    <description>
      <language id="1"><![CDATA[]]></language>
      <language id="2"><![CDATA[]]></language>
    </description>
  </contact>
</prestashop>
```

