<?php

namespace tabs\apiclient\specialoffer;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API Promotion object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method string getPromotioncode() Returns the promotioncode string
 * @method Promotion setPromotioncode(string $var) Sets the promotioncode
 * 
 * @method \tabs\apiclient\Extra getExtra() Returns the extra object
 * @method integer getUsagelimit() Returns the usagelimit integer
 * @method Promotion setUsagelimit(integer $var) Sets the usagelimit
 * 
 * @method integer getUsedcount() Returns the usedcount integer
 * @method Promotion setUsedcount(integer $var) Sets the usedcount
 * 
 */
class Promotion extends Builder
{
    /**
     * Promotioncode
     *
     * @var string
     */
    protected $promotioncode;

    /**
     * Extra
     *
     * @var \tabs\apiclient\Extra
     */
    protected $extra;

    /**
     * Usagelimit
     *
     * @var integer
     */
    protected $usagelimit = 0;

    /**
     * Usedcount
     *
     * @var integer
     */
    protected $usedcount = 0;

    // -------------------- Public Functions -------------------- //

    /**
     * Set the extra
     *
     * @param stdclass|array|\tabs\apiclient\Extra $extra The Extra
     *
     * @return Promotion
     */
    public function setExtra($extra)
    {
        $this->extra = \tabs\apiclient\Extra::factory($extra);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $arr = $this->__toArray();

        if ($this->getExtra()) {
            $arr['extraid'] = $this->getExtra()->getId();
        }

        return $arr;
    }
}