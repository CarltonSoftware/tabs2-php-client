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
 * @method string  getTitle()       Returns the title
 * @method string  getDescription() Returns the description
 * @method integer getHeight()      Returns the height
 * @method integer getWidth()       Returns the width
 *
 * @method Image setFilename(string $filename) Set the filename
 * @method Image setTitle(string $title)       Set the title
 * @method Image setDescription(string $desc)  Set the description
 * @method Image setHeight(integer $height)    Set the height
 * @method Image setWidth(integer $width)      Set the width
 */
class Image extends FileBuilder
{
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
    
    /**
     * Image data
     * 
     * @var resource 
     */
    protected $data;
    
    /**
     * Mime type
     * 
     * @var integer
     */
    private $_mimeType = IMAGETYPE_JPEG;
    
    /**
     * Internal flag to see if image has been resized or not
     * 
     * @var boolean
     */
    private $_resized = false;
    
    /**
     * Internal flag to see if image has been cropped or not
     * 
     * @var boolean
     */
    private $_cropped = false;

    // -------------------------- Public Functions -------------------------- //
    
    /**
     * Get the image data from the api
     * 
     * @throws \tabs\apiclient\client\Exception
     * 
     * @return Image
     */
    public function getImageData()
    {
        return $this->setData(file_get_contents($this->getUrl()));
    }
    
    /**
     * Set the image data from a supplied string
     * 
     * @param string $imgData Image data
     * 
     * @throws \tabs\apiclient\client\Exception
     * 
     * @return \tabs\apiclient\core\Image
     */
    public function setData($imgData)
    {
        if (is_string($imgData) && strlen($imgData) > 0) {
            // Reset internal flags
            $this->_cropped = false;
            $this->_resized = false;
            
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $this->_setMimeType(
                finfo_buffer($finfo, $imgData)
            );
            finfo_close($finfo);
            
            return $this->_setImageData(
                imagecreatefromstring($imgData)
            );
        } else {
            throw new \tabs\apiclient\client\Exception(null, 'Image not found');
        }
        
        return $this;
    }
    
    /**
     * Set the image from a supplied path to local image
     * 
     * @param string $pathToFile Path to file
     * 
     * @return Image
     */
    public function setDataFromPath($pathToFile)
    {
        return $this->setData(file_get_contents($pathToFile));
    }
    
    /**
     * @inheritDoc
     */
    public function getFilename()
    {
        return $this->filename;
    }
    
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
    public function getFiledata()
    {
        if ($this->getData() !== null) {
            ob_start();
            $func = $this->_getImageMethod();
            $func($this->getData());
            $image = ob_get_clean();
            return $image;
        } else {
            return;
        }
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

    // ----------------------- Image resize functions ----------------------- //
    
    /**
     * Save an image to the directory
     * 
     * @param string $filename Optional filename (path optional) to override
     *                         the auto generated filename
     * 
     * @throws \tabs\apiclient\client\Exception
     * 
     * @return \tabs\apiclient\core\Image
     */
    public function save($filename = '')
    {
        if (strlen($filename) > 0) {
            $pathinfo = pathinfo($filename);
            
            if (isset($pathinfo['dirname']) 
                && !is_writable($pathinfo['dirname'])
            ) {
                throw new \tabs\apiclient\client\Exception(
                    null,
                    'Specified directory is not writable or doesn\'t exist.'
                );
            }
            
            if ($this->_checkExtension($pathinfo['extension'])) {
                throw new \tabs\apiclient\client\Exception(
                    null,
                    'Extension mis-match. Specified extension does not match'
                        . ' image exif data.'
                );
            }
            
        } else {
            $filename = $this->_generateFilename();
        }
        
        // Export to directory
        imageJPEG(
            $this->getData(),
            $filename,
            100
        );
        
        return $this;
    }
    
    /**
     * Resize an image based on provided parameters and set the image data
     * once resized.
     * 
     * @param integer $width  New image width
     * @param integer $height New image height
     * @param integer $dst_x  x-coordinate of destination point
     * @param integer $dst_y  y-coordinate of destination point
     * @param integer $src_x  x-coordinate of source point
     * @param integer $src_y  y-coordinate of source point
     * 
     * @see imagecopyresampled
     * 
     * @return Image
     */
    public function resize(
        $width,
        $height,
        $dst_x = 0,
        $dst_y = 0,
        $src_x = 0,
        $src_y = 0
    ) {
        // New Image
        $img = imagecreatetruecolor($width, $height);
        imagecopyresampled(
            $img,
            $this->getData(),
            $dst_x,
            $dst_y,
            $src_x,
            $src_y,
            $width,
            $height,
            $this->getWidth(),
            $this->getHeight()
        );
        
        // Set resize flag
        $this->_resized = true;
        
        return $this->_setImageData($img);
    }
    
    /**
     * Scale an image based on provided parameters and set the image data
     * once resized.  The pictures aspect ratio will determine whether the
     * image should be scaled by width or by height.
     * 
     * @param integer $width  New image width
     * @param integer $height New image height
     * @param integer $dst_x  x-coordinate of destination point
     * @param integer $dst_y  y-coordinate of destination point
     * @param integer $src_x  x-coordinate of source point
     * @param integer $src_y  y-coordinate of source point
     * 
     * @see imagecopyresampled
     * 
     * @return Image
     */
    public function scale(
        $width,
        $height,
        $dst_x = 0,
        $dst_y = 0,
        $src_x = 0,
        $src_y = 0
    ) {
        $ratio = $this->getWidth() / $this->getHeight();
        
        // Check for landscape
        if (($width / $height) > $ratio) {
            $width = $height * $ratio;
        } else {
            $height = $width / $ratio;
        }

        return $this->resize($width, $height);
    }

    /**
     * Perform a crop on the existing image.  Crop locations are:
     * 
     *  - center:        Crops from the central point of the source image.
     *  - left:          X = 0, Y = (height / 2)
     *  - right:         X = (width), Y = (height / 2)
     *  - top center:    X = (width / 2), Y = 0
     *  - bottom center: X = (width / 2), Y = (height)
     *  - top left:      X = 0, Y = (height)
     *  - top right:     X = (width), Y = 0
     *  - bottom left:   X = (width), Y = (height)
     *  - bottom right:  X = (width), Y = (height)
     * 
     * @param integer $cropWidth  Cropping width
     * @param integer $cropHeight Cropping height
     * @param string  $location   Crop locations
     * 
     * @return Image
     */
    public function crop($cropWidth, $cropHeight, $location = 'center')
    {
        // Set internal flag
        $this->_cropped = true;
            
        $width = $this->getWidth();
        $height = $this->getHeight();
        
        // Set new height / width for resizing later
        $this->setWidth($cropWidth);
        $this->setHeight($cropHeight);
        
        $x_pos = ceil(($width - $cropWidth) / 2);
        $y_pos = ceil(($height - $cropHeight) / 2);
        
        switch($location) {
        case 'center':
        case 'centre':
            break;
        case 'left':
            $x_pos = 0;
            break;
        case 'right':
            $x_pos = $width;
            break;
        case 'top center':
        case 'top centre':
            $y_pos = 0;
            break;
        case 'bottom center':
        case 'bottom centre':
            $y_pos = $height;
            break;
        case 'top right':
            $x_pos = $width;
            $y_pos = 0;
            break;
        case 'bottom right':
            $x_pos = $width;
            $y_pos = $height;
            break;
        case 'top left':
            $x_pos = 0;
            $y_pos = 0;
            break;
        case 'bottom left':
            $x_pos = 0;
            $y_pos = $height;
            break;
        }
        
        // Reset position to zero if they are negative
        $x_pos = ($x_pos < 0) ? 0 : $x_pos;
        $y_pos = ($y_pos < 0) ? 0 : $y_pos;
        
        return $this->resize($cropWidth, $cropHeight, 0, 0, $x_pos, $y_pos);
    }

    // ------------------------- Private Functions -------------------------- //
    
    /**
     * Return a generated filename
     * 
     * @return string
     */
    private function _generateFilename()
    {
        return sprintf(
            '%s%s%sx%s-%s',
            ($this->_cropped) ? 'cropped-' : '',
            ($this->_resized) ? 'resized-' : '',
            $this->getWidth(),
            $this->getHeight(),
            $this->getFilename()
        );
    }

    /**
     * Check to see if a specified extension matches the current one specified
     * by the image data.  There is a bit of a fudge to check to allow jpg ==
     * jpeg when specified.
     * 
     * @param string $ext Extension
     * 
     * @return boolean
     */
    private function _checkExtension($ext)
    {
        if ($ext !== $this->_getExtension()) {
            return ($this->_getExtension() == 'jpeg' && $ext == 'jpg');
        }
        
        return true;
    }

    /**
     * Return the extension
     * 
     * @return string
     */
    private function _getExtension()
    {
        return image_type_to_extension($this->_mimeType);
    }
    
    /**
     * Return the gd image method
     * 
     * @return string
     */
    private function _getImageMethod()
    {
        return 'image' . strtoupper(
            str_replace('.', '', $this->_getExtension())
        );
    }


    /**
     * Set the mime type constant based on the string provided
     * 
     * @param string $mime Mime type
     * 
     * @return \tabs\apiclient\core\Image
     */
    private function _setMimeType($mime)
    {
        $mimes = array(
            'image/gif' => IMAGETYPE_GIF,
            'image/jpeg' => IMAGETYPE_JPEG,
            'image/png' => IMAGETYPE_PNG,
            'image/bmp' => IMAGETYPE_BMP
        );
        
        if (array_key_exists($mime, $mimes)) {
            $this->_mimeType = $mimes[$mime];
        }
        
        return $this;
    }
    
    /**
     * Set the image resource data
     * 
     * @param resource $imgData Image data
     * 
     * @return \tabs\apiclient\core\Image
     */
    private function _setImageData($imgData)
    {
        if (get_resource_type($imgData) != 'gd') {
            throw new \tabs\apiclient\client\Exception(
                null,
                'Invalid resource type'
            );
        }
        
        $this->data = $imgData;
        $this->setWidth(imagesx($this->data));
        $this->setHeight(imagesy($this->data));
        
        return $this;
    }
}