`PrestaShop\PrestaShop\Core\Domain\OrderState\Command\AddOrderStateCommand`
_Adds new order state with provided data_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$array $localizedNames`</li>  <li>`$string $color`</li>  <li>`$bool $loggable`</li>  <li>`$bool $invoice`</li>  <li>`$bool $hidden`</li>  <li>`$bool $sendEmail`</li>  <li>`$bool $pdfInvoice`</li>  <li>`$bool $pdfDelivery`</li>  <li>`$bool $shipped`</li>  <li>`$bool $paid`</li>  <li>`$bool $delivery`</li>  <li>`$array $localizedTemplates`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\OrderState\CommandHandler\AddOrderStateHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\OrderState\CommandHandler\AddOrderStateHandlerInterface`</li>  |
| **Return type** |  `PrestaShop\PrestaShop\Core\Domain\OrderState\ValueObject\OrderStateId`  |
