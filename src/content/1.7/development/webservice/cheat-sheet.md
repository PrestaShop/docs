---
title: Cheat sheet
weight: 2
---

# Cheat sheet for Webservice

## Generic Options

| Key | Value | Description |
|-----|-------|-------------|
| **output_format** | {{< code >}}XML, JSON{{< /code >}} | Change the output format |
| **ps_method** | {{< code >}}GET, POST, PUT, DELETE{{< /code >}} | Override the HTTP method used for the request |

## List options

| Key | Value | Description |
|-----|-------|-------------|
| **display** | {{< code >}}[field1,field2 …]{{< /code >}} | Only display fields in brackets |
| **display** | {{< code >}}full{{< /code >}} | Display all fields |

| Key | Value | Description |
|-----|-------|-------------|
| **filter[field]** | {{< code >}}[1|5]{{< /code >}} | `OR` operator: list of possible values                              |
| **filter[field]** | {{< code >}}[1,10]{{< /code >}}     | `Interval` operator: define interval of possible values             |
| **filter[field]** | {{< code >}}[John]{{< /code >}}     | `Literal` value (not case sensitive)                                |
| **filter[field]** | {{< code >}}[Jo]%{{< /code >}}      | `Begin` operator: fields begins with the value (not case sensitive) |
| **filter[field]** | {{< code >}}%[hn]{{< /code >}}      | `End` operator: fields ends with the value (not case sensitive)     |
| **filter[field]** | {{< code >}}%[oh]%{{< /code >}}     | `Contains` operator: fields contains the value (not case sensitive) |

| Key | Value | Description |
|-----|-------|-------------|
| **sort** | {{< code >}}[field1_ASC,field2_DESC,field3_ASC]{{< /code >}} | The `sort` value is composed of a field name and the expected order separated by a `_` |

| Key | Value | Description |
|-----|-------|-------------|
| **limit** | Number | Limit the result to "Number" |
| **limit** | Starting index, Number | Limit the result to "Number" from the "Index" |

## Using the webservice in Multishop mode

In order to use web services in when the Multishop feature is enabled, you simply have to add the `id_shop` parameter. The `shops` resource allows you to access to the list of shops as well as their associated identifiers.

| Key | Value | Description |
|-----|-------|-------------|
| **id_shop** | Shop ID | Define the shop to be used as a context for the web service. |
| **id_group_shop** | Group Shop ID | Define the group shop to be used as a context for the web service. |
