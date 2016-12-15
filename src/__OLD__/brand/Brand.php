<?php

/**
 * Tabs Rest API Brand object.
 *
 * PHP Version 5.4
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://www.carltonsoftware.co.uk
 */

namespace tabs\apiclient\brand;
use \tabs\apiclient\actor\Agency;

/**
 * Tabs Rest API Brand object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * @method string getCode()             Returns the brand code
 * @method Brand  setCode(string $code) Sets the brand code
 * 
 * @method string getName()             Returns the brand name
 * @method Brand  setName(string $name) Sets the brand name
 * 
 * @method Agency getAgency()           Returns the agency
 */
abstract class Brand extends \tabs\apiclient\core\Builder
{
    /**
     * Brand code
     * 
     * @var string
     */
    protected $code = '';
    
    /**
     * Brand name
     * 
     * @var string
     */
    protected $name = '';
    
    /**
     * Agency
     * 
     * @var \tabs\apiclient\actor\Agency
     */
    protected $agency;
    
    /**
     * Set the Agency
     * 
     * @param array|stdClass|Agency     $ag     Agency
     * 
     * @return \tabs\apiclient\actor\Agency
     */
    public function setAgency($ag)
    {
        $agency = Agency::factory($ag);
        $this->agency = $agency->setParent($this);
        
        return $this;
    }
    
    /**
     * ToString magic method
     *
     * @return string
     */
    public function __toString()
    {   
        $code = $this->getCode();
        $name = $this->getName();
        
        return sprintf(
            '%s (%s)', 
            $name, 
            $code
        );  
    }  
}