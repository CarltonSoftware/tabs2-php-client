<?php

namespace tabs\apiclient;

/**
 * Tabs Rest API Image object.
 *
 * @category  Core
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * @method string  getAlt()    Returns the title
 * @method integer getHeight() Returns the height
 * @method integer getWidth()  Returns the width
 *
 * @method Image setAlt(string $alt)        Set the title
 * @method Image setHeight(integer $height) Set the height
 * @method Image setWidth(integer $width)   Set the width
 */
class Image extends Document
{
    /**
     * Image title
     * 
     * @var string 
     */
    protected $alt = '';
    
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

    // -------------------------- Public Functions -------------------------- //
    
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
        return implode(
            '/',
            array(
                $this->getFileUrl(),
                $type,
                $width,
                $height
            )
        );
    }
    
    /**
     * Debugging function. Output the image to screen.
     * 
     * This should not be used in a production environment! You should cache
     * images locally.
     * 
     * @param string $type   Resize type
     * @param string $width  Width in px
     * @param string $height Height in px
     * 
     * @return string
     */
    public function getImageTag($type = 'tocc', $width = 100, $height = 100)
    {
        $data = base64_encode(
            $this->getFileFromUrl(
                $this->getImageUrl($type, $width, $height)
            )
        );
        
        return sprintf(
            '<img src="data:image/jpg;base64,%s" alt="%s" title="%s" width="%s" height="%s">',
            $data,
            $this->getAlt(),
            $this->getDescription(),
            $width,
            $height
        );
    }
    
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'id' => $this->getId(),
            'filename' => $this->getFilename(),
            'alt' => $this->getAlt(),
            'description' => $this->getDescription(),
            'height' => $this->getHeight(),
            'width' => $this->getWidth()
        );
    }
    
    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return $this->getImageTag();
    }
}