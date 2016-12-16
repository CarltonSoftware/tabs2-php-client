<?php

namespace tabs\apiclient;
use tabs\apiclient\Builder;

/**
 * Tabs Rest API Country object.
 *
 * @category  Core
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * @method string getAlpha2()    Return the Alpha2 code
 * @method string getAlpha3()    Return the Alpha3 code
 * @method string getName()      Return the country name
 * @method string getPhonecode() Return the phone code
 * 
 * @method Base setAlpha2(string $alpha2)     Set the Alpha2 code
 * @method Base setAlpha3(string $alpha3)     Set the Alpha3 code
 * @method Base setCountry(string $country)   Set the country name
 * @method Base setPhonecode(string $country) Set the country phone code
 */
class Country extends Builder
{
    /**
     * Country code
     * 
     * @var string
     */
    protected $alpha2 = '';
    
    /**
     * Country 3 digit code
     * 
     * @var string 
     */
    protected $alpha3 = '';
    
    /**
     * Country name
     * 
     * @var string 
     */
    protected $name = '';
    
    /**
     * Country phone code
     * 
     * @var string 
     */
    protected $phonecode = '';
    
    // ------------------ Public Functions --------------------- //
    
    /**
     * ToString magic method
     * 
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
    }
    
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'alpha2' => $this->getAlpha2(),
            'alpha3' => $this->getAlpha3(),
            'name' => $this->getName(),
            'phonecode' => $this->getPhonecode()
        );
    }
}