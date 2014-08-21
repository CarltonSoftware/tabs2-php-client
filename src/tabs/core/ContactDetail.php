<?php

/**
 * Tabs Rest API ContactEntity object.
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

namespace tabs\core;

/**
 * Tabs Rest API ContactEntity object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method \tabs\core\Address getAddress() Return the contact address
 */
class ContactDetail extends ContactEntity
{
    // ------------------ Public Functions --------------------- //
    
    /**
     * ToString magic method
     * 
     * @return string
     */
    public function __toString()
    {
        return sprintf(
            '%s %s: %s',
            $this->getContactmethod(),
            $this->getSubtype(),
            $this->getValue()
        );
    }
    
    /**
     * Contact detail array representation
     * 
     * @return array
     */
    public function toArray()
    {
        return array(
            'contactmethod' => $this->getContactmethod(),
            'subtype' => $this->getSubtype(),
            'value' => $this->getValue(),
            'comment' => $this->getComment(),
        );
    }
    
    /**
     * @inheritDoc
     */
    public function getUrlStub()
    {
        return 'contactdetail';
    }
}
