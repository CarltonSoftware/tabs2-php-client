<?php

namespace tabs\apiclient;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API DocumentTag object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method string getTag() Returns the tag string
 * @method DocumentTag setTag(string $var) Sets the tag
 */
class DocumentTag extends Builder
{
    /**
     * Tag
     *
     * @var string
     */
    protected $tag;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'tag' => $this->getTag(),
        );
    }
}