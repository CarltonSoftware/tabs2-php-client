<?php

namespace tabs\apiclient;
use tabs\apiclient\Builder;

/**
 * Tabs Rest Encoding object. 
 *
 * @category  Core
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method string   getEncoding()                 Returns the encoding type
 * @method Encoding setEncoding(string $encoding) Set the encoding
 */
class Encoding extends Builder
{
    /**
     * Encoding
     *
     * @var string
     */
    protected $encoding;

    // ------------------ Public Functions --------------------- //
    
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'encoding' => $this->getEncoding()
        );
    }
}