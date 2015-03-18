<?php

/**
 * Tabs Rest API Mimetype object.
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
 * Tabs Rest API Mimetype object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * @method integer getId()       Returns the ID
 * @method string getName()      Returns the mimetype
 * @method string getShortname() Returns the short name
 * 
 * @method Mimetype setId(integer $id)         Sets the ID
 * @method Mimetype setName(string $name)      Sets the mimetype
 * @method Mimetype setShortname(string $name) Sets the short name
 */
class Mimetype extends Base
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
     * Shortname
     * 
     * @var string
     */
    protected $shortname = '';
    
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'id' => $this->getId(),
            'name' => $this->getName(),
            'shortname' => $this->getShortname()
        );
    }
}