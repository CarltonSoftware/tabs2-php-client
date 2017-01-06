Tabs2 PHP API Client
===========

## Getting Started
To get started with this project you will need to install the client via composer..

### Installing via composer
1. Create a composer.json where you want to install the project
2. Add the following:

    ```
    {
	    "repositories": [{
          "type": "vcs",
          "url": "git@github.com:CarltonSoftware/tabs-api-client.git"
        }],
	    "require": {
          "carltonsoftware/tabs-api-client": "dev-master"	
	    }
    }
    ```

3. Download composer and install the repo:

    ```
    curl -sS https://getcomposer.org/installer | php
    ./composer.phar install
    ```
    
4. Create a new php file in your directory and insert the following code.  You should see the a property output when you compile the file!

    ```php
    <?php

    require_once __DIR__ . '/vendor/autoload.php';

    \tabs\apiclient\client\Client::factory(
        'https://apiurl', // Api Url: this will be provided to you
        'abc', // Api username: this will be provided to you
        'def', // Api password: this will be provided to you
        'hij', // Api client id: this will be provided to you
        'klm'  // Api client sercret: this will be provided to you
    );

    $prop = new \tabs\apiclient\Property(1);
    $prop->get();

    echo $prop->getName();
    ```
