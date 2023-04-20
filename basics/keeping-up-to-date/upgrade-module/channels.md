---
title: Upgrade channels
weight: 40
aliases:
  - /8/development/upgrade-module/channels
---

# Upgrade channels

Different channels are available for upgrade.

Depending on the channel, the archive that will be used to upgrade the shop will be different.

### Major

This channel will look at the latest version, even if it is a different major version.

### Minor

This channel will look at the latest version of the same major version.

### RC

This channel is currently disabled. This was done to avoid people getting stuck on pre release software of which they cannot upgrade later.

### Beta

This channel is currently disabled. This was done to avoid people getting stuck on pre release software of which they cannot upgrade later.

### Alpha

This channel is currently disabled. This was done to avoid people getting stuck on pre release software of which they cannot upgrade later.

### Private

This channel allows you to fetch a version from a custom link instead of the official PrestaShop source.

### Archive

This channel will not fetch available versions data from PrestaShop API but will look at a `prestashop.zip` file inside your `<admin directory>/autoupgrade/download` folder.

### Directory

This channel will not fetch available versions data from PrestaShop API but will look at directory content `/<admin directory>/autoupgrade/latest/`
