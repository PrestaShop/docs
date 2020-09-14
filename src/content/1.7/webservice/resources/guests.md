---
title: Guests
---

# Resources for Guests

### Guest

|          Name           |    Format     | Required | Max size |     Description     |
| :---------------------- | :------------ | :------- | :------- | :------------------ |
| **id_customer**         | isUnsignedId  | ❌        |          | Customer ID         |
| **id_operating_system** | isUnsignedId  | ❌        |          | Operating system ID |
| **id_web_browser**      | isUnsignedId  | ❌        |          | Web browser ID      |
| **javascript**          | isBool        | ❌        |          |                     |
| **screen_resolution_x** | isInt         | ❌        |          |                     |
| **screen_resolution_y** | isInt         | ❌        |          |                     |
| **screen_color**        | isInt         | ❌        |          |                     |
| **sun_java**            | isBool        | ❌        |          |                     |
| **adobe_flash**         | isBool        | ❌        |          |                     |
| **adobe_director**      | isBool        | ❌        |          |                     |
| **apple_quicktime**     | isBool        | ❌        |          |                     |
| **real_player**         | isBool        | ❌        |          |                     |
| **windows_media**       | isBool        | ❌        |          |                     |
| **accept_language**     | isGenericName | ❌        | 8        |                     |
| **mobile_theme**        | isBool        | ❌        |          |                     |


### Blank schema

```xml
<?xml version="1.0" encoding="utf-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <guest>
    <id>
    </id>
    <id_customer>
    </id_customer>
    <id_operating_system>
    </id_operating_system>
    <id_web_browser>
    </id_web_browser>
    <javascript>
    </javascript>
    <screen_resolution_x>
    </screen_resolution_x>
    <screen_resolution_y>
    </screen_resolution_y>
    <screen_color>
    </screen_color>
    <sun_java>
    </sun_java>
    <adobe_flash>
    </adobe_flash>
    <adobe_director>
    </adobe_director>
    <apple_quicktime>
    </apple_quicktime>
    <real_player>
    </real_player>
    <windows_media>
    </windows_media>
    <accept_language>
    </accept_language>
    <mobile_theme>
    </mobile_theme>
  </guest>
</prestashop>
```

