<?php

namespace tabs\apiclient;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API MetricAverage object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method string getRef() Returns the ref
 *
 * @method string getName() Returns the name
 *
 * @method integer getTotal() Returns the total
 *
 * @method integer getRespondents() Returns the respondents
 *
 * @method float getAvg() Returns the avg
 *
 */
class MetricAverage extends Builder
{
    /**
     * Ref
     *
     * @var string
     */
    protected $ref;

    /**
     * Name
     *
     * @var string
     */
    protected $name;

    /**
     * Total
     *
     * @var integer
     */
    protected $total;

    /**
     * Respondents
     *
     * @var integer
     */
    protected $respondents;

    /**
     * Avg
     *
     * @var float
     */
    protected $avg;
}