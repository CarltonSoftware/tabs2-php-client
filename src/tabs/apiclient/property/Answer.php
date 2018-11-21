<?php

namespace tabs\apiclient\property;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API Answer object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2018 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method Answer setBooleananswer(boolean $var) Sets the boolean answer
 * 
 * @method Answer setTextanswer(string $var) Sets the text answer
 * 
 * @method Answer setLastupdated(\DateTime $var) Sets the last updated
 * 
 */
class Answer extends Builder
{
    /**
     * @var \tabs\apiclient\PropertyQuestion
     */
    protected $question;

    /**
     * @var boolean
     */
    protected $booleananswer;

    /**
     * @var string
     */
    protected $textanswer;

    /**
     * @var \tabs\apiclient\property\AnswerOption
     */
    protected $answeroption;

    /**
     * @var \DateTime
     */
    protected $lastupdated;

    /**
     * @var \tabs\apiclient\TabsUser
     */
    protected $lastupdatedby;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->lastupdated = new \DateTime();
        $this->lastupdatedby = new \tabs\apiclient\TabsUser();
        $this->answeroption = new AnswerOption();
        $this->question = new \tabs\apiclient\PropertyQuestion();
        
        parent::__construct($id);
    }

    /**
     * Returns the question object
     *
     * @return \tabs\apiclient\PropertyQuestion
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Returns the boolean answer boolean
     *
     * @return boolean
     */
    public function getBooleananswer()
    {
        return $this->booleananswer;
    }

    /**
     * Returns the text answer string
     *
     * @return string
     */
    public function getTextanswer()
    {
        return $this->textanswer;
    }

    /**
     * Returns the answer option object
     *
     * @return \tabs\apiclient\property\AnswerOption
     */
    public function getAnsweroption()
    {
        return $this->answeroption;
    }

    /**
     * Returns the last updated \DateTime
     *
     * @return \DateTime
     */
    public function getLastupdated()
    {
        return $this->lastupdated;
    }

    /**
     * Returns the last updated by object
     *
     * @return \tabs\apiclient\TabsUser
     */
    public function getLastupdatedby()
    {
        return $this->lastupdatedby;
    }
}