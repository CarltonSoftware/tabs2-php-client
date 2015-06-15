<?php

/**
 * Tabs Rest API Vatband object.
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
 * Tabs Rest API Vatband object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * @method string  getName()             Returns the name
 * @method Vatband setName(string $name) Sets the name
 */
class Vatband extends Builder
{
    /**
     * Name
     * 
     * @var string
     */
    protected $vatband = '';
    
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'id' => $this->getId(),
            'name' => $this->getName()
        );
    }
}