<?php

/**
 * Tabs Rest API Property Description type object.
 *
 * PHP Version 5.4
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://www.carltonsoftware.co.uk
 */

namespace tabs\apiclient\property\description;
use tabs\apiclient\core\Encoding;

/**
 * Tabs Rest API Property Description type object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * @method integer  getId()                          Returns the type id
 * @method Type     setId(integer $id)               Set the type id
 * 
 * @method string   getName()                        Returns the type name
 * @method Type     setName(string $name)            Set the type name
 * 
 * @method Encoding getEncoding()                    Returns the type encoding
 * 
 * @method string   getMinimumlength()               Returns the type min length
 * @method Type     setMinimumlength(string $length) Set the type min length
 * 
 * @method string   getMaximumlength()               Returns the type max length
 * @method Type     setMaximumlength(string $length) Set the type max length
 */
class Type extends \tabs\apiclient\core\Builder
{
    /**
     * Description id
     * 
     * @var integer
     */
    protected $id;
    
    /**
     * Name
     * 
     * @var string
     */
    protected $name = '';
    
    /**
     * Encoding
     * 
     * @var string
     */
    protected $encoding;
    
    /**
     * Minimum length
     * 
     * @var string
     */
    protected $minimumlength = 0;
    
    /**
     * Maximum length
     * 
     * @var string
     */
    protected $maximumlength = 9999;

    // -------------------------- Public Functions -------------------------- //
    
    /**
     * Set the description type encoding
     * 
     * @param stdClass|string|Encoding $encoding Encoding object/string
     * 
     * @return Type
     */
    public function setEncoding($encoding)
    {
        if (is_string($encoding)) {
            $encoding = array(
                'encoding' => $encoding
            );
        }
        
        $this->encoding = \tabs\apiclient\core\Encoding::factory($encoding);
        
        return $this;
    }
    
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'name' => $this->getName(),
            'encoding' => $this->getEncoding()->getEncoding(),
            'minimumlength' => $this->getMinimumlength(),
            'maximumlength' => $this->getMaximumlength(),
        );
    }
    
    /**
     * @inheritDoc
     */
    public function getUrlStub()
    {
        return 'descriptiontype';
    }
}