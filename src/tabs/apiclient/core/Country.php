<?php

/**
 * Tabs Rest API Country object.
 *
 * PHP Version 5.3
 *
 * @category  Core
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 */

namespace tabs\apiclient\core;

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
 * @method string getAlpha2() Return the Alpha2 code
 * @method string getAlpha3() Return the Alpha3 code
 * @method string getName()   Return the country name
 * 
 * @method \tabs\apiclient\core\Base setAlpha2(string $alpha2)   Set the Alpha2 code
 * @method \tabs\apiclient\core\Base setAlpha3(string $alpha3)   Set the Alpha3 code
 * @method \tabs\apiclient\core\Base setCountry(string $country) Set the country name
 */
class Country extends Base
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
}