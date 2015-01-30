<?php

/**
 * Tabs Rest API Unit object.
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

namespace tabs\apiclient\core;

/**
 * Tabs Rest API Unit object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * @method integer getId()            Returns the ID
 * @method Unit    setId(integer $id) Sets the ID
 * 
 * @method string getName()             Returns the name
 * @method Unit   setName(string $name) Sets the name
 * 
 * @method string getDescription()             Returns the desc
 * @method Unit   setDescription(string $desc) Sets the desc
 * 
 * @method string getDecimalplaces()                Returns the decimal places
 * @method Unit   setDecimalplaces(string $decimal) Sets the decimal places
 */
class Unit extends Builder
{
    /**
     * ID
     * 
     * @var integer
     */
    protected $id;
    
    /**
     * Name
     * 
     * @var string
     */
    protected $name = '';
    
    /**
     * Description
     * 
     * @var string
     */
    protected $description = '';
    
    /**
     * Decimal places
     * 
     * @var string
     */
    protected $decimalplaces = 0;
    
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'decimalplaces' => $this->getDecimalplaces()
        );
    }
    
    /**
     * @inheritDoc
     */
    public function getUrlStub()
    {
        return 'unit';
    }
}