<?php

namespace tabs\apiclient\specialoffer;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API WebsiteSection object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method \tabs\apiclient\WebsiteSection getWebsitesection() Returns the websitesection object
 */
class WebsiteSection extends Builder
{
    /**
     * Websitesection
     *
     * @var \tabs\apiclient\WebsiteSection
     */
    protected $websitesection;

    // -------------------- Public Functions -------------------- //

    /**
     * Set the websitesection
     *
     * @param stdclass|array|\tabs\apiclient\WebsiteSection $websitesection The Websitesection
     *
     * @return WebsiteSection
     */
    public function setWebsitesection($websitesection)
    {
        $this->websitesection = \tabs\apiclient\WebsiteSection::factory($websitesection);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $arr = $this->__toArray();

        if ($this->getWebsitesection()) {
            $arr['websitesectionid'] = $this->getWebsitesection()->getId();
        }

        return $arr;
    }
}