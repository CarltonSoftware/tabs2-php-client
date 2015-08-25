<?php

/**
 * Tabs Rest Note meta object.
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
 * Tabs Rest Note meta object. This class contains the common elements of
 * the note and notetext objects.
 *
 * @category  Core
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method \DateTime  getCreated()   Returns the created time of the note
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
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        $this->created = new \DateTime();
    }

    /**
     * Set the created date of the note
     *
     * @param \DateTime|string $createdDate Created date either as a string
     *                                      or \DateTime object
     *
     * @return Notemeta
     */
    public function setCreated($createdDate)
    {
        if (!$createdDate instanceof \DateTime) {
            $createdDate = new \DateTime($createdDate);
        }

        $this->created = $createdDate;

        return $this;
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
        $this->createdby = $actor;

        return $this;
    }

    /**
     * Get the actor which created this notemeta object
     *
     * @return Actor
     */
    public function getCreatedby()
    {
        if (!$this->createdby instanceof Actor) {
            $parts = explode('/', $this->createdby);
            $id = $parts[count($parts) - 1];
            $type = ucfirst($parts[count($parts) - 2]);
            $class = 'tabs\apiclient\actor\\' . $type;

            $this->createdby = $class::get($id);
        }

        return $this->createdby;
    }
}