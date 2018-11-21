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
 * @method TextElement setText(string $var) Set the text string
 */
class TextElement extends Element
{
    /**
     * Textitem
     *
     * @var string
     */
    protected $text;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $arr = parent::toArray();
        $arr['type'] = 'TemplateElementText';
        $arr['text'] = $this->getText();

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
     * Returns the text string
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }
}