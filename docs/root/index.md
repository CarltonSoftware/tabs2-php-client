# Getting the root endpoint
This file documents how to read the root endpoint.

```php

try {
    $root = tabs\apiclient\Root::fetch();

    var_dump($root);

} catch(Exception $e) {
    echo $e->getMessage();
}

```
