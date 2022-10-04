---
title: How to create your own Behat tests
menuTitle: Creating your own Behat tests
weight: 20
aliases:
  - /8/testing/how-to-create-your-own-behat-tests/
---

# How to create your own Behat tests or add tests to PrestaShop

Behat tests are great if you want to validate the behavior of a component of the code and/or follow a user-oriented scenario.

By "component" we usually mean a group of classes being called together, sometimes using an external dependency (a web API or a database system like MySQL).

By "user-oriented scenario" we mean a scenario that is a series of steps, each step is an action, and at the end of the series there is an expected result

{{% notice tip %}}
This tutorial guides you to create your first scenario step by step, if you need more details please read the [behat testing]({{< relref "/8/development/architecture/migration-guide/testing/behat.md" >}}) page.
{{% /notice %}}

## What is Behat

[Behat][1] is a [Behavior-Driven Development](https://en.wikipedia.org/wiki/Behavior-driven_development) framework for PHP. 

Behat is a testing tool that brings one great asset to your tests: the test scenarios are written so that they are understandable by humans without technical knowledge needed ! This makes them easier to read and maintain.


Example of a behat scenario:

```yml
  Scenario: With free shipping voucher, there is no shipping fees
    Given on my shop, there is only 1 carrier which can ship my products
    And his shipping fees of 5.0 euros in zone "US" for product whose price ranges between 0 and 150 euros
    Given I start with an empty default cart
    And I add a standard product into my cart, the price of the product is 50.0 euros
    Then my cart price is currently 55 euros
    When I use a cart rule with code "free4behat" that provides free shipping
    Then my cart price is now 50 euros !
 ```

It is better to discover Behat from its [documentation][1] but if you want to understand quickly what it does:

 - test scenarios (known as "features") are being parsed by Behat following [gherkin][2] syntax
 - Behat matches each scenario step with a regular expression that must be provided as a method of a PHP class called feature context
 - the regexp indicates a php function to be run by behat
 - behat provides hooking capabilities to handle the test lifecycle (application boot, database reset, cache clear...)

## Launch the PrestaShop behat test suite

Run tests using behat binary using the right behat.yml configuration file

This requires that a test database has been generated previously, using Composer command `composer create-test-db`.

```bash
# from the PrestaShop root folder
php -d date.timezone=UTC ./vendor/bin/behat -c tests/Integration/Behaviour/behat.yml
```

## Add new behat tests

You can add a new test in one of the feature files or create a new feature file. It must use the
[gherkin][2] syntax.

If you create new steps, you can add them to one of the available FeatureContext if the step belongs
to it or create a new FeatureContext if you think it should be a dedicated file. In this case, update the
`behat.yml` file to include your new Context.

FeatureContexts are split by features: for example cart steps should go into CartFeatureContext. You can reuse existing steps from existing FeatureContexts. Make sure your test suite loads the right contexts (see behat.yml file content).

FeatureContext files are stored in `tests/Integration/Behaviour/Features/Context` folder. They must extend
the `AbstractPrestaShopFeatureContext` that provide the setup necessary to perform
tests on PrestaShop.

Feature files are stored in `tests/Integration/Behaviour/Scenario` folder.

### Step-by-step tutorial

We will now add a new Behat test to demonstrate the different steps needed. This tutorial is a shortcut to write tests but the full documentation is available on the [Behat][1] website.

Let's say we want to check that the computation of a cart price is correctly impacted by a Free Shipping coupon.

We will:

 - write this scenario as a human-readable text
 - convert it to gherkin syntax
 - run it using Behat

#### Write a new scenario and feature

We will first write our feature. We can either add it to one of the existing `.feature` files in folder `tests/Integration/Behaviour/Features/Scenario/` or create a new feature file. If the new feature file is in a new folder, you need to update the main Behat configuration file `tests/Integration/Behaviour/behat.yml` to either add this folder to one of the existing test suites or to create a new test suite.

For this tutorial, we'll add the new scenario to the `tests/Integration/Behaviour/Features/Scenario/Cart/Calculation/CartRule/free_shipping.feature` file.

The scenario we want to test is the following:

```yml
  On my shop, there is only 1 carrier which can ship my products
  And his shipping fees of 5.0 euros in zone "US" for product whose price ranges between 0 and 150 euros

  I start with an empty default cart
  I add a standard product into my cart, the price of the product is 50.0 euros
  So my cart price is currently 55 euros
  I use a cart rule with code "free4behat" that provides free shipping
  Then my cart price is now 50 euros !
 ```

Then I convert it to use [Gherkin][2] syntax. This means each step must start with `Given`, `When` or `Then`. We can also use `And` which is an alias for the latest prefix used.

```yml
  Scenario: With free shipping voucher, there is no shipping fees
    Given On my shop, there is only 1 carrier which can ship my products
    And his shipping fees of 5.0 euros in zone "US" for product whose price ranges between 0 and 150 euros
    Given I start with an empty default cart
    And I add a standard product into my cart, the price of the product is 50.0 euros
    Then my cart price is currently 55 euros
    When I use a cart rule with code "free4behat" that provides free shipping
    Then my cart price is now 50 euros !
 ```

There is no rule that requires to use `Given`, `When` or `Then`. You could use `Then` everywhere but usually we say that:

 - Given steps are used to lay the ground for the scenario, to describe existing items
 - When steps are used to trigger something, to make an event happen which modifies the software state
 - Then steps are used to validate the software state, to check it behaves as expected

We have now written a valid gherkin scenario !

#### Run Behat on this new scenario

This scenario is now runnable by Behat. I add it to the `free_shipping.feature` file. Now this scenario is part of the PrestaShop testing suite for Behat !

Let's see what happens if I run the whole feature to see the output:

```bash
# from the PrestaShop root folder
php ./vendor/bin/behat -c tests/Integration/Behaviour/behat.yml --name="free shipping"
```

(I use the `--name` filter to allow Behat to target my specific file, and not all the available tests)

We can see that Behat detects that some steps are not defined yet and suggests to create them for me:

```
 >> cart suite has undefined steps. Please choose the context to generate snippets:
```

That is one great asset from Behat: if it is unable to match one of the steps with one existing regexp, it can generate snippets ready-to-use for us !

However I am rather going to check into existing Context files (in `tests/Integration/Behaviour/Features/Context/` folder) to see if I can re-use existing steps. It's better to avoid unnecessary duplication.

Luckily for me, it seems I can use existing steps for my whole feature! So we do not need to add new Behat steps in the Context file. We will however see later how to add a new step.

Back to my usecase: I check available existing steps from either the other Feature files or the Context files, so I can reuse them to replace all the steps I have written by steps that are already understandable by Behat.

Here is my scenario now:

```yml
  Scenario: With free shipping voucher, there is no shipping fees
    # Start with an empty cart
    Given I have an empty default cart
    # We need a product
    And there is a product in the catalog named "product1" with a price of 50.0 and 1000 items in stock
    # We define the standard PrestaShop localisation tree: zone > country > state > address
    And there is a zone named "North America"
    And there is a country named "country1" and iso code "US" in zone "North America"
    And there is a state named "state1" with iso code "TEST-1" in country"country1" and zone "North America"
    And there is an address named "address1" with postcode "1" in state "state1"
    # We need a carrier with shipping fees
    Given there is a carrier named "carrier1"
    And carrier "carrier1" applies shipping fees of 5.0 in zone "North America" for price between 0 and 150
    # Create the voucher
    Given there is a cart rule named "free4behat" that applies no discount with priority 4, quantity of 1000 and quantity per user 1000
    And cart rule "free4behat" offers free shipping
    And cart rule "free4behat" has a discount code "free4behat"
    When I add 1 items of product "product1" in my cart
    # 57 because product = 50 € + 5 € (carrier shipping fees) + 2 € (default carrier handling cost)
    Then my cart total should be 57.0 tax included
    When I use the discount "free4behat"
    Then my cart total should be 50.0 tax included
```

This one is valid: Behat is able to match each of the lines with one Context step. And if I run my command, I can see Behat go through the whole scenario successfully. This means that my free shipping voucher behavior is correct: Behat has checked that the cart total, after using the voucher, has no shipping fees.

My feature is validated by Behat !

#### Adding a new step

Now we are going to add a new step that is not yet supported by existing Contexts.

For example, have you noticed that the cart price is, before free shipping, 57€ and not 55€ ? It is because the step `Given there is a carrier named "carrier1"` generates a standard carrier whose handling cost is 2 by default.
So when shipping fees are added, the handling cost is added too.

Let's say we want to remove this handling cost and only keep the shipping fees. This way my cart price will, without free shipping, be 55€ and not 57€.

So we need to add a new step: `Given the carrier "carrier1" has no handling costs`.

This step is unknown to Behat, so we will need to help Behat "understand it".

We add the step to the scenario and we run again
```bash
# from the PrestaShop root folder
php ./vendor/bin/behat -c tests/Integration/Behaviour/behat.yml --name="free shipping"
```

Again, Behat detects the unmatched step and warns me `suite has undefined steps. Please choose the context to generate snippets:`.

I accept the help of Behat and let him generate a snippet ready-to-use for me for my step.

I choose to put the new step into `Tests\Integration\Behaviour\Features\Context\CarrierFeatureContext` as it is related to carriers. The generated snippet looks like this:

```php
<?php
    /**
     * @Given the carrier :arg1 has no handling costs
     */
    public function theCarrierHasNoHandlingCosts($arg1)
    {
        throw new PendingException();
    }
```

I can pick it, copy it into `CarrierFeatureContext` file and *implement it*.

Implementing a Behat step means: performing the required process, be it call functions, perform SQL queries, that are required by the action "carrier has no costs". I also rename the function and improve the regular expression provided by Behat.

After I have implemented it, this is what my step looks like:

```php
<?php
    /**
     * @Given the carrier :carrierName has no handling costs
     */
    public function carrierHasNoHandlingCosts($carrierName)
    {
        // check a carrier with this name exists
        $this->checkCarrierWithNameExists($carrierName);
        // fetch the carrier
        $carrier = $this->carriers[$carrierName];

        // disable handling cost
        $carrier->shipping_handling = false:
        $carrier->save();
    }
```

Now I update my scenario:

```yml
  Scenario: With free shipping voucher, there is no shipping fees
    # Start with an empty cart
    Given I have an empty default cart
    # We need a product
    And there is a product in the catalog named "product1" with a price of 50.0 and 1000 items in stock
    # We define the standard PrestaShop localisation tree: zone > country > state > address
    And there is a zone named "North America"
    And there is a country named "country1" and iso code "US" in zone "North America"
    And there is a state named "state1" with iso code "TEST-1" in country"country1" and zone "North America"
    And there is an address named "address1" with postcode "1" in state "state1"
    # We need a carrier with shipping fees
    Given there is a carrier named "carrier1"
    Given the carrier "carrier1" has no handling costs
    And carrier "carrier1" applies shipping fees of 5.0 in zone "North America" for price between 0 and 150
    # Create the voucher
    Given there is a cart rule named "free4behat" that applies no discount with priority 4, quantity of 1000 and quantity per user 1000
    And cart rule "free4behat" offers free shipping
    And cart rule "free4behat" has a discount code "free4behat"
    When I add 1 items of product "product1" in my cart
    # 55 because product = 50 € + 5 € (carrier shipping fees)
    Then my cart total should be 55.0 tax excluded
    When I use the discount "free4behat"
    Then my cart total should be 50.0 tax included
```

Have you noticed my cart total, before using the voucher, is now 55€ and not 57€ ?
And when this scenario is run by Behat, everything runs fine, so my calculations are correct !

I have again a dedicated scenario that validates the behavior of my free shipping voucher.

[1]: https://behat.org/en/latest/
[2]: https://docs.behat.org/en/v2.5/guides/1.gherkin.html



