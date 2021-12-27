---
title: prestashop:config
---

# `prestashop:config`

## Description
  Manage shop configuration settings via command line

## Help

```
$ bin/console prestashop:config --help
Description:
  Manage your configuration via command line

Usage:
  prestashop:config [options] [--] <action> <key>

Arguments:
  action                         Action to execute (Allowed actions: get / set / remove).
  key                            Configuration key. like PS_LANG_DEFAULT

Options:
  -l, --lang=LANG                in this language. this can be either language id or ISO 3166-2 alpha-2 (en, fr, fi...)
  -g, --shopGroupId=SHOPGROUPID  in this shop group (if no shop group or shop options are given defaults to allShops)
  -s, --shopId=SHOPID            in this shop (if no shop group or shop options are given defaults to allShops)
  -h, --help                     Display this help message
  -q, --quiet                    Do not output any message
  -V, --version                  Display this application version
      --ansi                     Force ANSI output
      --no-ansi                  Disable ANSI output
  -n, --no-interaction           Do not ask any interactive question
  -e, --env=ENV                  The Environment name. [default: "dev"]
      --no-debug                 Switches off debug mode.
  -val, --value=VALUE            value to set
  -v|vv|vvv, --verbose           Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug
```

## Examples

### Set smtp settings to use mailcatcher

```bash
$ bin/console prestashop:config set PS_MAIL_SERVER --value "my-mailcatcher-container-name"
PS_MAIL_SERVER="my-mailcatcher-container-name"
$ bin/console prestashop:config set PS_MAIL_SMTP_PORT --value 1025
PS_MAIL_SMTP_PORT="1025"
```
