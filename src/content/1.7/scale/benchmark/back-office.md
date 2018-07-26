---
title: Back-Office Benchmark
weight: 3
aliases:
  - /1.7/benchmark/back_office
  - /1.7/benchmark/back-office
---

How to benchmark your PrestaShop Shop (Back-office)
==================

## Benchmark methodology
In order to benchmark the performances of the backoffice of your shop, you will use the **[Gatling](https://gatling.io/)** testing tool.

><b>Note:
>Backoffice benchmark is only possible starting with prestashop 1.7.4.0!</b>

>If you want still want to run the test for version < 1.7.4.0, take a look at this PR: https://github.com/PrestaShop/PrestaShop/pull/8876

## What is Gatling?
**[Gatling](https://gatling.io/)** is a stress tool. Development is currently focusing on HTTP support. We won’t explain here the fondamentals of Gatling but for more details I suggest you to have a look at **[the Gatling project](https://github.com/gatling/gatling)**.
Download Gatling **[here](https://gatling.io/download/)**, and in the same way have a look at **[the Gatling quickstart page](https://gatling.io/docs/current/quickstart/)**.

Once unzipping the folder look like below:


![Gatling](https://i.imgur.com/devRwHF.png)

## Your Gatling is ready to be run
Now let's test if our Gatling works well, so you can launch a sample test included natively in the project with the CLI:

```
➜  ./bin/gatling.sh 
```

And choose the simulation you want to run

![Gatling](https://i.imgur.com/HQ5eCfZ.png)

In my example I run "[1] basic.BasicExempleSimulation"
![Gatling](https://i.imgur.com/nJdOPsB.png)

##### Well done! Our Gatling installation is ready!
After few minutes you can consult the detailed report generated automatically into "results" folder.

## Insert and setup your script

Download the script "[parcoursbackoffice.scala](../parcoursbackoffice.scala)" and put it under "/gatling/user-files/simulations".

Open with your editor the parcoursbackoffice.scala file and setup your script:


* **URL:**
![Gatling](https://i.imgur.com/1Zd3iVK.png)
* **EMAIL:**
![Gatling](https://i.imgur.com/8buaWku.png)
* **PASSWORD:**
![Gatling](https://i.imgur.com/zRMVSiW.png)


## Disable the token

To avoid handling the multiple generated token on each back-office page, you can just disable it by following the steps below:

Setup environnement **_TOKEN_** variable to "disabled" allows you to disable token in urls for Symfony pages and in legacy pages.
If you want to test it you need to setup environment variable (SetEnv _TOKEN_ disabled in apache vhost configuration file) and check that Symfony pages (Product, Module, ...) urls doesn't contains _token anymore and legacy pages shouldn't contains token parameter.

For example if you site is setup in
/etc/apache2/sites-enabled/000-default.conf

add the value  **«SetEnv _TOKEN_ disabled»** before **< /VirtualHost >**

>Note:
>don't forget to restart your apache service!
>Now the token are disabled on your PrestaShop site Back-office, this mean that everyone who can log-in your Back-office could access to anypage from the url page.
>That why we recommend you to run the benchmark on a website only dedicated to test.
>If this is not the case, don't forget to restore it when you finish your performance test.

##### Congratulations your performance testing script is ready to be run!
#### Don't forget to improve and share this Gatling script
   
