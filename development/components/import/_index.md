---
title: The Import component
menuTitle: Import
---

# The Import component

{{% notice note %}}
The legacy import page is not fully migrated to new architecture yet.
{{% /notice %}}

## Introduction
The import workflow consists of the following steps:

* Configuration in import step 1 (such as data source, separators, other settings).
* _Entity_ fields matching to data source columns in import step 2.
* Data validation process.
* Import process.

{{% notice tip %}}
When using word ___entity___, we are referring to a business entity from PrestaShop, such as _Product_, _Category_, _Address_, etc. 
{{% /notice %}}

## Import step 1
This page consists of import configuration, where you select the import data source and choose wanted options, such as field separators, import language, whether old data should be truncated or not, etc. 
All configuration which is selected in this page, is represented by the `PrestaShop\PrestaShop\Core\Import\Configuration\ImportConfigInterface`.

{{< figure src="./img/import_step_1.png" title="Import step 1" >}}

### Import configuration
The default implementation of the mentioned configuration interface (`PrestaShop\PrestaShop\Core\Import\Configuration\ImportConfigInterface`) in PrestaShop can be seen in `PrestaShop\PrestaShop\Core\Import\Configuration\ImportConfig` class.
This class is a value object, which values are not supposed to change during one import operation.

The default `ImportConfig` implementation can be instantiated using the factory `PrestaShop\PrestaShop\Core\Import\Configuration\ImportConfigFactory`.

## Import step 2
In the second import step we can configure only two things that are directly related to the import:

* Number of rows to skip from the top of import file.
* Entity fields matching to data source columns.

{{< figure src="./img/import_step_2.png" title="Import step 2" >}}

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

```php
<?php
// src/Core/Import/Entity.php

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

```php
<?php
// src/Core/Import/EntityField/Provider/CustomerFieldsProvider.php

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
    
    // ...
}
```

#### Data row
`DataRow` is an object representation of a data row from import source file.

`DataRow` is described by an interface `PrestaShop\PrestaShop\Core\Import\File\DataRow\DataRowInterface` and can be used in collections to represent multiple rows of data.

`DataRow` collections can be built using `DataRowCollectionFactory`, which should implement the `PrestaShop\PrestaShop\Core\Import\File\DataRow\Factory\DataRowCollectionFactoryInterface`.

Currently there is one `DataRowCollectionFactory` implementation available in PrestaShop, which builds the `DataRowCollection` by reading a data file:

```php
<?php
// src/Core/Import/File/DataRow/Factory/DataRowCollectionFactory.php

final class DataRowCollectionFactory implements DataRowCollectionFactoryInterface
{
    // ...

    public function buildFromFile(SplFileInfo $file, $maxRowsInCollection = null)
    {
        $dataRowCollection = new DataRowCollection();
        $rowIndex = 0;

        foreach ($this->fileReader->read($file) as $dataRow) {
            if (null !== $maxRowsInCollection && $rowIndex >= $maxRowsInCollection) {
                break;
            }

            $dataRowCollection->addDataRow($dataRow);
            ++$rowIndex;
        }

        return $dataRowCollection;
    }
}
```


## Import operation
The import operation can be imaged as multiple smaller import processes running one after another, until the data is fully imported or critical errors occur. 

Import operation can be described by three essential parts:

* Import configuration preparation.
* The import handler.
* The importer.

### Import configuration preparation
To run the import process we have to prepare the configuration for it.
As mentioned in previous topics, there are two configuration objects (`ImportConfig` and `ImportRuntimeConfig`), that have to be prepared for the import process. Both of them can be built using factories, which are described by interfaces `PrestaShop\PrestaShop\Core\Import\Configuration\ImportConfigFactoryInterface` and `PrestaShop\PrestaShop\Core\Import\Configuration\ImportRuntimeConfigFactoryInterface`.

There is one implementation of each of the two configuration interfaces in PrestaShop. Both of them are available to build the relevant import config object out of Symfony `Request`:

```php
<?php
// src/Core/Import/Configuration/ImportConfigFactory.php

final class ImportConfigFactory implements ImportConfigFactoryInterface
{
    public function buildFromRequest(Request $request)
    {
        $separator = $request->request->get(
            'separator',
            $request->getSession()->get('separator', ImportSettings::DEFAULT_SEPARATOR)
        );

        $multivalueSeparator = $request->request->get(
            'multiple_value_separator',
            $request->getSession()->get('multiple_value_separator', ImportSettings::DEFAULT_MULTIVALUE_SEPARATOR)
        );

        return new ImportConfig(
            $request->request->get('csv', $request->getSession()->get('csv')),
            $request->request->getInt('entity', $request->getSession()->get('entity', 0)),
            $request->request->get('iso_lang', $request->getSession()->get('iso_lang')),
            $separator,
            $multivalueSeparator,
            $request->request->getBoolean('truncate', $request->getSession()->get('truncate', false)),
            $request->request->getBoolean('regenerate', $request->getSession()->get('regenerate', false)),
            $request->request->getBoolean('match_ref', $request->getSession()->get('match_ref', false)),
            $request->request->getBoolean('forceIDs', $request->getSession()->get('forceIDs', false)),
            $request->request->getBoolean('sendemail', $request->getSession()->get('sendemail', true)),
            $request->request->getInt('skip', 0)
        );
    }
}
```

```php
<?php
// src/Core/Import/Configuration/ImportRuntimeConfigFactory.php

final class ImportRuntimeConfigFactory implements ImportRuntimeConfigFactoryInterface
{
    public function buildFromRequest(Request $request)
    {
        $sharedData = $request->request->get('crossStepsVars', []);

        return new ImportRuntimeConfig(
            $request->request->getBoolean('validateOnly'),
            $request->request->getInt('offset'),
            $request->request->getInt('limit'),
            json_decode($sharedData, true),
            $request->request->get('type_value', [])
        );
    }
}
```

## Import handler
To handle the import process we must prepare an `ImportHandler`, which will have access to our specific logic for import operation. The `ImportHandler` should implement `PrestaShop/PrestaShop/Core/Import/Handler/ImportHandlerInterface`.

There are three main methods exposed by the interface, which are essential for import logic execution:

```php
<?php
// src/Core/Import/Handler/ImportHandlerInterface.php

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
    
    // ...
}
```

* `setUp()` - executed before each import process. You can set prerequisites in this method, log some data, or execute additional operations that should be executed before starting the import. The method has both `ImportConfigInterface` and `ImportRuntimeConfigInterface` as arguments, meaning you can access the configuration if needed for import preparation.
* `importRow()` - executed for every row that's being imported. This method should run the logic, that imports the data for one row. In addition to import configuration, this method also has a `PrestaShop\PrestaShop\Core\Import\File\DataRow\DataRowInterface` as an argument, which is an object representation of the current row from the import data source.
* `tearDown()` - executed when the import process is finished. Useful for actions that have to be done only once after each process.

## Importer
The `Importer` is responsible for running the import logic from `ImportHandler`, and applying the import configuration properly during the process.
`Importer` is an object that implements the `PrestaShop\PrestaShop\Core\Import\ImporterInterface`. PrestaShop comes with one `Importer` implementation (`PrestaShop\PrestaShop\Core\Import\Importer`), which can be easily used for your needs.

The `PrestaShop\PrestaShop\Core\Import\ImporterInterface` exposes only one method:

```php
<?php
// src/Core/Import/ImporterInterface.php

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

### Import execution example in a controller
The `processImportAction()` controller action (from the example below) imports one batch of the import data at a time.
It can be run multiple times, until all data is fully imported.

The controller action below is being called multiple times (via _AJAX_) by the _JavaScript_ part of the import component,
until all data is imported from the source file:

```php
<?php
// src/PrestaShopBundle/Controller/Admin/Configure/AdvancedParameters/ImportController.php

public function processImportAction(Request $request)
{
    $importer = $this->get('prestashop.core.import.importer');
    $importConfigFactory = $this->get('prestashop.core.import.config_factory');
    $runtimeConfigFactory = $this->get('prestashop.core.import.runtime_config_factory');
    $importHandlerFinder = $this->get('prestashop.adapter.import.handler_finder');
    
    // Building the configuration objects
    $importConfig = $importConfigFactory->buildFromRequest($request);
    $runtimeConfig = $runtimeConfigFactory->buildFromRequest($request);
    
    // Running the import process
    $importer->import(
        $importConfig,
        $runtimeConfig,
        $importHandlerFinder->find($importConfig->getEntityType()) // Finding import handler
    );
    
    return $this->json($runtimeConfig->toArray());
}
```

### Related JavaScript
Since the import operation can be heavy and take many resources to complete (depending on the amount of data to be imported),
in PrestaShop it is being executed in smaller processes.
To achieve that, some _JavaScript_ code is being used, which continuously fires _AJAX_ requests that trigger the import processing on the server, until the import finishes.

All _JavaScript_ code, which is used by the import component, can be found under `admin-dev/themes/new-theme/js/pages/import-data/` directory.
We can find different _JavaScript_ components there, which are explained below.

#### `EntityFieldsValidator`
Responsible for validating selected entity fields in import page 2 data table. 
It makes sure that you don't miss any required fields, prevents you from selecting same field twice and shows error messages if you do.

{{< figure src="./img/import_step_2_validation.png" title="Validation in import step 2 - duplicate fields" >}}

#### `ImportBatchSizeCalculator`
Calculates the most reasonable batch size for each import process, depending on server's response time.
It adapts the batch size of the next import iteration by measuring how long it took for the server to process the data in previous import iteration.

#### `ImportDataTable`
Responsible for pagination functionality in the import data preview table. 
The pagination arrows appear below the data table and can be used to peek the source file preview forward or backwards.

{{< figure src="./img/import_step_2_pagination.png" title="Import step 2 data preview table - pagination arrows" >}}

#### `ImportMatchConfiguration`
Responsible for saving, loading or deleting import matches configurations.
Import match configuration allows saving the matched entity fields for later reusability.

{{< figure src="./img/import_match_configuration.png" title="Import match configuration interface" >}}

#### `PostSizeChecker`
Responsible for checking if _POST_ size limit is being reached. 
It's used in each import process, to make sure it won't reach the limits.

#### `ImportProgressModal`
Responsible for displaying the import progress for the end user in a modal window. 
It updates the progress bar of the modal, displays messages, shows/hides the buttons in modal when asked for.

{{< figure src="./img/import_modal.png" title="Import modal" >}}

#### `Importer`
Executes import process and fires _AJAX_ import requests continuously. 
It uses the `PostSizeChecker`, `ImportBatchCalculator` and `ImportProgressModal` components internally and connects them to execute the import process.

#### `ImportDataPage`
Responsible for running the `Importer` component when the end user clicks _Import_ button.
Collects data from the import match configuration form and passes it to the `Importer`.

