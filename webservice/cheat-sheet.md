---
title: Cheat sheet
weight: 40
showOnHomepage: true
---

# Cheat sheet for Webservice

All these options can be added to your queries as query parameters (either `GET` or `POST` depending on the method used in your request).

## Generic Options

| Key | Value | Description |
|-----|-------|-------------|
| **output_format** | `XML, JSON` | Change the output format |
| **ps_method** | `GET, POST, PUT, PATCH, DELETE` | Override the HTTP method used for the request |

## Resource options

| Key          | Value                              | Result                                                   |
|--------------|------------------------------------|----------------------------------------------------------|
| **language** | `3`                                | Only display localized fields in one language            |
|              | {{< code >}}[3|5|...]{{< /code >}} | Display localized fields for specified list of languages |
|              | `[2,5]`                            | Display localized fields for an interval of languages    |

## List options

| Key               | Value                                 | Description                                                                            |
|-------------------|---------------------------------------|----------------------------------------------------------------------------------------|
| `display`         |                                       |                                                                                        |
| **display**       | `[field1,field2 …]`                   | Only display fields in brackets                                                        |
| **display**       | `full`                                | Display all fields                                                                     |
| `filter`          |                                       |                                                                                        |
| **filter[field]** | {{< code >}}[1|5]{{< /code >}}        | `OR` operator: list of possible values                                                 |
| **filter[field]** | `[1,10]`                              | `Interval` operator: define interval of possible values                                |
| **filter[field]** | `[John]`                              | `Literal` value (not case sensitive)                                                   |
| **filter[field]** | `[Jo]%`                               | `Begin` operator: fields begins with the value (not case sensitive)                    |
| **filter[field]** | `%[hn]`                               | `End` operator: fields ends with the value (not case sensitive)                        |
| **filter[field]** | `%[oh]%`                              | `Contains` operator: fields contains the value (not case sensitive)                    |
| `sort`            |                                       |                                                                                        |
| **sort**          | `[field1_ASC,field2_DESC,field3_ASC]` | The `sort` value is composed of a field name and the expected order separated by a `_` |
| `limit`           |                                       |                                                                                        |
| **limit**         | Number                                | Limit the result to "Number"                                                           |
| **limit**         | Starting index, Number                | Limit the result to "Number" from the "Index"                                          |

## Using the webservice in Multishop mode

In order to use web services when the Multishop feature is enabled, you need to add the `id_shop` parameter. The `shops` resource allows you to access to the list of shops as well as their associated identifiers.

| Key | Value | Description |
|-----|-------|-------------|
| **id_shop** | Shop ID | Define the shop to be used as a context for the web service. |
| **id_group_shop** | Group Shop ID | Define the group shop to be used as a context for the web service. |
