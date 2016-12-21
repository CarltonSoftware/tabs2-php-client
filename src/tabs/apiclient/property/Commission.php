<?php

namespace tabs\apiclient\property;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API Commission object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method \DateTime getFromdate() Returns the fromdate
 * @method Commission setFromdate(\DateTime $var) Sets the fromdate
 * 
 * @method \DateTime getTodate() Returns the todate
 * @method Commission setTodate(\DateTime $var) Sets the todate
 * 
 * @method float getCommissionpercentage() Returns the commissionpercentage
 * @method Commission setCommissionpercentage(float $var) Sets the commissionpercentage
 * 
 * @method boolean getUpdateexistingbookings() Returns the updateexistingbookings
 * @method Commission setUpdateexistingbookings(boolean $var) Sets the updateexistingbookings
 */
class Commission extends Builder
{
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

    /**
     * Commission percentage
     *
     * @var float
     */
    protected $commissionpercentage;

    /**
     * Commission percentage
     *
     * @var boolean
     */
    protected $updateexistingbookings = false;

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
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'fromdate' => $this->getFromdate()->format('Y-m-d'),
            'todate' => $this->getTodate()->format('Y-m-d'),
            'commissionpercentage' => $this->getCommissionpercentage(),
            'updateexistingbookings' => $this->boolToStr($this->updateexistingbookings)
        );
    }
}