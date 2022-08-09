---
title: Value Objects
weight: 20
---

# Value Objects

PrestaShop is using Value Objects in its codebase. To help you understand better what they are, this article aims to explain what Value object is and how to use it.

## What is Value Object?

[Value Objects](https://martinfowler.com/bliki/ValueObject.html) (VO for short) are small, simple, immutable objects, like Money or a date range, whose equality is not based on their identity. This means that any two given instances of a same VO are considered equal when they contain the same values.

Value Objects are often referred to as Value Types as well. You can consider a Value Object like a data _type_, whose objective is to provide structure, validation, and meaning.

Characteristics of Value Object are:

* It does not have an identity, contrary to an Entity (e.g. `Money($amount)` can be considered a VO because two instances of it can be considered equal as long as the `$amount` is equal, regardless of which bills that amount is made of; but `Bill($billNumber)` is an entity because it refers to a specific physical Bill).
* It is immutable (e.g. it cannot be modified; any modification on it yields a different instance).
* It is self validating (e.g. value object cannot be created with invalid values, meaning that attempt to create `new Email('not an email')` would throw an exception).
* It is interchangeable (e.g. `$a` and `$b` can replace one another without any side effects if they both are created like `$a = new Money(100)` and `$b = new Money(100)`).

## Examples of Value Objects in PrestaShop

As an example, we can take a look at `PrestaShop\PrestaShop\Core\Domain\Currency\ValueObject\ExchangeRate` value object. `ExchangeRate` is used to pass currency exchange rate between different parts of system.

```php
<?php
use PrestaShop\PrestaShop\Core\Domain\Currency\ValueObject\ExchangeRate;

// ExchangeRate has VO has rules to protect.
// In this case, ExchangeRate validates that it's value cannot be 0 or less.
// If we were to create ExchangeRate with value of -1,
// then CurrencyConstraintException would be thrown.

$exchangeRate = new ExchangeRate(-1); // throws exception, because exchange rate value is not within boundaries

// However, if ExchangeRate value is within allowed boundaries,
// then it will successfully produce us new instance of ExchangeRate.

$exchangeRate = new ExchangeRate(1.25); // this would work, since 1.25 is a valid exchange rate value
```

Another good side effect of using value objects in your code is that it helps you avoid unnecessary assertions.

```php
<?php
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
