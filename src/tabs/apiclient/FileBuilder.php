<?php

namespace tabs\apiclient;

/**
 * Tabs client builder helper object.
 *
 * @category  Core
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * @method FileBuilder setFileLocation(string $loc) Set the file location
 */
abstract class FileBuilder extends Builder
{
    /**
     * File id
     * 
     * @var string
     */
    protected $fileId;
    
    /**
     * File location. Set for new files
     * 
     * @var string
     */
    protected $fileLocation;

    // -------------------------- Public Functions -------------------------- //
    
    /**
     * Return the file id
     * 
     * @return integer
     */
    public function getFileId()
    {
        return $this->fileId;
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
        $this->fileId = \tabs\apiclient\Base::getIdFromString($file);
        
        return $this;
    }
    
    /**
     * @inheritDoc
     */
    public function getFiledata()
    {
        if (strlen($this->getFileUrl()) > 0) {
            return $this->getFileFromUrl($this->getFileUrl());
        } else {
            return;
        }
    }
    
    /**
     * Perform a get on a specific url
     * 
     * @param string $url URL
     * 
     * @return string
     */
    public function getFileFromUrl($url)
    {
        $res = \tabs\apiclient\client\Client::getClient()->get(
            (string) $this->getUrl($url)
        );

        return (string) $res->getBody();
    }
    
    /**
     * Get the absolute path to the url
     * 
     * @return string
     */
    public function getUrl($uri)
    {
        return (string) $this->getRequest($uri);
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
     * @return \GuzzleHttp\Psr7\Uri
     */
    public function getRequest($uri)
    {
        return new \GuzzleHttp\Psr7\Uri(
            (string) \tabs\apiclient\client\Client::getClient()->getConfig(
                'base_uri'
            ) . $uri
        );
    }
    
    /**
     * Perform a new file post
     * 
     * @return \tabs\apiclient\FileBuilder
     */
    public function create()
    {
        // Perform post request
        $req = \tabs\apiclient\client\Client::getClient()->createPostFileRequest(
            $this->getCreateUrl(),
            $this->getFileLocation(),
            $this->toCreateArray()
        );

        // Set the id of the element
        $id = self::getRequestId($req);
        if ($id) {
            $this->setId(
                (integer) $id
            );
        }

        return $this;
    }

    // ------------------------- Private Functions -------------------------- //
    
    /**
     * Get the file url
     * 
     * @return string|null
     */
    protected function getFileUrl()
    {
        if ($this->fileId) {
            return implode('/', array('file', $this->fileId));
        }
    }

    /**
     * Return the location of the file
     *
     * @return string
     */
    public function getFileLocation()
    {
        return $this->fileLocation;
    }
}