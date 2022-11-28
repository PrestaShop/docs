---
title: Pricing FAQ
---

# Pricing FAQ

- [Refresh exchange rates](#refresh-exchange-rates)

## Refresh exchange rates

**Q:** How can I make sure my currency exchange rates are regularly updated?

**A:** In PrestaShop, all currencies is associated with the exchange rate for Euro.

These exchange rates are updated every day (at 2:00AM) by authorities in charge of these currencies. The API used to get those rates is [https://fixer.io/](https://fixer.io/)

The PrestaShop company gathers these rates and expose them through API endpoint https://api.prestashop.com/xml/currencies.xml (URL available in the code through constant `_PS_CURRENCY_FEED_URL_`).

Function `Currency::refreshCurrencies()` is able to fetch these rates and update a shop currency data. In order to update currency exchange rates regularly, you need to setup an automatic task that execute `Currency::refreshCurrencies()` regularly.

To help you do so, a script `cron_currency_rates.php` exists in your `admin` directory.

### Build the URL to call the script

This script can be triggered by a webserver if you hit the right URL. The `admin` directory is different for every shop so you need to use your own `admin` folder name.

You also need to provide an authentication `secure_key`.

In order to obtain this secure key, you need 2 items:
- the `_COOKIE_KEY_` of your shop that you can find in `app/config/parameters.php`
- your shop name

The secure key is computed like this:

```php
$secureKey = md5(_COOKIE_KEY_ . Configuration::get('PS_SHOP_NAME'));
```

Assuming your admin directory is, for example, `admin_9282`, the URL you need to call will then be `myshop.com/admin_9282/cron_currency_rates.php?secure_key={my_secure_key}`

### Call the URL

By sending an HTTP request to the URL computed above, if received by a webserver, you will trigger the currency rate exchange. You now need to setup an automatic task that send HTTP requests regularly.

A popular way to do it is to rely on a [crontab][crontab]. Most hosting providers allow you to configure one.

Provided your hosting provider allows you to configure cron jobs, you need to add an entry for a cron job to regularly call the needed URL. [This tool][cron-doc] can help you to write the statement you want.

Example of such a cronjob:

```
0 6 * * * curl "https://myshop.com/admin_9282/cron_currency_rates.php?secure_key={my_secure_key}"
```

[crontab]: https://en.wikipedia.org/wiki/Cron
[cron-doc]: https://crontab.guru
