<?php

namespace tabs\apiclient;
use tabs\apiclient\Builder;
use tabs\apiclient\Actor;

/**
 * Tabs Rest Note meta object. This class contains the common elements of
 * the note and notetext objects.
 *
 * @category  Core
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method \DateTime getCreated()   Returns the created time of the note
 * @method Actor     getCreatedby() Returns the actor
 */
abstract class Notemeta extends Builder
{
    /**
     * Created
     *
     * @var \DateTime
     */
    protected $created;

    /**
     * Actor who created the entity
     *
     * @var Actor
     */
    protected $createdby;

    // ------------------ Public Functions --------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->created = new \DateTime();
        
        parent::__construct($id);
    }

    /**
     * Set the actor which created this notemeta object
     *
     * @param Actor|string $actor Actor object or path to object
     *
     * @return Notemeta
     */
    public function setCreatedby($actor)
    {
        if ($actor instanceof Actor || $actor instanceof Link) {
            $this->createdby = $actor;
        } else if ($actor instanceof \stdClass && property_exists($actor, 'actor')) {
            $parts = explode('/', $actor->actor);
            $type = ucfirst($parts[count($parts) - 2]);
            if ($type === 'Tabsuser') {
                $type = 'TabsUser';
            }
            $class = 'tabs\apiclient\\' . $type;
            $this->createdby = $class::factory($actor->actor);
        }

        return $this;
    }
}