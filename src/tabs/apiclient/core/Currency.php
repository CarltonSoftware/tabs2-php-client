<?php

/**
 * Tabs Rest Currency object.
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
 * @method integer getId()            Return the id
 * @method string  getCode()          Return the Address line 2
 * @method string  getName()          Return the Address line 3
 * @method integer getDecimalplaces() Return the Address town
 * 
 * @method Currency setId(integer $id)                       Set the id
 * @method Currency setCode(integer $code)                   Set the code
 * @method Currency setName(integer $name)                   Set the name
 * @method Currency setDecimalplaces(integer $decimalplaces) Set the decimalplaces
 */
class Currency extends Base
{
    /**
     * Id
     * 
     * @var integer
     */
    protected $id;
    
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
     * Constructor
     * 
     * @return void
     */
    public function __construct()
    {

    }
    
    /**
     * Array representation of the address.  Used for creates/updates.
     * 
     * @return array
     */
    public function toArray()
    {
        return array(
            'id' => $this->getId(),
            'code' => $this->getCode(),
            'name' => $this->getName(),
            'decimalplaces' => $this->getDecimalplaces(),
        );
    }
}