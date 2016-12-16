<?php

namespace tabs\apiclient;
use tabs\apiclient\Builder;

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
class SalesChannel extends Builder
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
            'saleschannel' => $this->getSaleschannel(),
            'description' => $this->getDescription()
        );
    }
}