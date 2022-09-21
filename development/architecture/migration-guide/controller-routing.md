---
title: Controller and Routing
weight: 40
---

# Controller and Routing

{{% notice warning %}}
Before creating a new symfony controller please **read and follow principles** described in [Symfony controllers & routing]({{< relref "../modern/controller-routing" >}}).
{{% /notice %}}

{{% notice %}}
Controllers are responsible for performing "Actions". Actions are methods of Controllers which mapped to a route, and that return a `Response`.
{{% /notice %}}

## Migration tips
1. If you consider that a legacy Controller needs to be split into multiple controllers (for example: different URLs), it's the right time to do it.
2. Controllers are not available for override and can be regarded as internal classes, therefore **we don't consider changing Controller's namespace as a backward-compatibility break**.
3. Symfony **controllers should be thin** and have only one responsibility: getting the HTTP Request from the client and returning an HTTP Response. This means that all business logic should be placed in dedicated classes outside the Controller.
4. **Never, ever call the legacy controller inside the new controller**. It's a no go, no matter the reason!
5. **Try to avoid creating helper methods in your controller.** If you find yourself needing them, that might mean the Controller is becoming too complex. This can be solved by extracting the code into dedicated services.

{{% notice %}}
You can take a look at [PerformanceController](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Controller/Admin/Configure/AdvancedParameters/PerformanceController.php) for an example of good implementation, and [ProductController](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Controller/Admin/ProductController.php) for something you should avoid at all costs.
{{% /notice %}}
