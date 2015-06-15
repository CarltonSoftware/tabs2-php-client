<?php

/**
 * Tabs Rest API Document object.
 *
 * PHP Version 5.4
 *
 * @category  Core
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2015 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 */

namespace tabs\apiclient\core;
use \tabs\apiclient\core\Mimetype;

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
 * @method string    getFileLocation() Return the location of the file
 *
 * @method Document  setName(string $filename)     Set the name
 * @method Document  setFilename(string $filename) Set the filename
 * @method Document  setDescription(string $desc)  Set the description
 * @method Document  setWeight(integer $weight)    Set the weight
 * @method Document  setPrivate(boolean $boolean)  Set the visibility flag
 * @method Document  setFileLocation(string $loc)  Set the file location
 */
class Document extends FileBuilder
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
     * Location of stored file
     * 
     * @var string
     */
    protected $fileLocation = '';
    
    /**
     * File id
     * 
     * @var string
     */
    protected $fileId;

    // ------------------ Static Functions --------------------- //
    
    /**
     * Request a document from the api
     * 
     * @param integer $id Document Id
     * 
     * @return Document
     */
    public static function get($id)
    {
        return self::_get('/document/' . $id);
    }

    // -------------------------- Public Functions -------------------------- //
    
    /**
     * Constructor
     * 
     * @return void
     */
    public function __construct()
    {
        $this->timeadded = new \DateTime();
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
     * This method will be called in the factory method when creating api objects.
     * It will set the absolute location of it so the _setFileData function
     * can file the file.
     * 
     * @param string $file Relative api file url
     * 
     * @return Document
     */
    public function setFile($file)
    {
        $this->fileId = Base::getIdFromString($file);
        
        return $this->setFileLocation(
            $this->getUrl($file)
        );
    }
    
    /**
     * Set the document mimetype
     * 
     * @param array|stdClass|Mimetype $mimeType Mimetype
     * 
     * @return \tabs\apiclient\core\Document
     */
    public function setMimetype($mimeType)
    {
        $this->mimetype = Mimetype::factory($mimeType);
        
        return $this;
    }
    
    /**
     * @inheritDoc
     */
    public function getFiledata()
    {
        if (strlen($this->getFileLocation()) > 0) {
            return file_get_contents(
                $this->getFileLocation()
            );
        } else {
            return;
        }
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
            '/file/' . implode(
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
     * Get the absolute path to the url
     * 
     * @return string
     */
    public function getUrl($uri)
    {
        return $this->getRequest($uri)->getUrl();
    }
    
    /**
     * Get the relative path to the image url
     * 
     * @return string
     */
    public function getPath($uri)
    {
        return $this->getRequest($uri)->getPath();
    }
    
    /**
     * Return the request object
     * 
     * @return \GuzzleHttp\Message\RequestInterface
     */
    public function getRequest($uri)
    {
        $req = \tabs\apiclient\client\Client::getClient()->createRequest(
            'GET',
            $uri
        );
        
        return \tabs\apiclient\client\Client::getClient()
            ->getHmac()
            ->setHmacParams($req);
    }
    
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'id' => $this->getId(),
            'name' => $this->getName(),
            'weight' => $this->getWeight(),
            'description' => $this->getDescription(),
            'private' => $this->boolToStr($this->isPrivate())
        );
    }
    
    /**
     * ToString magic method
     * 
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
    }

    // ------------------------- Private Functions -------------------------- //
}