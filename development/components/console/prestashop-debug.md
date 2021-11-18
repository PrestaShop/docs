---
title: prestashop:debug
---

# `prestashop:debug`

## Informations

* Path: `src/PrestaShopBundle/Command/DebugCommand.php`
* Arguments:
  * `value`: Value for debug mode, on/off, true/false, 1/0. If left out will just print the current state.

## Description

Get or set the debug mode from command line.

With this command its easy to switch between debug mode on and off.

To set debug mode on just run the command

```bash
bin/console prestashop:debug on
```

And to take it off

```bash
bin/console prestashop:debug off
```

To read out the debug status of the shop use

```bash
bin/console prestashop:debug
```