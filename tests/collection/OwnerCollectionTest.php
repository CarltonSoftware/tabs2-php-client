<?php

$file = dirname(__FILE__)
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . 'tests'
    . DIRECTORY_SEPARATOR . 'client'
    . DIRECTORY_SEPARATOR . 'ApiClientClassTest.php';
require_once $file;

class OwnerCollectionTest extends ApiClientClassTest
{
    /**
     * Test the Collection class, using the Owner collection as an example.
     *
     * @return void
     */
    public function testCollection()
    {
        $collection = Fixtures::getOwnerCollection();

        $collection->setElements(
            array(
                Fixtures::getOwner(),
                Fixtures::getOwner(),
                Fixtures::getOwner(),
                Fixtures::getOwner(),
                Fixtures::getOwner(),
                Fixtures::getOwner(),
            )
        );

        $this->assertCount(6, $collection->getElements());
        $this->assertEquals('owner', $collection->getRoute());
        $this->assertEquals('\tabs\apiclient\actor\Owner', $collection->getElementClass());

        $collection->setPage(30);
        $this->assertEquals(30, $collection->getPagination()->getPage());

        $collection->setFilters(
            array(
                'rolls' => 'royce',
                'black' => 'white'
            )
        );
        $this->assertEquals(
            'page=30&limit=10&filter=rolls%3Droyce%3Ablack%3Dwhite',
            $collection->getPagination()->getRequestQuery()
        );

        $this->assertFalse($collection->discriminator());
        $this->assertEmpty($collection->discriminatorMap());

        $this->assertEquals(0, $collection->key());
        $collection->next();
        $this->assertEquals(1, $collection->key());
        $collection->next();
        $this->assertEquals(2, $collection->key());
        $collection->rewind();
        $this->assertEquals(0, $collection->key());

        // The current item should be valid
        $this->assertTrue($collection->valid());
    }
}