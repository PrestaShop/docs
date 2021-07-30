---
title: Supply order states
---

# Resources for Supply order states

### Supply_order_state

|        Name         |    Format     | Required | Max size | Description |
| :------------------ | :------------ | :------: | -------: | :---------- |
| **delivery_note**   | isBool        | ❌        |          |             |
| **editable**        | isBool        | ❌        |          |             |
| **receipt_state**   | isBool        | ❌        |          |             |
| **pending_receipt** | isBool        | ❌        |          |             |
| **enclosed**        | isBool        | ❌        |          |             |
| **color**           | isColor       | ❌        |          |             |
| **name**            | isGenericName | ✔️       | 128      |             |


### Blank schema

```xml
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <supply_order_state>
    <id><![CDATA[]]></id>
    <delivery_note><![CDATA[]]></delivery_note>
    <editable><![CDATA[]]></editable>
    <receipt_state><![CDATA[]]></receipt_state>
    <pending_receipt><![CDATA[]]></pending_receipt>
    <enclosed><![CDATA[]]></enclosed>
    <color><![CDATA[]]></color>
    <name>
      <language id="1"><![CDATA[]]></language>
      <language id="2"><![CDATA[]]></language>
    </name>
  </supply_order_state>
</prestashop>
```

