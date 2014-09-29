<?php

/**
 * Tabs Rest API ContactMethod object.
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
 * Tabs Rest API ContactMethod object.
 *
 * @category  Core
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * @method string getContactMethod()   Return the Contact Method 
 * 
 * @method \tabs\apiclient\core\Base setContactMethod(string $contactmethod) Set the Contact Method 
 */
class ContactMethod extends Base
{
    /**
     * Contact Method 
     * 
     * @var string
     */
    protected $contactmethod = '';
    
    // ------------------ Public Functions --------------------- //
    
    /**
     * ToString magic method
     * 
     * @return string
     */
    public function __toString()
    {
        return $this->getContactmethod();
    }
}