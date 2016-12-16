<?php

$file = dirname(__FILE__)
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . 'tests'
    . DIRECTORY_SEPARATOR . 'client'
    . DIRECTORY_SEPARATOR . 'ApiClientClassTest.php';
require_once $file;

class PaginationTest extends ApiClientClassTest
{
    public function testPagination()
    {
        $pagination = new \tabs\apiclient\Pagination();
        $pagination->setTotal(150);
        
        $this->assertEquals('Pagination', $pagination->getClass());
        $this->assertEquals(150, $pagination->getTotal());
        $this->assertEquals(15, $pagination->getMaxPages());
        $this->assertEquals(5, count($pagination->getRange()));
        $this->assertEquals('page=1&limit=10', $pagination->getRequestQuery());
        $this->assertEquals(1, $pagination->getStart());
        $this->assertEquals(10, $pagination->getEnd());
        $this->assertEquals(1, $pagination->getPrevPage());
        $this->assertEquals(2, $pagination->getNextPage());
        
        $pagination->setPage(3)->setLimit(20)->setFilters(
            array('foo' => 'bar', 'doe' => 'ray')
        );
        $this->assertEquals(
            'page=3&limit=20&filter=foo%3Dbar%3Adoe%3Dray',
            $pagination->getRequestQuery()
        );
        $this->assertEquals(3, $pagination->getPage());
        $this->assertEquals(8, $pagination->getMaxPages());
        $this->assertEquals(41, $pagination->getStart());
        $this->assertEquals(60, $pagination->getEnd());
        $this->assertEquals(2, $pagination->getPrevPage());
        $this->assertEquals(4, $pagination->getNextPage());
    }
    
    public function testPaginationLimits()
    {
        $pagination = new \tabs\apiclient\Pagination();
        $pagination->setTotal(150);
        
        $pagination->setLimit(200);
        $this->assertEquals(150, $pagination->getEnd());
        $this->assertEquals(1, count($pagination->getRange()));
        
        $pagination->setLimit(10);
        $this->assertEquals(15, count($pagination->getRange(100)));
        
        $pagination->setPage(1000);
        $this->assertEquals(1, $pagination->getNextPage());
        
        $pagination->setPage(1);
        $this->assertEquals(9, count($pagination->getRange(9)));
    }
}
