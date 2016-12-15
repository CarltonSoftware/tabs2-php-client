<?php

/**
 * Tabs Rest API Special offer sales channel object.
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
 * Tabs Rest API Special offer sales channel object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2015 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * @method \tabs\apiclient\core\SalesChannel getSaleschannel() Return the website section
 */
class SalesChannel extends \tabs\apiclient\core\Builder
{
    /**
     * Applicable sales channel
     * 
     * @var \tabs\apiclient\core\SalesChannel
     */
    protected $saleschannel;
    
    /**
     * Set the SalesChannel
     * 
     * @param Link|stdClass|SalesChannel $sc SalesChannel object
     * 
     * @return \tabs\apiclient\core\specialoffer\SalesChannel
     */
    public function setSaleschannel($sc)
    {
        $this->saleschannel = \tabs\apiclient\core\SalesChannel::factory($sc);
        
        return $this;
    }
    
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'id' => $this->getId(),
            'saleschannelid' => $this->getSaleschannel()->getId()
        );
    }
}