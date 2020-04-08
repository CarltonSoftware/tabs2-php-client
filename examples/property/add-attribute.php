<?php

/**
 * @name Adding a attribute to a property
 *
 */

require_once __DIR__ . '/../creating-a-new-connection.php';

try {
if ($id = filter_input(INPUT_GET, 'id')) {
    $attributecode = filter_input(INPUT_GET, 'code');
    if (!$attributecode) {
        $attributecode = 'ATTR02'; // Character prop as example
    }

    // Get attribute from the collection
    $attributes = \tabs\apiclient\Collection::factory(
        'attribute',
        new \tabs\apiclient\AttributeBoolean
    );
    $attributes->setDiscriminator(
        'type'
    )->setDiscriminatorMap(
        array(
            'Boolean' => new \tabs\apiclient\AttributeBoolean,
            'Hybrid' => new \tabs\apiclient\AttributeHybrid,
            'String' => new \tabs\apiclient\AttributeString,
            'Number' => new \tabs\apiclient\AttributeNumber
        )
    )->fetch();

    $attribute = $attributes->filter(function($a) use($attributecode) {
        return $a->getCode() === $attributecode;
    })->first();

    if (!$attribute) {
        throw new \RuntimeException('Attribute not found');
    }

    $property = new \tabs\apiclient\Property($id);
    $property->get();

    // Get a list of attributes on the property
    $propertyAttributes = $property->getAttributes();

    // Check attribute exists by its code
    $pattr = $propertyAttributes->filter(function($pa) use($attribute) {
        return $pa->getAttribute()->getCode() === $attribute->getCode();
    })->first();

    if (!$pattr) {
        $pattr = new \tabs\apiclient\property\Attribute();
        $pattr->setAttribute($attribute);
        $propertyAttributes->addElement($pattr);
    }

    // Set the attribute comment to know users what we're doing!
    $pattr->setComments('Updated by tabs api client example code');

    if ($attribute->getType() === 'Number') {
        $pattr->setValue(0);
    } else if ($attribute->getType() === 'Boolean') {
        $pattr->setValue(true);
    } else if ($attribute->getType() === 'Hybrid') {
        $pattr->setValue(['value' => 'test', 'boolean' => true]);
    } else {
        $pattr->setValue('test');
    }

    $id = $pattr->getId();
    if ($id) {
        $pattr->update();
        echo 'Attribute updated!';
    } else {
        $pattr->create();
        echo 'Attribute created!';
    }

}
} catch(Exception $e) {
    echo $e->getMessage();
}

require_once __DIR__ . '/../finally.php';