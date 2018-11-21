<?php

/**
 * Tabs Rest Notetype object.
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
use tabs\apiclient\Builder;
use tabs\apiclient\Note;

/**
 * Tabs Rest Note Association object. 
 *
 * @category  Core
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * @method NoteAssociation setFromdate(\DateTime $date) Set the date time
 * @method NoteAssociation setTodate(\DateTime $date)   Set the date time
 * @method NoteAssociation setRequiresconfirmation(boolean $bool) Bool setter
 * @method NoteAssociation setShowonweb(boolean $bool)            Bool setter
 * @method NoteAssociation setShowonavailability(boolean $bool)   Bool setter
 * 
 */
class PropertyNote extends Builder
{
    /**
     * Note
     *
     * @var Note
     */
    protected $note;
    
    /**
     * From date
     *
     * @var \DateTime
     */
    protected $fromdate;
    
    /**
     * From date
     *
     * @var \DateTime
     */
    protected $todate;

    /**
     * Requires confirmation bool
     *
     * @var boolean
     */
    protected $requiresconfirmation = false;

    /**
     * Show on web bool
     *
     * @var boolean
     */
    protected $showonweb = false;

    /**
     * Show on availability bool
     *
     * @var boolean
     */
    protected $showonavailability = false;

    // ------------------ Public Functions --------------------- //
    
    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->fromdate = new \DateTime();
        $this->todate = new \DateTime();
        
        parent::__construct($id);
    }
    
    /**
     * Set a note
     * 
     * @param array|stdClass|Note $note Note
     * 
     * @return PropertyNote
     */
    public function setNote($note)
    {
        $this->note = Note::factory($note);
        
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'propertyid' => $this->getParent()->getId(),
            'noteid' => $this->getNote()->getId(),
            'fromdate' => $this->getFromdate()->format('Y-m-d'),
            'todate' => $this->getFromdate()->format('Y-m-d'),
            'requiresconfirmation' => $this->boolToStr($this->getRequiresconfirmation()),
            'showonweb' => $this->boolToStr($this->getShowonweb()),
            'showonavailability' => $this->boolToStr($this->getShowonavailability())
        );
    }
    
    /**
     * @inheritDoc
     */
    public function getCreateUrl()
    {
        return 'propertynote';
    }

    /**
     * Get the Date
     *
     * @return \DateTime
     */
    public function getFromdate()
    {
        return $this->fromdate;
    }

    /**
     * Get the Date
     *
     * @return \DateTime
     */
    public function getTodate()
    {
        return $this->todate;
    }

    /**
     * Bool getter
     *
     * @return boolean
     */
    public function getRequiresconfirmation()
    {
        return $this->requiresconfirmation;
    }

    /**
     * Bool getter
     *
     * @return boolean
     */
    public function getShowonweb()
    {
        return $this->showonweb;
    }

    /**
     * Bool getter
     *
     * @return boolean
     */
    public function getShowonavailability()
    {
        return $this->showonavailability;
    }

    /**
     * Get the Note
     *
     * @return Note
     */
    public function getNote()
    {
        return $this->note;
    }
}