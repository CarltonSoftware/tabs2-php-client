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
 * @method string getName() Returns the name
 * @method Guest setName(string $var) Sets the name
 * 
 * @method string getType() Returns the guesttype
 * @method Guest setType(string $var) Sets the guesttype
 * 
 * @method GuestAgeRange getGuestagerange()           Returns the agerange
 * @method Guest         setGuestagerange(mixed $var) Set the agerange
 * 
 * @method integer getAge() Returns the age
 * @method Guest setAge(integer $var) Sets the age
 * 
 * @method integer getYearofbirth() Returns the yearofbirth
 * @method Guest setYearofbirth(integer $var) Sets the yearofbirth
 * 
 * @method string getPettype() Returns the pettype
 * @method Guest setPettype(string $var) Sets the pettype
 * 
 * @method string getPetbreed() Returns the petbreed
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
}