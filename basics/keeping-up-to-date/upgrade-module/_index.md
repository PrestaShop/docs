---
title: Upgrade Module
weight: 80
aliases:
  - /8/development/upgrade-module/
---

# Upgrade module

Also known as the "Autoupgrade module" or the "1-click upgrade module", PrestaShop upgrade assistant aims to automatize the upgrade process.

Details on how to use the web interface are documented in [Keep up-to-date: Upgrade Assistant page]({{< ref "/8/basics/keeping-up-to-date/use-autoupgrade-module.md" >}}).

{{% children %}}

## New features of v4

Although v4 of the module was scoped to be a refactoring, some features were added at the same time to improve the support.


### New loggers

Reporting is now using [PSR-3](https://www.php-fig.org/psr/psr-3/), allowing incomers in the module code to recognize some common code in PHP.

New loggers have been created:

- **LegacyLogger**: The existing logger still stores its content in lists before being displayed in a sigle row, and at the same time in a log file. By doing this, we still can get details on what happened if the script execution stopped prematurerly.
- **StreamLogger**: New logger, used in CLI mode. We do not need to use memory to store the logs, we can display them directly on the terminal.
- **Error handler**: This was done for debugging. In case of a server error (in web, HTTP 500), the module was unable to display anything to the user. It is then needed to read PHP logs in order to get error details, and some users have trouble doing it. Thanks to this logger, the error is displayed directly on the screen.

## How to download it

You can download it from [the module GitHub repository](https://github.com/PrestaShop/autoupgrade/releases) or from your shop administration panel.
