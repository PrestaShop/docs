---
title: Optimize your webserver
menuTitle: Optimize your webserver
weight: 1
showOnHomepage: true
---

# Optimize your webserver

We often talk about optimizing the application side but less about the webserver.

Which is a shame as there is a lot to gain from some simple configurations parameters. You do not need to have hundred of visitors for them to be efficient, either to reduce your server's load or speed up your visitor's browsing.

As we will see, the configuration options presented here are quite easy and should allow some nice improvements.

# Webserver's function

You may already be aware of, a [webserver](https://en.wikipedia.org/wiki/Web_server) is a piece of software dedicated to satisfy world wide web requests.

It usually works through the http (and https) protocol and delivers web pages to the clients (your web browser). 

{{< figure src="../img/architecture.png" title="webserver's function" >}}

An interesting point to mention is that, php being compiled server side, it often is the webserver's job to manage this task before sending html to the web browser.

## Testing your optimizations

There are plenty of ways to validate the gains of those improvements but a very simple one is to go check any page speed website.

It will point the required changes and as you will see, most of them will be straightforward to implement.

We don't really want to influence you should find the tool you need with a [simple google search](https://www.google.com/search?q=page+speed).

{{% notice tip %}}
As usual, the surest way to tune your shop is:

- benchmark
- make a change
- repeat
{{% /notice %}}

### Webservers

We will show you the different ways to implement those options for both [Nginx](https://www.nginx.com/) and [Apache httpd](https://httpd.apache.org/docs/2.4/programs/httpd.html), the two most popular and widespread webservers.

But before we go on, just a few words about them.
Don't worry, it won't be long before reaching the crunchy part.

#### Nginx

It is often said that nginx is faster than httpd, which is not entirely true. Nginx uses an asynchronous mechanism which is very efficient to sustain heavy loads and static assets (such as pictures and scripts) but slightly increases response time for dynamic content (such as, you know php).

If you want to know more about configuring [nginx for PrestaShop](../webservers/nginx/).


#### Apache httpd

Apache's httpd is the usual suspect and the most popular webserver of alls.

Contrary to nginx, it uses threads that directly serves the contents, being locked during the process.

Which means that if the server receives more calls than available threads it won't be able to answer - hence the reputation of being able to handle less traffic than nginx.

If you want to know more about configuring [httpd for PrestaShop](../webservers/httpd/).
