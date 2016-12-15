<?php

/**
 * This file documents how to request a lists of information from the utility
 * endpoint in the Plato API.
 *
 * PHP Version 5.5
 * 
 * @category  API_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://www.carltonsoftware.co.uk
 */

// Include the connection
require_once __DIR__ . '/../creating-a-new-connection.php';

try {
    
    $lists = array(
        'brochure\Brochure',
        'accounts\Account',
        'accounts\AccountingDateDefinition',
        'accounts\AccountingPeriod',
        'accounts\AccountValueType',
        'accounts\BrandSource',
        'branding\BookingBrand',
        'branding\MarketingBrand',
        'branding\BrandingGroup',
        'branding\Branding',
        'core\Country',
        'core\Language',
        'core\Currency',
        'core\Encoding',
        'core\Mimetype',
        'core\SalesChannel',
        'core\SourceCategory',
        'core\Source',
        'core\Unit',
        'core\Vatrate',
        'core\Vatband',
        'core\WebsiteSection'
    );
    
    foreach ($lists as $list) {
        $ns = "\\tabs\\apiclient\\$list";
        $obj = new $ns;
        $collection = \tabs\apiclient\Collection::factory(
            $obj->getCreateUrl(),
            $obj
        );
        $collection->fetch();

        include __DIR__ . '/../collection.php';
    }   
} catch(Exception $e) {
    echo $e->getMessage();
}

require_once __DIR__ . '/../finally.php';