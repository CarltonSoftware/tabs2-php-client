<?php

/**
 * Tabs Rest API ContactPreference object.
 *
 * PHP Version 5.5
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Jon Beverley <jon@csdl.biz>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://www.carltonsoftware.co.uk
 */

namespace tabs\actor;

/**
 * Tabs Rest API Actor object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Jon Beverley <jon@csdl.biz>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method integer getId()
 * @method integer getContactid()
 * @method string  getRole()
 * @method string  getReason()
 *
 * @method void    setContactid(integer $contactid)
 * @method void    setRole(string $role)
 * @method void    setReason(string $reason)
 *
 */

class ContactPreference extends \tabs\core\Base
{
    /**
     * Id
     *
     * @var integer
     */
    protected $id = 0;

    /**
     * Legalentityid
     *
     * @var integer
     */
    protected $legalentityid;

    /**
     * Contactid
     *
     * @var integer
     */
    protected $contactid;

    /**
     * Role
     *
     * @var string
     */
    protected $role = '';

    /**
     * Reason
     *
     * @var string
     */
    protected $reason = '';


    /**
     * Update a contact preference
     *
     * @return boolean
     *
     * @throws \tabs\api\client\ApiException
     */
    public function update()
    {
        if ($this->id == 0) {
            throw new Exception(
                'Update called on new entity - use create instead'
            );
        }
        $conf = \tabs\client\ApiClient::getApi()->put(
            '/legalentity/' . $this->legalentityid .
            '/contactpreference/' . $this->getId(),
            array(
                'contactid' => $this->getContactid(),
                'role' => $this->getRole(),
                'reason' => $this->getReason()
            )
        );

        // Test api response
        if ($conf && $conf->status == 204) {
            return true;
        } else {
            throw new \tabs\client\Exception(
                $conf,
                'Invalid contact preference update'
            );
        }
    }
}