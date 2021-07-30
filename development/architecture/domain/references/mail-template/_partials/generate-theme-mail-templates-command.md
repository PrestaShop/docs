`PrestaShop\PrestaShop\Core\Domain\MailTemplate\Command\GenerateThemeMailTemplatesCommand`
_Class GenerateThemeMailsCommand generates email theme&#039;s templates for a specific language. If folders are not overridden in the command then MailTemplateGenerator will use the default output folders (in mails folder)._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$string $themeName`</li>  <li>`$string $language`</li>  <li>`$?bool $overwriteTemplates = false`</li>  <li>`$?string $coreMailsFolder = &#039;&#039;`</li>  <li>`$?string $modulesMailFolder = &#039;&#039;`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Core\Domain\MailTemplate\CommandHandler\GenerateThemeMailTemplatesCommandHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\MailTemplate\CommandHandler\GenerateThemeMailTemplatesCommandHandlerInterface`</li>  |
| **Return type** |  `void`  |
