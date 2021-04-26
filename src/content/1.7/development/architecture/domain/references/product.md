---
title: Product domain
---

## Product domain

### Product Commands

#### DeleteAttributeCommand {id="DeleteAttributeCommand"}

`PrestaShop\PrestaShop\Core\Domain\Product\AttributeGroup\Attribute\Command\DeleteAttributeCommand`
_Deletes Attribute by provided id_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$attributeId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Attribute\CommandHandler\DeleteAttributeHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Product\AttributeGroup\Attribute\CommandHandler\DeleteAttributeHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### BulkDeleteAttributeCommand {id="BulkDeleteAttributeCommand"}

`PrestaShop\PrestaShop\Core\Domain\Product\AttributeGroup\Attribute\Command\BulkDeleteAttributeCommand`
_Deletes attributes in bulk action_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$array attributeIds`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Attribute\CommandHandler\BulkDeleteAttributeHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Product\AttributeGroup\Attribute\CommandHandler\BulkDeleteAttributeHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### DeleteAttributeGroupCommand {id="DeleteAttributeGroupCommand"}

`PrestaShop\PrestaShop\Core\Domain\Product\AttributeGroup\Command\DeleteAttributeGroupCommand`
_Deletes attribute group by provided id_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$attributeGroupId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\AttributeGroup\CommandHandler\DeleteAttributeGroupHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Product\AttributeGroup\CommandHandler\DeleteAttributeGroupHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### BulkDeleteAttributeGroupCommand {id="BulkDeleteAttributeGroupCommand"}

`PrestaShop\PrestaShop\Core\Domain\Product\AttributeGroup\Command\BulkDeleteAttributeGroupCommand`
_Deletes attribute groups in bulk action by provided ids_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$array attributeGroupIds`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\AttributeGroup\CommandHandler\BulkDeleteAttributeGroupHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Product\AttributeGroup\CommandHandler\BulkDeleteAttributeGroupHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### AssignProductToCategoryCommand {id="AssignProductToCategoryCommand"}

`PrestaShop\PrestaShop\Core\Domain\Product\Command\AssignProductToCategoryCommand`
_Class AssignProductToCategoryCommand adds a product to a category._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$categoryId`</li>  <li>`$productId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Product\CommandHandler\AssignProductToCategoryHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Product\CommandHandler\AssignProductToCategoryHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### UpdateProductStatusCommand {id="UpdateProductStatusCommand"}

`PrestaShop\PrestaShop\Core\Domain\Product\Command\UpdateProductStatusCommand`
_Class UpdateProductStatusCommand update a given product status_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int productId`</li>  <li>`$bool enable`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Product\CommandHandler\UpdateProductStatusCommandHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Product\CommandHandler\UpdateProductStatusCommandHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### AddProductCommand {id="AddProductCommand"}

`PrestaShop\PrestaShop\Core\Domain\Product\Command\AddProductCommand`
_Command for creating product with basic information_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$array localizedNames`</li>  <li>`$bool isVirtual`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Product\CommandHandler\AddProductHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Product\CommandHandler\AddProductHandlerInterface`</li>  |
| **Return type** |  ProductId  |
#### UpdateProductBasicInformationCommand {id="UpdateProductBasicInformationCommand"}

`PrestaShop\PrestaShop\Core\Domain\Product\Command\UpdateProductBasicInformationCommand`
_Command to update some basic properties of product_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int productId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Product\CommandHandler\UpdateProductBasicInformationHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Product\CommandHandler\UpdateProductBasicInformationHandlerInterface`</li>  |
| **Return type** |  void  |
#### UpdateProductPricesCommand {id="UpdateProductPricesCommand"}

`PrestaShop\PrestaShop\Core\Domain\Product\Command\UpdateProductPricesCommand`
_Responsible for updating information associated with product price_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int productId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Product\CommandHandler\UpdateProductPricesHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Product\CommandHandler\UpdateProductPricesHandlerInterface`</li>  |
| **Return type** |  void  |
#### SetProductTagsCommand {id="SetProductTagsCommand"}

`PrestaShop\PrestaShop\Core\Domain\Product\Command\SetProductTagsCommand`
_Updates product tags in provided languages_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int productId`</li>  <li>`$array localizedTags`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Product\CommandHandler\SetProductTagsHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Product\CommandHandler\UpdateProductTagsHandlerInterface`</li>  |
| **Return type** |  void  |
#### RemoveAllProductTagsCommand {id="RemoveAllProductTagsCommand"}

`PrestaShop\PrestaShop\Core\Domain\Product\Command\RemoveAllProductTagsCommand`
_Removes all Tags for product_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int productId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Product\CommandHandler\RemoveAllProductTagsHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Product\CommandHandler\RemoveAllProductTagsHandlerInterface`</li>  |
| **Return type** |  void  |
#### UpdateProductOptionsCommand {id="UpdateProductOptionsCommand"}

`PrestaShop\PrestaShop\Core\Domain\Product\Command\UpdateProductOptionsCommand`
__

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int productId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Product\CommandHandler\UpdateProductOptionsHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Product\CommandHandler\UpdateProductOptionsHandlerInterface`</li>  |
| **Return type** |  void  |
#### UpdateProductDetailsCommand {id="UpdateProductDetailsCommand"}

`PrestaShop\PrestaShop\Core\Domain\Product\Command\UpdateProductDetailsCommand`
_Updates product details_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int productId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Product\CommandHandler\UpdateProductDetailsHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Product\CommandHandler\UpdateProductDetailsHandlerInterface`</li>  |
| **Return type** |  void  |
#### SetPackProductsCommand {id="SetPackProductsCommand"}

`PrestaShop\PrestaShop\Core\Domain\Product\Command\SetPackProductsCommand`
_Sets products of product pack_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int packId`</li>  <li>`$array products`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Product\CommandHandler\SetPackProductsHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Product\CommandHandler\SetPackProductsHandlerInterface`</li>  |
| **Return type** |  void  |
#### RemoveAllProductsFromPackCommand {id="RemoveAllProductsFromPackCommand"}

`PrestaShop\PrestaShop\Core\Domain\Product\Command\RemoveAllProductsFromPackCommand`
_Removes all products from provided pack_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int packId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Product\CommandHandler\RemoveAllProductsFromPackHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Product\CommandHandler\RemoveAllProductsFromPackHandlerInterface`</li>  |
| **Return type** |  void  |
#### SetAssociatedProductCategoriesCommand {id="SetAssociatedProductCategoriesCommand"}

`PrestaShop\PrestaShop\Core\Domain\Product\Command\SetAssociatedProductCategoriesCommand`
_Sets new product-category associations_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int productId`</li>  <li>`$int defaultCategoryId`</li>  <li>`$array categoryIds`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Product\CommandHandler\SetAssociatedProductCategoriesHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Product\CommandHandler\SetAssociatedProductCategoriesHandlerInterface`</li>  |
| **Return type** |  void  |
#### RemoveAllAssociatedProductCategoriesCommand {id="RemoveAllAssociatedProductCategoriesCommand"}

`PrestaShop\PrestaShop\Core\Domain\Product\Command\RemoveAllAssociatedProductCategoriesCommand`
_Removes all product-category associations_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int productId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Product\CommandHandler\RemoveAllAssociatedProductCategoriesHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Product\CommandHandler\RemoveAllAssociatedProductCategoriesHandlerInterface`</li>  |
| **Return type** |  void  |
#### SetProductCustomizationFieldsCommand {id="SetProductCustomizationFieldsCommand"}

`PrestaShop\PrestaShop\Core\Domain\Product\Customization\Command\SetProductCustomizationFieldsCommand`
_Sets product customization fields_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int productId`</li>  <li>`$array customizationFields`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Product\CommandHandler\SetProductCustomizationFieldsHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Product\Customization\CommandHandler\SetProductCustomizationFieldsHandlerInterface`</li>  |
| **Return type** |  CustomizationFieldId[]  |
#### RemoveAllCustomizationFieldsFromProductCommand {id="RemoveAllCustomizationFieldsFromProductCommand"}

`PrestaShop\PrestaShop\Core\Domain\Product\Customization\Command\RemoveAllCustomizationFieldsFromProductCommand`
_Removes all customization fields from product_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int productId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Product\CommandHandler\RemoveAllCustomizationFieldsFromProductHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Product\Customization\CommandHandler\RemoveAllCustomizationFieldsFromProductHandlerInterface`</li>  |
| **Return type** |  void  |
#### UpdateProductShippingCommand {id="UpdateProductShippingCommand"}

`PrestaShop\PrestaShop\Core\Domain\Product\Command\UpdateProductShippingCommand`
_Updates product shipping options_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int productId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Product\CommandHandler\UpdateProductShippingHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Product\CommandHandler\UpdateProductShippingHandlerInterface`</li>  |
| **Return type** |  void  |
#### SetProductSuppliersCommand {id="SetProductSuppliersCommand"}

`PrestaShop\PrestaShop\Core\Domain\Product\Supplier\Command\SetProductSuppliersCommand`
_Updates product suppliers_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int productId`</li>  <li>`$array productSuppliers`</li>  <li>`$int defaultSupplierId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Product\CommandHandler\SetProductSuppliersHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Product\Supplier\CommandHandler\SetProductSuppliersHandlerInterface`</li>  |
| **Return type** |  ProductSupplierId[] new product suppliers ids list  |
#### RemoveAllAssociatedProductSuppliersCommand {id="RemoveAllAssociatedProductSuppliersCommand"}

`PrestaShop\PrestaShop\Core\Domain\Product\Supplier\Command\RemoveAllAssociatedProductSuppliersCommand`
_Removes all product suppliers for provided product_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int productId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Product\CommandHandler\RemoveAllAssociatedProductSuppliersHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Product\Supplier\CommandHandler\RemoveAllAssociatedProductSuppliersHandlerInterface`</li>  |
| **Return type** |  void  |
#### UpdateProductSeoCommand {id="UpdateProductSeoCommand"}

`PrestaShop\PrestaShop\Core\Domain\Product\Command\UpdateProductSeoCommand`
_Updates Product SEO options_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int productId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Product\CommandHandler\UpdateProductSeoHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Product\CommandHandler\UpdateProductSeoHandlerInterface`</li>  |
| **Return type** |  void  |
#### DeleteProductCommand {id="DeleteProductCommand"}

`PrestaShop\PrestaShop\Core\Domain\Product\Command\DeleteProductCommand`
_Deletes product_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int productId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Product\CommandHandler\DeleteProductHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Product\CommandHandler\DeleteProductHandlerInterface`</li>  |
| **Return type** |  void  |
#### BulkDeleteProductCommand {id="BulkDeleteProductCommand"}

`PrestaShop\PrestaShop\Core\Domain\Product\Command\BulkDeleteProductCommand`
_Deletes multiple products_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$array productIds`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Product\CommandHandler\BulkDeleteProductHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Product\CommandHandler\BulkDeleteProductHandlerInterface`</li>  |
| **Return type** |  void  |
#### SetAssociatedProductAttachmentsCommand {id="SetAssociatedProductAttachmentsCommand"}

`PrestaShop\PrestaShop\Core\Domain\Product\Command\SetAssociatedProductAttachmentsCommand`
_Replaces previous product attachments association with the provided one._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int productId`</li>  <li>`$array attachmentIds`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Product\CommandHandler\SetAssociatedProductAttachmentsHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Product\CommandHandler\SetAssociatedProductAttachmentsHandlerInterface`</li>  |
| **Return type** |  void  |
#### AssociateProductAttachmentCommand {id="AssociateProductAttachmentCommand"}

`PrestaShop\PrestaShop\Core\Domain\Product\Command\AssociateProductAttachmentCommand`
_Associates product with attachment_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int productId`</li>  <li>`$int attachmentId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Product\CommandHandler\AssociateProductAttachmentHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Product\CommandHandler\AssociateProductAttachmentHandlerInterface`</li>  |
| **Return type** |  void  |
#### RemoveAllAssociatedProductAttachmentsCommand {id="RemoveAllAssociatedProductAttachmentsCommand"}

`PrestaShop\PrestaShop\Core\Domain\Product\Command\RemoveAllAssociatedProductAttachmentsCommand`
_Removes all product-attachment associations for provided product_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int productId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Product\CommandHandler\RemoveAllAssociatedProductAttachmentsHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Product\CommandHandler\RemoveAllAssociatedProductAttachmentsHandlerInterface`</li>  |
| **Return type** |  void  |
#### UpdateProductStockInformationCommand {id="UpdateProductStockInformationCommand"}

`PrestaShop\PrestaShop\Core\Domain\Product\Command\UpdateProductStockInformationCommand`
_Class UpdateProductStockInformationCommand update a given product stock_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int productId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Product\CommandHandler\UpdateProductStockInformationHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Product\CommandHandler\UpdateProductStockInformationHandlerInterface`</li>  |
| **Return type** |  void  |
#### SetRelatedProductsCommand {id="SetRelatedProductsCommand"}

`PrestaShop\PrestaShop\Core\Domain\Product\Command\SetRelatedProductsCommand`
_Sets related products for product_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int productId`</li>  <li>`$array relatedProductIds`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Product\CommandHandler\SetRelatedProductsHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Product\CommandHandler\SetRelatedProductsHandlerInterface`</li>  |
| **Return type** |  void  |
#### RemoveAllRelatedProductsCommand {id="RemoveAllRelatedProductsCommand"}

`PrestaShop\PrestaShop\Core\Domain\Product\Command\RemoveAllRelatedProductsCommand`
_Removes all related products from given product_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int productId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Product\CommandHandler\RemoveAllRelatedProductsHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Product\CommandHandler\RemoveAllRelatedProductsHandlerInterface`</li>  |
| **Return type** |  void  |
#### DuplicateProductCommand {id="DuplicateProductCommand"}

`PrestaShop\PrestaShop\Core\Domain\Product\Command\DuplicateProductCommand`
_Duplicates product_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int productId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Product\CommandHandler\DuplicateProductHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Product\CommandHandler\DuplicateProductHandlerInterface`</li>  |
| **Return type** |  ProductId  |
#### AddProductImageCommand {id="AddProductImageCommand"}

`PrestaShop\PrestaShop\Core\Domain\Product\Command\AddProductImageCommand`
_Adds new product image_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int productId`</li>  <li>`$string pathName`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Product\CommandHandler\AddProductImageHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Product\CommandHandler\AddProductImageHandlerInterface`</li>  |
| **Return type** |  ImageId  |
#### GenerateProductCombinationsCommand {id="GenerateProductCombinationsCommand"}

`PrestaShop\PrestaShop\Core\Domain\Product\Combination\Command\GenerateProductCombinationsCommand`
_Generates attribute combinations for product_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int productId`</li>  <li>`$array groupedAttributeIds`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Product\CommandHandler\GenerateProductCombinationsHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Product\Combination\CommandHandler\GenerateProductCombinationsHandlerInterface`</li>  |
| **Return type** |  CombinationId[]  |
#### UpdateCombinationDetailsCommand {id="UpdateCombinationDetailsCommand"}

`PrestaShop\PrestaShop\Core\Domain\Product\Combination\Command\UpdateCombinationDetailsCommand`
_Updates combination details_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int combinationId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Product\CommandHandler\UpdateCombinationDetailsHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Product\Combination\CommandHandler\UpdateCombinationDetailsHandlerInterface`</li>  |
| **Return type** |  void  |
#### UpdateCombinationPricesCommand {id="UpdateCombinationPricesCommand"}

`PrestaShop\PrestaShop\Core\Domain\Product\Combination\Command\UpdateCombinationPricesCommand`
__

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int combinationId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Product\CommandHandler\UpdateCombinationPricesHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Product\Combination\CommandHandler\UpdateCombinationPricesHandlerInterface`</li>  |
| **Return type** |  void  |
#### AddVirtualProductFileCommand {id="AddVirtualProductFileCommand"}

`PrestaShop\PrestaShop\Core\Domain\Product\VirtualProductFile\Command\AddVirtualProductFileCommand`
_Adds downloadable file for virtual product_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int productId`</li>  <li>`$string filePath`</li>  <li>`$string displayName`</li>  <li>`$?int accessDays = NULL`</li>  <li>`$?int downloadTimesLimit = NULL`</li>  <li>`$?DateTimeInterface expirationDate = NULL`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Product\CommandHandler\AddVirtualProductFileHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Product\VirtualProductFile\CommandHandler\AddVirtualProductFileHandlerInterface`</li>  |
| **Return type** |  PrestaShop\PrestaShop\Core\Domain\Product\VirtualProductFile\ValueObject\VirtualProductFileId  |

### Product Queries

#### SearchProducts {id="SearchProducts"}

`PrestaShop\PrestaShop\Core\Domain\Product\Query\SearchProducts`
_Queries for products by provided search phrase_

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$string phrase`</li>  <li>`$int resultsLimit`</li>  <li>`$string isoCode`</li>  <li>`$?int orderId = NULL`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Product\QueryHandler\SearchProductsHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Product\QueryHandler\SearchProductsHandlerInterface`</li>  |
| **Return type** |  FoundProduct[]  |
#### GetProductIsEnabled {id="GetProductIsEnabled"}

`PrestaShop\PrestaShop\Core\Domain\Product\Query\GetProductIsEnabled`
_Get current status (enabled/disabled) for a given product_

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int productId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Product\QueryHandler\GetProductIsEnabledHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Product\QueryHandler\GetProductIsEnabledHandlerInterface`</li>  |
| **Return type** |  bool  |
#### GetProductForEditing {id="GetProductForEditing"}

`PrestaShop\PrestaShop\Core\Domain\Product\Query\GetProductForEditing`
_Get Product data necessary for editing_

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int productId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Product\QueryHandler\GetProductForEditingHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Product\QueryHandler\GetProductForEditingHandlerInterface`</li>  |
| **Return type** |  ProductForEditing  |
#### GetPackedProducts {id="GetPackedProducts"}

`PrestaShop\PrestaShop\Core\Domain\Product\Query\GetPackedProducts`
_Retrieves product from a pack_

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int packId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Product\QueryHandler\GetPackedProductsHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Product\QueryHandler\GetPackedProductsHandlerInterface`</li>  |
| **Return type** |  PackedProduct[]  |
#### GetProductCustomizationFields {id="GetProductCustomizationFields"}

`PrestaShop\PrestaShop\Core\Domain\Product\Customization\Query\GetProductCustomizationFields`
_Gets product customization fields_

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int productId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Product\QueryHandler\GetProductCustomizationFieldsHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Product\Customization\QueryHandler\GetProductCustomizationFieldsHandlerInterface`</li>  |
| **Return type** |  CustomizationField[]  |
#### GetProductSuppliersForEditing {id="GetProductSuppliersForEditing"}

`PrestaShop\PrestaShop\Core\Domain\Product\Supplier\Query\GetProductSuppliersForEditing`
_Provides product suppliers_

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int productId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Product\QueryHandler\GetProductSuppliersForEditingHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Product\Supplier\QueryHandler\GetProductSuppliersForEditingHandlerInterface`</li>  |
| **Return type** |  ProductSupplierForEditing[]  |
#### GetProductSupplierOptions {id="GetProductSupplierOptions"}

`PrestaShop\PrestaShop\Core\Domain\Product\Supplier\Query\GetProductSupplierOptions`
_Provides product supplier options_

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int productId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Product\QueryHandler\GetProductSupplierOptionsHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Product\Supplier\QueryHandler\GetProductSupplierOptionsHandlerInterface`</li>  |
| **Return type** |  PrestaShop\PrestaShop\Core\Domain\Product\QueryResult\ProductSupplierOptions  |
#### GetRelatedProducts {id="GetRelatedProducts"}

`PrestaShop\PrestaShop\Core\Domain\Product\Query\GetRelatedProducts`
_Provides related products for given product_

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int productId`</li>  <li>`$int languageId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Product\QueryHandler\GetRelatedProductsHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Product\QueryHandler\GetRelatedProductsHandlerInterface`</li>  |
| **Return type** |  RelatedProduct[]  |
#### GetProductImages {id="GetProductImages"}

`PrestaShop\PrestaShop\Core\Domain\Product\Query\GetProductImages`
__

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int productId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Product\QueryHandler\GetProductImagesHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Product\QueryHandler\GetProductImagesHandlerInterface`</li>  |
| **Return type** |  ProductImage[]  |
#### GetEditableCombinationsList {id="GetEditableCombinationsList"}

`PrestaShop\PrestaShop\Core\Domain\Product\Combination\Query\GetEditableCombinationsList`
_Retrieves product combinations_

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int productId`</li>  <li>`$int languageId`</li>  <li>`$?int limit = NULL`</li>  <li>`$?int offset = NULL`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Product\QueryHandler\GetEditableCombinationsListHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Product\Combination\QueryHandler\GetEditableCombinationsListHandlerInterface`</li>  |
| **Return type** |  CombinationListForEditing  |
#### GetCombinationForEditing {id="GetCombinationForEditing"}

`PrestaShop\PrestaShop\Core\Domain\Product\Combination\Query\GetCombinationForEditing`
_Query which provides combination for editing_

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int combinationId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Product\QueryHandler\GetCombinationForEditingHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Product\Combination\QueryHandler\GetCombinationForEditingHandlerInterface`</li>  |
| **Return type** |  CombinationForEditing  |
