---
title: Actions reference
menuTitle: Actions reference
weight: 11
---

## Grid Actions reference

Grid Actions are tasks available for your grid for common actions.

### SimpleGridAction

This action allow to add a label to the Grid Actions block. Then you can manage the behavior when
clicking on this label using Javascript for exemple.

{{% notice note %}}
"Refresh list", "Show SQL query" and "Export to SQL Manager" actions are created using `SimpleGridAction` actions.
{{% /notice %}}

| Properties         | Expected value |
|--------------------| ---------------|
| **Id**             | A string       |
| **Type**           | `simple`       |
| **Name**           | A string       |
| **Icon**           | A string       |

### LinkGridAction

This action will create a labelized link into the Grid actions block.

| Properties         | Expected value(s)      |
|--------------------| -----------------------|
| **Id**             | A string               |
| **Type**           | `link`                 |
| **Name**           | A string               |
| **Icon**           | A string               |
| **Options**        | `route`                |
|                    | `route_params`         |
| **Requirements**   | `route`                |
| **Defaults**       | `route_params` => []   |
| **Allowed Types**  | `route` (string)       |
|                    | `route_params` (array) |

### SubmitGridAction

This action will create a submittable label into the Grid actions block.

| Properties         | Expected value(s)                    |
|--------------------| -------------------------------------|
| **Id**             | A string                             |
| **Type**           | `submit`                             |
| **Name**           | A string                             |
| **Icon**           | A string                             |
| **Options**        | `submit_route`                       |
|                    | `submit_method`                      |
|                    | `confirm_message`                    |
| **Requirements**   | `submit_route`                       |
| **Defaults**       | `submit_method` => 'POST'            |
|                    | `confirm_message` => null            |
| **Allowed Types**  | `submit_route` (string)              |
|                    | `confirm_message` (string or null)   |
| **Allowed Values** | `submit_method` => ('POST' or 'GET') |

## Row Actions reference

Grid Row Actions are tasks available in a Grid row **when defining a column** that supports tasks.

### LinkRowAction

Very similar to the *LinkGridAction*, but capable to manage User accesses on the content.

| Properties         | Expected value(s)               |
|--------------------| --------------------------------|
| **Id**             | A string                        |
| **Type**           | `link`                          |
| **Name**           | A string                        |
| **Icon**           | A string                        |
| **Options**        | `route`                         |
|                    | `route_param_name`              |
|                    | `route_param_field`             |
|                    | `confirm_message`               |
|                    | `accessibility_checker`         |
| **Requirements**   | `route`                         |
|                    | `route_param_name`              |
|                    | `route_param_field`             |
| **Defaults**       | `confirm_message` => ''         |
|                    | `accessibility_checker` => null |
| **Allowed Types**  | `route` (string)                |
|                    | `route_param_name` (string)     |
|                    | `route_param_field` (string)    |
|                    | `confirm_message` (string)      |
|                    | `accessibility_checker` (callable or null  or instance of AccessibilityCheckerInterface) |

### SubmitRowAction

Very similar to the *SubmitGridAction*, but capable to manage User accesses on the content.

| Properties         | Expected value(s)               |
|--------------------| --------------------------------|
| **Id**             | A string                        |
| **Type**           | `submit`                        |
| **Name**           | A string                        |
| **Icon**           | A string                        |
| **Options**        | `route`                         |
|                    | `route_param_name`              |
|                    | `route_param_field`             |
|                    | `confirm_message`               |
|                    | `accessibility_checker`         |
|                    | `method`                        |
| **Requirements**   | `route`                         |
|                    | `route_param_name`              |
|                    | `route_param_field`             |
| **Defaults**       | `confirm_message` => ''         |
|                    | `accessibility_checker` => null |
|                    | `method` => 'POST'              |
| **Allowed Types**  | `route` (string)                |
|                    | `route_param_name` (string)     |
|                    | `route_param_field` (string)    |
|                    | `method` (string)               |
|                    | `confirm_message` (string)      |
|                    | `accessibility_checker` (callable or null  or instance of AccessibilityCheckerInterface) |

### DeleteCustomerRowAction

This row action will delete the Customer in Sell > Customers page.

| Properties         | Expected value(s)                   |
|--------------------| ------------------------------------|
| **Id**             | A string                            |
| **Type**           | `delete_customer`                   |
| **Name**           | A string                            |
| **Icon**           | A string                            |
| **Options**        | `customer_id_field`                 |
|                    | `customer_delete_route`             |
| **Requirements**   | `customer_id_field`                 |
|                    | `customer_delete_route`             |
| **Defaults**       | `customer_id_field` (string)        |
|                    | `customer_delete_route` => (string) |

### DeleteCategoryRowAction

This row action will delete the Category in Catalog > Categories page.

| Properties         | Expected value(s)                   |
|--------------------| ------------------------------------|
| **Id**             | A string                            |
| **Type**           | `delete_category`                   |
| **Name**           | A string                            |
| **Icon**           | A string                            |
| **Options**        | `category_id_field`                 |
|                    | `category_delete_route`             |
| **Requirements**   | `category_id_field`                 |
|                    | `category_delete_route`             |
| **Defaults**       | `category_id_field` (string)        |
|                    | `category_delete_route` => (string) |

{{% notice note %}}
You need to create a custom Bulk Action? We got you [covered](../tutorials/create-custom-column-type)!
{{% /notice %}}