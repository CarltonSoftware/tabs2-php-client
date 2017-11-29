<?php

if (tabs\apiclient\client\Client::getClient()->getMiddleware()
    && tabs\apiclient\client\Client::getClient()->getMiddleware()->getAccessToken()
    && !isset($_SESSION['AccessToken'])
) {
    $_SESSION['AccessToken'] = tabs\apiclient\client\Client::getClient()->getMiddleware()->getAccessToken();
}

if (!empty($container)) {
    echo '<ul>';
    foreach ($container as $transaction) {
        echo '<li>' .  $transaction['request']->getUri() . '</li>';
    }
    echo '</ul>';
}