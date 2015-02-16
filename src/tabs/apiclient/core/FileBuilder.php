<?php

/**
 * Tabs client file builder helper object.
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

namespace tabs\apiclient\core;
use GuzzleHttp\Post\PostFile;

/**
 * Tabs client builder helper object.
 *
 * @category  Core
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 */
abstract class FileBuilder extends Builder implements BuilderInterface, FileBuilderInterface
{
    /**
     * Perform a create request
     * 
     * @throws \tabs\apiclient\client\Exception
     * 
     * @return Builder
     */
    public function create()
    {
        // Perform post request
        $request = \tabs\apiclient\client\Client::getClient()->createPostRequest(
            'POST',
            $this->getCreateUrl(),
            $this->toCreateArray()
        );
        
        $req = $this->_sendRequest($request);
        
        // Set the id of the element
        $id = self::getRequestId($req);
        if ($id) {
            $this->setId(
                (integer) $id
            );
        }
        
        return $this;
    }
    
    /**
     * Add filedata and send request
     * 
     * @param RequestInterface $request Guzzle request object
     * 
     * @return \GuzzleHttp\Message\Response
     */
    private function _sendRequest(
        $request,
        $expectedStatus = '201',
        $action = 'create'
    ) {
        $req = \tabs\apiclient\client\Client::getClient()->sendRequest(
            $this->_setFileData($request)
        );

        if (!$req
            || $req->getStatusCode() !== $expectedStatus
        ) {
            throw new \tabs\apiclient\client\Exception(
                $req,
                sprintf(
                    'Unable to %s %s',
                    $action,
                    ucfirst($this->getClass())
                )
            );
        }
        
        return $req;
    }


    /**
     * Add data to request
     * 
     * @param type $request
     * 
     * @return void
     */
    private function _setFileData($request)
    {
        if ($this->getFiledata() !== null) {            
            $request->getBody()->addFile(
                new PostFile(
                    'data',
                    $this->getFiledata(),
                    $this->getFilename()
                )
            );
        }
        
        return $request;
    }
}