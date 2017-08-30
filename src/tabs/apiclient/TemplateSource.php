<?php

namespace tabs\apiclient;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API TemplateSource object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method string getTemplatesource() Returns the templatesource string
 * @method TemplateSource setTemplatesource(string $var) Sets the templatesource
 */
class TemplateSource extends Builder
{
    /**
     * Templatesource
     *
     * @var string
     */
    protected $templatesource;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return $this->__toArray();
    }
}