<?php

/**
 * Tabs Rest Note object.
 *
 * PHP Version 5.4
 *
 * @category  Core
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://www.carltonsoftware.co.uk
 */

namespace tabs\apiclient\core;
use tabs\apiclient\actor\Actor;

/**
 * Tabs Rest Note object.
 *
 * @category  Core
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * 
 * @method string     getSubject()   Returns the Note subject
 * @method NoteText[] getNotetext()  Returns the array of NoteText items
 * 
 * @method Note setSubject(string $subject)          Set the note subject
 * @method Note setVisibletocustomer(boolean $bool)  Visible to customer bool
 * @method Note setVisibletoowner(boolean $bool)     Visible to owner bool
 * @method Note setVisibletocleaner(boolean $bool)   Visible to cleaner bool
 * @method Note setVisibletokeyholder(boolean $bool) Visible to keyholder bool
 * @method Note setHighlight(boolean $bool)          Highlight bool
 */
class Note extends Notemeta
{
    /**
     * Subject
     * 
     * @var string
     */
    protected $subject = '';

    /**
     * Visible to customer
     * 
     * @var boolean
     */
    protected $visibletocustomer = false;

    /**
     * Visible to owner
     * 
     * @var boolean
     */
    protected $visibletoowner = false;

    /**
     * Visible to cleaner
     * 
     * @var boolean
     */
    protected $visibletocleaner = false;

    /**
     * Visible to keyholder
     * 
     * @var boolean
     */
    protected $visibletokeyholder = false;

    /**
     * Note highlight
     * 
     * @var boolean
     */
    protected $highlight = false;
    
    /**
     * Array of note text objects
     * 
     * @var Notetext[]
     */
    protected $notetext = array();

    // ------------------ Public Functions --------------------- //
    
    /**
     * Add an array of note text objects
     * 
     * @param Notetext[] $notetexts Array of notetext objects
     * 
     * @return Note
     */
    public function setNotetext($notetexts)
    {
        foreach ($notetexts as $notetext) {
            $_notetext = Notetext::factory($notetext);
            $this->addNoteText($_notetext);
        }
        
        return $this;
    }
    
    /**
     * Add a note text object to the note
     * 
     * @param Notetext $notetext Note text object
     * 
     * @return Note
     */
    public function addNoteText(Notetext &$notetext)
    {
        $notetext->setParent($this);
        $this->notetext[] = $notetext;
        
        return $this;
    }
    
    /**
     * Return the visible to customer flag
     * 
     * @return boolean
     */
    public function isVisibletocustomer()
    {
        return $this->visibletocustomer;
    }
    
    /**
     * Return the visible to cleaner flag
     * 
     * @return boolean
     */
    public function isVisibletocleaner()
    {
        return $this->visibletocleaner;
    }
    
    /**
     * Return the visible to owner flag
     * 
     * @return boolean
     */
    public function isVisibletoowner()
    {
        return $this->visibletoowner;
    }
    
    /**
     * Return the visible to keyholder flag
     * 
     * @return boolean
     */
    public function isVisibletokeyholder()
    {
        return $this->visibletokeyholder;
    }
    
    /**
     * Return the highlight flag
     * 
     * @return boolean
     */
    public function isHighlight()
    {
        return $this->highlight;
    }
    
    /**
     * Generate a url string for a create url
     * 
     * @return string
     */
    public function getUpdateUrl()
    {
        return '/note/' . $this->getId();
    }
    
    /**
     * Array representation of the address.  Used for creates/updates.
     * 
     * @return array
     */
    public function toArray()
    {
        return array(
            'subject' => $this->getSubject(),
            'created' => $this->getCreated()->format('Y-m-d H:i:s'),
            'createdby' => $this->getCreatedBy()->getId(),
            'visbletocustomer' => $this->isVisibletocustomer(),
            'visbletoowner' => $this->isVisibletoowner(),
            'visbletocleaner' => $this->isVisibletocleaner(),
            'visbletokeyholder' => $this->isVisibletokeyholder(),
            'highlight' => $this->isHighlight()
        );
    }
    
    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return implode("\n", $this->getNotetext());
    }
}