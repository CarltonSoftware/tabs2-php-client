<?php

$file = dirname(__FILE__)
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . 'tests'
    . DIRECTORY_SEPARATOR . 'client'
    . DIRECTORY_SEPARATOR . 'ApiClientClassTest.php';
require_once $file;

class DocumentClassTest extends ApiClientClassTest
{
    /**
     * Test a document object
     * 
     * @return void
     */
    public function testDocument()
    {
        $document = Fixtures::getDocument();
        $this->assertEquals(1, $document->getId());
        $this->assertEquals('somepdf', $document->getName());
        $this->assertEquals('somepdf.pdf', $document->getFilename());
        $this->assertEquals('A pdf file', $document->getDescription());
        $this->assertInstanceOf('DateTime', $document->getTimeadded());
        
        // Test update route
        $this->assertEquals('/document/1', $document->getUpdateUrl());
        
        // Test update data
        $this->assertArrayHasKey('id', $document->toArray());
        $this->assertArrayHasKey('name', $document->toArray());
        $this->assertArrayHasKey('description', $document->toArray());
        $this->assertArrayHasKey('weight', $document->toArray());
        $this->assertArrayHasKey('private', $document->toArray());
        
        // Test image urls
        $this->assertEquals(
            'http://httpbin.org/file//width/50/0',
            $document->getThumbnailUrl()
        );
        $this->assertEquals(
             '<img src="http://httpbin.org/file//width/50/0" alt="somepdf.pdf" title="A pdf file">',
             $document->getThumbnailSrc()
        );
        $this->assertEquals(
             '<img src="http://httpbin.org/file//width/0/0" alt="somepdf.pdf" title="A pdf file">',
             $document->getImageSrc('width')
        );

        // Test mimetype
        $this->assertEquals(1, $document->getMimetype()->getId());
        $this->assertEquals('application/pdf', $document->getMimetype()->getName());
        $this->assertEquals('pdf', $document->getMimetype()->getShortname());
        $this->assertArrayHasKey('id', $document->getMimetype()->toArray());
        $this->assertArrayHasKey('name', $document->getMimetype()->toArray());
        $this->assertArrayHasKey('shortname', $document->getMimetype()->toArray());
    }
    
    /**
     * Test actor documents
     * 
     * @return void
     */
    public function testActorDocuments()
    {
        $customer = Fixtures::getCustomer();
        
        $this->assertEquals(1, $customer->getDocuments()->getTotal());
        
        $this->assertEquals(
            '\tabs\apiclient\actor\Document',
            $customer->getDocuments()->getElementClass()
        );
        
        $this->assertEquals(
            '/customer/1/document',
            $customer->getDocuments()->getRoute()
        );
        
        foreach ($customer->getDocuments()->toArray() as $doc) {
            $this->assertEquals(
                '/customer/' . $doc->getParent()->getId() . '/document/' . $doc->getId(),
                $doc->getUpdateUrl()
            );
            
            $this->assertTrue(is_array($doc->toArray()));
            $this->assertArrayHasKey('documentid', $doc->toArray());
            $this->assertEquals('1', $doc->toArray()['documentid']);
        }
    }
    
    /**
     * Test the document collection
     * 
     * @return void
     */
    public function testDocumentCollection()
    {
        $docCol = new tabs\apiclient\collection\core\Document();
        
        $this->assertTrue(is_array($docCol->getElements()));
        
        $this->assertEquals(
            '\tabs\apiclient\core\Document',
            $docCol->getElementClass()
        );
        
        $this->assertEquals(
            'document',
            $docCol->getRoute()
        );
    }
}
