---
title: Multilingual Fields
menuTitle: Multilingual
weight: 6
---

# Multilingual / localized Fields

Some entities have multilingual / localized fields, by default the API calls return the value for all languages installed in the Shop, but you might want to fine tune the expected result using the `language` parameter.

## Language parameter

You can specify which fields you want for each resource using the `display` parameter.

| Key          | Value                              | Result                                                                    |
|--------------|------------------------------------|---------------------------------------------------------|
| **language** | `3`                                | `Single` value                                          |
|              | {{< code >}}[3|5|...]{{< /code >}} | `OR` operator: list of possible values                  |
|              | `[2,5]`                            | `Interval` operator: define interval of possible values |

| Result | API call |
|--------|----------|
| Return `product` with ID 19 with translated fields for `Language` with id 3 | {{< code >}}/api/products/19?language=3{{< /code >}} |
| Return `product` with ID 19 with translated fields for `Language` with id 1 or 5 | {{< code >}}/api/products/19?language=[1|5]{{< /code >}} |
| Return `product` with ID 19 with translated fields for `Language` with id from 2 to 5 | {{< code >}}/api/products/19?language=[2,5]{{< /code >}} |

{{% notice note %}}
This parameter is **not managed** by the PHP Webservice lib.
{{% /notice %}}


## XML output

When using `output_format=XML` (or default output)

```xml
<?xml version="1.0" encoding="UTF-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
    <product>
        <id><![CDATA[19]]></id>
        <id_manufacturer xlink:href="http://local.prestashop-develop/api/manufacturers/1"><![CDATA[1]]></id_manufacturer>
        <id_supplier><![CDATA[0]]></id_supplier>
        <id_category_default xlink:href="http://local.prestashop-develop/api/categories/8"><![CDATA[8]]></id_category_default>
        ...
        <name>
            <language id="1" xlink:href="http://local.prestashop-develop/api/languages/1"><![CDATA[Customizable mug]]></language>
            <language id="2" xlink:href="http://local.prestashop-develop/api/languages/2"><![CDATA[Mug personnalisable]]></language>
        </name>
        <description>
            <language id="1" xlink:href="http://local.prestashop-develop/api/languages/1"><![CDATA[<p><span style="font-size:10pt;font-style:normal;"><span style="font-size:10pt;font-style:normal;">Customize your mug with the text of your choice. A mood, a message, a quote... It's up to you! Maximum number of characters:</span><span style="font-size:10pt;font-style:normal;"> ---</span></span></p>]]></language>
            <language id="2" xlink:href="http://local.prestashop-develop/api/languages/2"><![CDATA[<p><span style="font-size:10pt;font-style:normal;">Personnalisez votre mug avec le texte de votre choix. Une humeur, un message, une citation... À vous de choisir ! Nombre maximum de caractères : --- Diamètre : 8,2cm / Hauteur : 9,5cm / Poids : 0.43kg. Passe au lave-vaisselle.</span></p>]]></language>
        </description>
        ...
    </product>
</prestashop>
```

## JSON output

When using `output_format=JSON` (or default output)

```json
{
    "product": {
        "id": 19,
        "id_manufacturer": "1",
        ...
        "name": [
            {
                "id": "1",
                "value": "Customizable mug"
            },
            {
                "id": "2",
                "value": "Mug personnalisable"
            }
        ],
        "description": [
            {
                "id": "1",
                "value": "<p><span style=\"font-size:10pt;font-style:normal;\"><span style=\"font-size:10pt;font-style:normal;\">Customize your mug with the text of your choice. A mood, a message, a quote... It's up to you! Maximum number of characters:</span><span style=\"font-size:10pt;font-style:normal;\"> ---</span></span></p>"
            },
            {
                "id": "2",
                "value": "<p><span style=\"font-size:10pt;font-style:normal;\">Personnalisez votre mug avec le texte de votre choix. Une humeur, un message, une citation... À vous de choisir ! Nombre maximum de caractères : --- Diamètre : 8,2cm / Hauteur : 9,5cm / Poids : 0.43kg. Passe au lave-vaisselle.</span></p>"
            }
        ],
        ...
    }
}
```

### Special case for single language

When you only have one language in your shop (or if you specified only one via the `language` parameter), the format of localized fields is different, and a single value is returned:

```json
{
    "product": {
        "id": 19,
        "id_manufacturer": "1",
        ...
        "name": "Customizable mug",
        "description": "<p><span style=\"font-size:10pt;font-style:normal;\"><span style=\"font-size:10pt;font-style:normal;\">Customize your mug with the text of your choice. A mood, a message, a quote... It's up to you! Maximum number of characters:</span><span style=\"font-size:10pt;font-style:normal;\"> ---</span></span></p>",
        ...
    }
}
```
