<?php

/**
 * Tabs Rest Note text object.
 *
 * PHP Version 5.4
 *
 * @category  Core
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://www.carltonsoftware.co.uk
 */

namespace tabs\apiclient\core;
use tabs\apiclient\actor\Actor;

/**
 * Tabs Rest Note text object.
 *
 * @category  Core
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * 
 * @method string     getText()      Returns the Note subject
 * 
 * @method Notetext setId(integer $id)       Set the note id
 * @method Notetext setText(string $subject) Set the note text
 */
class Notetext extends Notemeta
{
    /**
     * Note Text
     * 
     * @var string
     */
    protected $text = '';

    // ------------------ Public Functions --------------------- //
    
    /**
     * Generate a url string for a update url
     * 
     * @return string
     */
    public function getUpdateUrl()
    {
        return '/note/' 
            . $this->getParent()->getId() 
            . '/notetext/' 
            . $this->getId();
    }
    
    /**
     * Array representation of the address.  Used for creates/updates.
     * 
     * @return array
     */
    public function toArray()
    {
        return array(
            'createdby' => $this->getCreatedBy()->getId(),
            'text' => $this->getText()
        );
    }
    
    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return (string) $this->getCreatedBy() . ' said: ' . $this->getText();
    }
}