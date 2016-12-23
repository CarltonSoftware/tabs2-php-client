<?php

namespace tabs\apiclient;

use tabs\apiclient\Builder;
use tabs\apiclient\Vatband;

/**
 * Tabs Rest API Owner Charge Code object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method string getOwnerchargecode() Returns the ownerchargecode
 * @method OwnerChargeCode setOwnerchargecode(string $var) Sets the ownerchargecode
 * 
 * @method string getDescription() Returns the description
 * @method OwnerChargeCode setDescription(string $var) Sets the description
 * 
 * @method \tabs\apiclient\VatBand getVatband() Returns the vatband
 * @method boolean getRecharge() Returns the recharge
 * @method OwnerChargeCode setRecharge(boolean $var) Sets the recharge
 * 
 */
class OwnerChargeCode extends Builder
{
    /**
     * Ownerchargecode
     *
     * @var string
     */
    protected $ownerchargecode;

    /**
     * Description
     *
     * @var string
     */
    protected $description;

    /**
     * Vatband
     *
     * @var \tabs\apiclient\Vatband
     */
    protected $vatband;

    /**
     * Recharge
     *
     * @var boolean
     */
    protected $recharge;

    // -------------------- Public Functions -------------------- //

    /**
     * Set the vatband
     *
     * @param stdclass|array|Vatband $vatband The Vatband
     *
     * @return OwnerChargeCode
     */
    public function setVatband($vatband)
    {
        $this->vatband = Vatband::factory($vatband);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'ownerchargecode' => $this->getOwnerchargecode(),
            'description' => $this->getDescription(),
            'vatbandid' => $this->getVatband()->getId(),
            'recharge' => $this->boolToStr($this->getRecharge())
        );
    }
}