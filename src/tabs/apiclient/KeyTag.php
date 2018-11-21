<?php

namespace tabs\apiclient;

use tabs\apiclient\Builder;
use tabs\apiclient\Collection;

/**
 * Tabs Rest API KeyTag object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method KeyTag setTag(string $var) Sets the tag
 * 
 * @method KeyTag setColour(string $var) Sets the colour
 * 
 * @method KeyTag setDeleted(boolean $var) Sets the deleted
 * 
 * 
 */
class KeyTag extends Builder
{
    /**
     * Property
     *
     * @var \tabs\apiclient\Property
     */
    protected $property;

    /**
     * Tag
     *
     * @var string
     */
    protected $tag;

    /**
     * Colour
     *
     * @var string
     */
    protected $colour;

    /**
     * Keyset
     *
     * @var \tabs\apiclient\KeySet
     */
    protected $keyset;

    /**
     * Deleted
     *
     * @var boolean
     */
    protected $deleted = false;

    /**
     * Lastcheck
     *
     * @var \tabs\apiclient\keytag\Check
     */
    protected $lastcheck;
    
    /**
     * Keys collection
     * 
     * @var Collection|keytag\Keyy[]
     */
    protected $keys;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->keys = Collection::factory('keyy', new keytag\Keyy(), $this);
        parent::__construct($id);
    }

    /**
     * Set the property
     *
     * @param stdclass|array|\tabs\apiclient\Property $property The Property
     *
     * @return KeyTag
     */
    public function setProperty($property)
    {
        $this->property = \tabs\apiclient\Property::factory($property);

        return $this;
    }

    /**
     * Set the keyset
     *
     * @param stdclass|array|\tabs\apiclient\KeySet $keyset The Keyset
     *
     * @return KeyTag
     */
    public function setKeyset($keyset)
    {
        $this->keyset = \tabs\apiclient\KeySet::factory($keyset);

        return $this;
    }

    /**
     * Set the lastcheck
     *
     * @param stdclass|array|\tabs\apiclient\keytag\Check $lastcheck The Lastcheck
     *
     * @return KeyTag
     */
    public function setLastcheck($lastcheck)
    {
        $this->lastcheck = \tabs\apiclient\keytag\Check::factory($lastcheck);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'propertyid' => $this->getProperty()->getId(),
            'tag' => $this->getTag(),
            'colour' => $this->getColour(),
            'keysetid' => $this->getKeyset()->getId(),
            'deleted' => $this->boolToStr($this->getDeleted()),
        );
    }

    /**
     * Returns the property
     *
     * @return \tabs\apiclient\Property
     */
    public function getProperty()
    {
        return $this->property;
    }

    /**
     * Returns the tag
     *
     * @return string
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * Returns the colour
     *
     * @return string
     */
    public function getColour()
    {
        return $this->colour;
    }

    /**
     * Returns the keyset
     *
     * @return \tabs\apiclient\KeySet
     */
    public function getKeyset()
    {
        return $this->keyset;
    }

    /**
     * Returns the deleted
     *
     * @return boolean
     */
    public function getDeleted()
    {
        return $this->deleted;
    }

    /**
     * Returns the lastcheck
     *
     * @return \tabs\apiclient\keytag\Check
     */
    public function getLastcheck()
    {
        return $this->lastcheck;
    }

    /**
     * Returns the keys
     *
     * @return Collection|keytag\Keyy[]
     */
    public function getKeys()
    {
        return $this->keys;
    }
}