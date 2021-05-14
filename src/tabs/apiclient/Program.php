<?php

/**
 * Tabs Rest API Program object.
 *
 * PHP Version 5.5
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://www.carltonsoftware.co.uk
 */

namespace tabs\apiclient;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API Program object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method integer      getId()     Return the id
 * @method string      getProgramname()     Return the programname
 * @method string      getDescription()     Return the description
 * @method date      getFromdate()     Return the fromdate
 * @method date      getTodate()     Return the todate
 * @method boolean      getOwnerapprovalrequired()     Return the ownerapprovalrequired
 * @method boolean      getPropertyapprovalrequired()     Return the propertyapprovalrequired
 * @method boolean      getActionrequiredonapproval()     Return the actionrequiredonapproval
 * @method string      getApprovalactiondescription()     Return the approvalactiondescription
 * @method boolean      getActionrequiredonrejection()     Return the actionrequiredonrejection
 * @method string      getRejectionactiondescription()     Return the rejectionactiondescription
 *
 * @method       setId(integer $id)     Set the id
 * @method       setProgramname(string $programname)     Set the programname
 * @method       setDescription(string $description)     Set the description
 * @method       setFromdate(date $fromdate)     Set the fromdate
 * @method       setTodate(date $todate)     Set the todate
 * @method       setOwnerapprovalrequired(boolean $ownerapprovalrequired)     Set the ownerapprovalrequired
 * @method       setPropertyapprovalrequired(boolean $propertyapprovalrequired)     Set the propertyapprovalrequired
 * @method       setActionrequiredonapproval(boolean $actionrequiredonapproval)     Set the actionrequiredonapproval
 * @method       setApprovalactiondescription(string $approvalactiondescription)     Set the approvalactiondescription
 * @method       setActionrequiredonrejection(boolean $actionrequiredonrejection)     Set the actionrequiredonrejection
 * @method       setRejectionactiondescription(string $rejectionactiondescription)     Set the rejectionactiondescription
 */
class Program extends Builder
{
    /**
     * id
     *
     * @var integer
     */
    protected $id;

    /**
     * programname
     *
     * @var string
     */
    protected $programname;

    /**
     * description
     *
     * @var string
     */
    protected $description;

    /**
     * fromdate
     *
     * @var date
     */
    protected $fromdate;

    /**
     * todate
     *
     * @var date
     */
    protected $todate;

    /**
     * ownerapprovalrequired
     *
     * @var boolean
     */
    protected $ownerapprovalrequired;

    /**
     * propertyapprovalrequired
     *
     * @var boolean
     */
    protected $propertyapprovalrequired;

    /**
     * actionrequiredonapproval
     *
     * @var boolean
     */
    protected $actionrequiredonapproval;

    /**
     * approvalactiondescription
     *
     * @var string
     */
    protected $approvalactiondescription;

    /**
     * actionrequiredonrejection
     *
     * @var boolean
     */
    protected $actionrequiredonrejection;

    /**
     * rejectionactiondescription
     *
     * @var string
     */
    protected $rejectionactiondescription;

    
    // ------------------ Public Functions --------------------- //

    /**
     * Constructor.
     *
     * Initialise the Program object
     *
     * @return 
     */
    public function __construct()
    {
        $this->fromdate = new \DateTime();
        $this->todate = new \DateTime();
    }

    /**
     * Return the string representation of a program
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getProgramname();
    }

    /**
     * Array representation
     *
     * @return array
     */
    public function toArray()
    {
        return array(
            'id' => $this->getId(),
            'programname' => $this->getProgramname(),
            'description' => $this->getDescription(),
            'fromdate' => $this->getFromdate()->format('Y-m-d'),
            'todate' => $this->getTodate()->format('Y-m-d'),
            'ownerapprovalrequired' => $this->getOwnerapprovalrequired(),
            'propertyapprovalrequired' => $this->getPropertyapprovalrequired(),
            'actionrequiredonapproval' => $this->getActionrequiredonapproval(),
            'approvalactiondescription' => $this->getApprovalactiondescription(),
            'actionrequiredonrejection' => $this->getActionrequiredonrejection(),
            'rejectionactiondescription' => $this->getRejectionactiondescription(),
        );
    }
}
