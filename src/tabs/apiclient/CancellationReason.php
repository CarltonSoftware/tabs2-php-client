<?php

namespace tabs\apiclient;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API CancellationReason object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method CancellationReason setCancellationreason(string $var) Sets the cancellationreason
 * @method CancellationReason setCovered(boolean $var) Sets the covered
 * @method CancellationReason setAgencybooking(boolean $var) Sets the agencybooking
 * @method CancellationReason setOwnerbooking(boolean $var) Sets the ownerbooking
 * @method CancellationReason setCustomerbooking(boolean $var) Sets the customerbooking
 * @method CancellationReason setPotentialbooking(boolean $var) Sets the potentialbooking
 * @method CancellationReason setProvisionalbooking(boolean $var) Sets the provisionalbooking
 * @method CancellationReason setConfirmedbooking(boolean $var) Sets the confirmedbooking
 * @method CancellationReason setCancellationreasongroup(\tabs\apiclient\CancellationReasonGroup $var) Sets the cancellationreasongroup
 */
class CancellationReason extends Builder
{
    /**
     * Cancellation reason
     *
     * @var string
     */
    protected $cancellationreason;

    /**
     * Covered
     *
     * @var boolean
     */
    protected $covered;

    /**
     * Agency booking
     *
     * @var boolean
     */
    protected $agencybooking;

    /**
     * Owner booking
     *
     * @var boolean
     */

    protected $ownerbooking;

    /**
     * Customer booking
     *
     * @var boolean
     */
    protected $customerbooking;

    /**
     * Potential booking
     *
     * @var boolean
     */
    protected $potentialbooking;

    /**
     * Provisional booking
     *
     * @var boolean
     */
    protected $provisionalbooking;

    /**
     * Confirmed booking
     *
     * @var boolean
     */
    protected $confirmedbooking;

    /**
     * Cancellation reason group
     *
     * @var \tabs\apiclient\CancellationReasonGroup
     */
    protected $cancellationreasongroup;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->cancellationreason = '';
        $this->covered = false;
        $this->agencybooking = false;
        $this->ownerbooking = false;
        $this->customerbooking = false;
        $this->potentialbooking = false;
        $this->provisionalbooking = false;
        $this->confirmedbooking = false;
        $this->cancellationreasongroup = new CancellationReasonGroup();

        parent::__construct($id);
    }

    /**
     * @return string
     */
    public function getCancellationreason()
    {
        return $this->cancellationreason;
    }

    /**
     * @return boolean
     */
    public function getCovered()
    {
        return $this->covered;
    }

    /**
     * @return boolean
     */
    public function getAgencybooking()
    {
        return $this->agencybooking;
    }

    /**
     * @return boolean
     */
    public function getOwnerbooking()
    {
        return $this->ownerbooking;
    }

    /**
     * @return boolean
     */
    public function getCustomerbooking()
    {
        return $this->customerbooking;
    }

    /**
     * @return boolean
     */
    public function getPotentialbooking()
    {
        return $this->potentialbooking;
    }

    /**
     * @return boolean
     */
    public function getProvisionalbooking()
    {
        return $this->provisionalbooking;
    }

    /**
     * @return boolean
     */
    public function getConfirmedbooking()
    {
        return $this->confirmedbooking;
    }

    /**
     * @return \tabs\apiclient\CancellationReasonGroup
     */
    public function getCancellationreasongroup()
    {
        return $this->cancellationreasongroup;
    }
}