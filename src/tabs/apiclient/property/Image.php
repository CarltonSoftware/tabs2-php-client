<?php

/**
 * Tabs Rest API Property Image object.
 *
 * PHP Version 5.4
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://www.carltonsoftware.co.uk
 */

namespace tabs\apiclient\property;
use tabs\apiclient\core\Image as CoreImage;

/**
 * Tabs Rest API Property Image object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * @method PropertyImage setId(integer $id) Set the id
 * 
 * @method integer       getId()            Returns the ID
 * @method CoreImage     getImage()         Returns the image
 */
class Image extends \tabs\apiclient\core\Builder
{
    /**
     * ID
     * 
     * @var integer
     */
    protected $id;
    
    /**
     * Image
     * 
     * @var Image
     */
    protected $image;
    
    // -------------------------- Public functions -------------------------- //
    
    /**
     * Set the image
     * 
     * @param array|stdClass|CoreImage $img Image
     * 
     * @return \tabs\apiclient\property\Image
     */
    public function setImage($img)
    {
        $this->image = CoreImage::factory($img);
        
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'id' => $this->getId(),
            'imageid' => $this->getImage()->getId()
        );
    }
}