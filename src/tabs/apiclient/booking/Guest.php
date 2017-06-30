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
 * @method GuestAgeRange getAgerange() Returns the agerange
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
     * Guesttype
     *
     * @var string
     */
    protected $type;

    /**
     * Agerange
     *
     * @var GuestAgeRange
     */
    protected $agerange;

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

    /**
     * Set the agerange
     *
     * @param stdclass|array|GuestAgeRange $agerange The Agerange
     *
     * @return Guest
     */
    public function setAgerange($agerange)
    {
        $this->agerange = GuestAgeRange::factory($agerange);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $arr = array(
            'name' => $this->getName(),
            'guesttype' => $this->getType()
        );
        
        if ($this->getAge()) {
            $arr['age'] = $this->getAge();
        }
        
        if ($this->getPettype()) {
            $arr['pettype'] = $this->getPettype();
        }
        
        if ($this->getPetbreed()) {
            $arr['petbreed'] = $this->getPetbreed();
        }
        
        if ($this->getYearofbirth()) {
            $arr['yearofbirth'] = $this->getYearofbirth();
        }
        
        if ($this->getAgerange()) {
            $arr['guestagerangeid'] = $this->getAgerange();
        }
        
        return $arr;
    }
}