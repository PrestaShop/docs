---
title: Shop domain
---

## Shop domain

### Shop Commands

#### UploadLogosCommand {id="UploadLogosCommand"}

`PrestaShop\PrestaShop\Core\Domain\Shop\Command\UploadLogosCommand`
_Uploads logo image files_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul></ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Shop\CommandHandler\UploadLogosHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Shop\CommandHandler\UploadLogosHandlerInterface`</li>  |
| **Return type** |  not defined  |

### Shop Queries

#### GetLogosPaths {id="GetLogosPaths"}

`PrestaShop\PrestaShop\Core\Domain\Shop\Query\GetLogosPaths`
_Query responsible for getting header, email, invoice and favicon logos paths_

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul></ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Shop\QueryHandler\GetLogosPathsHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Shop\QueryHandler\GetLogosPathsHandlerInterface`</li>  |
| **Return type** |  LogosPaths  |
