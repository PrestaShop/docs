---
title: Adding a new Core hook
weight: 30
---

# How to add a new Core Hook

Although hooks are automatically created the first time they are subscribed to, new hooks is added to the Core itself need to be properly registered and documented.

Here are the steps you need to follow.

## 1. Dispatch the new hook

The very fisrt step is just to dispatch the new hook wherever you need it, as explained in [Dispatching a Hook]({{< relref "dispatching-hook" >}}).

## 2. Update the Hooks definition file

All known hooks are registered in the `ps_hook` database table. This table is populated with Core hooks during the installation, by reading the `install-dev/data/xml/hook.xml` file, then during runtime every time a new hook is used.

Having Core hooks registered is important for two main reasons. First, every hook registered in database will be displayed in the Hook debugger, so it will help developers figure out which hooks are available on a given page. Second, known hooks are displayed in the Positions page, allowing to transplant modules from one hook into another (this is especially useful for display hooks). 

Each hook has a name, a title and a definition. They are identified by an additional id attribute in XML, which is the same as its name.

```xml
<?xml version="1.0" encoding="UTF-8"?>
<entity_hook>
  <fields id="name">
    <field name="name"/>
    <field name="title"/>
    <field name="description"/>
  </fields>
  <entities>
    <hook id="actionMaintenancePageFormSave">
      <name>actionMaintenancePageFormSave</name>
      <title>Processing Maintenance page form</title>
      <description>This hook is called when the Maintenance Page form is processed</description>
    </hook>
    <hook id="...">
      ...
    </hook>
  </entities>
</entity_hook>
</xml>
```

Add new hooks at the bottom of the list, as hooks are registered sequentially.

## 3. Prepare database update for shop upgrades

The previous step only adds the hook to _new_ shops. We also need to register the hook to shops that upgrade from a previous version.

The last step is to insert the new hooks in the `ps_hooks` table using the upgrade system. Locate the X.Y.Z.sql file that refers to the PrestaShop version that will include your change: for instance, if the release expected to include this change is `1.7.5.0`, locate that file in the `upgrade/sql` folder from the [autoupgrade](https://github.com/PrestaShop/autoupgrade) module.

{{% notice tip %}}
This process is explained here: [Structure and content upgrades]({{< ref "/8/development/database/structure.md#structure-and-content-upgrades" >}})
{{% /notice %}}

Once you have located the file, add the corresponding SQL commands to add new hooks:

```sql
INSERT IGNORE INTO `PREFIX_hook` (`name`, `title`, `description`) VALUES
  ('displayAdministrationPageForm', 'Manage Administration Page form fields', 'This hook adds, update or remove fields of the Administration Page form'),
  ('actionMaintenancePageFormSave', 'Processing Maintenance page form', 'This hook is called when the Maintenance Page form is processed');
```
