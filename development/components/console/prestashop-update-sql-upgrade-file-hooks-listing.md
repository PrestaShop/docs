---
title: prestashop:update:sql-upgrade-file-hooks-listing
category: Internal/Advanced
description: Update hooks in SQL upgrade files
weight: 20
---

# `prestashop:update:sql-upgrade-file-hooks-listing`

## Informations

* Path: `src/PrestaShopBundle/Command/AppendHooksListForSqlUpgradeFileCommand.php`
* Arguments:
  * `ps-version`: PrestaShop version for which the SQL upgrade file will be searched
  * `autoupgrade-path`: Path to the autoupgrade module path which contains the upgrade scripts

## Description

This command aims to add SQL to the SQL upgrade file which contains hook insert operations.
