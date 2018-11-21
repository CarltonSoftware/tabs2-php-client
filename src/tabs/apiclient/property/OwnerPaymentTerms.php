<?php

namespace tabs\apiclient\property;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API OwnerPaymentTerms object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method OwnerPaymentTerms setFromdate(\DateTime $var) Sets the fromdate
 * 
 * @method OwnerPaymentTerms setTodate(\DateTime $var) Sets the todate
 * 
 */
class OwnerPaymentTerms extends Builder
{
    /**
     * Ownerpaymentterms
     *
     * @var \tabs\apiclient\OwnerPaymentTerms
     */
    protected $ownerpaymentterms;

    /**
     * Fromdate
     *
     * @var \DateTime
     */
    protected $fromdate;

    /**
     * Todate
     *
     * @var \DateTime
     */
    protected $todate;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->fromdate = new \DateTime();
        $this->todate = new \DateTime();
        parent::__construct($id);
    }

    /**
     * Set the ownerpaymentterms
     *
     * @param stdclass|array|\tabs\apiclient\OwnerPaymentTerms $ownerpaymentterms The Ownerpaymentterms
     *
     * @return OwnerPaymentTerms
     */
    public function setOwnerpaymentterms($ownerpaymentterms)
    {
        $this->ownerpaymentterms = \tabs\apiclient\OwnerPaymentTerms::factory(
            $ownerpaymentterms
        );

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'ownerpaymenttermsid' => $this->getOwnerpaymentterms()->getId(),
            'fromdate' => $this->getFromdate()->format('Y-m-d'),
            'todate' => $this->getTodate()->format('Y-m-d')
        );
    }

    /**
     * Returns the ownerpaymentterms
     *
     * @return \tabs\apiclient\OwnerPaymentTerms
     */
    public function getOwnerpaymentterms()
    {
        return $this->ownerpaymentterms;
    }

    /**
     * Returns the fromdate
     *
     * @return \DateTime
     */
    public function getFromdate()
    {
        return $this->fromdate;
    }

    /**
     * Returns the todate
     *
     * @return \DateTime
     */
    public function getTodate()
    {
        return $this->todate;
    }
}