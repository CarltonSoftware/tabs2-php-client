<?php

/**
 * @name Getting voucher data
 *
 * This file documents how to get information on vouchers.
 */

require_once __DIR__ . '/../creating-a-new-connection.php';

try {
    if ($id = filter_input(INPUT_GET, 'id')) {
        $voucher = new \tabs\apiclient\Voucher($id);
        $voucher->get();
?>
    <h4>Voucher <?php echo $voucher->getId(); ?></h4>
    <p>Currency: <?php echo $voucher->getCurrency()->getCode(); ?></p>
    <p>Value: <?php echo $voucher->getValue(); ?></p>
    <p>Financial entity: <?php echo $voucher->getFinancialentity()->getName(); ?></p>
<?php
    } else {
        $collection = \tabs\apiclient\Collection::factory(
        'voucher',
        new \tabs\apiclient\Voucher()
    );
        $collection->fetch();

        include __DIR__.'/../collection.php';
    }
} catch(Exception $e) {
    echo $e->getMessage();
}

require_once __DIR__ . '/../finally.php';