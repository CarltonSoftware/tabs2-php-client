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
    public function getImageUrl($type, $width = 150, $height = 100)
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
     * Get the public url
     * 
     * @param string $type   Resize type. Types can be resize, width, 
     *                       height, smart, original and normal.
     * @param string $width  Width in px
     * @param string $height Height in px
     * 
     * @return string
     */
    public function getPublicImageUrl($type = 'smart', $width = 100, $height = 100)
    {
        return implode(
            '/',
            array(
                'image',
                $this->fileId,
                'resize',
                $type,
                $width,
                $height,
                $this->getFilename()
            )
        );
    }
    
    /**
     * Get the full public url function.
     * 
     * @param string $type   Resize type
     * @param string $width  Width in px
     * @param string $height Height in px
     * 
     * @return string
     */
    public function getFullPublicImageUrl($type = 'smart', $width = 100, $height = 100)
    {
        return $this->getUrl(
            $this->getPublicImageUrl($type, $width, $height)
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
            $this->getFileFromUrl($this->getImageUrl($type, $width, $height))
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
     * Get the full url function.
     * 
     * @param string $type   Resize type
     * @param string $width  Width in px
     * @param string $height Height in px
     * 
     * @return string
     */
    public function getFullImageUrl($type = 'tocc', $width = 100, $height = 100)
    {
        return $this->getUrl(
            $this->getImageUrl($type, $width, $height)
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
            'width' => $this->getWidth(),
            'weight' => $this->getWeight(),
        );
    }
    
    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return $this->getImageTag();
    }

    /**
     * Returns the title
     *
     * @return string
     */
    public function getAlt()
    {
        return $this->alt;
    }

    /**
     * Returns the height
     *
     * @return integer
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Returns the width
     *
     * @return integer
     */
    public function getWidth()
    {
        return $this->width;
    }
}