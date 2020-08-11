<?php

/**
 * @name Accessing core data
 *
 * Much of the data in tabs2 has dependencies on common data such as Branding, Booking Brand or Mimetype for example.
 */

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
    'DocumentTag',
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
    'PotentialBookingType',
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