<?php

namespace tabs\apiclient\property\room;

use tabs\apiclient\Builder;
use tabs\apiclient\property\Document;

/**
 * Tabs Rest API Image object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method Document getPropertyimage() Returns the propertyimage
 */
class Image extends Builder
{
    /**
     * Propertyimage
     *
     * @var Document
     */
    protected $propertyimage;

    // -------------------- Public Functions -------------------- //

    /**
     * Set the propertyimage
     *
     * @param stdclass|array|Document $propertyimage The Propertyimage
     *
     * @return Image
     */
    public function setPropertyimage($propertyimage)
    {
        $this->propertyimage = Document::factory($propertyimage);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'propertydocumentid' => $this->getPropertyimage()->getId()
        );
    }
}