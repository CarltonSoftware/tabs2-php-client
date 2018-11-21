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
 * @method PropertyQuestion setQuestion(string $var) Sets the question
 * 
 * @method PropertyQuestion setBooleananswerallowed(boolean $var) Sets the booleananswerallowed
 * 
 * @method PropertyQuestion setBooleananswerrequired(boolean $var) Sets the booleananswerrequired
 * 
 * @method PropertyQuestion setTextanswerallowed(boolean $var) Sets the textanswerallowed
 * 
 * @method PropertyQuestion setTextanswerrequired(boolean $var) Sets the textanswerrequired
 * 
 * @method PropertyQuestion setOptionanswerrequired(boolean $var) Sets the optionanswerrequired
 * 
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

    /**
     * Returns the propertyquestioncategory object
     *
     * @return \tabs\apiclient\PropertyQuestion
     */
    public function getPropertyquestioncategory()
    {
        return $this->propertyquestioncategory;
    }

    /**
     * Returns the question string
     *
     * @return string
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Returns the booleananswerallowed boolean
     *
     * @return boolean
     */
    public function getBooleananswerallowed()
    {
        return $this->booleananswerallowed;
    }

    /**
     * Returns the booleananswerrequired boolean
     *
     * @return boolean
     */
    public function getBooleananswerrequired()
    {
        return $this->booleananswerrequired;
    }

    /**
     * Returns the textanswerallowed boolean
     *
     * @return boolean
     */
    public function getTextanswerallowed()
    {
        return $this->textanswerallowed;
    }

    /**
     * Returns the textanswerrequired boolean
     *
     * @return boolean
     */
    public function getTextanswerrequired()
    {
        return $this->textanswerrequired;
    }

    /**
     * Returns the optionanswerrequired boolean
     *
     * @return boolean
     */
    public function getOptionanswerrequired()
    {
        return $this->optionanswerrequired;
    }

    /**
     * Returns the answeroptiongroup object
     *
     * @return \tabs\apiclient\AnswerOptionGroup
     */
    public function getAnsweroptiongroup()
    {
        return $this->answeroptiongroup;
    }

    /**
     * Returns the defaultansweroption object
     *
     * @return \tabs\apiclient\property\AnswerOption
     */
    public function getDefaultansweroption()
    {
        return $this->defaultansweroption;
    }
}