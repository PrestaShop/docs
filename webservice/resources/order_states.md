---
title: Order states
---

# Resources for Order states

### Order_state

|       Name       |    Format     | Required | Max size | Description |
| :--------------- | :------------ | :------: | -------: | :---------- |
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
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <order_state>
    <id><![CDATA[]]></id>
    <unremovable><![CDATA[]]></unremovable>
    <delivery><![CDATA[]]></delivery>
    <hidden><![CDATA[]]></hidden>
    <send_email><![CDATA[]]></send_email>
    <module_name><![CDATA[]]></module_name>
    <invoice><![CDATA[]]></invoice>
    <color><![CDATA[]]></color>
    <logable><![CDATA[]]></logable>
    <shipped><![CDATA[]]></shipped>
    <paid><![CDATA[]]></paid>
    <pdf_delivery><![CDATA[]]></pdf_delivery>
    <pdf_invoice><![CDATA[]]></pdf_invoice>
    <deleted><![CDATA[]]></deleted>
    <name>
      <language id="1"><![CDATA[]]></language>
      <language id="2"><![CDATA[]]></language>
    </name>
    <template>
      <language id="1"><![CDATA[]]></language>
      <language id="2"><![CDATA[]]></language>
    </template>
  </order_state>
</prestashop>
```

