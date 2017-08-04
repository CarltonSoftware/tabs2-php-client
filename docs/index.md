# Introduction
The tabs2 php client is a library which helps you connect to your tabs2 api.

See the README.md on how to install this php client via composer.

Once installed you should be able to load tabs2 api data using the following snippet.

    ```
    $prop = new \tabs\apiclient\Property(1);
    $prop->get();

    echo $prop->getName();
    ```
