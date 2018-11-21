<?php

namespace tabs\apiclient\contact;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API Document object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method Document setCreated(\DateTime $var) Sets the created
 * 
 */
class Document extends Builder
{
    /**
     * Created
     *
     * @var \DateTime
     */
    protected $created;

    /**
     * Document
     *
     * @var \tabs\apiclient\Document
     */
    protected $document;

    /**
     * Image
     *
     * @var \tabs\apiclient\Image
     */
    protected $image;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->created = new \DateTime();
        parent::__construct($id);
    }

    /**
     * Set the document
     *
     * @param stdclass|array|\tabs\apiclient\Document $document The Document
     *
     * @return Document
     */
    public function setDocument($document)
    {
        $this->document = \tabs\apiclient\Document::factory($document);

        return $this;
    }

    /**
     * Set the image
     *
     * @param stdclass|array|\tabs\apiclient\Image $image The Image
     *
     * @return Document
     */
    public function setImage($image)
    {
        $this->image = \tabs\apiclient\Image::factory($image);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        if ($this->getDocument()) {
            return array(
                'documentid' => $this->getDocument()->getId()
            );
        } else {
            return array(
                'imageid' => $this->getImage()->getId()
            );
        }
    }

    /**
     * Returns the created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Returns the document
     *
     * @return \tabs\apiclient\Document
     */
    public function getDocument()
    {
        return $this->document;
    }

    /**
     * Returns the image
     *
     * @return \tabs\apiclient\Image
     */
    public function getImage()
    {
        return $this->image;
    }
}