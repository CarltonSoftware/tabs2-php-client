<?php

/**
 * Tabs Rest API Contact object.
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

namespace tabs\apiclient\actor;

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
 */
class Contact extends \tabs\apiclient\core\Builder
{
    /**
     * id
     *
     * @var int
     */
    protected $id;
    protected $contacttype;
    protected $contactdatetime;
    protected $contactmethodtype;
    protected $content;
    protected $contactentities;
    protected $deleted;


    // ------------------ Public Functions --------------------- //

    /**
     * ToString magic method
     *
     * @return string
     */
    public function __toString()
    {
        return 'Contact: ' . $this->id;
    }

    public function setContactentities($contactentities)
    {
        foreach ($contactentities as $contactentity) {
            $contactEntity = \tabs\apiclient\actor\ContactEntity::factory($contactentity);

            $this->contactentities[] = $contactEntity;
        }
    }

    /**
     * Contact detail array representation
     *
     * @return array
     */
    public function toArray()
    {
        return array(
            'id' => $this->id,
            'contactdatetime' => $this->contactDateTime
        );
    }
}
