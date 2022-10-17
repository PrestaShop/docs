---
title: Domain exceptions
weight: 30
---

# Domain exceptions

With introduction of domain driven design in PrestaShop, a new way of error handling in the code is seeing the daylight.
The code in `PrestaShop\PrestaShop\Core\Domain` namespace started to utilize *domain exceptions*.

## What is a domain exception

{{% notice note %}}
A *domain exception* is an exception, that is thrown in application's domain level, which is specific to that particular domain.
{{% /notice %}}

Let's see how domain exceptions look like in the code.
For this example, let's look at `Category` domain: 

##### src/Core/Domain/Category/

```
.
├── Command
├── CommandHandler
├── Exception
│   ├── CannotAddCategoryException.php
│   ├── CannotDeleteImageException.php
│   ├── CannotDeleteRootCategoryForShopException.php
│   ├── CannotEditCategoryException.php
│   ├── CannotUpdateCategoryStatusException.php
│   ├── CategoryConstraintException.php
│   ├── CategoryException.php
│   ├── CategoryNotFoundException.php
│   ├── FailedToDeleteCategoryException.php
│   └── MenuThumbnailsLimitException.php
├── Query
├── QueryHandler
├── QueryResult
└── ValueObject
```

We can see the `Exception` directory, which contains all category domain exceptions. 

All domain exceptions are extending a base exception class. 
In case of categories, all category exceptions are extending `CategoryException`, which defines the `Category` domain,
and `CategoryException` extends `PrestaShop\PrestaShop\Core\Domain\Exception\DomainException`, 
which defines the PrestaShop's domain.

## Example usage of domain exceptions

Let's analyze one exception from `Category` domain, `CannotEditCategoryException`:

```php
<?php
namespace PrestaShop\PrestaShop\Core\Domain\Category\Exception;

/**
 * Class CannotEditCategoryException is thrown when editing category fails.
 */
class CannotEditCategoryException extends CategoryException
{
}
```

As we can guess from the comment in the code, this exception is supposed to be thrown when editing a category fails.
Let's see a real usage in a command handler:

```php
<?php
// src/Adapter/Category/CommandHandler/EditCategoryHandler.php

private function updateCategoryFromCommandData(Category $category, EditCategoryCommand $command)
{
    // ... 
    
    if (false === $category->update()) {
        throw new CannotEditCategoryException(
            sprintf('Failed to edit Category with id "%s".', $category->id)
        );
    }
}
```

{{% notice tip %}}
If you are not familiar with command handlers or how CQRS pattern is used in PrestaShop, you can read about it here: [CQRS]({{< ref "cqrs" >}}).
{{% /notice %}}

We can see in the code above, that if category update fails, it will throw a `CannotEditCategoryException`. 
The exception then needs to be handled in the upper layers of the code. 

In our example all category domain exceptions are handled in the `CategoryController`:

```php
<?php
// src/PrestaShopBundle/Controller/Admin/Sell/Catalog/CategoryController.php

public function editAction($categoryId, Request $request)
{
    try {
        $editableCategory = $this->getQueryBus()->handle(new GetCategoryForEditing((int) $categoryId));
    } catch (CategoryException $e) {
        // Catching all exceptions from category domain
        // and showing a specific error message for every exception type.
        $this->addFlash('error', $this->getErrorMessageForException($e, $this->getErrorMessages()));
    }

    // ...
}
```

So now, if we are editing a category and it fails for some reason (e.g. the database is not responding),
the controller will catch the `CannotEditCategoryException` (which is a child of `CategoryException`) and display a specific error message to the user.

## Why are there so many new exception classes ?

Having many different exception classes means that developers can easily recognize specific failures in the system.
Just as we recognized category editing failure in our example, we can catch any particular exception and it will tell us what exactly failed in the runtime.

For example, catching a `CategoryNotFoundException` lets us know when category is not found,
or catching `CannotAddCategoryException` means that a category cannot be added. These exceptions carry accurate information that makes it easier to debug the issue or to handle the use case gracefully by displaying the right error message for example.

If we expand our previous example with a better overview with different exception types:

```php
<?php
public function editAction($categoryId, Request $request)
{
    try {
        $editableCategory = $this->getQueryBus()->handle(new GetCategoryForEditing((int) $categoryId));
    } catch (CannotEditCategoryException $e) {
        // Here we handle the case when category cannot be edited, like display a specific error message and suggestions to fix it.
        $this->addFlash('error', 'Something went wrong when editing category.');
    } catch (CategoryNotFoundException $e) {
        // Here we can do specific actions if the user is trying to edit a category that cannot be found, like redirect to category listing.
        $this->addFlash('error', 'Category cannot be found!');
    }

    // ...
}
```
