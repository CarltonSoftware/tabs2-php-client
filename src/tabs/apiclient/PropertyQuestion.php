<?php

namespace tabs\apiclient;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API Property Question object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2018 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method \tabs\apiclient\PropertyQuestion getPropertyquestioncategory() Returns the propertyquestioncategory object
 * @method string getQuestion() Returns the question string
 * @method PropertyQuestion setQuestion(string $var) Sets the question
 * 
 * @method boolean getBooleananswerallowed() Returns the booleananswerallowed boolean
 * @method PropertyQuestion setBooleananswerallowed(boolean $var) Sets the booleananswerallowed
 * 
 * @method boolean getBooleananswerrequired() Returns the booleananswerrequired boolean
 * @method PropertyQuestion setBooleananswerrequired(boolean $var) Sets the booleananswerrequired
 * 
 * @method boolean getTextanswerallowed() Returns the textanswerallowed boolean
 * @method PropertyQuestion setTextanswerallowed(boolean $var) Sets the textanswerallowed
 * 
 * @method boolean getTextanswerrequired() Returns the textanswerrequired boolean
 * @method PropertyQuestion setTextanswerrequired(boolean $var) Sets the textanswerrequired
 * 
 * @method boolean getOptionanswerrequired() Returns the optionanswerrequired boolean
 * @method PropertyQuestion setOptionanswerrequired(boolean $var) Sets the optionanswerrequired
 * 
 * @method \tabs\apiclient\AnswerOptionGroup getAnsweroptiongroup() Returns the answeroptiongroup object
 * @method \tabs\apiclient\property\AnswerOption getDefaultansweroption() Returns the defaultansweroption object
 */
class PropertyQuestion extends Builder
{
    /**
     * @var \tabs\apiclient\PropertyQuestion
     */
    protected $propertyquestioncategory;

    /**
     * @var string
     */
    protected $question;

    /**
     * @var boolean
     */
    protected $booleananswerallowed;

    /**
     * @var boolean
     */
    protected $booleananswerrequired;

    /**
     * @var boolean
     */
    protected $textanswerallowed;

    /**
     * @var boolean
     */
    protected $textanswerrequired;

    /**
     * @var boolean
     */
    protected $optionanswerrequired;

    /**
     * @var \tabs\apiclient\AnswerOptionGroup
     */
    protected $answeroptiongroup;

    /**
     * @var \tabs\apiclient\property\AnswerOption
     */
    protected $defaultansweroption;

    /**
     * {@inheritDoc}
     */
    public function __construct($id = null)
    {
        $this->propertyquestioncategory = new PropertyQuestionCategory();
        $this->answeroptiongroup = new AnswerOptionGroup();
        $this->defaultansweroption = new property\AnswerOption();
        
        parent::__construct($id);
    }
}