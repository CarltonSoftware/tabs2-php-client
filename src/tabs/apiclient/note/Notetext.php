<?php

/**
 * Tabs Rest Note text object.
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

namespace tabs\apiclient\note;

/**
 * Tabs Rest Note text object.
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
 * 
 * @method Notetext setId(integer $id)       Set the note id
 * @method Notetext setNotetext(string $subject) Set the note text
 * 
 * @method Notetext  setFollowup(\DateTime $d) Set the follow up date
 * 
 * @method Notetext  setActioned(\DateTime $d) Set the actioned date
 */
class Notetext extends \tabs\apiclient\Notemeta
{
    /**
     * Note Text
     * 
     * @var string
     */
    protected $notetext = '';
    
    /**
     * @var \DateTime
     */
    protected $followup;
    
    /**
     * @var \DateTime
     */
    protected $actioned;

    // ------------------ Public Functions --------------------- //
    
    public function __construct($id = null) {
        parent::__construct($id);
        $this->followup = new \DateTime();
        $this->actioned = new \DateTime();
    }
    
    /**
     * Array representation of the address.  Used for creates/updates.
     * 
     * @return array
     */
    public function toArray()
    {
        $arr = $this->__toArray();
        
        if ($this->getCreatedby()) {
            $arr['createdbyactorid'] = $this->getCreatedby()->getId();
        }
        
        return $arr;
    }
    
    /**
     * @inheritDoc
     */
    public function __toString()
    {
        if ($this->getCreatedby()) {
            return (string) $this->getCreatedby() . ' said: ' . $this->getNotetext();
        } else {
            return $this->getNotetext();
        }
    }
    
    /**
     * @inheritDoc
     */
    public function getUrlStub()
    {
        return 'text';
    }

    /**
     * Returns the NoteText text
     *
     * @return string
     */
    public function getNotetext()
    {
        return $this->notetext;
    }

    /**
     * Get the follow up date
     *
     * @return \DateTime
     */
    public function getFollowup()
    {
        return $this->followup;
    }

    /**
     * Get the actioned date
     *
     * @return \DateTime
     */
    public function getActioned()
    {
        return $this->actioned;
    }
}