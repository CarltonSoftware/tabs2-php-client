<?php

/**
 * Tabs Rest API ApprovalType object.
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
 * Tabs Rest API ApprovalType object.
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
 * @method string      getApprovaltype()     Return the approvaltype
 * @method string      getDescription()     Return the description
 *
 * @method       setId(integer $id)     Set the id
 * @method       setApprovaltype(string $approvaltype)     Set the approvaltype
 * @method       setDescription(string $description)     Set the description
 */
class ApprovalType extends \tabs\apiclient\core\Builder
{
    /**
     * id
     *
     * @var integer
     */
    protected $id;

    /**
     * approvaltype
     *
     * @var string
     */
    protected $approvaltype;

    /**
     * description
     *
     * @var string
     */
    protected $description;

    
    // ------------------ Public Functions --------------------- //

    /**
     * Constructor.
     *
     * Initialise the ApprovalType object
     *
     * @return 
     */
    public function __construct()
    {

    }

    /**
     * Return the string representation of an ApprovalType
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getApprovaltype();
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
            'approvaltype' => $this->getApprovaltype(),
            'description' => $this->getDescription(),
        );
    }
}
