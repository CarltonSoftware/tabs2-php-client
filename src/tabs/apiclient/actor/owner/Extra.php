<?php

namespace tabs\apiclient\actor\owner;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API Extra object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method \tabs\apiclient\extra\Extra getExtra() Returns the extra
 * 
 * @method boolean getTakefromdeposit() Returns the takefromdeposit
 * @method Extra setTakefromdeposit(boolean $var) Sets the takefromdeposit
 */
class Extra extends Builder
{
    /**
     * Extra
     *
     * @var \tabs\apiclient\extra\Extra
     */
    protected $extra;

    /**
     * Takefromdeposit
     *
     * @var boolean
     */
    protected $takefromdeposit = false;

    // -------------------- Public Functions -------------------- //

    /**
     * Set the extra
     *
     * @param stdclass|array|\tabs\apiclient\extra\Extra $extra The Extra
     *
     * @return Extra
     */
    public function setExtra($extra)
    {
        $this->extra = \tabs\apiclient\extra\Extra::factory($extra);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'extraid' => $this->getExtra()->getId(),
            'takefromdeposit' => $this->getTakefromdeposit(),
        );
    }
}