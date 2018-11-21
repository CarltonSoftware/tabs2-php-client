<?php

namespace tabs\apiclient;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API TemplateTargetSource object.
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
class TemplateTargetSource extends Builder
{
    /**
     * Templatetarget
     *
     * @var \tabs\apiclient\TemplateTarget
     */
    protected $templatetarget;

    /**
     * Templatesource
     *
     * @var \tabs\apiclient\TemplateSource
     */
    protected $templatesource;

    // -------------------- Public Functions -------------------- //

    /**
     * Set the templatetarget
     *
     * @param stdclass|array|\tabs\apiclient\TemplateTarget $templatetarget The Templatetarget
     *
     * @return TemplateTargetSource
     */
    public function setTemplatetarget($templatetarget)
    {
        $this->templatetarget = \tabs\apiclient\TemplateTarget::factory($templatetarget);

        return $this;
    }

    /**
     * Set the templatesource
     *
     * @param stdclass|array|\tabs\apiclient\TemplateSource $templatesource The Templatesource
     *
     * @return TemplateTargetSource
     */
    public function setTemplatesource($templatesource)
    {
        $this->templatesource = \tabs\apiclient\TemplateSource::factory($templatesource);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'templatetargetid' => $this->getTemplatetarget()->getId(),
            'templatesourceid' => $this->getTemplatesource()->getId(),
        );
    }

    /**
     * Returns the templatetarget
     *
     * @return \tabs\apiclient\TemplateTarget
     */
    public function getTemplatetarget()
    {
        return $this->templatetarget;
    }

    /**
     * Returns the templatesource
     *
     * @return \tabs\apiclient\TemplateSource
     */
    public function getTemplatesource()
    {
        return $this->templatesource;
    }
}