<?php

namespace tabs\apiclient\property;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API Comment object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method string getComment() Returns the comment
 * @method Comment setComment(string $var) Sets the comment
 * 
 * @method boolean getVisibletoowner() Returns the visibletoowner
 * @method Comment setVisibletoowner(boolean $var) Sets the visibletoowner
 * 
 * @method boolean getVisibleonweb() Returns the visibleonweb
 * @method Comment setVisibleonweb(boolean $var) Sets the visibleonweb
 */
class Comment extends Builder
{
    /**
     * Comment
     *
     * @var string
     */
    protected $comment;

    /**
     * Visibletoowner
     *
     * @var boolean
     */
    protected $visibletoowner;

    /**
     * Visibleonweb
     *
     * @var boolean
     */
    protected $visibleonweb;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'comment' => $this->getComment(),
            'visibletoowner' => $this->boolToStr($this->getVisibletoowner()),
            'visibleonweb' => $this->boolToStr($this->getVisibleonweb())
        );
    }
}