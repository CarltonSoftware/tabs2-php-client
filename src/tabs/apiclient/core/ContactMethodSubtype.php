<?php

/**
 * Tabs Rest API ContactMethodSubtype object.
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
 * Tabs Rest API ContactMethodSubtype object.
 *
 * @category  Core
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * @method string getContactMethodSubtype()   Return the Contact Method Subtype
 * 
 * @method \tabs\apiclient\core\Base setAContactMethodSubtype(string $contactMethodSubtype) Set the country name
 */
class ContactMethodSubtype extends Base
{
    /**
     * Contact Method Subtype
     * 
     * @var string
     */
    protected $contactMethodSubtype = '';
    
    // ------------------ Public Functions --------------------- //
    
    /**
     * ToString magic method
     * 
     * @return string
     */
    public function __toString()
    {
        return $this->getContactMethodSubtype();
    }
}