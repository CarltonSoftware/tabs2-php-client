<?php

namespace tabs\apiclient\booking\securitydeposit;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API Hold object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method \DateTime getHelddate() Returns the helddate
 * @method Hold setHelddate(\DateTime $var) Sets the helddate
 * 
 * @method \DateTime getHelduntildate() Returns the helduntildate
 * @method Hold setHelduntildate(\DateTime $var) Sets the helduntildate
 * 
 * @method string getReason() Returns the reason
 * @method Hold setReason(string $var) Sets the reason
 * 
 * @method \tabs\apiclient\Tabsuser getTabsuser() Returns the tabsuser
 */
class Hold extends Builder
{
    /**
     * Helddate
     *
     * @var \DateTime
     */
    protected $helddate;

    /**
     * Helduntildate
     *
     * @var \DateTime
     */
    protected $helduntildate;

    /**
     * Reason
     *
     * @var string
     */
    protected $reason;

    /**
     * Tabsuser
     *
     * @var \tabs\apiclient\Tabsuser
     */
    protected $tabsuser;

    // -------------------- Public Functions -------------------- //

    /**
     * Set the tabsuser
     *
     * @param stdclass|array|\tabs\apiclient\Tabsuser $tabsuser The Tabsuser
     *
     * @return Hold
     */
    public function setTabsuser($tabsuser)
    {
        $this->tabsuser = \tabs\apiclient\Tabsuser::factory($tabsuser);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $arr = array(
            'reason' => $this->getReason()
        );
        
        if ($this->getTabsuser()) {
            $arr['tabsuserid'] = $this->getTabsuser()->getId();
        }
        
        if ($this->getHelddate() && $this->getHelddate() instanceof \DateTime) {
            $arr['helddate'] = $this->getHelddate()->format('Y-m-d');
        }
        
        if ($this->getHelduntildate() && $this->getHelduntildate() instanceof \DateTime) {
            $arr['helduntildate'] = $this->getHelduntildate()->format('Y-m-d');
        }
        
        return $arr;
    }
}