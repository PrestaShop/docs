---
title: How to create your own behat tests
menuTitle: Creating your own behat tests
weight: 20
---

# How to create your own behat tests or add tests to PrestaShop
{{< minver v="1.7.6" title="true" >}}

Behat tests are great if you want to validate the behavior of a component of the code and/or follow a user-oriented scenario.

By "component" we usually mean a group of classes being called together, sometimes using an external dependdency (a web API, a database system like mysql ...).

By "user-oriented scenario" we mean "a scenario that is a serie of steps, each step is an action, and at the end of the serie there is an expected result"

## What is Behat

[Behat][1] is a [Behavior-Driven Development](https://en.wikipedia.org/wiki/Behavior-driven_development) framework for PHP. 

The main value of behat is that the test scenarios that are written are understandable by humans without technical knowledge needed. This makes them a lot more easier to read and maintain that some complex unit tests which are just code.

It is better to discover behat from its [documentation][1] but if you want to understand quickly what it does:

- test scenarios (known as "features") are being parsed by behat following [gherkin][2] syntax
- behat matches each scenario step with a regular expression that must be provided in a php file called feature context
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

[1]: http://behat.org/en/latest/
[2]: http://docs.behat.org/en/v2.5/guides/1.gherkin.html



