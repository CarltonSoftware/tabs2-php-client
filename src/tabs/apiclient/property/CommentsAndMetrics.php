<?php

namespace tabs\apiclient\property;

use tabs\apiclient\Builder;
use tabs\apiclient\StaticCollection;
use tabs\apiclient\property\Comment;
use tabs\apiclient\MetricAverage;

/**
 * Tabs Rest API CommentsAndMetrics object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 */
class CommentsAndMetrics extends Builder
{
    /**
     * Comments
     *
     * @var Comments[]
     */
    protected $comments;

    /**
     * Metrics
     *
     * @var MetricAverage[]
     */
    protected $metrics;

    // -------------------- Public Functions -------------------- //

    /**
     * {@inheritDoc}
     */
    public function __construct($id = null)
    {
        $this->comments = StaticCollection::factory(
            new Comment()
        );
        $this->metrics = StaticCollection::factory(
            new MetricAverage()
        );
        parent::__construct($id);
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return [
            'comments' => $this->getComments()->toArray(),
            'metrics' => $this->getMetrics()->toArray()
        ];
    }

    /**
     * Get the comments
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Get the metrics
     */
    public function getMetrics()
    {
        return $this->metrics;
    }
}