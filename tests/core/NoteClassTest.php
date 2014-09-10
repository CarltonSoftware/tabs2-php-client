<?php

$file = dirname(__FILE__)
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . 'tests'
    . DIRECTORY_SEPARATOR . 'client'
    . DIRECTORY_SEPARATOR . 'ApiClientClassTest.php';
require_once $file;

class NoteClassTest extends ApiClientClassTest
{
    /**
     * Test note accessors
     * 
     * @return void
     */
    public function testNote()
    {
        $note = Fixtures::getNote();
        
        $this->assertEquals('2014-08-09 12:34:56', $note->getCreated()->format('Y-m-d H:i:s'));
        $this->assertEquals('Mr Wyett', (string) $note->getCreatedby());
        
        $flags = array(
            'Highlight',
            'Visibletocustomer',
            'Visibletoowner',
            'Visibletocleaner',
            'Visibletokeyholder'
        );
        
        foreach ($flags as $flag) {
            $setter = 'set' . $flag;
            $getter = 'is' . $flag;
            
            $this->assertFalse($note->$getter());
            $note->$setter(true);
            $this->assertTrue($note->$getter());
        }
        
        $this->assertEquals('Mr Wyett said: This is a note.', (string) $note);
        $this->assertEquals(8, count($note->toArray()));
        $this->assertArrayHasKey('subject', $note->toArray());
        $this->assertArrayHasKey('created', $note->toArray());
        $this->assertArrayHasKey('createdby', $note->toArray());
        $this->assertArrayHasKey('visbletocustomer', $note->toArray());
        $this->assertArrayHasKey('visbletoowner', $note->toArray());
        $this->assertArrayHasKey('visbletocleaner', $note->toArray());
        $this->assertArrayHasKey('visbletokeyholder', $note->toArray());
        $this->assertArrayHasKey('highlight', $note->toArray());
    }
    
    /**
     * Test notetext accessors
     * 
     * @return void
     */
    public function testNoteText()
    {
        $note = Fixtures::getNote();
        $notetexts = $note->getNotetext();
        
        $notetext = array_shift($notetexts);
        $this->assertEquals('2014-08-09 12:34:56', $notetext->getCreated()->format('Y-m-d H:i:s'));
        $this->assertEquals('Mr Wyett', (string) $notetext->getCreatedby());
        $this->assertEquals('Mr Wyett said: This is a note.', (string) $notetext);
        
        $this->assertEquals('/note/1/notetext/1', $notetext->getUpdateUrl());
        $this->assertArrayHasKey('createdby', $notetext->toArray());
        $this->assertArrayHasKey('text', $notetext->toArray());
    }
}
