<?php

namespace tabs\apiclient\property\branding;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API PricingYear object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 */
class PricingYear extends Builder
{
    /**
     * @var boolean
     */
    protected $pricingagreed;

    /**
     * @var string
     */
    protected $pricinggroup;

    /**
     * @var array
     */
    protected $pricinggroupyear;

    /**
     * @var integer
     */
    protected $pricingyear;

    /**
     * Returns the pricingagreed
     *
     * @return boolean
     */
    public function getPricingagreed()
    {
        return $this->pricingagreed;
    }

    /**
     * Returns the pricinggroup
     *
     * @return string
     */
    public function getPricinggroup()
    {
        return $this->pricinggroup;
    }

    /**
     * Returns the pricinggroup
     *
     * @return array
     */
    public function getPricinggroupyear()
    {
        return $this->pricinggroupyear;
    }

    /**
     * Returns the pricingyear
     *
     * @return integer
     */
    public function getPricingyear()
    {
        return $this->pricingyear;
    }
}