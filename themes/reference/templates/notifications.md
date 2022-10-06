---
title: Notifications
weight: 30
---

# Notifications

Throughout the whole front office, the customer can receive notification messages
from PrestaShop, to inform about successes or errors for instance.
Your theme can also send notifications when certain events occur.

The notification messages are not hard-coded in the template files, but are sent
from the controller, so that you have consistency in case you update/change your theme.
Thus, this way there is a better chance that all notification messages are already
translated into your language!


## Types of notifications

An array of notification is passed to the templates, containing at least one of these:

**success**
: An action was performed and everything went well.

**error**
: Something went wrong.

**warning**
: Important notice the merchant should know about.

**info**
: "just so you know".

## How to display notifications

In the "Classic" Theme, [notifications are implemented as a partial template file](https://github.com/PrestaShop/classic-theme/blob/2.0.1/templates/_partials/notifications.tpl):

```smarty
<aside id="notifications">

  {if $notifications.error}
    {block name='notifications_error'}
      <article class="notification notification-danger" role="alert" data-alert="danger">
        <ul>
          {foreach $notifications.error as $notif}
            <li>{$notif nofilter}</li>
          {/foreach}
        </ul>
      </article>
    {/block}
  {/if}

  {if $notifications.warning}
    {block name='notifications_warning'}
      <article class="notification notification-warning" role="alert" data-alert="warning">
        <ul>
          {foreach $notifications.warning as $notif}
            <li>{$notif nofilter}</li>
          {/foreach}
        </ul>
      </article>
    {/block}
  {/if}

  {if $notifications.success}
    {block name='notifications_success'}
      <article class="notification notification-success" role="alert" data-alert="success">
        <ul>
          {foreach $notifications.success as $notif}
            <li>{$notif nofilter}</li>
          {/foreach}
        </ul>
      </article>
    {/block}
  {/if}

  {if $notifications.info}
    {block name='notifications_info'}
      <article class="notification notification-info" role="alert" data-alert="info">
        <ul>
          {foreach $notifications.info as $notif}
            <li>{$notif nofilter}</li>
          {/foreach}
        </ul>
      </article>
    {/block}
  {/if}

</aside>
```

...and are then [included in the template file](https://github.com/PrestaShop/classic-theme/blob/2.0.1/templates/customer/page.tpl#L32-L34):

```smarty
{block name='notifications'}
  {include file='_partials/notifications.tpl'}
{/block}
```

## Add your own message in your front controller

Your front controller holds [the 4 following variables](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/controller/FrontController.php#L637-L640):

* ``$this->errors``
* ``$this->success``
* ``$this->warning``
* ``$this->info``

They are PHP arrays, and they hold messages as a string.

Here is how you can [redirect the customer AND display a message after an action](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/controller/FrontController.php#L634-L653):

```php
$this->success[] = $this->l('Information successfully updated.');
$this->redirectWithNotifications($this->getCurrentURL());
```
