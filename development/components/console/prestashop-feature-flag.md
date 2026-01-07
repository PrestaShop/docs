---
title: prestashop:feature-flag
category: Feature Flags
description: Manage feature flags (enable, disable, list)
weight: 10
---

# prestashop:feature-flag

{{< minver v="9.1" title="true" >}}

## Description

This command allows you to manage feature flags via command line. Feature flags enable or disable specific features in PrestaShop, allowing for gradual rollout of new functionality or A/B testing.

## Usage

```bash
php bin/console prestashop:feature-flag <action> [feature_flag]
```

### Arguments

- **action** (required): Action to execute. Allowed actions: `enable`, `disable`, `list`
- **feature_flag** (optional): Name of the feature flag you want to enable/disable (required for `enable` and `disable` actions)

## Actions

### List all feature flags

Display all available feature flags with their current state:

```bash
php bin/console prestashop:feature-flag list
```

**Output example:**
```
 --------------- ------------------ ----------
  Feature flag    Type               State
 --------------- ------------------ ----------
  feature_x       [dotenv],env,db    Enabled
  feature_y       dotenv,[env],db    Disabled
 --------------- ------------------ ----------
```

The `Type` column shows the configuration sources in order of priority. The currently active type is shown in brackets `[type]`.

### Enable a feature flag

Enable a specific feature flag:

```bash
php bin/console prestashop:feature-flag enable <feature_flag_name>
```

**Example:**
```bash
php bin/console prestashop:feature-flag enable feature_x
# Output: Feature flag feature_x was enabled
```

### Disable a feature flag

Disable a specific feature flag:

```bash
php bin/console prestashop:feature-flag disable <feature_flag_name>
```

**Example:**
```bash
php bin/console prestashop:feature-flag disable feature_x
# Output: Feature flag feature_x was disabled
```

## Feature Flag Types

Feature flags can be configured through multiple sources (in order of priority):
1. **dotenv**: `.env` file configuration
2. **env**: Environment variables
3. **db**: Database configuration

The command will modify the appropriate source based on the feature flag's configuration.

## Error Handling

The command will display an error if:
- The action is not one of: `enable`, `disable`, `list`
- The feature flag name is missing when trying to enable/disable
- The specified feature flag does not exist

## Use cases

- Enable experimental features for testing
- Disable features temporarily for troubleshooting
- Check the status of all available feature flags
- Manage feature rollouts in production environments
