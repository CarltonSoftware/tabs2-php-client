<?php

/**
 * Tabs Rest API Image object.
 *
 * PHP Version 5.3
 *
 * @category  Core
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 */

namespace tabs\apiclient\core;

/**
 * Tabs Rest API Image object.
 *
 * @category  Core
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * @method integer getId()          Returns the Id
 * @method string  getFilename()    Returns the filename of the img
 * @method string  getTitle()       Returns the title
 * @method string  getDescription() Returns the description
 * @method integer getHeight()      Returns the height
 * @method integer getWidth()       Returns the width
 *
 * @method Image setId(integer $id)            Set the id
 * @method Image setFilename(string $filename) Set the filename
 * @method Image setTitle(string $title)       Set the title
 * @method Image setDescription(string $desc)  Set the description
 * @method Image setHeight(integer $id)        Set the height
 * @method Image setWidth(integer $id)         Set the width
 */
class Image extends Builder
{
    /**
     * ID
     * 
     * @var integer
     */
    protected $id;
    
    /**
     * Image filename
     * 
     * @var string
     */
    protected $filename = '';
    
    /**
     * Image title
     * 
     * @var string 
     */
    protected $title = '';
    
    /**
     * Image description
     * 
     * @var string 
     */
    protected $description = '';
    
    /**
     * Image height in px
     * 
     * @var integer 
     */
    protected $height = 0;
    
    /**
     * Image width in px
     * 
     * @var integer 
     */
    protected $width = 0;
    
    // ------------------ Public Functions --------------------- //
    
    /**
     * Get the absolute path to the url
     * 
     * @return string
     */
    public function getUrl()
    {
        return $this->getRequest()->getUrl();
    }
    
    /**
     * Get the relative path to the image url
     * 
     * @return string
     */
    public function getPath()
    {
        return $this->getRequest()->getPath();
    }
    
    /**
     * Return the request object
     * 
     * @return \GuzzleHttp\Message\RequestInterface
     */
    public function getRequest()
    {
        $req = \tabs\apiclient\client\Client::getClient()->createRequest(
            'GET',
            'image/' . $this->getId()
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
            'filename' => $this->getFilename(),
            'title' => $this->getTitle(),
            'description' => $this->getDescription(),
            'height' => $this->getHeight(),
            'width' => $this->getWidth()
        );
    }
    
    /**
     * ToString magic method
     * 
     * @return string
     */
    public function __toString()
    {
        return $this->getTitle();
    }
}