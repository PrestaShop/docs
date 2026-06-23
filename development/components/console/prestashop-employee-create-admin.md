---
title: prestashop:employee:create-admin
category: Utilities
description: Create a back-office SuperAdmin employee from the CLI
weight: 30
---

# `prestashop:employee:create-admin`

{{< minver v="9.2" title="true" >}}

## Informations

* Path: `src/PrestaShopBundle/Command/EmployeeCreateCommand.php`
* Arguments:
  * `email`: Employee email __(optional, prompted when omitted)__
* Options:
  * `--first-name`: First name __(optional, prompted when omitted)__
  * `--last-name`: Last name __(optional, prompted when omitted)__
  * `--password`: Password. Prefer the interactive prompt to avoid leaking it in your shell history __(optional, prompted when omitted)__

## Description

This command provisions a new back-office **SuperAdmin** employee from the command line. It is intended for first-admin provisioning and recovery, not for generic employee management: use the *Team* page in the Back Office for that.

The created account is always a SuperAdmin with full back-office access, active, on the default language, and associated to every shop. By default the command is interactive and prompts for the missing values. Passing all values as arguments and options runs it non-interactively, which is convenient for CI or automated provisioning.

To reset the password of an existing employee, use [`prestashop:employee:change-password`]({{< relref "prestashop-employee-change-password" >}}).

## Examples

### Create a SuperAdmin interactively

```bash
$ bin/console prestashop:employee:create-admin
```

### Create a SuperAdmin non-interactively

```bash
$ bin/console prestashop:employee:create-admin john@example.com \
    --first-name=John --last-name=Doe --password='Str0ng!Pass'
```
