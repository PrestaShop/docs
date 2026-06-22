---
title: prestashop:module
category: Module Management
description: Install, uninstall, enable, disable, and manage modules
weight: 10
---

# `prestashop:module`

## Informations

* Path: `src/PrestaShopBundle/Command/ModuleCommand.php`
* Arguments:
  * `action`: Action to execute, must be one of: install, uninstall, enable, disable, reset, upgrade, configure, delete
  * `module name`: Module on which the action will be executed
  * `file path`: YML file path for configuration __(optional, only used with configure action)__
* Options:
  * `--skip-overrides`: prevent the module's override files from being copied to (or removed from) the /override/ directory (since 9.1.1). 

## Description

This command aims to manage your modules via command line.

