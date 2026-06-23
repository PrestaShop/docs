---
title: prestashop:employee:change-password
category: Utilities
description: Reset an existing employee's password from the CLI
weight: 31
---

# `prestashop:employee:change-password`

{{< minver v="9.2" title="true" >}}

## Informations

* Path: `src/PrestaShopBundle/Command/EmployeeChangePasswordCommand.php`
* Arguments:
  * `email`: Employee email __(optional, prompted when omitted)__
* Options:
  * `--password`: New password. Prefer the interactive prompt to avoid leaking it in your shell history __(optional, prompted when omitted)__

## Description

This command resets the password of an existing back-office employee from the
command line. By default it is interactive and prompts for the email and the new
password (entered twice). Passing the email argument and the `--password` option
runs it non-interactively.

On success, the employee receives the "Your new password" email, the same
template used by the Back Office forgot-password flow.

To provision a new SuperAdmin instead, use
[`prestashop:employee:create-admin`]({{< relref "prestashop-employee-create-admin" >}}).

## Examples

### Reset a password interactively

```bash
$ bin/console prestashop:employee:change-password
```

### Reset a password non-interactively

```bash
$ bin/console prestashop:employee:change-password admin@example.com --password='S0meStr0ngP@ss!'
```
