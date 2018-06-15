<?php

namespace tabs\apiclient;
use tabs\apiclient\Builder;

/**
 * Tabs Rest API object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method string            getAnsweroptiongroup()            Returns the group
 * @method AnswerOptionGroup setAnsweroptiongroup(string $var) Sets the group
 */
class AnswerOptionGroup extends Builder
{
    /**
     * @var string
     */
    protected $answeroptiongroup;
    
    /**
     * @var \tabs\apiclient\Collection|\tabs\apiclient\property\AnswerOption[]
     */
    protected $answeroptions;

    /**
     * {@inheritDoc}
     */
    public function __construct($id = null)
    {   
        $this->answeroptions = Collection::factory(
            'answeroption',
            new property\AnswerOption(),
            $this
        );
        
        parent::__construct($id);
    }
}