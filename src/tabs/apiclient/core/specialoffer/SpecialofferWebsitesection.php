<?php

/**
 * Tabs Rest API Special offer website section object.
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

namespace tabs\apiclient\core\specialoffer;

/**
 * Tabs Rest API Special offer website section object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2015 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * @method \tabs\apiclient\core\Websitesection getWebsitesection() Return the website section
 */
class SpecialofferWebsitesection extends \tabs\apiclient\core\Builder
{
    /**
     * Applicable website section
     * 
     * @var \tabs\apiclient\core\Websitesection
     */
    protected $websitesection;
    
    /**
     * Set the website section
     * 
     * @param Link|stdClass|Websitesection $ws Website section object
     * 
     * @return \tabs\apiclient\core\specialoffer\SpecialofferWebsitesection
     */
    public function setWebsitesection($ws)
    {
        $this->websitesection = \tabs\apiclient\core\Websitesection::factory($ws);
        
        return $this;
    }
    
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'id' => $this->getId(),
            'websitesectionid' => $this->getWebsitesection()->getId()
        );
    }
}