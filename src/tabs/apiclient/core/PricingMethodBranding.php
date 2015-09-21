<?php

/**
 * Tabs Rest API Pricing Method Branding object
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

/**
 * Tabs Rest API Pricing Method Branding object
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method Branding getBranding() Returns the branding
 *
 * @method \DateTime             getFromdate()          Returns the date the branding applies from
 * @method PricingMethodBranding setFromdate(\Datetime) Set the date the branding applies from
 *
 * @method \DateTime             getTodate()          Returns the date the branding applies until
 * @method PricingMethodBranding setTodate(\Datetime) Set the date the branding applies until
 *
 */
class PricingMethodBranding extends Builder
{
    /**
     * The branding
     *
     * @var tabs\apiclient\brand\Branding
     */
    protected $branding;

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

    // ------------------ Public Functions --------------------- //

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'id' => $this->getId(),
            'brandingid' => $this->getBranding()->getId(),
            'fromdate' => $this->getFromdate()->format('Y-m-d'),
            'todate' => $this->getTodate()->format('Y-m-d')
        );
    }
}