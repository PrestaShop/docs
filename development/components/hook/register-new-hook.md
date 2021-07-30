---
title: Register a new hook
weight: 10
aliases:
  - /1.7/development/register-new-hook/
---

# How to register a new Hook in PrestaShop

This is basically three steps:

* dispatch the hook in the code (in templates or PHP classes/files);
* update the hooks xml definition of Installer;
* update the hooks table for "Auto Upgrade" system;

## Dispatching hooks

Most of the time, you will dispatch the hook using an instance of `HookDispatcher`. It can be retrieved from the service container and/or injected, as it's done for example in Form Handlers:

```php
<?php
final class FormHandler extends AbstractFormHandler
{
    /* [...] */
    public function getForm()
    {
        $formBuilder = $this->formFactory->createBuilder()
            ->add('general', GeneralType::class)
            ->add('upload_quota', UploadQuotaType::class)
            ->add('notifications', NotificationsType::class)
            ->setData($this->formDataProvider->getData())
        ;
        $this->hookDispatcher->dispatchWithParameters(
            'displayAdministrationPageForm',
            ['form_builder' => &$formBuilder]
        );
        return $formBuilder->setData($formBuilder->getData())->getForm();
    }
    /* [...] */
}
```

## Hooks definition file

During the installation, hooks listed in the `install-dev/data/xml/hook.xml` file are stored on database and made available in PrestaShop. Even if this step is not a requirement – hooks can be declared from templates or generated dynamically – it's a good practice to do it. Also, every hook registered in Database will be displayed in the Hook debugger, so it will help the developer figure out which hooks are available.

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
    <hook id="...">
      <name>...</name>
      <title>...</title>
      <description>...</description>
    </hook>
    <hook id="actionMaintenancePageFormSave">
      <name>actionMaintenancePageFormSave</name>
      <title>Processing Maintenance page form</title>
      <description>This hook is called when the Maintenance Page form is processed</description>
    </hook>
  </entities>
</entity_hook>
</xml>
```

{{% notice tip %}}
Always add new hooks at the bottom of the list, as hooks are registered sequentially.
{{% /notice %}}

## Prepare database update for auto upgrades

The last step is to describe the update process for the auto upgrade module – essentially, the insertion of new hooks in *hooks* table. Locate the X.Y.Z.sql file that refers to the PrestaShop version that will include your change: for instance, if the release expected to include this change is `1.7.5.0`, locate that file in `install-dev/upgrade/sql` folder.

{{% notice tip %}}
This process is explained here: [Structure and content upgrades]({{< ref "/1.7/development/database/structure.md#structure-and-content-upgrades" >}})
{{% /notice %}}

Then add the corresponding SQL commands to add new hooks:

```sql
INSERT IGNORE INTO `PREFIX_hook` (`id_hook`, `name`, `title`, `description`, `position`) VALUES
  (NULL, 'displayAdministrationPageForm', 'Manage Administration Page form fields', 'This hook adds, update or remove fields of the Administration Page form', '1'),
  (NULL, 'actionMaintenancePageFormSave', 'Processing Maintenance page form', 'This hook is called when the Maintenance Page form is processed', '1');
```
