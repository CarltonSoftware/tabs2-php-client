# Introduction
The tabs2 php client is a library which helps you connect to your tabs2 api.

See the [README.md](https://github.com/CarltonSoftware/tabs2-php-client/blob/develop/README.md) on how to install this php client via composer.

Once installed you should be able to load tabs2 api data using the following snippet.

For more examples, please see the [site map](sitemap.html).

```php

try {
    $prop = new \tabs\apiclient\Property(1);
    $prop->get();
    echo $prop->getName();
} catch (\RuntimeException $ex) {
    echo $ex->getMessage();
}

```

* [Read/Write Property data](property)
* [Read/Write Actor data](actor)
* [Read/Write Booking data](booking)
* [Accessing common data](core)
* [Accessing data from the root endpoint](root)
* [Accessing special offer data](specialoffer)
* [Site Map](sitemap.html)
