`PrestaShop\PrestaShop\Core\Domain\Order\Command\IssuePartialRefundCommand`
_Issues partial refund for given order._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int $orderId`</li>  <li>`$array $orderDetailRefunds`</li>  <li>`$string $shippingCostRefundAmount`</li>  <li>`$bool $restockRefundedProducts`</li>  <li>`$bool $generateCreditSlip`</li>  <li>`$bool $generateVoucher`</li>  <li>`$int $voucherRefundType`</li>  <li>`$?string $voucherRefundAmount = NULL`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Order\CommandHandler\IssuePartialRefundHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Order\CommandHandler\IssuePartialRefundHandlerInterface`</li>  |
| **Return type** |  `void`  |
