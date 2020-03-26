<?php

namespace tabs\apiclient\contact;

use tabs\apiclient\Builder;
use tabs\apiclient\Collection;

/**
 * Tabs Rest API Entity object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method Entity setContactentitytype(string $var) Sets the contactentitytype
 * 
 * @method Entity setEntity(integer $var) Sets the entity
 * 
 * @method Entity setFunction(string $var) Sets the function
 * 
 * @method Entity setIntermediary(string $var) Sets the intermediary
 * 
 * @method Entity setReference(string $var) Sets the reference
 * 
 * @method Entity setContactdetailvalue(string $var) Sets the contactdetailvalue
 * 
 * @method Entity setPerformsend(boolean $var) Sets the performsend
 * 
 * @method Collection|entity\Status[] getStatus() Returns the status
 */
class Entity extends Builder
{
    /**
     * Contactentitytype
     *
     * @var string
     */
    protected $contactentitytype;

    /**
     * Entity
     *
     * @var integer
     */
    protected $entity;

    /**
     * Function
     *
     * @var string
     */
    protected $function;

    /**
     * Intermediary
     *
     * @var string
     */
    protected $intermediary;

    /**
     * Reference
     *
     * @var string
     */
    protected $reference;

    /**
     * Contactdetail
     *
     * @var \tabs\apiclient\actor\ContactDetail
     */
    protected $contactdetail;

    /**
     * Contactdetailvalue
     *
     * @var string
     */
    protected $contactdetailvalue;
    
    /**
     * Send boolean.
     * 
     * @var boolean
     */
    protected $performsend = false;
    
    /**
     * Status collection
     * 
     * @var Collection|entity\Status[]
     */
    protected $status;
    
    /**
     * Createdbyactor
     *
     * @var \tabs\apiclient\TabsUser
     */
    protected $createdbyactor;    

    // -------------------- Public Functions -------------------- //

    /**
     * Set the contactdetail
     *
     * @param stdclass|array|\tabs\apiclient\actor\ContactDetail $contactdetail The Contactdetail
     *
     * @return Entity
     */
    public function setContactdetail($contactdetail)
    {
        $this->contactdetail = \tabs\apiclient\actor\ContactDetail::factory(
            $contactdetail
        );

        return $this;
    }
    
    /**
     * Set the status
     * 
     * @param stdclass|array|\tabs\apiclient\contact\entity\Status $status Status
     * 
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = entity\Status::factory($status);
        $this->status->setParent($this);
        
        return $this;
    }
    
    /**
     * Set the createdbyactor
     *
     * @param stdclass|array|\tabs\apiclient\TabsUser $createdbyactor The Createdbyactor
     *
     * @return Supplier
     */
    public function setCreatedbyactor($createdbyactor)
    {
        $this->createdbyactor = \tabs\apiclient\TabsUser::factory($createdbyactor);

        return $this;
    }    

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $arr = array(
            'contactentitytype' => $this->getContactentitytype(),
            'entityid' => $this->getEntity(),
            'function' => $this->getFunction(),
            'intermediary' => $this->getIntermediary(),
            'reference' => $this->getReference(),
            'contactdetailid' => $this->getContactdetail()->getId(),
            'contactdetailvalue' => $this->getContactdetailvalue(),
            'perform_send' => $this->getPerformsend() === true ? 'true' : 'false',
        );
        
        if ($this->getCreatedbyactor()) {
            $arr['createdbyactorid'] = $this->getCreatedbyactor()->getId();
        }
        
        if ($this->getStatus()) {
            $this->prefixToArray(
                $arr,
                'status',
                $this->getStatus()
            );
        }
        
        //var_dump($arr); die;
        
        return $arr;
    }

    /**
     * Returns the contactentitytype
     *
     * @return string
     */
    public function getContactentitytype()
    {
        return $this->contactentitytype;
    }

    /**
     * Returns the entity
     *
     * @return integer
     */
    public function getEntity()
    {
        return $this->entity;
    }

    /**
     * Returns the function
     *
     * @return string
     */
    public function getFunction()
    {
        return $this->function;
    }

    /**
     * Returns the intermediary
     *
     * @return string
     */
    public function getIntermediary()
    {
        return $this->intermediary;
    }

    /**
     * Returns the reference
     *
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Returns the contactdetail
     *
     * @return \tabs\apiclient\actor\ContactDetail
     */
    public function getContactdetail()
    {
        return $this->contactdetail;
    }

    /**
     * Returns the contactdetailvalue
     *
     * @return string
     */
    public function getContactdetailvalue()
    {
        return $this->contactdetailvalue;
    }

    /**
     * Returns the performsend
     *
     * @return boolean
     */
    public function getPerformsend()
    {
        return $this->performsend;
    }

    /**
     * Returns the createdbyactor
     *
     * @return \tabs\apiclient\TabsUser
     */
    public function getCreatedbyactor()
    {
        return $this->createdbyactor;
    }
}