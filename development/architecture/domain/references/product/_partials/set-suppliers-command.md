`PrestaShop\PrestaShop\Core\Domain\Product\Supplier\Command\SetSuppliersCommand`
_This command is used to set (or assign) suppliers to a product It is used for both product with or without combinations and only defines the association not the content themselves. To update contents you need to use UpdateProductSuppliersCommand or UpdateCombinationSuppliersCommand one you have correctly set the associations with this command. When no default supplier was associated this command will automatically use the first provided one, however to change it to your need you can use SetProductDefaultSupplierCommand._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int $productId`</li>  <li>`$array $supplierIds`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Product\Supplier\CommandHandler\SetSuppliersHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Product\Supplier\CommandHandler\SetSuppliersHandlerInterface`</li>  |
| **Return type** |  `PrestaShop\PrestaShop\Core\Domain\Product\Supplier\ValueObject\ProductSupplierAssociation[]`  |
