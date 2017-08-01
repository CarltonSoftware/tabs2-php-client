<?php

/**
 * This file documents how to add a customer to a Booking object
 *
 * PHP Version 5.5
 * 
 * @category  API_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2013 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://www.carltonsoftware.co.uk
 */

// Include the connection
require_once __DIR__ . '/../creating-a-new-connection.php';

try {
    if ($id = filter_input(INPUT_GET, 'id')) {
        $b = new tabs\apiclient\Booking($id);
        $b->get();
        
        $bc = new tabs\apiclient\booking\Customer();
        $bc->setParent($b);
        
        $customers = tabs\apiclient\Collection::factory(
            'customer',
            new \tabs\apiclient\Customer()
        );
        $customers->getPagination()->addFilter('email', 'a.wyett@tocc.co.uk');
        $customers->fetch();
        if ($customers->getTotal() > 0) {
            $customer = $customers->first();
            $bc->setCustomer($customer);
        }
        
        $bc->create();
        
        if ($b->getPotentialbooking()) {
            $b->getPotentialbooking()->setType('BookingInProgress');
            $b->update();
        }
        
        header('Location: index.php?id=' . $b->getId());
        exit();
    }

} catch(Exception $e) {
    echo $e->getMessage();
}

require_once __DIR__ . '/../finally.php';