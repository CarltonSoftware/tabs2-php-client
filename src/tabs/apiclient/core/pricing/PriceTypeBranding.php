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
     *
     *
     *
     */
    protected $startdays;

    // ------------------ Public Functions --------------------- //

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