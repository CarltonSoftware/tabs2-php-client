<?php

/**
 * Tabs Rest API Special offer Promotion object.
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
 * Tabs Rest API Special offer Promotion object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2015 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method string getPromotioncode() Returns the promotioncode
 * @method \tabs\apiclient\core\specialoffer\Promotion setPromotioncode(string $var) Sets the promotioncode
 * 
 * @method float getUsagelimit() Returns the usagelimit
 * @method \tabs\apiclient\core\specialoffer\Promotion setUsagelimit(float $var) Sets the usagelimit
 * 
 * @method string getUsedcount() Returns the usedcount
 * @method \tabs\apiclient\core\specialoffer\Promotion setUsedcount(string $var) Sets the usedcount
 * 
 * @method \tabs\apiclient\core\extra\Branding getExtrabranding() Returns the extrabranding
 */
class Promotion extends \tabs\apiclient\core\Builder
{
    /**
     * Applicable promotion code
     * 
     * @var string
     */
    protected $promotioncode = '';
    
    /**
     * Usage limit
     * 
     * @var float
     */
    protected $usagelimit = 1000;
    
    /**
     * Used count
     * 
     * @var string
     */
    protected $usedcount = 0;
    
    /**
     * Extra branding object
     * 
     * @var \tabs\apiclient\core\extra\Branding
     */
    protected $extrabranding;
    
    /**
     * Set the website section
     * 
     * @param Link|stdClass|\tabs\apiclient\core\extra\Branding $eb Extra branding object
     * 
     * @return \tabs\apiclient\core\specialoffer\Promotion
     */
    public function setExtrabranding($eb)
    {
        $this->extrabranding = \tabs\apiclient\core\extra\Branding::factory($eb);
        
        return $this;
    }
    
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'id' => $this->getId(),
            'promotioncode' => $this->getPromotioncode(),
            'extrabrandingid' => $this->getExtrabranding()->getId(),
            'limit' => $this->getUsagelimit(),
            'usecount' => $this->getUsedcount()
        );
    }
}