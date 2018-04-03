<?php

/**
 * Tabs Rest Notetype object.
 *
 * PHP Version 5.4
 *
 * @category  Core
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://www.carltonsoftware.co.uk
 */

namespace tabs\apiclient;
use tabs\apiclient\Builder;

/**
 * Tabs Rest Notetype object. 
 *
 * @category  Core
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 *
 * @method string getNotetype()    Returns the type
 * @method string getDescription() Returns the description
 * @method string getDonotdelete() Returns the do not delete
 *
 * @method Notetype setNotetype(string $type          Set the type
 * @method Notetype setDescription(string $desc)  Set the description
 * @method Notetype setDonotdelete(boolean $bool) Set the do not delete
 */
class Notetype extends Builder
{
    /**
     * Note type
     *
     * @var string
     */
    protected $notetype;

    /**
     * Note type description
     *
     * @var string
     */
    protected $description;

    /**
     * Do not delete bool
     *
     * @var boolean
     */
    protected $donotdelete;

    // ------------------ Public Functions --------------------- //
    
    /**
     * @legacy
     */
    public function setType($type)
    {
        return $this->setNotetype($type);
    }
    
    /**
     * @legacy
     */
    public function getType()
    {
        return $this->getNotetype();
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return $this->__toArray();
    }
}