<?php

namespace tabs\apiclient\contact\entity;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API Status object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method string getStatus() Returns the status
 * @method Status setStatus(string $var) Sets the status
 * 
 * @method \DateTime getStatusdatetime() Returns the statusdatetime
 * @method Status setStatusdatetime(\DateTime $var) Sets the statusdatetime
 * 
 * @method string getDetail() Returns the detail
 * @method Status setDetail(string $var) Sets the detail
 */
class Status extends Builder
{
    /**
     * Status
     *
     * @var string
     */
    protected $status;

    /**
     * Statusdatetime
     *
     * @var \DateTime
     */
    protected $statusdatetime;

    /**
     * Detail
     *
     * @var string
     */
    protected $detail = '';

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->statusdatetime = new \DateTime();
        parent::__construct($id);
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'status' => $this->getStatus(),
            'statusdatetime' => $this->getStatusdatetime()->format('Y-m-d'),
            'detail' => $this->getDetail(),
        );
    }
}