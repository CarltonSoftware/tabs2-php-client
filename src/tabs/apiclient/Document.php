<?php

namespace tabs\apiclient;

/**
 * Tabs Rest API Document object.
 *
 * @category  Core
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2015 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * @method string    getName()         Returns the name
 * @method string    getFilename()     Returns the filename
 * @method string    getDescription()  Returns the description
 * @method string    getWeight()       Returns the weight
 * @method Mimetype  getMimetype()     Returns the mimetype
 * @method \DateTime getTimeadded()    Returns the created time
 * @method boolean   getPrivate()      Returns the visibility flag
 *
 * @method Document  setName(string $filename)     Set the name
 * @method Document  setFilename(string $filename) Set the filename
 * @method Document  setDescription(string $desc)  Set the description
 * @method Document  setWeight(integer $weight)    Set the weight
 * @method Document  setPrivate(boolean $boolean)  Set the visibility flag
 * 
 * @method StaticCollection getTags() Returns the document tags
 */
class Document extends \tabs\apiclient\FileBuilder
{
    /**
     * Name
     * 
     * @var string
     */
    protected $name = '';
    
    /**
     * Filename
     * 
     * @var string
     */
    protected $filename = '';
    
    /**
     * Time added
     * 
     * @var \DateTime
     */
    protected $timeadded;
    
    /**
     * Description
     * 
     * @var string 
     */
    protected $description = '';
    
    /**
     * Weight
     * 
     * @var integer 
     */
    protected $weight = 0;
    
    /**
     * Private bool
     * 
     * @var boolean 
     */
    protected $private = false;
    
    /**
     * Mimetype
     * 
     * @var Mimetype 
     */
    protected $mimetype;
    
    /**
     * Document tags
     * 
     * @var Collection|\tabs\apiclient\document\Tag[]
     */
    protected $tags;

    // -------------------------- Public Functions -------------------------- //
    
    /**
     * Constructor
     * 
     * @param integer $id ID
     * 
     * @return void
     */
    public function __construct($id = null)
    {
        $this->timeadded = new \DateTime();
        $this->tags = Collection::factory(
            new document\Tag(),
            $this
        );
        
        parent::__construct($id);
    }
    
    /**
     * Return visibility flag
     * 
     * @return boolean
     */
    public function isPrivate()
    {
        return $this->private;
    }
    
    /**
     * Set the document mimetype
     * 
     * @param array|stdClass|Mimetype $mimeType Mimetype
     * 
     * @return Document
     */
    public function setMimetype($mimeType)
    {
        $this->mimetype = Mimetype::factory($mimeType);
        
        return $this;
    }
    
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'name' => $this->getName(),
            'weight' => $this->getWeight(),
            'description' => $this->getDescription(),
            'private' => $this->boolToStr($this->isPrivate())
        );
    }
}