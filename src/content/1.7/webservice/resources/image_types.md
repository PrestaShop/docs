---
title: Image types
---

# Resources for Image types

### Image_type

|       Name        |     Format      | Required | Max size | Description |
| :---------------- | :-------------- | :------- | :------- | :---------- |
| **name**          | isImageTypeName | ✔️       | 64       |             |
| **width**         | isImageSize     | ✔️       |          |             |
| **height**        | isImageSize     | ✔️       |          |             |
| **categories**    | isBool          | ❌        |          |             |
| **products**      | isBool          | ❌        |          |             |
| **manufacturers** | isBool          | ❌        |          |             |
| **suppliers**     | isBool          | ❌        |          |             |
| **stores**        | isBool          | ❌        |          |             |


### Blank schema

```xml
<?xml version="1.0" encoding="utf-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <image_type>
    <id>
    </id>
    <name>
    </name>
    <width>
    </width>
    <height>
    </height>
    <categories>
    </categories>
    <products>
    </products>
    <manufacturers>
    </manufacturers>
    <suppliers>
    </suppliers>
    <stores>
    </stores>
  </image_type>
</prestashop>
```

