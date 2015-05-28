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

namespace tabs\apiclient\actor;

/**
 * Tabs Rest API ContactDetail object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 */
class ContactEntity extends \tabs\apiclient\core\Builder
{
    /**
     * Id
     *
     * @var integer
     */
    protected $id;

    /**
     * ContactEntity type
     *
     * @var string
     */
    protected $contactentitytype;

    /**
     * Entity id
     *
     * @var integer
     */
    protected $entityid;

    /**
     * Function
     *
     * @var string
     */
    protected $function;

    /**
     * ContactDetail
     *
     * @var string
     */
    protected $contactdetail;

    /**
     * ContactDetailValue
     *
     * @var string
     */
    protected $contactdetailvalue;



    // ------------------ Public Functions --------------------- //


    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'id' => $this->id,
            'contactentitytype' => $this->contactentitytype,
            'entityid' => $this->entityid,
            'function' => $this->function,
            'contactdetail' => ($this->contactdetail != null) ? $this->contactdetail : null,
            'contactdetailvalue' => ($this->contactdetailvalue) != null ? $this->contactdetailvalue : null
        );
    }
}