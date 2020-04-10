---
title: Extending Symfony form with upload image field
weight: 3
aliases: 
    - /1.7/modules/sample_modules/grid-and-identifiable-object-form-hooks-usage
---

# Extending Symfony form with upload image field
{{< minver v="1.7.7" title="true" >}}


## Introduction

In this tutorial we are going to build a module which extends `Suppliers` form (SELL -> Catalog -> Brands & Suppliers).
You will learn how to:

- Main module class
- Installer class
- Create Symfony controller
- Doctrine entity
- Repository class
- Image Uploader class
- Twig View

### Main module class

Let's create main module class `DemoExtendSymfonyForm2`

```php
<?php
declare(strict_types=1);

// use statements

if (!defined('_PS_VERSION_')) {
    exit;
}

require_once __DIR__.'/vendor/autoload.php';

/**
 * Class demoextendsymfonyform
 */
class DemoExtendSymfonyForm2 extends Module
{
    private const SUPPLIER_EXTRA_IMAGE_PATH = '/img/su/';

    public function __construct()
    {
        $this->name = 'demoextendsymfonyform2';
        $this->author = 'PrestaShop';
        $this->version = '1.0.0';
        $this->ps_versions_compliancy = ['min' => '1.7.7.0', 'max' => _PS_VERSION_];

        parent::__construct();

        $this->displayName = $this->l('Demo Symfony Forms #2');
        $this->description = $this->l(
            'Demonstration of how to add an image upload field inside the Symfony form'
        );
    }
}
```

Let's create Installer class:

```php
declare(strict_types=1);

namespace PrestaShop\Module\DemoExtendSymfonyForm\Install;


use Db;
use Module;

/**
 * Class Installer
 * @package PrestaShop\Module\DemoExtendSymfonyForm\Install
 */
class Installer
{
    /**
     * Module's installation entry point.
     *
     * @param Module $module
     *
     * @return bool
     */
    public function install(Module $module): bool
    {
        if (!$this->registerHooks($module)) {
            return false;
        }

        if (!$this->installDatabase()) {
            return false;
        }

        return true;
    }

    /**
     * Module's uninstallation entry point.
     *
     * @return bool
     */
    public function uninstall(): bool
    {
        return $this->uninstallDatabase();
    }

    /**
     * Install the database modifications required for this module.
     *
     * @return bool
     */
    private function installDatabase(): bool
    {
        $queries = [
            'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'supplier_extra_image` (
              `id_extra_image` int(11) NOT NULL AUTO_INCREMENT,
              `id_supplier` int(11) NOT NULL,
              `image_name` varchar(64) NOT NULL,
              PRIMARY KEY (`id_extra_image`)
            ) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;',
        ];

        return $this->executeQueries($queries);
    }

    /**
     * Uninstall database modifications.
     *
     * @return bool
     */
    private function uninstallDatabase(): bool
    {
        $queries = [
            'DROP TABLE IF EXISTS `'._DB_PREFIX_.'supplier_extra_image`',
        ];

        return $this->executeQueries($queries);
    }

    /**
     * Register hooks for the module.
     *
     * @param Module $module
     *
     * @return bool
     */
    private function registerHooks(Module $module): bool
    {
        $hooks = [
            'actionSupplierFormBuilderModifier',
            'actionAfterCreateSupplierFormHandler',
            'actionAfterUpdateSupplierFormHandler',
        ];

        return (bool) $module->registerHook($hooks);
    }

    /**
     * A helper that executes multiple database queries.
     *
     * @param array $queries
     *
     * @return bool
     */
    private function executeQueries(array $queries): bool
    {
        foreach ($queries as $query) {
            if (!Db::getInstance()->execute($query)) {
                return false;
            }
        }

        return true;
    }
}
```

Let's use Installer class inside the main module class.

```php
    /**
     * @return bool
     */
    public function install()
    {
        if (!parent::install()) {
            return false;
        }

        $installer = new Installer();

        return $installer->install($this);
    }

    /**
     * @return bool
     */
    public function uninstall()
    {
        $installer = new Installer();

        return $installer->uninstall() && parent::uninstall();
    }
```

Let's create `SupplierExtraImage` entity class:

```php
declare(strict_types=1);

namespace PrestaShop\Module\DemoExtendSymfonyForm\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="PrestaShop\Module\DemoExtendSymfonyForm\Repository\SupplierExtraImageRepository")
 */
class SupplierExtraImage
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(name="id_extra_image", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * @ORM\Column(name="id_supplier", type="integer")
     */
    private $supplierId;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $imageName;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getSupplierId()
    {
        return $this->supplierId;
    }

    /**
     * @param mixed $supplierId
     */
    public function setSupplierId($supplierId): void
    {
        $this->supplierId = $supplierId;
    }

    /**
     * @return string
     */
    public function getImageName(): string
    {
        return $this->imageName;
    }

    /**
     * @param string $imageName
     */
    public function setImageName(string $imageName): void
    {
        $this->imageName = $imageName;
    }

}
```

Let's create `SupplierExtraImageRepository` class:

```php
<?php

declare(strict_types=1);

namespace PrestaShop\Module\DemoExtendSymfonyForm\Repository;

use Doctrine\ORM\EntityRepository;
use PrestaShop\Module\DemoExtendSymfonyForm\Entity\SupplierExtraImage;

/**
 * Class SupplierExtraImageRepository
 * @package PrestaShop\Module\DemoExtendSymfonyForm\Repository
 */
class SupplierExtraImageRepository extends EntityRepository
{
    /**
     * @param $supplierId
     * @param $imageName
     */
    public function upsertSupplierImageName($supplierId, $imageName)
    {
        /** @var SupplierExtraImage $supplierExtraImage */
        $supplierExtraImage = $this->findOneBy(['supplierId' => $supplierId]);
        if (!$supplierExtraImage) {
            $supplierExtraImage = new SupplierExtraImage();
            $supplierExtraImage->setSupplierId($supplierId);
        }
        $supplierExtraImage->setImageName($imageName);

        $em = $this->getEntityManager();
        $em->persist($supplierExtraImage);
        $em->flush();
    }

    /**
     * @param SupplierExtraImage $supplierExtraImage
     */
    public function deleteExtraImage(SupplierExtraImage $supplierExtraImage)
    {
        $em = $this->getEntityManager();
        if ($supplierExtraImage) {
            $em->remove($supplierExtraImage);
            $em->flush();
        }
    }
}
```

Let's create hook `hookActionSupplierFormBuilderModifier`:

```php
    /**
     * @param array $params
     */
    public function hookActionSupplierFormBuilderModifier(array $params)
    {
        /** @var SupplierExtraImageRepository $supplierExtraImageRepository */
        $supplierExtraImageRepository = $this->get(
            'prestashop.module.demoextendsymfonyform.repository.supplier_extra_image_repository'
        );

        $translator = $this->getTranslator();
        /** @var FormBuilderInterface $formBuilder */
        $formBuilder = $params['form_builder'];
        $formBuilder
            ->add('upload_image_file', FileType::class, [
                'label' => $translator->trans('Upload image file', [], 'Modules.DemoExtendSymfonyForm'),
                'required' => false,
            ]);

        /** @var SupplierExtraImage $supplierExtraImage */
        $supplierExtraImage = $supplierExtraImageRepository->findOneBy(['supplierId' => $params['id']]);
        if ($supplierExtraImage && file_exists(_PS_SUPP_IMG_DIR_ . $supplierExtraImage->getImageName())) {
            $formBuilder
                ->add('image_file', CustomContentType::class, [
                    'required' => false,
                    'template' => '@Modules/demoextendsymfonyform2/src/View/upload_image.html.twig',
                    'data' => [
                        'supplierId' => $params['id'],
                        'imageUrl' => self::SUPPLIER_EXTRA_IMAGE_PATH . $supplierExtraImage->getImageName(),
                    ],
                ]);
        }

    }
```
