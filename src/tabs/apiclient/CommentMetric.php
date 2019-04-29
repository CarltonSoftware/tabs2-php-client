<?php

namespace tabs\apiclient;
use tabs\apiclient\Builder;

/**
 * Tabs Rest CommentMetric object.
 *
 * @category  Core
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * 
 * @method string  getMetricname() Return the metricname
 * @method string  getReference() Return the reference
 * 
 * @method CommentMetric setMetricname(string $metricname) Set the metricname
 * @method CommentMetric setReference(string $reference) Set the reference
 */
class CommentMetric extends Builder
{
    /**
     * Metricname
     * 
     * @var string
     */
    protected $metricname;
    
    /**
     * Reference
     * 
     * @var string
     */
    protected $reference;    
    
    // ------------------ Public Functions --------------------- //
    
    /**
     * @return array
     */
    public function toArray()
    {
        return array(
            'metricname' => $this->getMetricname(),
            'reference' => $this->getReference(),
        );
    }
}