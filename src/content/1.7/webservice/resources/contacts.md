---
title: Contacts
---

# Resources for Contacts

### Contact

|         Name         |    Format     | Required | Max size | Description |
| :------------------- | :------------ | :------- | :------- | :---------- |
| **email**            | isEmail       | ❌        | 255      |             |
| **customer_service** | isBool        | ❌        |          |             |
| **name**             | isGenericName | ✔️       | 255      |             |
| **description**      | isCleanHtml   | ❌        |          |             |


### Blank schema

```xml
<?xml version="1.0" encoding="utf-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <contact>
    <id>
    </id>
    <email>
    </email>
    <customer_service>
    </customer_service>
    <name>
      <language id="1"/>
      <language id="2"/>
    </name>
    <description>
      <language id="1"/>
      <language id="2"/>
    </description>
  </contact>
</prestashop>
```

