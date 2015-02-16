<?php

/**
 * Tabs Rest Crud Interface
 *
 * PHP Version 5.5
 *
 * @category  Interface
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://www.carltonsoftware.co.uk
 */

namespace tabs\apiclient\core;

/**
 * Tabs Rest Crud Interface
 *
 * @category  Interface
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 */
interface FileBuilderInterface
{
    /**
     * Return the data required for the file body as a string
     * 
     * @return string
     */
    public function getFiledata();
    
    /**
     * Return the filename of the file supplied
     * 
     * @return string
     */
    public function getFilename();
}
