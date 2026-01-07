---
title: prestashop:linter:security-attribute
category: Code Quality & Linting
description: Check security attribute annotations
weight: 30
---

# `prestashop:linter:security-attribute`

## Informations

* Path: `src/PrestaShopBundle/Command/SecurityAttributeLinterCommand.php`
* Arguments:
  * `action`: Action to perform, must be one of: `list` and `find-missing`

## Description

This command aims to check if Back Office controller routes have configured Security attributes.

Two options are available: Listing and Finding Missing.

### Listing
This option aims to list all routes, and their related permissions.

### Finding missing
This option aims to find routes with missing security attributes.
