<?php

$file = dirname(__FILE__)
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . 'tests'
    . DIRECTORY_SEPARATOR . 'client'
    . DIRECTORY_SEPARATOR . 'ApiClientClassTest.php';
require_once $file;

class ObjectNavTest extends ApiClientClassTest
{
    /**
     * @dataProvider objectNavProvider
     */
    public function testObjectNav($steps, $expectedValue)
    {
        $propertyJson = Fixtures::getJsonData('property.json');

        $this->assertEquals(
            \tabs\apiclient\ObjectNavigator::navigate($steps, $propertyJson),
            $expectedValue
        );
    }

    /**
     * @return array
     */
    public function objectNavProvider()
    {
        return [
            [
                [
                    'address',
                    'town'
                ],
                'Little Langdale'
            ],
            [
                [
                    'brandings',
                    1,
                    'status',
                    'name'
                ],
                'Live'
            ]
        ];
    }
}
