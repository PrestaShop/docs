---
title: Additional list parameters
weight: 1
aliases:
  - /1.7/development/webservice/tutorials/advanced-use/additional-list-parameters/
---

# Additional list parameters

Previous tutorials only use simple list that returns the IDs of the resources, but you can actually get more details, sort and filter the list.

## Display parameter

You can specify which fields you want for each resource using the `display` parameter.

| Key         | Value               | Result                                            |
|-------------|---------------------|---------------------------------------------------|
| **display** | `full`                | Returns all the fields of the resource          |
|             | `[field1,field2,...]` | Returns only the fields specified in this array |

| Result | API call | PHP Webservice lib options |
|--------|----------|----------------------------|
| Include *all* fields from the `products` resource | `/api/products/?display=full` | {{< code php >}}$opt = [
    'resource' => 'products',
    'display'  => 'full'
];{{< /code >}} |
| Include only the *ID* from the `carriers` resource | `/api/carriers/?display=[id]` | {{< code php >}}$opt = [
    'resource' => 'carriers',
    'display'  => '[id]'
];{{< /code >}} |
| Only include the *name* and *value* fields from the `configurations` resource | `/api/configurations/?display=[name,value]` | {{< code php >}}$opt = [
    'resource' => 'configurations',
    'display'  => '[name,value]'
];{{< /code >}} |

## Filter parameter

You can filter the expected result with the `filter` parameter

| Key               | Value                               | Result                                                              |
|-------------------|-------------------------------------|---------------------------------------------------------------------|
| **filter[field]** | {{< code >}}[1|5]{{< /code >}} | `OR` operator: list of possible values                              |
|                   | {{< code >}}[1,10]{{< /code >}}     | `Interval` operator: define interval of possible values             |
|                   | {{< code >}}[John]{{< /code >}}     | `Literal` value (not case sensitive)                                |
|                   | {{< code >}}[Jo]%{{< /code >}}      | `Begin` operator: fields begins with the value (not case sensitive) |
|                   | {{< code >}}%[hn]{{< /code >}}      | `End` operator: fields ends with the value (not case sensitive)     |
|                   | {{< code >}}%[oh]%{{< /code >}}     | `Contains` operator: fields contains the value (not case sensitive) |

| Result | API call | PHP Webservice lib options |
|--------|----------|----------------------------|
| Only the `customers` whose ids are 1 or 5 | {{< code >}}/api/customers/?filter[id]=[1|5]{{< /code >}} | {{< code php >}}$opt = [
    'resource' => 'customers',
    'filter[id]'  => '[1|5]'
];{{< /code >}} |
| Only the `customers` whose ids are between 1 and 10 | {{< code >}}/api/customers/?filter[id]=[1,10]{{< /code >}} | {{< code php >}}$opt = [
    'resource' => 'customers',
    'filter[id]'  => '[1,10]'
];{{< /code >}} |
| Only the `customers` whose first name is "John" | {{< code >}}/api/customers/?filter[firstname]=[John]{{< /code >}} | {{< code php >}}$opt = [
    'resource' => 'customers',
    'filter[firstname]' => '[John]',
];{{< /code >}} |
| Only the `manufacturers` whose name begins with "Appl" | {{< code >}}/api/manufacturers/?filter[name]=[appl]%{{< /code >}} | {{< code php >}}$opt = [
    'resource' => 'manufacturers',
    'filter[name]' => '[appl]%',
];{{< /code >}} |

## Sort parameter

You can sort the expected result with the `sort` parameter

| Key      | Value | Result |
|----------|-------|--------|
| **sort** | {{< code >}}[{fieldname}_{ASC|DESC}]{{< /code >}} | The `sort` value is composed of a field name and the expected order separated by a `_` |

| Result | API call | PHP Webservice lib options |
|--------|----------|----------------------------|
| Sort the `customers` in alphabetical order according to last name | {{< code >}}/api/customers/?sort=[lastname_ASC]{{< /code >}} | {{< code php >}}$opt = [
    'resource' => 'customers',
    'sort'  => '[lastname_ASC]'
];{{< /code >}} |
| Sort the `customers` in alphabetical order according to last name, then by biggest ID first | {{< code >}}/api/customers/?sort=[lastname_ASC,id_DESC]{{< /code >}} | {{< code php >}}$opt = [
    'resource' => 'customers',
    'sort'  => '[lastname_ASC,id_DESC]'
];{{< /code >}} |

{{% notice note %}}
If you need to sort by the date field you need to add `&date=1` in your request.<br>Final request will be: `/api/customers/?sort=[date_add_DESC]&date=1`
{{% /notice %}}

## Limit parameter

You can define a limit to the expected result with the `limit` parameter (which may allow you to perform pagination)

| Key          | Value           | Result                                                                                                               |
|--------------|-----------------|-----------------------------------------------------------------------------------------------------------|
| **limit** | `[offset,]limit` | Either define `offset` and `limit` separated by a `,` (ex: `1,5`) or the limit only (`offset` is 0-indexed) |

| Result | API call | PHP Webservice lib options |
|--------|----------|----------------------------|
| Only include the first 5 `states` | `/api/states/?limit=5` | {{< code php >}}$opt = [
    'resource' => 'states',
    'limit'  => '5'
];{{< /code >}} |
| Only include the first 5 `states` starting from the 10th element | `/api/states/?limit=9,5` | {{< code php >}}$opt = [
    'resource' => 'states',
    'limit'  => '9,5'
];{{< /code >}} |
