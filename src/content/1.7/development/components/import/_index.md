---
title: The Import component
menuTitle: Import
weight: 2
---

# The Import component

{{% notice note %}}
The legacy import page is not fully migrated to new architecture yet.
{{% /notice %}}

## Introduction
The import workflow consists of the following steps:

* Configuration in import step 1 (such as data source, separators, other settings).
* Entity fields matching to data source columns in import step 2.
* Data validation process.
* Import process.

## Import step 1
This page consists of import configuration, where you select the import data source and choose wanted options, such as field separators, import language, whether old data should be truncated or not, etc. 
All configuration which is selected in this page, is represented by the `PrestaShop\PrestaShop\Core\Import\Configuration\ImportConfigInterface`.

### Import configuration
The default implementation of the mentioned configuration interface (`PrestaShop\PrestaShop\Core\Import\Configuration\ImportConfigInterface`) in PrestaShop can be seen in `PrestaShop\PrestaShop\Core\Import\Configuration\ImportConfig` class.
This class is a value object, which values are not supposed to change during one import operation.

The default `ImportConfig` implementation can be instantiated using the factory `PrestaShop\PrestaShop\Core\Import\Configuration\ImportConfigFactory`.

## Import step 2
In the second import step we can configure only two things that are directly related to the import:

* Number of rows to skip from the top of import file.
* Entity fields matching to data source columns.

### Number of rows to skip
The number of rows to skip from the top of import file value is also held in the default `ImportConfig` implementation and is exposed by the `PrestaShop\PrestaShop\Core\Import\Configuration\ImportConfigInterface`. 
The interface fits well for this configuration value, because the value is not supposed to change during the import operation.

### Entity fields matching
{{% notice tip %}}
Entity fields matching can be explained as selecting which of the available entity fields is represented by which column in the import file.
{{% /notice %}}
There are a couple of classes implemented in PrestaShop, that ease up the entity fields matching:

* _Import entity_ - represented by `PrestaShop\PrestaShop\Core\Import\Entity`.
* _Entity field_ - represented by `PrestaShop\PrestaShop\Core\Import\EntityField\EntityField`.
* _Data row_ - represented by `PrestaShop\PrestaShop\Core\Import\File\DataRow\DataRow`.

#### Import entity
This class holds all import types, that are available by default in PrestaShop and allows to retrieve them easily:
```
final class Entity
{
    const TYPE_CATEGORIES = 0;
    const TYPE_PRODUCTS = 1;
    const TYPE_COMBINATIONS = 2;
    const TYPE_CUSTOMERS = 3;
    const TYPE_ADDRESSES = 4;
    const TYPE_MANUFACTURERS = 5;
    const TYPE_SUPPLIERS = 6;
    const TYPE_ALIAS = 7;
    const TYPE_STORE_CONTACTS = 8;
    
    <...>
}
```

#### Entity field
Entity field is described by an implementation of `PrestaShop\PrestaShop\Core\Import\EntityField\EntityFieldInterface`.

Entity fields are stored in collections, by implementing `PrestaShop\PrestaShop\Core\Import\EntityField\EntityFieldCollectionInterface`.
Entity field collection default implementation is this class: `PrestaShop\PrestaShop\Core\Import\EntityField\EntityFieldCollection`.

Entity field collections are provided by providers, which implement `PrestaShop\PrestaShop\Core\Import\EntityField\Provider\EntityFieldsProviderInterface`.
Every entity, which is available for import in PrestaShop, has it's own fields provider in the `PrestaShop\PrestaShop\Core\Import\EntityField\Provider` namespace.

For example, the entity fields provider for `Customer` entity builds the entity fields collection in the following way:
```
final class CustomerFieldsProvider implements EntityFieldsProviderInterface
{
    public function getCollection()
    {
        $fields = [
            new EntityField('id', $this->trans('ID', 'Admin.Global')),
            new EntityField('active', $this->trans('Active  (0/1)')),
            new EntityField('id_gender', $this->trans('Titles ID (Mr = 1, Ms = 2, else 0)')),
            new EntityField('email', $this->trans('Email', 'Admin.Global'), '', true),
            new EntityField('passwd', $this->trans('Password', 'Admin.Global'), '', true),
            new EntityField('birthday', $this->trans('Birth date (yyyy-mm-dd)')),
            new EntityField('lastname', $this->trans('Last name', 'Admin.Global'), '', true),
            new EntityField('firstname', $this->trans('First name', 'Admin.Global'), '', true),
            new EntityField('newsletter', $this->trans('Newsletter (0/1)')),
            new EntityField('optin', $this->trans('Partner offers (0/1)')),
            new EntityField('date_add', $this->trans('Registration date (yyyy-mm-dd)')),
            new EntityField('group', $this->trans('Groups (x,y,z...)')),
            new EntityField('id_default_group', $this->trans('Default group ID')),
            new EntityField(
                'id_shop',
                $this->trans('ID / Name of shop'),
                $this->trans('Ignore this field if you don\'t use the Multistore tool. If you leave this field empty, the default shop will be used.', 'Admin.Advparameters.Help')
            ),
        ];

        return EntityFieldCollection::createFromArray($fields);
    }
    
    <...>
}
```

#### Data row
Data row is an object representation of a data row from import source file.

## Import operation
The import operation can be imaged as multiple smaller import processes running one after another, until the data is fully imported or critical errors occur. 

Import operation can be described by three essential parts:

* Import configuration.
* The import handler.
* The importer.

## Import handler
To handle the import process we must prepare an `ImportHandler`, which will have access to our specific logic for import operation. The `ImportHandler` should implement the interface `PrestaShop/PrestaShop/Core/Import/Handler/ImportHandlerInterface`.

There are three main methods exposed by the interface, which are essential for import logic execution:

```
interface ImportHandlerInterface
{
    /**
     * Executed before import process is started.
     */
    public function setUp(ImportConfigInterface $importConfig, ImportRuntimeConfigInterface $runtimeConfig);

    /**
     * Imports one data row.
     */
    public function importRow(
        ImportConfigInterface $importConfig,
        ImportRuntimeConfigInterface $runtimeConfig,
        DataRowInterface $dataRow
    );

    /**
     * Executed when the import process is completed.
     */
    public function tearDown(ImportConfigInterface $importConfig, ImportRuntimeConfigInterface $runtimeConfig);
    
    <...>
}
```

* `setUp()` - executed before each import process. You can set prerequisites in this method, log some data, or execute additional operations that should be executed before starting the import. The method has both `ImportConfigInterface` and `ImportRuntimeConfigInterface` as arguments, meaning you can access the configuration if needed for import preparation.
* `importRow()` - executed for every row that's being imported. This method should run the logic, that imports the data for one row. In addition to import configuration, this method also has a `PrestaShop\PrestaShop\Core\Import\File\DataRow\DataRowInterface` as an argument, which is an object representation of the current row from the import data source.
* `tearDown()` - executed when the import process is finished. Useful for actions that have to be done only once after each process.

## Importer
The `Importer` is responsible for running the import logic from `ImportHandler`, and applying the import configuration properly during the process.
`Importer` is an object that implements the `PrestaShop\PrestaShop\Core\Import\ImporterInterface`. PrestaShop comes with one `Importer` implementation (`PrestaShop\PrestaShop\Core\Import\Importer`), which can be easily used for your needs.

The `PrestaShop\PrestaShop\Core\Import\ImporterInterface` exposes only one method:
```
interface ImporterInterface
{
    /**
     * Process the import.
     */
    public function import(
        ImportConfigInterface $importConfig,
        ImportRuntimeConfigInterface $runtimeConfig,
        ImportHandlerInterface $importHandler
    );
}
```

`import()` method accepts the import configurations and the import handler implementation as arguments and will execute the import logic automatically.

### Import execution example in a controller:

```
public function processImportAction(Request $request)
{
    $importer = $this->get('prestashop.core.import.importer');
    $importConfigFactory = $this->get('prestashop.core.import.config_factory');
    $runtimeConfigFactory = $this->get('prestashop.core.import.runtime_config_factory');
    $importHandlerFinder = $this->get('prestashop.adapter.import.handler_finder');
    
    $importConfig = $importConfigFactory->buildFromRequest($request);
    $runtimeConfig = $runtimeConfigFactory->buildFromRequest($request);
    
    $importer->import(
        $importConfig,
        $runtimeConfig,
        $importHandlerFinder->find($importConfig->getEntityType())
    );
    
    return $this->json($runtimeConfig->toArray());
}
```

