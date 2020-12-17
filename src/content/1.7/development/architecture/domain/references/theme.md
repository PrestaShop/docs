---
title: Theme domain
---

## Theme domain

### Theme Commands

#### ImportThemeCommand {id="ImportThemeCommand"}

`PrestaShop\PrestaShop\Core\Domain\Theme\Command\ImportThemeCommand`
_Class ImportThemeCommand imports theme from given source._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$PrestaShop\PrestaShop\Core\Domain\Theme\ValueObject\ThemeImportSource importSource`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Core\Domain\Theme\CommandHandler\ImportThemeHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Theme\CommandHandler\ImportThemeHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### EnableThemeCommand {id="EnableThemeCommand"}

`PrestaShop\PrestaShop\Core\Domain\Theme\Command\EnableThemeCommand`
_Class EnableThemeCommand enables given Front Office theme for context&#039;s shop._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$PrestaShop\PrestaShop\Core\Domain\Theme\ValueObject\ThemeName themeName`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Core\Domain\Theme\CommandHandler\EnableThemeHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Theme\CommandHandler\EnableThemeHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### DeleteThemeCommand {id="DeleteThemeCommand"}

`PrestaShop\PrestaShop\Core\Domain\Theme\Command\DeleteThemeCommand`
_Class DeleteThemeCommand deletes given theme._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$PrestaShop\PrestaShop\Core\Domain\Theme\ValueObject\ThemeName themeName`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Core\Domain\Theme\CommandHandler\DeleteThemeHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Theme\CommandHandler\DeleteThemeHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### AdaptThemeToRTLLanguagesCommand {id="AdaptThemeToRTLLanguagesCommand"}

`PrestaShop\PrestaShop\Core\Domain\Theme\Command\AdaptThemeToRTLLanguagesCommand`
_Class AdaptThemeToRTLLanguagesCommand adapts given theme to RTL languages._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$PrestaShop\PrestaShop\Core\Domain\Theme\ValueObject\ThemeName themeName`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Core\Domain\Theme\CommandHandler\AdaptThemeToRTLLanguagesHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Theme\CommandHandler\AdaptThemeToRTLLanguagesHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### ResetThemeLayoutsCommand {id="ResetThemeLayoutsCommand"}

`PrestaShop\PrestaShop\Core\Domain\Theme\Command\ResetThemeLayoutsCommand`
_Class ResetThemeLayoutsCommand resets theme&#039;s page layouts to defaults._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$PrestaShop\PrestaShop\Core\Domain\Theme\ValueObject\ThemeName themeName`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Core\Domain\Theme\CommandHandler\ResetThemeLayoutsHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Theme\CommandHandler\ResetThemeLayoutsHandlerInterface`</li>  |
| **Return type** |  not defined  |

### Theme Queries

