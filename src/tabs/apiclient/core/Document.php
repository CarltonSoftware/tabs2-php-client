<?php

namespace tabs\apiclient\core;

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
 *
 * @method Document  setName(string $filename)     Set the name
 * @method Document  setFilename(string $filename) Set the filename
 * @method Document  setDescription(string $desc)  Set the description
 * @method Document  setWeight(integer $weight)    Set the weight
 * @method Document  setPrivate(boolean $boolean)  Set the visibility flag
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
     * Get the path to the thumbnail url
     * 
     * @param string $width Width in px
     * 
     * @return string
     */
    public function getThumbnailUrl($width = 50)
    {
        return $this->getImageUrl('width', $width);
    }
    
    /**
     * Get the image url
     * 
     * @param string $type   Resize type
     * @param string $width  Width in px
     * @param string $height Height in px
     * 
     * @return string
     */
    public function getImageUrl($type, $width = 0, $height = 0)
    {
        return $this->getUrl(
            'file/' . implode(
                '/',
                array(
                    $this->fileId,
                    $type,
                    $width,
                    $height
                )
            )
        );
    }
    
    /**
     * Get the path to the thumbnail as html markup
     * 
     * @param string $width Width in px
     * 
     * @return string
     */
    public function getThumbnailSrc($width = 50)
    {
        return $this->getImageSrc('width', $width);
    }
    
    /**
     * Get the image as html markup
     * 
     * @param string $type   Resize type
     * @param string $width  Width in px
     * @param string $height Height in px
     * 
     * @return string
     */
    public function getImageSrc($type, $width = 0, $height = 0)
    {
        return sprintf(
            '<img src="%s" alt="%s" title="%s">',
            $this->getImageUrl($type, $width, $height),
            $this->getFilename(),
            $this->getDescription()
        );
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