<?php

namespace tabs\apiclient\keytag;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API Check object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method string getType() Returns the type string
 * @method Check setType(string $var) Sets the type
 * 
 * @method \DateTime getCheckdatetime() Returns the checkdatetime \DateTime
 * @method Check setCheckdatetime(\DateTime $var) Sets the checkdatetime
 * 
 * @method string getNotes() Returns the notes string
 * @method Check setNotes(string $var) Sets the notes
 * 
 * @method \tabs\apiclient\KeyCheckReason getKeycheckreason() Returns the keycheckreason object
 * @method \tabs\apiclient\TabsUser getTabsuser() Returns the tabsuser object
 * @method \DateTime getExpectedbackdatetime() Returns the expectedbackdatetime \DateTime
 * @method Check setExpectedbackdatetime(\DateTime $var) Sets the expectedbackdatetime
 */
class Check extends Builder
{
    /**
     * Type
     *
     * @var string
     */
    protected $type;

    /**
     * Checkdatetime
     *
     * @var \DateTime
     */
    protected $checkdatetime;

    /**
     * Notes
     *
     * @var string
     */
    protected $notes;

    /**
     * Keycheckreason
     *
     * @var \tabs\apiclient\KeyCheckReason
     */
    protected $keycheckreason;

    /**
     * Tabsuser
     *
     * @var \tabs\apiclient\TabsUser
     */
    protected $tabsuser;

    /**
     * Expectedbackdatetime
     *
     * @var \DateTime
     */
    protected $expectedbackdatetime;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->checkdatetime = new \DateTime();
        $this->expectedbackdatetime = new \DateTime();
        parent::__construct($id);
    }

    /**
     * Set the keycheckreason
     *
     * @param stdclass|array|\tabs\apiclient\KeyCheckReason $keycheckreason The Keycheckreason
     *
     * @return Check
     */
    public function setKeycheckreason($keycheckreason)
    {
        $this->keycheckreason = \tabs\apiclient\KeyCheckReason::factory($keycheckreason);

        return $this;
    }

    /**
     * Set the tabsuser
     *
     * @param stdclass|array|\tabs\apiclient\TabsUser $tabsuser The Tabsuser
     *
     * @return Check
     */
    public function setTabsuser($tabsuser)
    {
        $this->tabsuser = \tabs\apiclient\TabsUser::factory($tabsuser);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $arr = $this->__toArray();

        if ($this->getKeycheckreason()) {
            $arr['keycheckreasonid'] = $this->getKeycheckreason()->getId();
        }

        if ($this->getTabsuser()) {
            $arr['tabsuserid'] = $this->getTabsuser()->getId();
        }

        return $arr;
    }
}