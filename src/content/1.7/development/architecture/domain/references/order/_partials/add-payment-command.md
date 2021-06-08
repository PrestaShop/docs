`PrestaShop\PrestaShop\Core\Domain\Order\Payment\Command\AddPaymentCommand`
_Adds payment for given order._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int $orderId`</li>  <li>`$string $paymentDate`</li>  <li>`$string $paymentMethod`</li>  <li>`$string $paymentAmount`</li>  <li>`$int $paymentCurrencyId`</li>  <li>`$?int $orderInvoiceId = NULL`</li>  <li>`$?string $transactionId = NULL`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Order\CommandHandler\AddPaymentHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Order\Payment\CommandHandler\AddPaymentHandlerInterface`</li>  |
| **Return type** |  `void`  |
