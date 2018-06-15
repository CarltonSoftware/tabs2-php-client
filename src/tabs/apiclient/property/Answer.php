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
 * @method \tabs\apiclient\PropertyQuestion getQuestion() Returns the question object
 * @method boolean getBooleananswer() Returns the boolean answer boolean
 * @method Answer setBooleananswer(boolean $var) Sets the boolean answer
 * 
 * @method string getTextanswer() Returns the text answer string
 * @method Answer setTextanswer(string $var) Sets the text answer
 * 
 * @method \tabs\apiclient\property\AnswerOption getAnsweroption() Returns the answer option object
 * @method \DateTime getLastupdated() Returns the last updated \DateTime
 * @method Answer setLastupdated(\DateTime $var) Sets the last updated
 * 
 * @method \tabs\apiclient\TabsUser getLastupdatedby() Returns the last updated by object
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
}