`PrestaShop\PrestaShop\Core\Domain\Order\Command\IssueStandardRefundCommand`
_Issues standard refund for given order._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int $orderId`</li>  <li>`$array $orderDetailRefunds`</li>  <li>`$bool $refundShippingCost`</li>  <li>`$bool $generateCreditSlip`</li>  <li>`$bool $generateVoucher`</li>  <li>`$int $voucherRefundType`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Order\CommandHandler\IssueStandardRefundHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Order\CommandHandler\IssueStandardRefundHandlerInterface`</li>  |
| **Return type** |  `void`  |
