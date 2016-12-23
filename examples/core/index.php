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
        'AttributeGroup',
        'Attribute',
        'Brochure',
        'Extra',
        'Account',
        'AccountingDateDefinition',
        'AccountingPeriod',
        'AccountValueType',
        'BrandSource',
        'BookingBrand',
        'MarketingBrand',
        'BrandingGroup',
        'Branding',
        'Country',
        'DescriptionType',
        'Grouping',
        'InstructionType',
        'Language',
        'PriceType',
        'Currency',
        'Encoding',
        'Mimetype',
        'ManagedActivity',
        'SalesChannel',
        'SourceCategory',
        'Source',
        'Unit',
        'Vatrate',
        'Vatband',
        'WebsiteSection'
    );
    
    foreach ($lists as $list) {
        
        if ($list == 'Attribute') {
            $collection = \tabs\apiclient\Collection::factory(
                'attribute',
                new \tabs\apiclient\AttributeBoolean
            );
            $collection->setDiscriminator('type')
                ->setDiscriminatorMap(
                    array(
                        'Boolean' => new \tabs\apiclient\AttributeBoolean,
                        'Hybrid' => new \tabs\apiclient\AttributeHybrid,
                        'String' => new \tabs\apiclient\AttributeString,
                        'Number' => new \tabs\apiclient\AttributeNumber
                    )
                );
            
        } else {
            $ns = "\\tabs\\apiclient\\$list";
            $obj = new $ns;
            $collection = \tabs\apiclient\Collection::factory(
                $obj->getCreateUrl(),
                $obj
            );
        }
        
        $collection->fetch();

        include __DIR__ . '/../collection.php';
    }   
} catch(Exception $e) {
    echo $e->getMessage();
}

require_once __DIR__ . '/../finally.php';