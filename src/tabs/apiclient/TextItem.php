<?php

namespace tabs\apiclient;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API TextItem object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method string getName() Returns the name string
 * @method TextItem setName(string $var) Sets the name
 * 
 * @method string getText() Returns the text string
 * @method TextItem setText(string $var) Sets the text
 * 
 * @method \tabs\apiclient\Language getLanguage() Returns the language object
 * @method \tabs\apiclient\Encoding getEncoding() Returns the encoding object
 * @method \tabs\apiclient\Branding getBranding() Returns the branding object
 * 
 * @method boolean getHeader() Returns the header boolean
 * @method TextItem setHeader(boolean $var) Sets the header boolean
 * 
 * @method boolean getFooter() Returns the footer boolean
 * @method TextItem setFooter(boolean $var) Sets the footer boolean
 */
class TextItem extends Builder
{
    /**
     * Name
     *
     * @var string
     */
    protected $name;

    /**
     * Text
     *
     * @var string
     */
    protected $text;

    /**
     * Language
     *
     * @var \tabs\apiclient\Language
     */
    protected $language;

    /**
     * Encoding
     *
     * @var \tabs\apiclient\Encoding
     */
    protected $encoding;

    /**
     * Branding
     *
     * @var \tabs\apiclient\Branding
     */
    protected $branding;

    /**
     * Header
     *
     * @var boolean
     */
    protected $header;

    /**
     * Footer
     *
     * @var boolean
     */
    protected $footer;

    // -------------------- Public Functions -------------------- //

    /**
     * Set the language
     *
     * @param stdclass|array|\tabs\apiclient\Language $language The Language
     *
     * @return TextItem
     */
    public function setLanguage($language)
    {
        $this->language = \tabs\apiclient\Language::factory($language);

        return $this;
    }

    /**
     * Set the encoding
     *
     * @param stdclass|array|\tabs\apiclient\Encoding $encoding The Encoding
     *
     * @return TextItem
     */
    public function setEncoding($encoding)
    {
        $this->encoding = \tabs\apiclient\Encoding::factory($encoding);

        return $this;
    }

    /**
     * Set the branding
     *
     * @param stdclass|array|\tabs\apiclient\Branding $branding The Branding
     *
     * @return TextItem
     */
    public function setBranding($branding)
    {
        $this->branding = \tabs\apiclient\Branding::factory($branding);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $arr = $this->__toArray();

        if ($this->getLanguage()) {
            $arr['languageid'] = $this->getLanguage()->getId();
        }

        if ($this->getEncoding()) {
            $arr['encodingid'] = $this->getEncoding()->getId();
        }

        if ($this->getBranding()) {
            $arr['brandingid'] = $this->getBranding()->getId();
        }

        return $arr;
    }
}