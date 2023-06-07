`PrestaShop\PrestaShop\Core\Domain\Product\Stock\Query\GetProductStockMovements`
_This query returns a list of stock movements for a product, each row is either an edition from the BO by an employee or a range of customer orders resume (all the products that were sold between each edition)._

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int $productId`</li>  <li>`$int $shopId`</li>  <li>`$int $offset = 0`</li>  <li>`$int $limit = 5`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Product\Stock\QueryHandler\GetProductStockMovementsHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Product\Stock\QueryHandler\GetProductStockMovementsHandlerInterface`</li>  |
| **Return type** |  `PrestaShop\PrestaShop\Core\Domain\Product\Stock\QueryResult\StockMovement[]`  |
