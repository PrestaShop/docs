---
title: ShowcaseCard domain
---

## ShowcaseCard domain

### ShowcaseCard Commands

#### CloseShowcaseCardCommand {id="CloseShowcaseCardCommand"}

`PrestaShop\PrestaShop\Core\Domain\ShowcaseCard\Command\CloseShowcaseCardCommand`
_This command permanently closes a showcase card_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$employeeId`</li>  <li>`$showcaseCardName`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Core\Domain\ShowcaseCard\CommandHandler\CloseShowcaseCardHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\ShowcaseCard\CommandHandler\CloseShowcaseCardHandlerInterface`</li>  |
| **Return type** |  not defined  |

### ShowcaseCard Queries

#### GetShowcaseCardIsClosed {id="GetShowcaseCardIsClosed"}

`PrestaShop\PrestaShop\Core\Domain\ShowcaseCard\Query\GetShowcaseCardIsClosed`
_This query retrieves the &quot;closed status&quot; of a showcase card_

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$employeeId`</li>  <li>`$showcaseCardName`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Core\Domain\ShowcaseCard\QueryHandler\GetShowcaseCardIsClosedHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\ShowcaseCard\QueryHandler\GetShowcaseCardIsClosedHandlerInterface`</li>  |
| **Return type** |  bool True if the showcase card is closed, False otherwise  |
