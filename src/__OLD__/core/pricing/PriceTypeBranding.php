<?php

/**
 * Tabs Rest API Price Type Branding object
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

namespace tabs\apiclient\core\pricing;
use tabs\apiclient\core\pricing\PricingBranding;
use tabs\apiclient\core\SalesChannel;
use tabs\apiclient\core\pricing\Startday;
use tabs\apiclient\collection\core\pricing\Startday as StartdayCollection;

/**
 * Tabs Rest API Price Type Branding object
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method SalesChannel      getSaleschannel()             Returns the sales channel
 * @method PriceTypeBranding setSaleschannel(SalesChannel) Sets the sales channel
 *
 * @method string            getType()       Returns the type (Fixed or Percentage)
 * @method PriceTypeBranding setType(string) Set the type (Fixed or Percentage)
 *
 * @method StartdayCollection getStartdays() Returns a collection of start days
 */
class PriceTypeBranding extends PricingBranding
{
    /**
     * The sales channel
     *
     * @var tabs\apiclient\core\SalesChannel
     */
    protected $saleschannel;

    /**
     * The type (Fixed or Percentage)
     *
     * @var string
     */
    protected $type;

    /**
     *
     *
     *
     */
    protected $percentage;

    /**
     *
     *
     *
     */
    protected $pricetypebrandingfixedid;

    /**
     * Collection of start days
     *
     * @var StartdayCollection
     */
    protected $startdays;

    // ------------------ Public Functions --------------------- //

    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        $this->startdays = new StartdayCollection();
        $this->startdays->setElementParent($this);
    }

    /**
     * Add a start day
     *
     * @param Startday $startday Start day object
     *
     * @return PriceTypeBranding
     */
    public function addStartday(&$startday)
    {
        $startday->setParent($this);
        $this->startdays->addElement($startday);

        return $this;
    }

    /**
     * Set the start days
     *
     * @param array $contacts Array of start day objects
     *
     * @return PriceTypeBranding
     */
    public function setStartdays($startdays)
    {
        foreach ($startdays as $day) {
            $startday = Startday::factory($day);

            $this->addStartday($startday);
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array_merge(
            parent::toArray(),
            array(
                'saleschannelid' => $this->getSaleschannel()->getId(),
                'type' => $this->getType(),
                'percentage' => $this->getPercentage(),
                'pricetypebrandingfixedid' => $this->getPricetypebrandingfixedid()
            )
        );
    }
}