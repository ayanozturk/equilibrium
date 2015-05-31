Equilibrium Calculator
=======================

Introduction
------------
Equilibrium Array calculation as a Zend controller plugin.
You may ask why you need whole Zend Framework installed to get result
of a simple calculation. The answer is you don't.

Installation
------------

Using Composer (recommended)
----------------------------
The recommended way to get a working copy of this project is to clone
the repository and manually invoke `composer` using the shipped
`composer.phar`:

    cd my/project/dir
    git clone git://github.com/ayanozturk/equilibrium.git
    cd equilibrium
    php composer.phar self-update
    php composer.phar install

(The `self-update` directive is to ensure you have an up-to-date `composer.phar`
available.)

Web Server Setup
----------------

### Apache Setup

To setup apache, setup a virtual host to point to the public/ directory of the
project and you should be ready to go! It should look something like below:

    <VirtualHost *:80>
        ServerName equilibrium.local
        DocumentRoot /path/to/equilibrium/public
        SetEnv APPLICATION_ENV "development"
        <Directory /path/to/equilibrium/public>
            DirectoryIndex index.php
            AllowOverride All
            Order allow,deny
            Allow from all
        </Directory>
    </VirtualHost>
