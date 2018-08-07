---
title: Register a custom hook
weight: 3
---

# How to register a custom Hook in PrestaShop?

This is basically three steps:

* dispatch the hook in the code (in templates or PHP classes/files);
* update the hooks xml definition of Installer;
* update the hooks table for "Auto Upgrade" system;

## Dispatch the hook

Most of the time, when migrating a page you will dispatch the hook using an instance
of `HookDispatcher`. We can get it from the service container and/or inject it in the class you need it like we already do for Form Handlers for instance:

```php
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
        $this->hookDispatcher->dispatchForParameters('displayAdministrationPageForm', ['form_builder' => &$formBuilder]);
        return $formBuilder->setData($formBuilder->getData())->getForm();
    }
    /* [...] */
}
```

## Hooks definition update

During the installation, hooks listed in `hooks.xml` file are persisted on database and so on available in PrestaShop. As it's not a requirement - some hooks can be declared from templates or generated dynamically - it's a good practice to do it. Also, every hook registered in Database will be displayed in the Hook debugger, so it will help the developer to figure out which hook is available.

An hook have a name, a title and a definition, they are identified by an additional id attribute in XML:

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

> Always add new hooks in the bottom of the list, the order of registration matters.

## Prepare database update for auto upgrades

The last step is to describe the update (basically the insertion of new hooks in *hooks* table) for the auto upgrade module. Locate the X.Y.Z.sql file that refers to the next version: for instance, if the next release is the `1.7.5`, locate this file in `install-dev/upgrade/sql` folder.

> Creates it if the file doesn't exists.

Then add the corresponding SQL commands to add new hooks:

```sql
INSERT IGNORE INTO `PREFIX_hook` (`id_hook`, `name`, `title`, `description`, `position`) VALUES
  (NULL, 'displayAdministrationPageForm', 'Manage Administration Page form fields', 'This hook adds, update or remove fields of the Administration Page form', '1'),
  (NULL, 'actionMaintenancePageFormSave', 'Processing Maintenance page form', 'This hook is called when the Maintenance Page form is processed', '1');
```