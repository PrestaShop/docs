---
title: Update FAQ
showOnHomepage: true
aliases:
    - /1.7/faq/upgrade
---

# Update FAQ

- [The newer version of PrestaShop is not shown on Update Assistant](#the-newer-version-of-prestashop-is-not-shown-on-update-assistant)
- [The version of PrestaShop does not match the one stored in database](#the-version-of-prestashop-does-not-match-the-one-stored-in-database)
- [Restore access to Back Office Page](#restore-access-to-back-office-page)

## The newer version of PrestaShop is not shown on Update Assistant

**Q:** I've seen a new version of PrestaShop has been released, but Update Assistant keeps saying my store is up-to-date.

**A:** Several reasons may lead to the new version not being suggested:
* It is not flagged for update yet. This can happen if the module is not ready or testing is ongoing.
* The PHP version running the store does not match the required range. It will happen if PHP is either **too low** or **too high**. Ensure the [system requirements][system-requirements] are fullfiled.

## The version of PrestaShop does not match the one stored in database

**Q:** Update cannot start because the error "The version of PrestaShop stored in database does not match the running code. Your database structure may not be up-to-date and/or the value of PS_VERSION_DB needs to be updated in the configuration table." is displayed.

**A:** In PrestaShop, `PS_VERSION_DB` is a constant that holds the current version number of your PrestaShop database schema. The main purpose of `PS_VERSION_DB` is to keep track of the database schema's version history. When you update a shop, the database schema is modified to match the structure of the new version (e.g. add or remove tables, columns, or relationships). 

Before updating PrestaShop, the update module relies on this constant to ensure that the current version matches the database schema. If the values don't match, it would be a sign of potential issues with the database structure or data which could lead to unforeseen consequences during the update process.

## Restore access to Back Office Page

**Q:** After updating my PrestaShop to a new version, I lost access to some Back-Office pages. How can I fix it?

**A:** It is likely that some SQL configuration is not correct.

First, identify what is the `slug` of the Back Office pages. You can find them into the SQL table `ps_authorization_role`. This will tell you the SQL identifier for these pages.

Second, identify the _Role_ of the User you use to browse the Back Office.

Third, check whether the table `ps_access` grants access to the Back Office pages, using the identifier of the role and the identifiers of the Back Office pages. There must be a record for the role and the page. If there is no such record, create it to grant access.

[system-requirements]: {{< relref "/1.7/basics/installation/system-requirements#php-compatibility-chart" >}}