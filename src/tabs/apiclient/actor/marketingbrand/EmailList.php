<?php

namespace tabs\apiclient\actor\marketingbrand;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API EmailList object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method \tabs\apiclient\marketingbrand\EmailList getMarketingbrandemaillist() Returns the marketingbrand email list
 * @method boolean getUnsubscribed() Returns the unsubscribed
 * 
 * @method EmailList setUnsubscribed(boolean $var) Sets the unsubscribed
 */
class EmailList extends Builder
{
    /**
     * Marketingbrandemaillist
     *
     * @var \tabs\apiclient\marketingbrand\EmailList
     */
    protected $marketingbrandemaillist;

    /**
     * Unsubscribed
     *
     * @var boolean
     */
    protected $unsubscribed = false;

    // -------------------- Public Functions -------------------- //

    /**
     * Set the marketingbrandemaillist
     *
     * @param stdclass|array|\tabs\apiclient\marketingbrand\EmailList $marketingbrandemaillist The Marketingbrandemaillist
     *
     * @return EmailList
     */
    public function setMarketingbrandemaillist($marketingbrandemaillist)
    {
        $this->marketingbrandemaillist = \tabs\apiclient\marketingbrand\EmailList::factory($marketingbrandemaillist);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'marketingbrandemaillistid' => $this->getMarketingbrandemaillist()->getId(),
            'unsubscribed' => $this->boolToStr($this->getUnsubscribed()),
        );
    }
}