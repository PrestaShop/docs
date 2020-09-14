---
title: Taxes
---

# Resources for Taxes

### Tax

|    Name     |    Format     | Required | Max size | Description |
| :---------- | :------------ | :------- | :------- | :---------- |
| **rate**    | isFloat       | ✔️       |          |             |
| **active**  |               | ❌        |          |             |
| **deleted** |               | ❌        |          |             |
| **name**    | isGenericName | ✔️       | 32       |             |


### Blank schema

```xml
<?xml version="1.0" encoding="utf-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <tax>
    <id>
    </id>
    <rate>
    </rate>
    <active>
    </active>
    <deleted>
    </deleted>
    <name>
      <language id="1"/>
      <language id="2"/>
    </name>
  </tax>
</prestashop>
```

