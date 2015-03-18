<?php

/**
 * Tabs Rest API Customer Document object.
 *
 * PHP Version 5.4
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2015 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://www.carltonsoftware.co.uk
 */

namespace tabs\apiclient\actor;

/**
 * Tabs Rest API Customer Document object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2015 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method integer                        getId()           Return the Id
 * @method \tabs\apiclient\actor\Document setId(string $id) Set the Id
 * @method \tabs\apiclient\core\Document  getDocument()     Return the Document
 */
class Document extends \tabs\apiclient\core\Builder
{
    /**
     * Id
     *
     * @var integer
     */
    protected $id;
    
    /**
     * Document
     *
     * @var \tabs\apiclient\core\Document
     */
    protected $document;
    
    // ------------------ Public Functions --------------------- //
    
    /**
     * Constructor
     * 
     * @return void
     */
    public function __construct()
    {
        $this->document = new \tabs\apiclient\core\Document();
    }
    
    /**
     * Set a new Document
     * 
     * @param array|tabs\apiclient\core\Document $doc Document
     * 
     * @return \tabs\apiclient\actor\Document
     */
    public function setDocument($doc)
    {
        $this->document = \tabs\apiclient\core\Document::factory($doc);
        
        return $this;
    }
    
    /**
     * ToString magic method
     * 
     * @return string
     */
    public function __toString()
    {
        return (string) $this->getDocument();
    }
    
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'documentid' => $this->getDocument()->getId()
        );
    }
    
    /**
     * @inheritDoc
     */
    public function getUrlStub()
    {
        return 'document';
    }
}
