---
title: Column Types reference
menuTitle: Column Types reference
weight: 10
---

## Column Types reference

Most important Grid definition part is defining columns. PrestaShop already comes with a list of predefined columns that you can use in your own Grids.

### Supported Types

#### Basic columns

* [DataColumn][data-column-reference]

#### Common columns

* [ActionColumn][action-column-reference]
* [BulkActionColumn][bulk-action-column-reference]
* [DateTimeColumn][datetime-column-reference]

#### Employee columns

* [EmployeeNameWithAvatarColumn][employee-name-wit-avatar-column-reference]

#### Status columns

* [SeverityLevelColumn][severity-column-reference]

[data-column-reference]: {{< ref "/1.7/development/components/grid/columns-reference/data.md" >}}
[action-column-reference]: {{< ref "/1.7/development/components/grid/columns-reference/action.md" >}}
[bulk-action-column-reference]: {{< ref "/1.7/development/components/grid/columns-reference/bulk-action.md" >}}
[datetime-column-reference]: {{< ref "/1.7/development/components/grid/columns-reference/datetime.md" >}}
[employee-name-wit-avatar-column-reference]: {{< ref "/1.7/development/components/grid/columns-reference/employee-name-with-avatar.md" >}}
[severity-column-reference]: {{< ref "/1.7/development/components/grid/columns-reference/severity-level.md" >}}

{{% notice note %}}
You need to create a custom Column Type? We got you [covered](../tutorials/create-custom-bulk-action)!
{{% /notice %}}