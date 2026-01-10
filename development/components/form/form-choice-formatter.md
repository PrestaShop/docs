---
title: FormChoiceFormatter
weight: 30
---

# FormChoiceFormatter

The `FormChoiceFormatter` is a utility class that formats raw data arrays into the format required by Symfony form choice fields. It handles a common issue where duplicate option names would cause data loss in choice fields.

- **Fully qualified class name**: `PrestaShop\PrestaShop\Core\Form\FormChoiceFormatter`

## The problem it solves

Symfony form choice fields require an array where the option label is the key and the option value is the value:

```php
[
    'Option Label' => 1,
    'Another Label' => 2,
]
```

When two items have the same name (e.g., two manufacturers both named "Premium Brand"), the second one overwrites the first, causing data loss. `FormChoiceFormatter` solves this by automatically appending the ID to duplicate names.

## Usage

```php
<?php

use PrestaShop\PrestaShop\Core\Form\FormChoiceFormatter;

$rawData = [
    ['id_manufacturer' => 1, 'name' => 'Premium Brand'],
    ['id_manufacturer' => 2, 'name' => 'Budget Store'],
    ['id_manufacturer' => 3, 'name' => 'Premium Brand'], // Duplicate name
];

$choices = FormChoiceFormatter::formatFormChoices(
    $rawData,
    'id_manufacturer',  // ID key
    'name'              // Name key
);

// Result:
// [
//     'Budget Store' => 2,
//     'Premium Brand (1)' => 1,
//     'Premium Brand (3)' => 3,
// ]
```

## Method reference

### formatFormChoices

```php
public static function formatFormChoices(
    array $rawChoices,
    string $idKey,
    string $nameKey,
    bool $sortByName = true
): array
```

| Parameter     | Type   | Description                                                    |
|---------------|--------|----------------------------------------------------------------|
| `$rawChoices` | array  | Raw array of associative arrays containing the data            |
| `$idKey`      | string | The key name for item IDs (e.g., `id_manufacturer`)            |
| `$nameKey`    | string | The key name for item names (e.g., `name`)                     |
| `$sortByName` | bool   | Whether to sort results alphabetically by name (default: true) |

**Returns**: An array formatted for Symfony choice fields (`['Label' => value]`).

## Using in a Choice Provider

The most common use case is within a `FormChoiceProviderInterface` implementation:

```php
<?php

namespace PrestaShop\PrestaShop\Adapter\Form\ChoiceProvider;

use PrestaShop\PrestaShop\Core\Form\FormChoiceFormatter;
use PrestaShop\PrestaShop\Core\Form\FormChoiceProviderInterface;

final class ManufacturerNameByIdChoiceProvider implements FormChoiceProviderInterface
{
    public function __construct(
        private array $manufacturers
    ) {
    }

    public function getChoices(): array
    {
        return FormChoiceFormatter::formatFormChoices(
            $this->manufacturers,
            'id_manufacturer',
            'name'
        );
    }
}
```

## Preserving original order

By default, results are sorted alphabetically. To preserve the original order, set the fourth parameter to `false`:

```php
$choices = FormChoiceFormatter::formatFormChoices(
    $rawData,
    'id_carrier',
    'carrier_name',
    false  // Don't sort
);
```
