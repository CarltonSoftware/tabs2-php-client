<?php

namespace tabs\apiclient\template;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API TextItemElement object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 */
class TextItemElement extends Element
{
    /**
     * Textitem
     *
     * @var \tabs\apiclient\TextItem;
     */
    protected $textitem;

    // -------------------- Public Functions -------------------- //

    /**
     * Set the textitem
     *
     * @param stdclass|array|\tabs\apiclient\TextItem $textitem The Textitem
     *
     * @return TextItemElement
     */
    public function setTextitem($textitem)
    {
        $this->textitem = \tabs\apiclient\TextItem::factory($textitem);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $arr = parent::toArray();
        $arr['type'] = 'TemplateElementTextItem';

        if ($this->getTextitem()) {
            $arr['textitemid'] = $this->getTextitem()->getId();
        }

        return $arr;
    }
    
    /**
     * @inheritDoc
     */
    public function getUrlStub()
    {
        return 'element';
    }

    /**
     * Returns the textitem object
     *
     * @return \tabs\apiclient\TextItem
     */
    public function getTextitem()
    {
        return $this->textitem;
    }
}