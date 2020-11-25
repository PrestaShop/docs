---
title: Upgrade Module
weight: 80
---

# Upgrade module

{{% children %}}

## New features of v4

Although v4 of the module was scoped to be a refactoring, some features were added at the same time to improve the support.


### New loggers

Reporting is now using [PSR-3](https://www.php-fig.org/psr/psr-3/), allowing incomers in the module code to recognize some common code in PHP.

New loggers have been created:

- **LegacyLogger**: The existing logger still stores its content in lists before being displayed in a sigle row, and at the same time in a log file. By doing this, we still can get details on what happened if the script execution stopped prematurerly.
- **StreamLogger**: New logger, used in CLI mode. We do not need to use memory to store the logs, we can display them directly on the terminal.
- **Error handler**: This was done for debugging. In case of a server error (in web, HTTP 500), the module was unable to display anything to the user. It is then needed to read PHP logs in order to get error details, and some users have trouble doing it. Thanks to this logger, the error is displayed directly on the screen.
