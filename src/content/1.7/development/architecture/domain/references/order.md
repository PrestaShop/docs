---
title: Order domain
---

## Order domain

### Order Commands

#### DuplicateOrderCartCommand {id="DuplicateOrderCartCommand"}

`PrestaShop\PrestaShop\Core\Domain\Order\Command\DuplicateOrderCartCommand`
_Duplicates cart for given order_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$orderId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Order\CommandHandler\DuplicateOrderCartHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Order\CommandHandler\DuplicateOrderCartHandlerInterface`</li>  |
| **Return type** |  CartId Duplicated cart id  |
#### AddOrderFromBackOfficeCommand {id="AddOrderFromBackOfficeCommand"}

`PrestaShop\PrestaShop\Core\Domain\Order\Command\AddOrderFromBackOfficeCommand`
_Adds new order from given cart._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$cartId`</li>  <li>`$employeeId`</li>  <li>`$orderMessage`</li>  <li>`$paymentModuleName`</li>  <li>`$orderStateId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Order\CommandHandler\AddOrderFromBackOfficeHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Order\CommandHandler\AddOrderFromBackOfficeHandlerInterface`</li>  |
| **Return type** |  OrderId  |
#### AddProductToOrderCommand {id="AddProductToOrderCommand"}

`PrestaShop\PrestaShop\Core\Domain\Order\Product\Command\AddProductToOrderCommand`
_Adds product to an existing order._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int orderId`</li>  <li>`$int productId`</li>  <li>`$int combinationId`</li>  <li>`$string productPriceTaxIncluded`</li>  <li>`$string productPriceTaxExcluded`</li>  <li>`$int productQuantity`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Order\CommandHandler\AddProductToOrderHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Order\Product\CommandHandler\AddProductToOrderHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### UpdateOrderStatusCommand {id="UpdateOrderStatusCommand"}

`PrestaShop\PrestaShop\Core\Domain\Order\Command\UpdateOrderStatusCommand`
_Updates order status._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$orderId`</li>  <li>`$newOrderStatusId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Order\CommandHandler\UpdateOrderStatusHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Order\CommandHandler\UpdateOrderStatusHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### UpdateProductInOrderCommand {id="UpdateProductInOrderCommand"}

`PrestaShop\PrestaShop\Core\Domain\Order\Product\Command\UpdateProductInOrderCommand`
_Updates product in given order._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int orderId`</li>  <li>`$int orderDetailId`</li>  <li>`$string priceTaxIncluded`</li>  <li>`$string priceTaxExcluded`</li>  <li>`$int quantity`</li>  <li>`$?int orderInvoiceId = NULL`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Order\CommandHandler\UpdateProductInOrderHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Order\Product\CommandHandler\UpdateProductInOrderHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### ChangeOrderDeliveryAddressCommand {id="ChangeOrderDeliveryAddressCommand"}

`PrestaShop\PrestaShop\Core\Domain\Order\Command\ChangeOrderDeliveryAddressCommand`
_Changes delivery address for given order._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$orderId`</li>  <li>`$newDeliveryAddressId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Order\CommandHandler\ChangeOrderDeliveryAddressHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Order\CommandHandler\ChangeOrderDeliveryAddressHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### ChangeOrderInvoiceAddressCommand {id="ChangeOrderInvoiceAddressCommand"}

`PrestaShop\PrestaShop\Core\Domain\Order\Command\ChangeOrderInvoiceAddressCommand`
_Changes invoice address for given order._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$orderId`</li>  <li>`$newInvoiceAddressId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Order\CommandHandler\ChangeOrderInvoiceAddressHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Order\CommandHandler\ChangeOrderInvoiceAddressHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### ChangeOrderCurrencyCommand {id="ChangeOrderCurrencyCommand"}

`PrestaShop\PrestaShop\Core\Domain\Order\Command\ChangeOrderCurrencyCommand`
_Changes currency for given order._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$orderId`</li>  <li>`$newCurrencyId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Order\CommandHandler\ChangeOrderCurrencyHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Order\CommandHandler\ChangeOrderCurrencyHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### AddPaymentCommand {id="AddPaymentCommand"}

`PrestaShop\PrestaShop\Core\Domain\Order\Payment\Command\AddPaymentCommand`
_Adds payment for given order._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int orderId`</li>  <li>`$string paymentDate`</li>  <li>`$string paymentMethod`</li>  <li>`$string paymentAmount`</li>  <li>`$int paymentCurrencyId`</li>  <li>`$?int orderInvoiceId = NULL`</li>  <li>`$?string transactionId = NULL`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Order\CommandHandler\AddPaymentHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Order\Payment\CommandHandler\AddPaymentHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### GenerateInvoiceCommand {id="GenerateInvoiceCommand"}

`PrestaShop\PrestaShop\Core\Domain\Order\Invoice\Command\GenerateInvoiceCommand`
_Generates invoice for given order._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$orderId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Order\CommandHandler\GenerateInvoiceHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Order\Invoice\CommandHandler\GenerateOrderInvoiceHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### UpdateOrderShippingDetailsCommand {id="UpdateOrderShippingDetailsCommand"}

`PrestaShop\PrestaShop\Core\Domain\Order\Command\UpdateOrderShippingDetailsCommand`
_Updates shipping details for given order._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int orderId`</li>  <li>`$int currentOrderCarrierId`</li>  <li>`$int newCarrierId`</li>  <li>`$?string trackingNumber = &#039;&#039;`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Order\CommandHandler\UpdateOrderShippingDetailsHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Order\CommandHandler\UpdateOrderShippingDetailsHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### DeleteCartRuleFromOrderCommand {id="DeleteCartRuleFromOrderCommand"}

`PrestaShop\PrestaShop\Core\Domain\Order\Command\DeleteCartRuleFromOrderCommand`
_Removes cart rule from given order._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$orderId`</li>  <li>`$orderCartRuleId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Order\CommandHandler\DeleteCartRuleFromOrderHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Order\CommandHandler\DeleteCartRuleFromOrderHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### AddCartRuleToOrderCommand {id="AddCartRuleToOrderCommand"}

`PrestaShop\PrestaShop\Core\Domain\Order\Command\AddCartRuleToOrderCommand`
_Adds cart rule to given order._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int orderId`</li>  <li>`$string cartRuleName`</li>  <li>`$string cartRuleType`</li>  <li>`$string value`</li>  <li>`$?orderInvoiceId = NULL`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Order\CommandHandler\AddCartRuleToOrderHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Order\CommandHandler\AddCartRuleToOrderHandlerInterface`</li>  |
| **Return type** |  void  |
#### UpdateInvoiceNoteCommand {id="UpdateInvoiceNoteCommand"}

`PrestaShop\PrestaShop\Core\Domain\Order\Invoice\Command\UpdateInvoiceNoteCommand`
_Adds note for given invoice._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int orderInvoiceId`</li>  <li>`$string note`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Order\CommandHandler\UpdateInvoiceNoteHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Order\Invoice\CommandHandler\UpdateInvoiceNoteHandlerInterface`</li>  |
| **Return type** |  void  |
#### IssuePartialRefundCommand {id="IssuePartialRefundCommand"}

`PrestaShop\PrestaShop\Core\Domain\Order\Command\IssuePartialRefundCommand`
_Issues partial refund for given order._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int orderId`</li>  <li>`$array orderDetailRefunds`</li>  <li>`$string shippingCostRefundAmount`</li>  <li>`$bool restockRefundedProducts`</li>  <li>`$bool generateCreditSlip`</li>  <li>`$bool generateVoucher`</li>  <li>`$int voucherRefundType`</li>  <li>`$?string voucherRefundAmount = NULL`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Order\CommandHandler\IssuePartialRefundHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Order\CommandHandler\IssuePartialRefundHandlerInterface`</li>  |
| **Return type** |  void  |
#### IssueStandardRefundCommand {id="IssueStandardRefundCommand"}

`PrestaShop\PrestaShop\Core\Domain\Order\Command\IssueStandardRefundCommand`
_Issues standard refund for given order._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int orderId`</li>  <li>`$array orderDetailRefunds`</li>  <li>`$bool refundShippingCost`</li>  <li>`$bool generateCreditSlip`</li>  <li>`$bool generateVoucher`</li>  <li>`$int voucherRefundType`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Order\CommandHandler\IssueStandardRefundHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Order\CommandHandler\IssueStandardRefundHandlerInterface`</li>  |
| **Return type** |  void  |
#### IssueReturnProductCommand {id="IssueReturnProductCommand"}

`PrestaShop\PrestaShop\Core\Domain\Order\Command\IssueReturnProductCommand`
_Issues return product for given order._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int orderId`</li>  <li>`$array orderDetailRefunds`</li>  <li>`$bool restockRefundedProducts`</li>  <li>`$bool refundShippingCost`</li>  <li>`$bool generateCreditSlip`</li>  <li>`$bool generateVoucher`</li>  <li>`$int voucherRefundType`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Order\CommandHandler\IssueReturnProductHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Order\CommandHandler\IssueReturnProductHandlerInterface`</li>  |
| **Return type** |  void  |
#### DeleteProductFromOrderCommand {id="DeleteProductFromOrderCommand"}

`PrestaShop\PrestaShop\Core\Domain\Order\Product\Command\DeleteProductFromOrderCommand`
_Deletes product from given order._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$orderId`</li>  <li>`$orderDetailId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Order\CommandHandler\DeleteProductFromOrderHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Order\Product\CommandHandler\DeleteProductFromOrderHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### BulkChangeOrderStatusCommand {id="BulkChangeOrderStatusCommand"}

`PrestaShop\PrestaShop\Core\Domain\Order\Command\BulkChangeOrderStatusCommand`
_Changes status for given orders._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$array orderIds`</li>  <li>`$newOrderStatusId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Order\CommandHandler\BulkChangeOrderStatusHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Order\CommandHandler\BulkChangeOrderStatusHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### ResendOrderEmailCommand {id="ResendOrderEmailCommand"}

`PrestaShop\PrestaShop\Core\Domain\Order\Command\ResendOrderEmailCommand`
__

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int orderId`</li>  <li>`$int orderStatusId`</li>  <li>`$int orderHistoryId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Order\CommandHandler\ResendOrderEmailHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Order\CommandHandler\ResendOrderEmailHandlerInterface`</li>  |
| **Return type** |  void  |
#### SendProcessOrderEmailCommand {id="SendProcessOrderEmailCommand"}

`PrestaShop\PrestaShop\Core\Domain\Order\Command\SendProcessOrderEmailCommand`
_Sends email to customer with link for processing the order from cart_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int cartId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Order\CommandHandler\SendProcessOrderEmailHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Order\CommandHandler\SendProcessOrderEmailHandlerInterface`</li>  |
| **Return type** |  void  |
#### CancelOrderProductCommand {id="CancelOrderProductCommand"}

`PrestaShop\PrestaShop\Core\Domain\Order\Command\CancelOrderProductCommand`
__

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$array cancelledProducts`</li>  <li>`$int orderId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Order\CommandHandler\CancelOrderProductHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Order\CommandHandler\CancelOrderProductHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### SetInternalOrderNoteCommand {id="SetInternalOrderNoteCommand"}

`PrestaShop\PrestaShop\Core\Domain\Order\Command\SetInternalOrderNoteCommand`
_Sets internal note about order that can only be seen in Back Office._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$orderId`</li>  <li>`$internalNote`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Order\CommandHandler\SetInternalOrderNoteHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Order\CommandHandler\SetInternalOrderNoteHandlerInterface`</li>  |
| **Return type** |  not defined  |

### Order Queries

#### GetOrderForViewing {id="GetOrderForViewing"}

`PrestaShop\PrestaShop\Core\Domain\Order\Query\GetOrderForViewing`
_Get order for view in Back Office_

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int orderId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Order\QueryHandler\GetOrderForViewingHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Order\QueryHandler\GetOrderForViewingHandlerInterface`</li>  |
| **Return type** |  OrderForViewing  |
#### GetOrderProductsForViewing {id="GetOrderProductsForViewing"}

`PrestaShop\PrestaShop\Core\Domain\Order\Query\GetOrderProductsForViewing`
_Query for paginated order products_

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul></ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Order\QueryHandler\GetOrderProductsForViewingHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Order\QueryHandler\GetOrderProductsForViewingHandlerInterface`</li>  |
| **Return type** |  OrderProductsForViewing  |
#### GetOrderPreview {id="GetOrderPreview"}

`PrestaShop\PrestaShop\Core\Domain\Order\Query\GetOrderPreview`
__

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int orderId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Order\QueryHandler\GetOrderPreviewHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Order\QueryHandler\GetOrderPreviewHandlerInterface`</li>  |
| **Return type** |  OrderPreview  |
