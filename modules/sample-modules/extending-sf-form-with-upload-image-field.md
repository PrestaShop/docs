---
title: Extending Symfony form with upload image field
weight: 3
---

# Extending Symfony form with upload image field
{{< minver v="1.7.7" title="true" >}}


## Introduction

In this tutorial we are going to build a module which extends `Suppliers` form 
(SELL -> Catalog -> Brands & Suppliers). This module will address the following need
"I'd like to add an 'upload image' field to the Supplier Add/Edit form because I want to
display a new logo for each supplier on my shop. So this new field must allow me to add,
edit and delete image files linked to a supplier. Obviously I expect the uploaded files
to be stored in a consistent way with how PrestaShop usually stores such files."

We are going to create the module to address this need by using PrestaShop hooks in
the Add/Edit Supplier Back-Office page and we will follow some software development best
practices such as SOLID principles to make our code as supported as possible !

You will learn how to create:

- Main module class: main module entry point and hook entry point
- Installer class: responsible for module installation and uninstallation process
- Create Symfony controller: needed as we add a new "delete image" controller action
- Doctrine entity: this model is responsible for the image data persistence
- Repository class: this model is for image database search and retrieve
- Image Uploader class: this class is responsible for image upload process
- Twig View template: needed for display

### Main module class

Let's create main module class `DemoExtendSymfonyForm2`

```php
<?php
// since this module is compatible with PS 1.7.7 and later, we
// can use PHP7 strict types because PHP5 support has been dropped for PS 1.7.7
declare(strict_types=1);

// use statements

if (!defined('_PS_VERSION_')) {
    exit;
}
// needed as use Composer to autoload this module
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

Let's create Installer class responsible for hooks registration and database management:

```php
<?php
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

Let's use `Installer` class inside the main module class by adding code snippet 
below to `DemoExtendSymfonyForm2` class.

```php
<?php
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

Let's create `SupplierExtraImage` entity class. We use [Doctrine]
 ({{< relref "/8/modules/concepts/doctrine/" >}}) 
 which is available for PrestaShop modules since version 1.7.6.

```php
<?php
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

Let's create hook `hookActionSupplierFormBuilderModifier` 
function inside Main module class. This is a hook available for [CRUD forms]
({{< relref "/8/modules/sample-modules/grid-and-identifiable-object-form-hooks-usage" >}}) in
PrestaShop Symfony pages.

```php
<?php
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
        // we add to the Symfony form an `upload_image_file` field that will be used by BO user to upload image files
        $formBuilder
            ->add('upload_image_file', FileType::class, [
                'label' => $translator->trans('Upload image file', [], 'Modules.DemoExtendSymfonyForm'),
                'required' => false,
            ]);

        /** @var SupplierExtraImage $supplierExtraImage */
        $supplierExtraImage = $supplierExtraImageRepository->findOneBy(['supplierId' => $params['id']]);
        if ($supplierExtraImage && file_exists(_PS_SUPP_IMG_DIR_ . $supplierExtraImage->getImageName())) {
            // When an image is already registered for this supplier, we add to the Symfony an
            // 'image_file' to provide a preview input to BO user and also provide a "delete button"
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

Let's create `SupplierExtraImageUploader` class:

```php
<?php
declare(strict_types=1);

namespace PrestaShop\Module\DemoExtendSymfonyForm\Uploader;

use PrestaShop\Module\DemoExtendSymfonyForm\Entity\SupplierExtraImage;
use PrestaShop\Module\DemoExtendSymfonyForm\Repository\SupplierExtraImageRepository;
use PrestaShop\PrestaShop\Core\Image\Uploader\Exception\ImageOptimizationException;
use PrestaShop\PrestaShop\Core\Image\Uploader\Exception\ImageUploadException;
use PrestaShop\PrestaShop\Core\Image\Uploader\Exception\MemoryLimitException;
use PrestaShop\PrestaShop\Core\Image\Uploader\Exception\UploadedImageConstraintException;
use PrestaShop\PrestaShop\Core\Image\Uploader\ImageUploaderInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Class SupplierExtraImageUploader
 * @package PrestaShop\Module\DemoExtendSymfonyForm\Uploader
 */
class SupplierExtraImageUploader implements ImageUploaderInterface
{
    /** @var SupplierExtraImageRepository */
    private $supplierExtraImageRepository;

    /**
     * @param SupplierExtraImageRepository $supplierExtraImageRepository
     */
    public function __construct(SupplierExtraImageRepository $supplierExtraImageRepository)
    {
        $this->supplierExtraImageRepository = $supplierExtraImageRepository;
    }

    /**
     * @param int $supplierId
     * @param UploadedFile $image
     */
    public function upload($supplierId, UploadedFile $image)
    {
        $this->checkImageIsAllowedForUpload($image);
        $tempImageName = $this->createTemporaryImage($image);
        $this->deleteOldImage($supplierId);

        $originalImageName = $image->getClientOriginalName();
        $destination = _PS_SUPP_IMG_DIR_ . $originalImageName;
        $this->uploadFromTemp($tempImageName, $destination);
        $this->supplierExtraImageRepository->upsertSupplierImageName($supplierId, $originalImageName);
    }

    /**
     * Creates temporary image from uploaded file
     *
     * @param UploadedFile $image
     *
     * @throws ImageUploadException
     *
     * @return string
     */
    protected function createTemporaryImage(UploadedFile $image)
    {
        $temporaryImageName = tempnam(_PS_TMP_IMG_DIR_, 'PS');

        if (!$temporaryImageName || !move_uploaded_file($image->getPathname(), $temporaryImageName)) {
            throw new ImageUploadException('Failed to create temporary image file');
        }

        return $temporaryImageName;
    }

    /**
     * Uploads resized image from temporary folder to image destination
     *
     * @param $temporaryImageName
     * @param $destination
     *
     * @throws ImageOptimizationException
     * @throws MemoryLimitException
     */
    protected function uploadFromTemp($temporaryImageName, $destination)
    {
        if (!\ImageManager::checkImageMemoryLimit($temporaryImageName)) {
            throw new MemoryLimitException('Cannot upload image due to memory restrictions');
        }

        if (!\ImageManager::resize($temporaryImageName, $destination)) {
            throw new ImageOptimizationException(
                'An error occurred while uploading the image. Check your directory permissions.'
            );
        }

        unlink($temporaryImageName);
    }

    /**
     * Deletes old image
     *
     * @param $supplierId
     */
    private function deleteOldImage($supplierId)
    {
        /** @var SupplierExtraImage $supplierExtraImage */
        $supplierExtraImage = $this->supplierExtraImageRepository->findOneBy(['supplierId' => $supplierId]);
        if ($supplierExtraImage && file_exists(_PS_SUPP_IMG_DIR_ . $supplierExtraImage->getImageName())) {
            unlink(_PS_SUPP_IMG_DIR_ . $supplierExtraImage->getImageName());
        }
    }

    /**
     * Check if image is allowed to be uploaded.
     *
     * @param UploadedFile $image
     *
     * @throws UploadedImageConstraintException
     */
    protected function checkImageIsAllowedForUpload(UploadedFile $image)
    {
        $maxFileSize = \Tools::getMaxUploadSize();

        if ($maxFileSize > 0 && $image->getSize() > $maxFileSize) {
            throw new UploadedImageConstraintException(
                sprintf(
                   'Max file size allowed is "%s" bytes. Uploaded image size is "%s".', 
                    $maxFileSize, $image->getSize()
                ), 
                UploadedImageConstraintException::EXCEEDED_SIZE
            );
        }

        if (!\ImageManager::isRealImage($image->getPathname(), $image->getClientMimeType())
            || !\ImageManager::isCorrectImageFileExt($image->getClientOriginalName())
            || preg_match('/\%00/', $image->getClientOriginalName()) // prevent null byte injection
        ) {
            throw new UploadedImageConstraintException(
                sprintf(
                    'Image format "%s", not recognized, allowed formats are: .gif, .jpg, .png', 
                    $image->getClientOriginalExtension()
                ),
                UploadedImageConstraintException::UNRECOGNIZED_FORMAT
            );
        }
    }

}
```

Let's create hook `hookActionAfterUpdateSupplierFormHandler` inside main module class:

```php
<?php
    /**
     * @param array $params
     */
    public function hookActionAfterUpdateSupplierFormHandler(array $params)
    {
        $this->uploadImage($params);
    }
```

Let's create one more hook `hookActionAfterCreateSupplierFormHandler` inside main module class:

```php
<?php
    /**
     * @param array $params
     */
    public function hookActionAfterCreateSupplierFormHandler(array $params)
    {
        $this->uploadImage($params);
    }
```

Let's add `UploadImage` function to main class:

```php
<?php
    /**
     * @param array $params
     */
    private function uploadImage(array $params): void
    {
        /** @var ImageUploaderInterface $supplierExtraImageUploader */
        $supplierExtraImageUploader = $this->get(
            'prestashop.module.demoextendsymfonyform.uploader.supplier_extra_image_uploader'
        );

        /** @var UploadedFile $uploadedFile */
        $uploadedFile = $params['form_data']['upload_image_file'];

        if ($uploadedFile instanceof UploadedFile) {
            $supplierExtraImageUploader->upload($params['id'], $uploadedFile);
        }
    }
```

{{% notice note %}}
You can find the ready solution in PrestaShop example-modules github repository:
https://github.com/PrestaShop/example-modules/tree/master/demoextendsymfonyform2
{{% /notice %}}
