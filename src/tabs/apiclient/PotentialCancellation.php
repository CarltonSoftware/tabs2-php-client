<?php

/**
 * Tabs Rest API Potential Cancellation object.
 *
 * PHP Version 5.4
 *
 * @category  Booking
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://www.carltonsoftware.co.uk
 */

namespace tabs\apiclient;

/**
 * Tabs Rest API Potential Cancellation object.
 *
 * @category  Booking
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 *
 * @method PotentialCancellation setPotentialtransfer(boolean $flag) set the potential transfer flag
 * @method PotentialCancellation setCancellationrequested(boolean $flag) set the cancellation requested flag
 * @method PotentialCancellation setRequestedfromdate(\DateTime $datetime) Set the request from date
 * @method PotentialCancellation setRequestedtodate(\DateTime $datetime) Set the request to date
 * @method PotentialCancellation setCreatedatetime(\DateTime $datetime) Set the created date
 * @method PotentialCancellation setNoaction(boolean $var)
 * @method PotentialCancellation setCpsclaim(boolean $var)
 * @method PotentialCancellation setPricematched(boolean $var)
 * @method PotentialCancellation setAddtocustomeraccountbalance(boolean $var)
 * @method PotentialCancellation setOldtotalprice(float $var)
 * @method PotentialCancellation setNewtotalprice(float $var)
 * @method PotentialCancellation setTransferfailedreason(string $var)
 * @method PotentialCancellation setAssignedtoactor(\tabs\apiclient\TabsUser $var)
 */
class PotentialCancellation extends Base
{
    /**
     * @var boolean
     */
    protected $potentialtransfer = false;

    /**
     * @var boolean
     */
    protected $cpsclaim = false;

    /**
     * @var boolean
     */
    protected $noaction = false;

    /**
     * @var float
     */
    protected $oldtotalprice = 0;

    /**
     * @var float
     */
    protected $newtotalprice = 0;

    /**
     * @var boolean
     */
    protected $pricematched = false;

    /**
     * @var \tabs\apiclient\TabsUser
     */
    protected $assignedtoactor;

    /**
     * @var boolean
     */
    protected $transferfailedreason = '';

    /**
     * @var boolean
     */
    protected $addtocustomeraccountbalance = false;

    /**
     * @var boolean
     */
    protected $cancellationrequested = false;

    /**
     * @var \DateTime
     */
    protected $requestedfromdate;

    /**
     * @var \DateTime
     */
    protected $requestedtodate;

    /**
     * @var \DateTime
     */
    protected $createddatetime;

    // -------------------------- Public Functions -------------------------- //

    /**
     * @return void
     */
    public function __construct($id = null)
    {
        parent::__construct($id);

        $this->requestedfromdate = new \DateTime();
        $this->requestedtodate = new \DateTime();
        $this->createddatetime = new \DateTime();
        $this->assignedtoactor = new TabsUser();
    }

    /**
     * Array representation of the object
     *
     * @return array
     */
    public function toArray()
    {
        return $this->__toArray();
    }

    /**
     * @alias setAssignedtoactor
     */
    public function setAssignedto($actor)
    {
        return $this->setAssignedtoactor($actor);
    }

    /**
     * @return boolean
     */
    public function getPotentialtransfer()
    {
        return $this->potentialtransfer;
    }

    /**
     * @return boolean
     */
    public function getCancellationrequested()
    {
        return $this->cancellationrequested;
    }

    /**
     * @return \DateTime
     */
    public function getRequestedfromdate()
    {
        return $this->requestedfromdate;
    }

    /**
     * @return \DateTime
     */
    public function getRequestedtodate()
    {
        return $this->requestedtodate;
    }

    /**
     * @return \DateTime
     */
    public function getCreateddatetime()
    {
        return $this->createddatetime;
    }

    /**
     * @return boolean
     */
    public function getNoaction()
    {
        return $this->noaction;
    }

    /**
     * @return boolean
     */
    public function getCpsclaim()
    {
        return $this->cpsclaim;
    }

    /**
     * @return float
     */
    public function getOldtotalprice()
    {
        return $this->oldtotalprice;
    }

    /**
     * @return float
     */
    public function getNewtotalprice()
    {
        return $this->newtotalprice;
    }

    /**
     * @return boolean
     */
    public function getPricematched()
    {
        return $this->pricematched;
    }

    /**
     * @return \tabs\apiclient\TabsUser
     */
    public function getAssignedtoactor()
    {
        return $this->assignedtoactor;
    }

    /**
     * @return string
     */
    public function getTransferfailedreason()
    {
        return $this->transferfailedreason;
    }

    /**
     * @return boolean
     */
    public function getAddtocustomeraccountbalance()
    {
        return $this->addtocustomeraccountbalance;
    }
}