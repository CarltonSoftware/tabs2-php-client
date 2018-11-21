<?php

namespace tabs\apiclient;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API TemplateTarget object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method TemplateTarget setTemplatetarget(string $var) Sets the templatetarget
 */
class TemplateTarget extends Builder
{
    /**
     * Templatetarget
     *
     * @var string
     */
    protected $templatetarget;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return $this->__toArray();
    }

    /**
     * Returns the templatetarget string
     *
     * @return string
     */
    public function getTemplatetarget()
    {
        return $this->templatetarget;
    }
}