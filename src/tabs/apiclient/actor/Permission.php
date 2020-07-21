<?php

namespace tabs\apiclient\actor;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API Permission object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2020 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method Permission setMarketingbrand(\tabs\apiclient\MarketingBrand $var) Sets the marketing brand
 * @method Permission setContactdetail(\tabs\apiclient\actor\ContactDetail $var) Sets the contact detail
 * @method Permission setGranted(boolean $var) Sets the granted
 * @method Permission setGranteddatetime(\DateTime $var) Sets the granted date time
 * @method Permission setRevokeddatetime(\DateTime $var) Sets the revoked date time
 */
class Permission extends Builder
{
    /**
     * @var \tabs\apiclient\MarketingBrand
     */
    protected $marketingbrand;

    /**
     * @var \tabs\apiclient\actor\ContactDetail
     */
    protected $contactdetail;

    /**
     * @var boolean
     */
    protected $granted;

    /**
     * @var \tabs\apiclient\Actor
     */
    protected $grantedbyactor;

    /**
     * @var \DateTime
     */
    protected $granteddatetime;

    /**
     * @var \tabs\apiclient\Actor
     */
    protected $revokedbyactor;

    /**
     * @var \DateTime
     */
    protected $revokeddatetime;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->marketingbrand = new \tabs\apiclient\MarketingBrand();
        $this->contactdetail = new \tabs\apiclient\actor\ContactDetail();
        $this->granteddatetime = new \DateTime();
        $this->revokeddatetime = new \DateTime();
        parent::__construct($id);
    }

    /**
     * @return \tabs\apiclient\MarketingBrand
     */
    public function getMarketingbrand()
    {
        return $this->marketingbrand;
    }

    /**
     * @return \tabs\apiclient\actor\ContactDetail
     */
    public function getContactdetail()
    {
        return $this->contactdetail;
    }

    /**
     * @return boolean
     */
    public function getGranted()
    {
        return $this->granted;
    }

    /**
     * @return \tabs\apiclient\Actor
     */
    public function getGrantedbyactor()
    {
        return $this->grantedbyactor;
    }

    /**
     * @return \DateTime
     */
    public function getGranteddatetime()
    {
        return $this->granteddatetime;
    }

    /**
     * @return \tabs\apiclient\Actor
     */
    public function getRevokedbyactor()
    {
        return $this->revokedbyactor;
    }

    /**
     * @return \DateTime
     */
    public function getRevokeddatetime()
    {
        return $this->revokeddatetime;
    }

    /**
     * @inheritDoc
     */
    public function getCreateUrl()
    {
        $actor = $this->getParentActor();

        return $actor->getUpdateUrl() . '/contactdetailpermission';
    }

    /**
     * @inheritDoc
     */
    public function getUpdateUrl()
    {
        return $this->getCreateUrl() . '/' . $this->getId();
    }

    /**
     * @param Actor|Array $actor Actor
     *
     * @return $this
     */
    public function setGrantedbyactor($actor)
    {
        $this->grantedbyactor = \tabs\apiclient\ActorInstance::factory($actor);
        $this->addChange('grantedbyactor', $this->grantedbyactor);

        return $this;
    }

    /**
     * @param Actor|Array $actor Actor
     *
     * @return $this
     */
    public function setRevokedbyactor($actor)
    {
        $this->revokedbyactor = \tabs\apiclient\ActorInstance::factory($actor);
        $this->addChange('revokedbyactor', $this->revokedbyactor);

        return $this;
    }
}