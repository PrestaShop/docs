`PrestaShop\PrestaShop\Core\Domain\Order\Command\IssueReturnProductCommand`
_Issues return product for given order._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int $orderId`</li>  <li>`$array $orderDetailRefunds`</li>  <li>`$bool $restockRefundedProducts`</li>  <li>`$bool $refundShippingCost`</li>  <li>`$bool $generateCreditSlip`</li>  <li>`$bool $generateVoucher`</li>  <li>`$int $voucherRefundType`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Order\CommandHandler\IssueReturnProductHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Order\CommandHandler\IssueReturnProductHandlerInterface`</li>  |
| **Return type** |  `void`  |
