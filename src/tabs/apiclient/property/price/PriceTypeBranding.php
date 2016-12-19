<?php

namespace tabs\apiclient\property\price;

use tabs\apiclient\Builder;
use tabs\apiclient\Collection;
use tabs\apiclient\PriceType;
use tabs\apiclient\SalesChannel;
use tabs\apiclient\property\price\PriceTypeBranding;
use tabs\apiclient\property\price\PartySizePrice;

/**
 * Tabs Rest API PriceTypeBranding object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method PriceType getPricetype() Returns the pricetype
 * @method SalesChannel getSaleschannel() Returns the saleschannel
 * @method \DateTime getFromdate() Returns the fromdate
 * @method PriceTypeBranding setFromdate(\DateTime $var) Sets the fromdate
 * 
 * @method \DateTime getTodate() Returns the todate
 * @method PriceTypeBranding setTodate(\DateTime $var) Sets the todate
 * 
 * @method string getType() Returns the type
 * @method PriceTypeBranding setType(string $var) Sets the type
 * 
 * @method integer getDecimalplaces() Returns the decimalplaces
 * @method PriceTypeBranding setDecimalplaces(integer $var) Sets the decimalplaces
 * 
 * @method float getPrice() Returns the price
 * @method PriceTypeBranding setPrice(float $var) Sets the price
 * 
 * @method integer getPercentage() Returns the percentage
 * @method PriceTypeBranding setPercentage(integer $var) Sets the percentage
 * 
 * @method Collection|PriceTypeBranding[] getPercentages() Returns the percentages
 * @method Collection|PartySizePrice[] getPartysizeprices() Returns the partysizeprices
 */
class PriceTypeBranding extends Builder
{
    /**
     * Pricetype
     *
     * @var PriceType
     */
    protected $pricetype;

    /**
     * Saleschannel
     *
     * @var SalesChannel
     */
    protected $saleschannel;

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
     * Type
     *
     * @var string
     */
    protected $type;

    /**
     * Decimalplaces
     *
     * @var integer
     */
    protected $decimalplaces;

    /**
     * Price
     *
     * @var float
     */
    protected $price;

    /**
     * Percentage
     *
     * @var integer
     */
    protected $percentage;

    /**
     * Percentages
     *
     * @var Collection|PriceTypeBranding[]
     */
    protected $percentages;

    /**
     * Partysizeprices
     *
     * @var Collection|PartySizePrice[]
     */
    protected $partysizeprices;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->fromdate = new \DateTime();
        $this->todate = new \DateTime();
        $this->percentages = Collection::factory('', $this, $this);
        $this->partysizeprices = Collection::factory('', new PartySizePrice, $this);
        parent::__construct($id);
    }

    /**
     * Set the pricetype
     *
     * @param stdclass|array|PriceType $pricetype The Pricetype
     *
     * @return PriceTypeBranding
     */
    public function setPricetype($pricetype)
    {
        $this->pricetype = PriceType::factory($pricetype);

        return $this;
    }

    /**
     * Set the saleschannel
     *
     * @param stdclass|array|SalesChannel $saleschannel The Saleschannel
     *
     * @return PriceTypeBranding
     */
    public function setSaleschannel($saleschannel)
    {
        $this->saleschannel = SalesChannel::factory($saleschannel);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            
        );
    }
}