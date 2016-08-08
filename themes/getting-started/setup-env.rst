Having a local [**LAMP**](https://en.wikipedia.org/wiki/LAMP_(software_bundle) "More on LAMP servers from Wikipedia") environment is the essential first step in the path of web development. LAMP is an archetypal model of web service solution stacks, named as an acronym of the names of its original four open-source components: the Linux operating system, the Apache HTTP Server, the MySQL relational database management system (RDBMS), and the PHP programming language. The LAMP components are largely interchangeable and not limited to the original selection. As a solution stack, LAMP is suitable for building dynamic web sites and web applications.

Installing PrestaShop
=====================

We recommend you to install PrestaShop using [**Composer**](https://getcomposer.org/) and [**NPM**](https://www.npmjs.com/"Node Package Manager") tools.
For this, you must [download]( https://getcomposer.org/download/) Composer  and [download](https://nodejs.org/en/download/) **Node.js**.  More on the installation at https://docs.npmjs.com/getting-started/installing-node.

Then, open a command line on your (empty) working directory, then:

1. git clone https://github.com/PrestaShop/PrestaShop.git
2. composer install
3. npm install

Building your .gitignore file
=============================

A gitignore file is a must-have for any Git-versioned project, as it specifies intentionally untracked files that Git should ignore.

What to ignore


Generally, you shouldn’t version the following types of files:

* Temporary files (such as cache files)
* Generated files (such as minified CSS or retrieved XML files)
* Files with credentials or personal information (such as ``settings.inc.php``)

In addition, we recommend to keep Core files in your versioning system.

Our own .gitignore file is here: https://github.com/PrestaShop/PrestaShop/blob/develop/.gitignore

We suggest that you build your own using http://gitignore.io/ 

Create your theme from the Starter Theme
========================================

Download the Starter Theme, or clone its repo (https://github.com/PrestaShop/StarterTheme.git)

Create your theme.yml file

First of all, you need to rename ``config/theme.dist.yml`` to ``config/theme.yml`` and edit it according to your theme's name.
    
      name: YOUR_THEME_DIRECTORY_NAME
      display_name: YOUR THEME NAME
      version: 1.0.0
      author:
      name: "PrestaShop Team"
      email: "pub@prestashop.com"
      url: "http://www.prestashop.com"
      
      meta:
    compatibility:
    from: 1.7.0.0
    to: ~

Manage your assets


The Starter Theme contains the development files in the _dev folder. Install the dependencies using npm: ``cd _dev + npm install``.

Now the dependencies are installed and correctly set up, you can customise theses files.

If you need to add image files, you can create and /img folder in the /_dev folder.

Since stylesheets and JavaScript files are compiled and minified, you should use npm to build new version of theses files after your modifications: it will check for any file change, and will update the production version used by PrestaShop (localized in your assets folder).

To watch your file changes with npm, type this: ``npm run watch``.

Note: You should probably start by removing all existing styles.
