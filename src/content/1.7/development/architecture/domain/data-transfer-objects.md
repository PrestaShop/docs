---
title: Data Transfer Objects
weight: 20
---

# Data Transfer Objects

PrestaShop is using Data Transfer Objects (or DTOs) in its codebase, in this section you learn how you can benefit from using DTOs as well.

## What is Data Transfer Object?

Data Transfer Object is object (e.g. `UserData`) that contains data in a structured format. This means that DTO usually comes with getter methods or public properties for accessing it's data. The main benefit of using DTOs is that you know what data it has.

For example, if DTO has method `getName()` you can be sure that name is there, unlike using arrays, when you never know if key `name` exists inside an array or not. By making effective use of DTOs you are also making your code more readable and maintainable.

Benefits of using DTOs:

* Enables typehints.
* DTOs are valid because built (you cannot "skip" one of the keys).
* Helps isolate different parts of system.

## Examples of Data Transfer Objects in PrestaShop

PrestaShop extensively uses DTOs in it's `QueryHandlers` (you can learn more about it in [CQRS section]({{< ref "cqrs" >}})). As an example, you can take a look at `GetCustomerForEditingHandlerInterface` below.

```php
<?php 
namespace PrestaShop\PrestaShop\Core\Domain\Customer\QueryHandler;

use PrestaShop\PrestaShop\Core\Domain\Customer\QueryResult\EditableCustomer;
use PrestaShop\PrestaShop\Core\Domain\Customer\Query\GetCustomerForEditing;

interface GetCustomerForEditingHandlerInterface
{
    /**
     * @param GetCustomerForEditing $query
     *
     * Handler returns EditableCustomer DTO instead of unstructured array,
     * thus allowing developer to know exactly what data can be accessed.
     *
     * @return EditableCustomer
     */
    public function handle(GetCustomerForEditing $query);
}
```

Now imagine you are using implementation of `GetCustomerForEditingHandlerInterface` handler in your code.

```php
<?php
use PrestaShop\PrestaShop\Core\Domain\Customer\QueryResult\EditableCustomer;

/** EditableCustomer $editableCustomer */
$editableCustomer = $handler->handle($query);

// You don't need to add additional assertions to see if customer's first name exists
// as DTO explicity provides you it via getter method.
$editableCustomer->getFirstName();
```

