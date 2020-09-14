---
title: Order states
---

# Resources for Order states

### Order_state

|       Name       |    Format     | Required | Max size | Description |
| :--------------- | :------------ | :------- | :------- | :---------- |
| **unremovable**  | isBool        | ❌        |          |             |
| **delivery**     | isBool        | ❌        |          |             |
| **hidden**       | isBool        | ❌        |          |             |
| **send_email**   | isBool        | ❌        |          |             |
| **module_name**  | isModuleName  | ❌        |          |             |
| **invoice**      | isBool        | ❌        |          |             |
| **color**        | isColor       | ❌        |          |             |
| **logable**      | isBool        | ❌        |          |             |
| **shipped**      | isBool        | ❌        |          |             |
| **paid**         | isBool        | ❌        |          |             |
| **pdf_delivery** | isBool        | ❌        |          |             |
| **pdf_invoice**  | isBool        | ❌        |          |             |
| **deleted**      | isBool        | ❌        |          |             |
| **name**         | isGenericName | ✔️       | 64       |             |
| **template**     | isTplName     | ❌        | 64       |             |


### Blank schema

```xml
<?xml version="1.0" encoding="utf-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <order_state>
    <id>
    </id>
    <unremovable>
    </unremovable>
    <delivery>
    </delivery>
    <hidden>
    </hidden>
    <send_email>
    </send_email>
    <module_name>
    </module_name>
    <invoice>
    </invoice>
    <color>
    </color>
    <logable>
    </logable>
    <shipped>
    </shipped>
    <paid>
    </paid>
    <pdf_delivery>
    </pdf_delivery>
    <pdf_invoice>
    </pdf_invoice>
    <deleted>
    </deleted>
    <name>
      <language id="1"/>
      <language id="2"/>
    </name>
    <template>
      <language id="1"/>
      <language id="2"/>
    </template>
  </order_state>
</prestashop>
```

