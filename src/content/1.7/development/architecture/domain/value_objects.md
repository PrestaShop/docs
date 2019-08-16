---
title: Value Objects
weight: 20
---

# Value Objects

PrestaShop is using Value Objects in its codebase. To help you understand better what they are, this article aims to explain what Value object is and how to use it.

## What is Value Object?

A Value Object is small immutable object whos equality is not based on identity, this means that two Value Objects are equal when they have the same value, but not necessarily being the same object.

Characteristics of Value Object are:

* It does not have identity (e.g. `Money` is value object because it can be created without id like `new Money($amount)`).
* It is immutable (e.g. it cannot be modified, but instead new instance of value object is created after its modification).
* It is self validating (e.g. value object cannot be created with invalid values, meaning that attempt to create `new Email('not an email')` would throw an exception).
* It is interchangeable (e.g. `$a` and `$b` can replace one another without any side effects if they both are created like `$a = new Money(100)` and `$b = new Money(100)`).

## Examples of Value Objects in PrestaShop

As an example, we can take a look at `PrestaShop\PrestaShop\Core\Domain\Currency\ValueObject\ExchangeRate` value object. `ExchangeRate` is used to pass currency exchange rate between different parts of system.

```php
use PrestaShop\PrestaShop\Core\Domain\Currency\ValueObject\ExchangeRate;

// ExchangeRate has VO has rules to protect.
// In this case, ExchangeRate validates that it's value cannot be 0 or less.
// If we were to create ExchangeRate with value of -1,
// then CurrencyConstraintException would be thrown.

$exchangeRate = new ExchangeRate(-1); // throws exception, becasue exhange rate value is not within boundaries

// However, if ExchangeRate value is within allowed boundaries,
// then it will successfully produce us new instance of ExchangeRate.

$exhangeRate = new ExchangeRate(1.25); // this would work, since 1.25 is a valid exhange rate value
```

Another good side effect of using value objects in your code is that it helps you avoid unnesecery assertions.

```php
use PrestaShop\PrestaShop\Core\Domain\Currency\ValueObject\ExchangeRate;

class MyService
{
    // ...

    public function calculate(ExchangeRate $rate)
    {
        // you don't need to make additional assertions here (e.g. null !== $rate)
        // since you can trust that ExchangeRate contains valid value
        // as it was created somewhere in the system.

        // ... do some calculation with $rate
    }
}
```
