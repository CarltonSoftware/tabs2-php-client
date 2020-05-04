<?php

if (tabs\apiclient\client\Client::getClient()->getMiddleware()
    && tabs\apiclient\client\Client::getClient()->getMiddleware()->getAccessToken()
    && !isset($_SESSION['AccessToken']) || (is_array($_SESSION['AccessToken']) && !isset($_SESSION['AccessToken'][TABS2APIURL]))
) {
    if (!isset($_SESSION['AccessToken'])) {
        $_SESSION['AccessToken'] = array();
    }
    $_SESSION['AccessToken'][TABS2APIURL] = tabs\apiclient\client\Client::getClient()->getMiddleware()->getAccessToken();
}

if (!empty($container)) {
    echo '<ul>';
    foreach ($container as $transaction) {
        switch ($transaction['request']->getMethod()) {
            default:
                echo sprintf(
                    '<li>%s %s</li>',
                    $transaction['request']->getMethod(),
                    urldecode($transaction['request']->getUri())
                );
        }
    }
    echo '</ul>';
}
