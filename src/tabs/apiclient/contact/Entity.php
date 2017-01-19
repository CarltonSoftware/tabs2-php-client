<?php

namespace tabs\apiclient\contact;

use tabs\apiclient\Builder;

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
 * @method string getContactentitytype() Returns the contactentitytype
 * @method Entity setContactentitytype(string $var) Sets the contactentitytype
 * 
 * @method integer getEntity() Returns the entity
 * @method Entity setEntity(integer $var) Sets the entity
 * 
 * @method string getFunction() Returns the function
 * @method Entity setFunction(string $var) Sets the function
 * 
 * @method string getIntermediary() Returns the intermediary
 * @method Entity setIntermediary(string $var) Sets the intermediary
 * 
 * @method string getReference() Returns the reference
 * @method Entity setReference(string $var) Sets the reference
 * 
 * @method \tabs\apiclient\actor\ContactDetail getContactdetail() Returns the contactdetail
 * @method string getContactdetailvalue() Returns the contactdetailvalue
 * @method Entity setContactdetailvalue(string $var) Sets the contactdetailvalue
 * 
 * @method boolean getPerformsend() Returns the performsend
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

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->status = Collection::factory(
            'status',
            new entity\Status(),
            $this
        );
        
        parent::__construct($id);
    }

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
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'contactentitytype' => $this->getContactentitytype(),
            'entityid' => $this->getEntity(),
            'function' => $this->getFunction(),
            'intermediary' => $this->getIntermediary(),
            'reference' => $this->getReference(),
            'contactdetailid' => $this->getContactdetail()->getId(),
            'contactdetailvalue' => $this->getContactdetailvalue(),
        );
    }
}