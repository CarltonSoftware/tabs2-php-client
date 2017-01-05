<?php

namespace tabs\apiclient;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API ContactMethodSubType object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method string getContactmethodsubtype() Returns the contactmethodsubtype
 * @method ContactMethodSubType setContactmethodsubtype(string $var) Sets the contactmethodsubtype
 */
class ContactMethodSubType extends Builder
{
    /**
     * Contactmethodsubtype
     *
     * @var string
     */
    protected $contactmethodsubtype;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'contactmethodsubtype' => $this->getContactmethodsubtype()
        );
    }
}