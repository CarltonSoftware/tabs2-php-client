# Subscribing to a webhook

This file documents how subscribe to a web hook. 

For demonstration purposes we are roughly calculating base url of the file.

```php

$public_endpoint_url = getBaseUrl() . 'webhook-endpoint.php';

try {
    // Subscribe to all notifications about bookings.  Additional groups are
    // property, actor and admin.
    \tabs\apiclient\WebHook::subscribe($public_endpoint_url, 'booking');
} catch (Exception $ex) {
    echo $ex->getMessage();
}

```