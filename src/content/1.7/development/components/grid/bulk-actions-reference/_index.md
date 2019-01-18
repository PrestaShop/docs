---
title: Bulk Actions reference
menuTitle: Bulk Actions reference
weight: 12
---

## Bulk Actions reference

You can define actions for every selected rows of your grid. PrestaShop already comes with a list of common bulk actions that you can use in your own Grids.

### SubmitBulkAction

This action will submit the data of your rows into a specific route.

| Properties         | Expected value(s)                  |
|--------------------| -----------------------------------|
| **Type**           | `submit`                           |
| **Requirements**   | `submit_route`                     |
| **Defaults**       | `confirm_message` => null          |
|                    | `submit_method` => "POST"          |
| **Allowed Types**  | `submit_route` (string)            |
|                    | `confirm_message` (string or null) |
| **Allowed Values** | `submit_method` ("POST" or "GET")  |

### DeleteCategoriesBulkAction

This action will delete the selected Categories in Catalog > Categories page.

| Properties         | Expected value(s)                                   |
|--------------------| ----------------------------------------------------|
| **Type**           | `delete_categories`                                 |
| **Requirements**   | `categories_bulk_delete_route`                      |
| **Allowed Types**  | `submitcategories_bulk_delete_route_route` (string) |

### DeleteCustomersBulkAction

This bulk action will delete the selected Customers in Sell > Customers page.

| Properties         | Expected value(s)                      |
|--------------------| ---------------------------------------|
| **Type**           | `delete_customers`                     |
| **Requirements**   | `customers_bulk_delete_route`          |
| **Allowed Types**  | `customers_bulk_delete_route` (string) |

{{% notice note %}}
You need to create a custom Bulk Action? We got you [covered](../tutorials/create-custom-bulk-action)!
{{% /notice %}}