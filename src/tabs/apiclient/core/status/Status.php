<?php

/**
 * Tabs Rest API Status object.
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

namespace tabs\apiclient\core\status;

/**
 * Tabs Rest API Status object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * 
 * @method integer getId()   Return the status id
 * @method string  getName() Return the status name
 * 
 * @method Status setId(integer $id)    Set the Id
 * @method Status setName(string $name) Set the name
 */
class Status extends \tabs\apiclient\core\Base
{
    /**
     * Id
     * 
     * @var integer
     */
    protected $id;
    
    /**
     * Name
     * 
     * @var string
     */
    protected $name;

    // -------------------------- Public Functions -------------------------- //
    
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