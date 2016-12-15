<?php

namespace tabs\apiclient\property;
use tabs\apiclient\Builder;
use tabs\apiclient\core\Document;
use tabs\apiclient\core\Image;

/**
 * Tabs Rest API PropertyDocument object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method \DateTime getCreated() Returns the created
 * @method PropertyDocument setCreated(\DateTime $var) Sets the created
 * 
 * @method Document getDocument() Returns the document
 */
class PropertyDocument extends Builder
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
     * @var Document
     */
    protected $document;

    // -------------------- Public Functions -------------------- //

    /**
     * Constructor
     * 
     * @param integer $id ID
     *
     * @return void
     */
    public function __construct($id = null)
    {
        $this->created = new \DateTime();

        parent::__construct($id);
    }

    /**
     * Set the document
     *
     * @param stdclass|array|Document $document The Document
     *
     * @return PropertyDocument
     */
    public function setDocument($document)
    {
        $this->document = Document::factory($document);

        return $this;
    }

    /**
     * Set the document
     *
     * @param stdclass|array|Document $document The Document
     *
     * @return PropertyDocument
     */
    public function setImage($document)
    {
        $this->document = Image::factory($document);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'documentid' => $this->getDocument()->getId()
        );
    }

    /**
     * @inheritDoc
     */
    public function getUrlStub()
    {
        return 'document';
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return (string) $this->getDocument();
    }
}