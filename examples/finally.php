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
        echo '<li>' .  urldecode($transaction['request']->getUri()) . '</li>';
    }
    echo '</ul>';
}