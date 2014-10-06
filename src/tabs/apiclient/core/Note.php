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
 * @method NoteText[] getNotetexts() Returns the array of NoteText items
 * @method Notetype   getNotetype()  Returns the array of Notetype
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
     * Array of note text objects
     *
     * @var Notetext[]
     */
    protected $notetexts = array();

    // ------------------------- Static Functions --------------------------- //
    
    /**
     * Return a Note object
     * 
     * @param string $id Note Ud
     * 
     * @return Note
     */
    public static function get($id)
    {
        return parent::_get(
            sprintf(
                '/%s/%s',
                strtolower(self::getClass()),
                $id
            )
        );
    }
            
    // ------------------------- Public Functions --------------------------- //

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
     * Add an array of note text objects
     *
     * @param Notetext[] $notetexts Array of notetext objects
     *
     * @return Note
     */
    public function setNotetexts($notetexts)
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
        $this->notetexts[] = $notetext;

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
            'notetype' => (string) $this->getNotetype(),
            'created' => $this->getCreated()->format('Y-m-d H:i:s'),
            'createdbyactorid' => $this->getCreatedBy()->getId(),
            'visibletocustomer' => $this->boolToStr($this->isVisibletocustomer()),
            'visibletoowner' => $this->boolToStr($this->isVisibletoowner()),
            'visibletocleaner' => $this->boolToStr($this->isVisibletocleaner()),
            'visibletokeyholder' => $this->boolToStr($this->isVisibletokeyholder()),
            'highlight' => $this->boolToStr($this->isHighlight())
        );
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return implode("\n", $this->getNotetexts());
    }
}