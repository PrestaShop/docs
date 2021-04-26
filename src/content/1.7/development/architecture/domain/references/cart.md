---
title: Cart domain
---

## Cart domain

### Cart Commands

#### CreateEmptyCustomerCartCommand {id="CreateEmptyCustomerCartCommand"}

`PrestaShop\PrestaShop\Core\Domain\Cart\Command\CreateEmptyCustomerCartCommand`
_Creates empty cart for given customer._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$customerId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Cart\CommandHandler\CreateEmptyCustomerCartHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Cart\CommandHandler\CreateEmptyCustomerCartHandlerInterface`</li>  |
| **Return type** |  CartId  |
#### UpdateCartCurrencyCommand {id="UpdateCartCurrencyCommand"}

`PrestaShop\PrestaShop\Core\Domain\Cart\Command\UpdateCartCurrencyCommand`
_Updates cart currency_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$cartId`</li>  <li>`$newCurrencyId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Cart\CommandHandler\UpdateCartCurrencyHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Cart\CommandHandler\UpdateCartCurrencyHandlerInterface`</li>  |
| **Return type** |  void  |
#### UpdateCartLanguageCommand {id="UpdateCartLanguageCommand"}

`PrestaShop\PrestaShop\Core\Domain\Cart\Command\UpdateCartLanguageCommand`
_Updates language for given cart_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$cartId`</li>  <li>`$newLanguageId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Cart\CommandHandler\UpdateCartLanguageHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Cart\CommandHandler\UpdateCartLanguageHandlerInterface`</li>  |
| **Return type** |  void  |
#### UpdateCartAddressesCommand {id="UpdateCartAddressesCommand"}

`PrestaShop\PrestaShop\Core\Domain\Cart\Command\UpdateCartAddressesCommand`
__

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int cartId`</li>  <li>`$int newDeliveryAddressId`</li>  <li>`$int newInvoiceAddressId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Cart\CommandHandler\UpdateCartAddressesHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Cart\CommandHandler\UpdateCartAddressesHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### UpdateCartDeliverySettingsCommand {id="UpdateCartDeliverySettingsCommand"}

`PrestaShop\PrestaShop\Core\Domain\Cart\Command\UpdateCartDeliverySettingsCommand`
__

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int cartId`</li>  <li>`$bool allowFreeShipping`</li>  <li>`$?bool isAGift = NULL`</li>  <li>`$?bool useRecycledPackaging = NULL`</li>  <li>`$?string giftMessage = NULL`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Cart\CommandHandler\UpdateCartDeliverySettingsHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Cart\CommandHandler\UpdateCartDeliverySettingsHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### UpdateProductQuantityInCartCommand {id="UpdateProductQuantityInCartCommand"}

`PrestaShop\PrestaShop\Core\Domain\Cart\Command\UpdateProductQuantityInCartCommand`
_Updates product quantity in cart Quantity given must include gift product_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$cartId`</li>  <li>`$productId`</li>  <li>`$quantity`</li>  <li>`$?combinationId = NULL`</li>  <li>`$?customizationId = NULL`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Cart\CommandHandler\UpdateProductQuantityInCartHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Cart\CommandHandler\UpdateProductQuantityInCartHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### UpdateCartCarrierCommand {id="UpdateCartCarrierCommand"}

`PrestaShop\PrestaShop\Core\Domain\Cart\Command\UpdateCartCarrierCommand`
_Updates cart carrier (a.k.a delivery option) with new one._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$cartId`</li>  <li>`$newCarrierId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Cart\CommandHandler\UpdateCartCarrierHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Cart\CommandHandler\UpdateCartCarrierHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### AddCartRuleToCartCommand {id="AddCartRuleToCartCommand"}

`PrestaShop\PrestaShop\Core\Domain\Cart\Command\AddCartRuleToCartCommand`
_Adds cart rule to given cart._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$cartId`</li>  <li>`$cartRuleId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Cart\CommandHandler\AddCartRuleToCartHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Cart\CommandHandler\AddCartRuleToCartHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### RemoveCartRuleFromCartCommand {id="RemoveCartRuleFromCartCommand"}

`PrestaShop\PrestaShop\Core\Domain\Cart\Command\RemoveCartRuleFromCartCommand`
_Removes given cart rule from cart._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int cartId`</li>  <li>`$int cartRuleId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Cart\CommandHandler\RemoveCartRuleFromCartHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Cart\CommandHandler\RemoveCartRuleFromCartHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### RemoveProductFromCartCommand {id="RemoveProductFromCartCommand"}

`PrestaShop\PrestaShop\Core\Domain\Cart\Command\RemoveProductFromCartCommand`
_Removes given product from cart._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int cartId`</li>  <li>`$int productId`</li>  <li>`$?int combinationId = NULL`</li>  <li>`$?int customizationId = NULL`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Cart\CommandHandler\RemoveProductFromCartHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Cart\CommandHandler\RemoveProductFromCartHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### UpdateProductPriceInCartCommand {id="UpdateProductPriceInCartCommand"}

`PrestaShop\PrestaShop\Core\Domain\Cart\Command\UpdateProductPriceInCartCommand`
_Updates cart product price_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$cartId`</li>  <li>`$productId`</li>  <li>`$combinationId`</li>  <li>`$price`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Cart\CommandHandler\UpdateProductPriceInCartHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Cart\CommandHandler\UpdateProductPriceInCartHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### SendCartToCustomerCommand {id="SendCartToCustomerCommand"}

`PrestaShop\PrestaShop\Core\Domain\Cart\Command\SendCartToCustomerCommand`
_Sends email to the customer to process the payment for cart._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$cartId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Cart\CommandHandler\SendCartToCustomerHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Cart\CommandHandler\SendCartToCustomerHanlderInterface`</li>  |
| **Return type** |  not defined  |
#### AddCustomizationCommand {id="AddCustomizationCommand"}

`PrestaShop\PrestaShop\Core\Domain\Cart\Command\AddCustomizationCommand`
_Adds product customization_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int cartId`</li>  <li>`$int productId`</li>  <li>`$array customizationValuesByFieldIds`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Cart\CommandHandler\AddCustomizationHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Cart\CommandHandler\AddCustomizationHandlerInterface`</li>  |
| **Return type** |  CustomizationId|null customizationId  |
#### AddProductToCartCommand {id="AddProductToCartCommand"}

`PrestaShop\PrestaShop\Core\Domain\Cart\Command\AddProductToCartCommand`
_Responsible for adding product to cart_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int cartId`</li>  <li>`$int productId`</li>  <li>`$int quantity`</li>  <li>`$?int combinationId = NULL`</li>  <li>`$array customizationsByFieldIds = array (
)`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Cart\CommandHandler\AddProductToCartHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Cart\CommandHandler\AddProductToCartHandlerInterface`</li>  |
| **Return type** |  void  |

### Cart Queries

#### GetCartForViewing {id="GetCartForViewing"}

`PrestaShop\PrestaShop\Core\Domain\Cart\Query\GetCartForViewing`
_Get cart for viewing in Back Office_

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$cartId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Cart\QueryHandler\GetCartForViewingHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Cart\QueryHandler\GetCartForViewingHandlerInterface`</li>  |
| **Return type** |  CartView  |
#### GetLastEmptyCustomerCart {id="GetLastEmptyCustomerCart"}

`PrestaShop\PrestaShop\Core\Domain\Cart\Query\GetLastEmptyCustomerCart`
_Query for retrieving last empty cart for customer_

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int customerId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Cart\QueryHandler\GetLastEmptyCustomerCartHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Cart\QueryHandler\GetLastEmptyCustomerCartHandlerInterface`</li>  |
| **Return type** |  CartId  |
#### GetCartForOrderCreation {id="GetCartForOrderCreation"}

`PrestaShop\PrestaShop\Core\Domain\Cart\Query\GetCartForOrderCreation`
_Query for getting cart information_

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int cartId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Cart\QueryHandler\GetCartForOrderCreationHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Cart\QueryHandler\GetCartForOrderCreationHandlerInterface`</li>  |
| **Return type** |  PrestaShop\PrestaShop\Core\Domain\Cart\QueryResult\CartForOrderCreation  |
