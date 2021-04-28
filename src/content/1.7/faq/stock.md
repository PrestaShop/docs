---
title: Stock FAQ
---

# Stock FAQ

- [StockAvailable](#stockavailable)
- [StockMovement](#stockmovement)

**Q:** Where exactly can I find the stock of a specified product?

**A:** All the stock information for every `Product` (and `Combination`) is stored in the `StockAvailable` entity/table.
You will find duplicate values in `Product` and `Combination` object via their `quantity` fields, but they are deprecated fields that are only kept for backward compatibility and will be removed in future versions. The only true source of information for stock data is `StockAvailable`.

## StockAvailable

**Q:** What does the StockAvailable contain exactly?

**A:** Each `StockAvailable` is associated to a `Product` or a `Combination`, and if you are using the multi shop feature you can also have different stock for each Shop or Shop group. Here are the details of each field:

| Field               | Description |
| ------------------- | ----------- |
| `quantity`          | The remaining available quantity, this indicates which how many products can still be sold in the shop. This is what user would see on the FO if display it. It's also the quantity you can see in the product page from your BO. |
| `physical_quantity` | The actual quantity that you have in your physical stock, in your shelves. It might be different from quantity when an Order has been purchased but is not paid, or shipped yet (see `reserved_quantity`). |
| `reserved_quantity` | This indicates how many of your physical quantity is currently reserved for your pending orders, the product has been bought by a customer but it is still in your inventory because the order is not paid yet, or it is paid but the package has not been sent yet. |
| `out_of_stock`      | This is the configuration defining how you want to handle this product in the FO when it is out of stock (available stock is too low). {{< code php >}}use PrestaShop\PrestaShop\Core\Domain\Product\Stock\ValueObject\OutOfStockType;

OutOfStockType::OUT_OF_STOCK_NOT_AVAILABLE = 0; // Not available when out of stock
OutOfStockType::OUT_OF_STOCK_AVAILABLE = 1; // Available when out of stock
OutOfStockType::OUT_OF_STOCK_DEFAULT = 2; // Use default configuration
{{< /code >}}|
| `location`          | The location where the product is stored, to help merchant handle their storage and prepare their packages. |
| `depends_on_stock`  | **Deprecated** It was used for advanced stock management which is no longer a feature. |

{{% notice note %}}
You will probably notice that usually ```physical_quantity = available_quantity + reserved_quantity;```
{{% /notice %}}

**Q:** When is the StockAvailable object/table updated?

**A:** That's a broad question but basically for any action that should logically have an impact on the stock. When a product quantity is modified in BO, when an order is created, when the order is delivered, ... However here is a little chronology of stock quantities during a full checkout process:

| Scenario Step | quantity | physical_quantity | reserved_quantity |   |
| ------------- | -------- | ----------------- | ----------------- | - |
| `Great Product` is created in the BO with a quantity of 50 | `50` | `50` | `0` | |
| A user decides to add 3 `Great Product` into his cart      | `50` | `50` | `0` | For now the product is only in a cart, nothing is reserved anyone can still buy one of the 50 remaining products. |
| The user goes through the whole checkout process and chooses to pay by check. | `50` | `47` | `3` | The order has been created, but the payment is not accepted yet. |
| A few days later, the check is received, and the merchant changes the Order status to `Payment accepted` | `50` | `47` | `3` | The product is now paid, but it still has not left your shelves. |
| The package is prepared and delivered to a Carrier, the order status is switched to `Delivered` or `Shipped` | `47` | `47` | `0` | The product is no longer reserved, it has actually been sent to the customer. So reserved and physical quantities can be decreased. |

**Q:** So where can I see and modify my Stock?

**A:** Although you can change the quantity directly in your product page we strongly recommend using the `Catalog > Stock` section in your BO because it is based on `StockMovement` which is more stable than direct edition.

## StockMovement

**Q:** But what is a `StockMovement`? What is the difference with direct edition?

**A:** When you edit the quantity of a Product you are going to edit the StockAvailable::quantity field directly in your database. When you use a modification with a StockMovement you apply a delta to your existing stock.

**Q:** And what is the advantage of this delta edition?

**A:** When you edit the quantity the total value is sent and saved in database, but you cannot be sure that there was no modification between the moment you open your edition page, and the moment you save the new expected value.  Imagine this scenario:

- You have a 50 `Great Product` in your stock.
- It is your best seller, so today you are expecting a delivery to increase your stock.
- You get 50 new products and want to udpate the stock from the Product page.
- You open the page indicating that you have 50 products left in your stock.
- While you are checking this stock, since it is your best seller, three products have been sold and delivered so your stock is now actually 47.
- You update your expected stock from 50 to 100 and save the product.
- Your stock now indicates 100 products, but really it should be 97 (47 + 50)

That is why a `StockMovement` will be more stable, it will not perform the action `Change my stock to 100` but instead `Add 50 to my current stock value`, so even if the value has changed without you knowing the final value will remain correct.

**Q:** Is it the only benefit of `StockMovement` ?

**A:** No, another advantage si that every operation (or every `StockMovement`) not only performs the action but is also saved in database. So you get access to a complete history of the stock evolution for the product with a few details: chat is the reason of the movement, which order or which employee performed the action, when did it happen, ... You can access this history in the `Catalog > Stock > Movements` section from your BO.
