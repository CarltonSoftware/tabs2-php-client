<?php

namespace tabs\apiclient\specialoffer;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API SalesChannel object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 */
class SalesChannel extends Builder
{
    /**
     * Saleschannel
     *
     * @var \tabs\apiclient\SalesChannel
     */
    protected $saleschannel;

    // -------------------- Public Functions -------------------- //

    /**
     * Set the saleschannel
     *
     * @param stdclass|array|\tabs\apiclient\SalesChannel $saleschannel The Saleschannel
     *
     * @return SalesChannel
     */
    public function setSaleschannel($saleschannel)
    {
        $this->saleschannel = \tabs\apiclient\SalesChannel::factory($saleschannel);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $arr = $this->__toArray();

        if ($this->getSaleschannel()) {
            $arr['saleschannelid'] = $this->getSaleschannel()->getId();
        }

        return $arr;
    }

    /**
     * Returns the saleschannel object
     *
     * @return \tabs\apiclient\SalesChannel
     */
    public function getSaleschannel()
    {
        return $this->saleschannel;
    }
}