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
 * @method TextItem setName(string $var) Sets the name
 * 
 * @method TextItem setText(string $var) Sets the text
 * 
 * 
 * @method TextItem setHeader(boolean $var) Sets the header boolean
 * 
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

    /**
     * Returns the name string
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
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

    /**
     * Returns the language object
     *
     * @return \tabs\apiclient\Language
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Returns the encoding object
     *
     * @return \tabs\apiclient\Encoding
     */
    public function getEncoding()
    {
        return $this->encoding;
    }

    /**
     * Returns the branding object
     *
     * @return \tabs\apiclient\Branding
     */
    public function getBranding()
    {
        return $this->branding;
    }

    /**
     * Returns the header boolean
     *
     * @return boolean
     */
    public function getHeader()
    {
        return $this->header;
    }

    /**
     * Returns the footer boolean
     *
     * @return boolean
     */
    public function getFooter()
    {
        return $this->footer;
    }
}