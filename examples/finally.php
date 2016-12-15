<?php

if (!empty($container)) {
    echo '<ul>';
    foreach ($container as $transaction) {
        echo '<li>' .  $transaction['request']->getUri() . '</li>';
    }
    echo '</ul>';
}