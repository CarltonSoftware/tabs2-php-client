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
 *
 * @method Document  setName(string $filename)     Set the name
 * @method Document  setFilename(string $filename) Set the filename
 * @method Document  setDescription(string $desc)  Set the description
 * @method Document  setWeight(integer $weight)    Set the weight
 * @method Document  setPrivate(boolean $boolean)  Set the visibility flag
 * 
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
     * Returns the name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns the filename
     *
     * @return string
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * Returns the description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Returns the weight
     *
     * @return string
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Returns the mimetype
     *
     * @return Mimetype
     */
    public function getMimetype()
    {
        return $this->mimetype;
    }

    /**
     * Returns the created time
     *
     * @return \DateTime
     */
    public function getTimeadded()
    {
        return $this->timeadded;
    }

    /**
     * Returns the visibility flag
     *
     * @return boolean
     */
    public function getPrivate()
    {
        return $this->private;
    }

    /**
     * Returns the document tags
     *
     * @return StaticCollection
     */
    public function getTags()
    {
        return $this->tags;
    }
}