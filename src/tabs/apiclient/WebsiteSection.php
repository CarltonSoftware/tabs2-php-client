<?php

namespace tabs\apiclient;
use tabs\apiclient\Builder;

/**
 * Tabs Rest API Website section object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * @method string         getSection()            Returns the section name
 * @method WebsiteSection setSection(string $str) Sets the section name
 */
class WebsiteSection extends Builder
{
    /**
     * Section
     * 
     * @var string
     */
    protected $section = '';
    
    // ------------------ Public Functions --------------------- //
    
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'section' => $this->getSection()
        );
    }
}