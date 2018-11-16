<?php

namespace tabs\apiclient\property\comment;

use tabs\apiclient\Builder;
use tabs\apiclient\CommentMetric;

/**
 * Tabs Rest API CommentMetric object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method float getValuedecimal() Returns the valuedecimal
 * @method Metric setValuedecimal(float $var) Sets the valuedecimal
 * 
 * @method string getValuetext() Returns the valuetext
 * @method Comment setValuetext(string $var) Sets the valuetext
 * 
 * @method \tabs\apiclient\CommentMetric getCommentmetric() Returns the comment
 */
class Metric extends Builder
{
    /**
     * Valuedecimal
     *
     * @var float
     */
    protected $valuedecimal;
    
    /**
     * Valuetext
     *
     * @var string
     */
    protected $valuetext;    
    
    /**
     * CommentMetric
     *
     * @var CommentMetric
     */
    protected $commentmetric;    

    // -------------------- Public Functions -------------------- //

    /**
     * Set the CommentMetric on the Metric
     * 
     * @param CommentMetric|stdClass|Array $metric CommentMetric object/array
     * 
     * @return \tabs\apiclient\CommentMetric
     */
    public function setCommentmetric($metric)
    {
        $this->commentmetric = CommentMetric::factory($metric);
        
        return $this;
    }
    
    /**
     * @inheritDoc
     */
    public function toArray()
    {        
        $arr = $this->__toArray();
        
        $arr['commentmetricid'] = $this->getCommentmetric()->getId();
        
        return $arr;
    }
}