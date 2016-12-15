<?php

namespace tabs\apiclient\core;
use tabs\apiclient\Builder;

/**
 * Tabs Rest Currency object.
 *
 * @category  Core
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * 
 * @method string  getCode()          Return the currency code
 * @method string  getName()          Return the currency name
 * @method integer getDecimalplaces() Return the number of decimal places
 * 
 * @method Currency setCode(integer $code)                   Set the code
 * @method Currency setName(integer $name)                   Set the name
 * @method Currency setDecimalplaces(integer $decimalplaces) Set the decimalplaces
 */
class Currency extends Builder
{
    /**
     * Code
     * 
     * @var string
     */
    protected $code;
    
    /**
     * Name
     * 
     * @var string
     */
    protected $name;
    
    /**
     * Decimalplaces
     * 
     * @var integer
     */
    protected $decimalplaces;
    
    // ------------------ Public Functions --------------------- //
    
    /**
     * Array representation of the address.  Used for creates/updates.
     * 
     * @return array
     */
    public function toArray()
    {
        return array(
            'code' => $this->getCode(),
            'name' => $this->getName(),
            'decimalplaces' => $this->getDecimalplaces(),
        );
    }
}