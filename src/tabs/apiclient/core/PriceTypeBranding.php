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

namespace tabs\apiclient\core;
use tabs\apiclient\brand\Branding;
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
 * @method Branding getBranding()         Returns the branding
 *
 * @method SalesChannel getSaleschannel() Returns the sales channel
 *
 * @method \DateTime         getFromdate()          Returns the date the branding applies from
 * @method PriceTypeBranding setFromdate(\Datetime) Set the date the branding applies from
 *
 * @method \DateTime         getTodate()          Returns the date the branding applies until
 * @method PriceTypeBranding setTodate(\Datetime) Set the date the branding applies until
 *
 * @method string            getType()       Returns the type (Fixed or Percentage)
 * @method PriceTypeBranding setType(string) Set the type (Fixed or Percentage)
 */
class PriceTypeBranding extends Builder
{
    /**
     * The branding
     *
     * @var tabs\apiclient\brand\Branding
     */
    protected $branding;

    /**
     * The sales channel
     *
     * @var tabs\apiclient\brand\SalesChannel
     */
    protected $saleschannel;

    /**
     * The date the Branding applies from
     *
     * @var \DateTime
     */
    protected $fromdate;

    /**
     * The date the Branding applies until
     *
     * @var \DateTime
     */
    protected $todate;

    /**
     * The type (Fixed or Percentage)
     *
     * @var String
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
        return array(
            'id' => $this->getId(),
            'branding' => $this->getBranding(),
            'saleschannel' => $this->getSaleschannel(),
            'fromdate' => $this->getFromdate(),
            'todate' => $this->getTodate(),
            'type' => $this->getType(),
        );
    }
}