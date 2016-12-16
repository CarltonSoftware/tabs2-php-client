<?php

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
 * @method Note  getNote()  Get the Note
 */
class ActorNote extends Builder
{
    /**
     * Note
     *
     * @var Note
     */
    protected $note;

    // ------------------ Public Functions --------------------- //
    
    /**
     * Set a note
     * 
     * @param array|stdClass|Note $note Note
     * 
     * @return ActorNote
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
            'noteid' => $this->getNote()->getId(),
            'actorid' => $this->getParent()->getId()
        );
    }
    
    /**
     * @inheritDoc
     */
    public function getCreateUrl()
    {
        return 'actornote';
    }
}