<?php

namespace tabs\apiclient\booking;

use tabs\apiclient\Builder;
use tabs\apiclient\GuestAgeRange;

/**
 * Tabs Rest API Guest object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method Guest setName(string $var) Sets the name
 * 
 * @method Guest setType(string $var) Sets the guesttype
 * 
 * @method Guest         setGuestagerange(mixed $var) Set the agerange
 * 
 * @method Guest setAge(integer $var) Sets the age
 * 
 * @method Guest setYearofbirth(integer $var) Sets the yearofbirth
 * 
 * @method Guest setPettype(string $var) Sets the pettype
 * 
 * @method Guest setPetbreed(string $var) Sets the petbreed
 * 
 */
class Guest extends Builder
{
    /**
     * Name
     *
     * @var string
     */
    protected $name = '';

    /**
     * Guest type
     *
     * @var string
     */
    protected $type = 'Adult';

    /**
     * Age range
     *
     * @var GuestAgeRange
     */
    protected $guestagerange;

    /**
     * Age
     *
     * @var integer
     */
    protected $age;

    /**
     * Yearofbirth
     *
     * @var integer
     */
    protected $yearofbirth;

    /**
     * Pettype
     *
     * @var string
     */
    protected $pettype;

    /**
     * Petbreed
     *
     * @var string
     */
    protected $petbreed;

    // -------------------- Public Functions -------------------- //
    
    public function __construct($id = null)
    {
        $this->guestagerange = new GuestAgeRange();
        parent::__construct($id);
    }

    /**
     * Set the agerange
     *
     * @param stdclass|array|GuestAgeRange $agerange The Agerange
     *
     * @return Guest
     */
    public function setAgerange($agerange)
    {
        return $this->setGuestagerange($agerange);
    }

    /**
     * Get the age range
     *
     * @return GuestAgeRange
     */
    public function getAgerange()
    {
        return $this->getGuestagerange();
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array_merge(
            array(
                'guesttype' => $this->getType()
            ),
            $this->__toArray()
        );
    }

    /**
     * Returns the name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns the guesttype
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Returns the agerange
     *
     * @return GuestAgeRange
     */
    public function getGuestagerange()
    {
        return $this->guestagerange;
    }

    /**
     * Returns the age
     *
     * @return integer
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Returns the yearofbirth
     *
     * @return integer
     */
    public function getYearofbirth()
    {
        return $this->yearofbirth;
    }

    /**
     * Returns the pettype
     *
     * @return string
     */
    public function getPettype()
    {
        return $this->pettype;
    }

    /**
     * Returns the petbreed
     *
     * @return string
     */
    public function getPetbreed()
    {
        return $this->petbreed;
    }
}