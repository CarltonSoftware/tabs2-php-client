<?php

namespace tabs\apiclient\note;
use tabs\apiclient\Builder;
use tabs\apiclient\actor\Actor;
use tabs\apiclient\note\Note;

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
 * @method Actor getActor() Get the Actor
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
    
    /**
     * Actor
     * 
     * @var Actor
     */
    protected $actor;

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
     * Set the actor
     * 
     * @param array|stdClass|Actor $actor Actor
     * 
     * @return ActorNote
     */
    public function setActor($actor)
    {
        if (is_string($actor)) {
            $stubs = explode('/', substr($actor, 4));
            $class = 'tabs\apiclient\actor\\' . $stubs[0];
            $this->actor = $class::factory(implode('/', $stubs));
        } else {
            $this->actor = $actor;
        }
        
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'noteid' => $this->getNote()->getId(),
            'actorid' => $this->getActor()->getId()
        );
    }
}