<?php

namespace tabs\apiclient;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API Property Question Category object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method PropertyQuestionCategory setQuestioncategory(string $var) Sets the pqc
 * 
 * @method PropertyQuestionCategory setDescription(string $var) Sets the description
 */
class PropertyQuestionCategory extends Builder
{
    /**
     * @var string
     */
    protected $questioncategory;

    /**
     * @var string
     */
    protected $description;

    /**
     * Returns the pqc
     *
     * @return string
     */
    public function getQuestioncategory()
    {
        return $this->questioncategory;
    }

    /**
     * Returns the description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
}