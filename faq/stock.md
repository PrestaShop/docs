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
| `quantity`          | The remaining available quantity. This indicates how many products can still be sold in the shop. This is what the user will see on the FO if enabled. It's also the quantity you can see on the BO's product page. |
| `physical_quantity` | The actual quantity that you have in your physical stock, in your shelves. It might be different from quantity when an Order has been purchased but is not paid, or shipped yet (see `reserved_quantity`). |
| `reserved_quantity` | This indicates how many items from your physical quantity are currently reserved for your pending orders. The product has been bought by a customer but is still in your inventory, either because the order is awaiting payment or the package has not yet been sent. |
| `out_of_stock`      | This is the configuration defining how you want to handle this product in the FO when it is out of stock (available stock is too low). {{< highlight php >}}use PrestaShop\PrestaShop\Core\Domain\Product\Stock\ValueObject\OutOfStockType;

OutOfStockType::OUT_OF_STOCK_NOT_AVAILABLE = 0; // Not available when out of stock
OutOfStockType::OUT_OF_STOCK_AVAILABLE = 1; // Available when out of stock
OutOfStockType::OUT_OF_STOCK_DEFAULT = 2; // Use default configuration
{{< /highlight >}} |
| `location`          | The location where the product is stored, to help the merchant handle their storage and prepare their packages. |
| `depends_on_stock`  | **Deprecated** It was used for advanced stock management in previous versions, but is no longer used. |

{{% notice tip %}}
You will probably notice that usually ```physical_quantity = available_quantity + reserved_quantity;```
{{% /notice %}}

{{% notice note %}}
To avoid confusion, from now on we will refer to `StockAvailable::quantity` as **virtual quantity**.
{{% /notice %}}

**Q:** When is the StockAvailable object/table updated?

**A:** That's a broad question but basically for any action that should logically have an impact on the stock. When a product quantity is modified in BO, when an order is created, when the order is delivered, ... However, here is a little chronology of stock quantities during a full checkout process:

| Scenario Step | virtual_quantity | physical_quantity | reserved_quantity | Side note       |
| ------------- | ---------------- | ----------------- | ----------------- | --------------- |
| `Great Product` is created in the BO with a virtual quantity of 50 | `50` | `50` | `0` | |
| A customer decides to add 3 `Great Product` into their cart | `50` | `50` | `0` | For now the product is only in a cart, nothing is reserved, anyone can still buy one of the 50 remaining products. |
| The customer goes through the whole checkout process and chooses to pay by check. | `47` | `50` | `3` | The order has been created, but the payment is not accepted yet. Virtual quantity and reserved quantity are updated. |
| A few days later, the merchant receives the check, so they change the Order status to `Payment accepted` | `47` | `50` | `3` | The product is now paid, but the package has still not been prepared. |
| The package is prepared and delivered to a Carrier, the order status is switched to `Delivered` or `Shipped` | `47` | `47` | `0` | The product is no longer reserved, it has actually been sent to the customer. So reserved and physical quantities can be decreased. |

**Q:** Where can I see and modify my Stock?

**A:** Although you can change the quantity directly on your product page, we strongly recommend using the `Catalog > Stock` section in your BO because it is based on `StockMovement` which is safer than a direct edition ([read below why](#stockmovement)).

**Q:** Can I edit the physical or reserved quantity myself or using an ERP?

**A:** Avoid doing this! These two fields should be considered read-only and exist for performance reasons. They are automatically recomputed every time the stock is synchronized:

- **reserved_quantity** is the sum of each quantity in pending orders:  
  `reserved_quantity_per_order = SUM(order_detail.product_quantity - order_detail.product_quantity_refunded)`
- **physical_quantity** is recalculated after the reserved quantity is updated:  
  `physical_quantity = virtual_quantity + reserved_quantity`

So in the end the only important field is the virtual quantity (`StockAvailable::quantity`), the other two fields are handled by the core. You should avoid modifying them.

## StockMovement

**Q:** What is a `StockMovement`? What is the difference with direct edition?

**A:** When you edit the virtual quantity of a Product you are going to edit the `StockAvailable::quantity` field directly in your database. When you modify your stock through a `StockMovement` you apply a _delta_ to your existing stock.

**Q:** What is the advantage of delta edition vs direct edition?

**A:** When you edit the virtual quantity directly, the value is saved in database, but you cannot be sure that there was no modification in stock between the moment you opened your Product page, and the moment you saved the new value. Imagine this scenario:

- You have 50 items of `Great Product` on stock.
- It is your best-seller, so today you are expecting a delivery to increase your stock.
- You get 50 new products and want to update the stock from the Product page.
- You open the page indicating that you have 50 products left in your stock.
- While you are checking this stock, since it is your best-seller, three items have been sold and shipped, so your stock is now actually 47, not 50.
- You update your expected stock from 50 to 100 and save the product.
- Your stock now shows 100 products, while it should have been 97 (50 - 3 + 50)

That is why a `StockMovement` is safer: it will not change your stock to 100, but add 50 to your current stock level instead. This way, even if the stock changes without your knowledge, the final value will remain correct.

**Q:** Are there any other advantages to use `StockMovement`?

**A:** Another advantage is that every operation (or `StockMovement`) registers a log in the database. This provides you with a complete history of the stock evolution for the product, including useful details:
- what was the reason for the movement
- which order or which employee performed the action
- when did it happen
- ...

You can access this history in the `Catalog > Stock > Movements` section from your BO.
