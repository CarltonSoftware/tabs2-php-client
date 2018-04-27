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

namespace tabs\apiclient;
use tabs\apiclient\Collection;
use tabs\apiclient\note\Notetext;

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
 * @method string                   getSubject()   Returns the Note subject
 * @method Collection|Notetext[]    getNotetexts() Returns the array of NoteText items
 * @method Notetype                 getNotetype()  Returns the array of Notetype
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
     * Note Type
     *
     * @var Notetype
     */
    protected $notetype;

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
     * Collection of note text objects
     *
     * @var Collection|note\Notetext[]
     */
    protected $notetexts;
            
    // ------------------------- Public Functions --------------------------- //
    
    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->notetexts = Collection::factory(
            'text',
            new Notetext,
            $this
        );
        
        parent::__construct($id);
    }

    /**
     * Set the note type
     * 
     * @param type $notetype
     * 
     * @return Note
     */
    public function setNotetype($notetype)
    {
        $this->notetype = Notetype::factory($notetype);

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
     * Short cut text for notetext
     * 
     * @param Notetext|string $nt Note text
     * 
     * @return \tabs\apiclient\Note
     */
    public function addNotetext($nt)
    {
        if (is_string($nt)) {
            $text = $nt;
            $nt = new Notetext();
            $nt->setNotetext($text);
            
            if ($this->getCreatedby()) {
                $nt->setCreatedby($this->getCreatedby());
            }
        }
        
        $this->notetexts->addElement($nt);
        
        if ($this->getId()) {
            $nt->create();
        }
        
        return $this;
    }

    /**
     * Array representation of the address.  Used for creates/updates.
     *
     * @return array
     */
    public function toArray()
    {
        $arr = array(
            'subject' => $this->getSubject(),
            'notetype' => $this->getNotetype()->getType(),
            'created' => $this->getCreated()->format('Y-m-d H:i:s'),
            'visibletocustomer' => $this->boolToStr($this->isVisibletocustomer()),
            'visibletoowner' => $this->boolToStr($this->isVisibletoowner()),
            'visibletocleaner' => $this->boolToStr($this->isVisibletocleaner()),
            'visibletokeyholder' => $this->boolToStr($this->isVisibletokeyholder()),
            'highlight' => $this->boolToStr($this->isHighlight())
        );
        
        if (!$this->getId() && $this->notetexts->count() > 0) {
            $arr = array_merge(
                $arr,
                $this->prefixToArray(
                    'notetext_',
                    $this->notetexts->first()
                )
            );
        }
        
        if ($this->getCreatedby()) {
            $arr['createdbyactorid'] = $this->getCreatedby()->getId();
        }
        
        return $arr;
    }
}