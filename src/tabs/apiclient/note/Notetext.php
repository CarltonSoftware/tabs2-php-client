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

namespace tabs\apiclient\note;

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
 * @method string   getNotetext()            Returns the NoteText text
 * 
 * @method Notetext setId(integer $id)       Set the note id
 * @method Notetext setText(string $subject) Set the note text
 */
class Notetext extends \tabs\apiclient\Notemeta
{
    /**
     * Note Text
     * 
     * @var string
     */
    protected $notetext = '';

    // ------------------ Public Functions --------------------- //
    
    /**
     * Array representation of the address.  Used for creates/updates.
     * 
     * @return array
     */
    public function toArray()
    {
        $arr = array(
            'notetext' => $this->getText()
        );
        
        if ($this->getCreatedby()) {
            $arr['createdbyactorid'] = $this->getCreatedby()->getId();
        }
        
        return $arr;
    }
    
    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return (string) $this->getCreatedby() . ' said: ' . $this->getNotetext();
    }
    
    /**
     * @inheritDoc
     */
    public function getUrlStub()
    {
        return 'text';
    }
}