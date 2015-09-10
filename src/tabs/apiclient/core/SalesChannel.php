<?php

/**
 * Tabs Rest API Sales Channel object
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

namespace tabs\apiclient\core;

/**
 * A Sales Channel is a route to market, e.g. direct sale, web, affiliate, reseller
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * @method string       getSaleschannel()             Returns the short name
 * @method SalesChannel setSaleschannel(string $code) Sets the short name
 * 
 * @method string       getDescription()             Returns the description
 * @method SalesChannel setDescription(string $code) Sets the description
 */
class SalesChannel extends \tabs\apiclient\core\Builder
{
    /**
     * The short name of the Sales Channel
     * 
     * @var string
     */
    protected $saleschannel;
    
    /**
     * Description of the Sales Channel
     * 
     * @var string
     */
    protected $description;


    // ------------------ Public Functions --------------------- //

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'id' => $this->getId(),
            'saleschannel' => $this->getSaleschannel(),
            'description' => $this->getDescription(),
        );
    }

    /**
     * String magic method
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getSaleschannel();  
    }
}