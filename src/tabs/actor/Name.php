<?php

/**
 * Tabs Rest API Name object.
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
 * Tabs Rest API Name object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Jon Beverley <jon@csdl.biz>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 *
 * @method string  getFirstname()
 * @method string  getSurname()
 * @method string  getTitle()
 * @method string  getSalutation()
 *
 * @method void    setFirstname(string $firstname)
 * @method void    setSurname(string $surname)
 * @method void    setTitle(string $title)
 * @method void    setSalutation(string $salutation)
 */

class Name extends \tabs\core\Base
{
    /**
     * Firstname
     *
     * @var string
     */
    protected $firstname;
    
    /**
     * Surname
     *
     * @var string
     */
    protected $surname;
    
    /**
     * Title
     *
     * @var string
     */
    protected $title;
    
    /**
     * Salutatino
     *
     * @var string
     */
    protected $salutation;
    
}