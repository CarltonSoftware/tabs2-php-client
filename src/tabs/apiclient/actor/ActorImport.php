<?php

/**
 * Tabs Rest API Actor Import object.
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

namespace tabs\apiclient\actor;

/**
 * Tabs Rest API Actor Importobject.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method string getImportType()   Return the ImportType
 * @method string getData()         Return the Data
 *
 * @method ActorImport setImportType(string $importType) Set the ImportType
 * @method ActorImport setData(string $data)             Set the data
 */
abstract class ActorImport extends \tabs\apiclient\core\Builder
{
    /**
     * ImportType
     *
     * @var string
     */
    protected $importType = '';

    /**
     * Data
     *
     * @var string
     */
    protected $data = '';

    /**
     * Send the import data
     *
     * @return string
     */
    public function send()
    {
        $className = self::getClass();
        $routeName = strtolower($className);

        // Perform post request
        $req = \tabs\apiclient\client\Client::getClient()->post(
            str_replace('import', '/import', $routeName),
            $this->toArray()
        );

        if (!$req
            || $req->getStatusCode() !== '201'
        ) {
            throw new \tabs\apiclient\client\Exception(
                $req,
                'Unable to import'
            );
        }

        return $req->json;
    }

    // -------------------------- Public Functions -------------------------- //

    /**
     * Array representation of the object
     *
     * @return array
     */
    public function toArray()
    {
        return array(
            'importType' => $this->getImportType(),
            'data' => $this->getData()
        );
    }
}