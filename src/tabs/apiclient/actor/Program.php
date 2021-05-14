<?php

/**
 * Tabs Rest API ActorProgram object.
 *
 * PHP Version 5.5
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://www.carltonsoftware.co.uk
 */

namespace tabs\apiclient\output;

/**
 * Tabs Rest API ActorProgram object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method integer      getId()     Return the id
 * @method \tabs\apiclient\Program      getProgram()     Return the Program
 * @method date      getFromdate()     Return the fromdate
 * @method date      getTodate()     Return the todate
 * @method date      getCreateddatetime()     Return the createddatetime
 * @method boolean      getApproved()     Return the approved
 * @method date      getApproveddatetime()     Return the approveddatetime
 * @method boolean      getActioned()     Return the actioned
 * @method string      getActionedbyactor()     Return the actionedbyactor
 * @method string      getActioneddatetime()     Return the actioneddatetime
 * @method boolean      getPending()     Return the pending
 * @method string      getApproverquestion()     Return the approverquestion
 * @method \tabs\apiclient\ApprovalType      getApprovaltype()     Return the ApprovalType
 *
 * @method       setId(integer $id)     Set the id
 * @method       setProgram(\tabs\apiclient\Program $program)     Set the Program
 * @method       setFromdate(date $fromdate)     Set the fromdate
 * @method       setTodate(date $todate)     Set the todate
 * @method       setCreateddatetime(date $createddatetime)     Set the createddatetime
 * @method       setApproved(boolean $approved)     Set the approved
 * @method       setApproveddatetime(date $approveddatetime)     Set the approveddatetime
 * @method       setActioned(boolean $actioned)     Set the actioned
 * @method       setActionedbyactor(string $actionedbyactor)     Set the actionedbyactor
 * @method       setActioneddatetime(string $actioneddatetime)     Set the actioneddatetime
 * @method       setPending(boolean $pending)     Set the pending
 * @method       setApproverquestion(string $approverquestion)     Set the approverquestion
 * @method       setApprovaltype(\tabs\apiclient\ApprovalType $approvaltype)     Set the ApprovalType
 */
class ActorProgram extends \tabs\apiclient\core\Builder
{
    /**
     * id
     *
     * @var integer
     */
    protected $id;

    /**
     * Program
     *
     * @var \tabs\apiclient\Program
     */
    protected $program;

    /**
     * fromdate
     *
     * @var date
     */
    protected $fromdate;

    /**
     * todate
     *
     * @var date
     */
    protected $todate;

    /**
     * createddatetime
     *
     * @var date
     */
    protected $createddatetime;

    /**
     * approved
     *
     * @var boolean
     */
    protected $approved;

    /**
     * approveddatetime
     *
     * @var date
     */
    protected $approveddatetime;

    /**
     * actioned
     *
     * @var boolean
     */
    protected $actioned;

    /**
     * actionedbyactor
     *
     * @var string
     */
    protected $actionedbyactor;

    /**
     * actioneddatetime
     *
     * @var string
     */
    protected $actioneddatetime;

    /**
     * pending
     *
     * @var boolean
     */
    protected $pending;

    /**
     * approverquestion
     *
     * @var string
     */
    protected $approverquestion;

    /**
     * ApprovalType
     *
     * @var \tabs\apiclient\ApprovalType
     */
    protected $approvaltype;

    
    // ------------------ Public Functions --------------------- //

    /**
     * Constructor.
     *
     * Initialise the ActorProgram object
     *
     * @return 
     */
    public function __construct()
    {
        $this->program = new \tabs\apiclient\Program();
        $this->approvaltype = new \tabs\apiclient\ApprovalType();

        $this->fromdate = new \DateTime();
        $this->todate = new \DateTime();
        $this->createddatetime = new \DateTime();
        $this->approveddatetime = new \DateTime();

    }

    /**
     * Set the Program
     *
     * @param \tabs\apiclient\Program $program The Program
     *
     * @return Program
     */
    public function setProgram($program)
    {
        $this->Program = \tabs\apiclient\Program::factory($program);

        return $this;
    }

    /**
     * Set the ApprovalType
     *
     * @param array $approvaltype The ApprovalType
     *
     * @return Program
     */
    public function setApprovaltype($approvaltype)
    {
        $this->ApprovalType = \tabs\apiclient\ApprovalType::factory($approvaltype);

        return $this;
    }

    /**
     * Return the string representation of a Program
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getProgram()->toArray()->getProgramname();
    }

    /**
     * Array representation
     *
     * @return array
     */
    public function toArray()
    {
        return array(
            'id' => $this->getId(),
            'program' => $this->getProgram()->toArray(),
            'fromdate' => $this->getFromdate()->format('Y-m-d'),
            'todate' => $this->getTodate()->format('Y-m-d'),
            'createddatetime' => $this->getCreateddatetime()->format('Y-m-d'),
            'approved' => $this->getApproved(),
            'approveddatetime' => $this->getApproveddatetime()->format('Y-m-d'),
            'actioned' => $this->getActioned(),
            'actionedbyactor' => $this->getActionedbyactor(),
            'actioneddatetime' => $this->getActioneddatetime(),
            'pending' => $this->getPending(),
            'approverquestion' => $this->getApproverquestion(),
            'approvaltype' => $this->getApprovaltype()->toArray(),
        );
    }
}
