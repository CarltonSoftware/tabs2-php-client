<?php

namespace tabs\apiclient\document;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API Tag object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method \tabs\apiclient\DocumentTag getDocumenttag() Returns the documenttag object
 */
class Tag extends Builder
{
    /**
     * Documenttag
     *
     * @var \tabs\apiclient\DocumentTag
     */
    protected $documenttag;

    // -------------------- Public Functions -------------------- //

    /**
     * Set the documenttag
     *
     * @param stdclass|array|\tabs\apiclient\DocumentTag $documenttag The Documenttag
     *
     * @return Tag
     */
    public function setDocumenttag($documenttag)
    {
        $this->documenttag = \tabs\apiclient\DocumentTag::factory($documenttag);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $arr = $this->__toArray();

        if ($this->getDocumenttag()) {
            $arr['tagid'] = $this->getDocumenttag()->getId();
        }

        return $arr;
    }
}