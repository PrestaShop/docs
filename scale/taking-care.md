---
title: Taking care of your PrestaShop
showOnHomepage: true
---

# Taking care of your PrestaShop

As your shop lives, some items of PrestaShop can grow very big in time. If you notice your shop is getting slow the following list of items can be analyzed to see if you can clean it.

## Database cleaning

Some SQL tables of PrestaShop can grow very big in time. Some of the data being stored there is sometimes not relevant anymore or not needed anymore.

### Logs table

You can regularly clean your _log_ database table from old logs.

### Connections table

You can regularly clean your _connections_ database tables from old connection entries.

### Guest table

You can regularly clean your _guest_ database tables from old guest entries.

### Configuration table

The _configuration_ database table can grow as you install more and more modules and a lot of them do store data inside it. Some of them do remove this data when they are being uninstalled and other do not. This can result in a _configuration_ database table quite big and that can be cleaned up.

Note that _configuration_ table content is being loaded _for every request_ PrestaShop handles so it can really slow your shop down.
