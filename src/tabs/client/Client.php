<?php

/**
 * Tabs API client object.
 *
 * PHP Version 5.4
 *
 * @category  Client
 * @package   Tabs
 * @author    Alex Wyett <alex@wyett.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://www.carltonsoftware.co.uk
 */

namespace tabs\client;

/**
 * Tabs API client object.
 *
 * PHP Version 5.4
 *
 * @category  Client
 * @package   Tabs
 * @author    Alex Wyett <alex@wyett.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://www.carltonsoftware.co.uk
 */
class Client extends \GuzzleHttp\Client
{
    /**
     * Static api instance
     *
     * @var \tabs\client\Client
     */
    static $instance;

    /**
     * Create a new Api Connection for use within the tabs php client
     * api.
     *
     * @param string $baseUrl Url of the api
     * @param string $key     API Key
     * @param string $secret  HMAC Secret Key
     * @param array  $config  Configuration settings
     *
     * @return \tabs\client\Client
     */
    public static function factory(
        $baseUrl,
        $key = '',
        $secret = '',
        $config = array()
    ) {
        self::$instance = new static($baseUrl, $key, $secret, $config);
        return self::$instance;
    }

    /**
     * Get the client
     *
     * @return \tabs\client\Client
     */
    public static function getClient()
    {
        // Check for an existing api object
        if (!self::$instance) {
            throw new Exception(null, 'No api connection available');
        }

        return self::$instance;
    }
    
    /**
     * Contructor
     * 
     * @param string $baseUrl Url of the api
     * @param string $key     API Key
     * @param string $secret  HMAC Secret Key
     * @param array  $config  Configuration settings
     *
     * @throws RuntimeException if cURL is not installed
     * 
     * @return void
     */
    public function __construct($baseUrl, $key, $secret, $config = array())
    {
        $plugin = new \tabs\client\Hmac($key, $secret);
        
        if (isset($config['prefix'])) {
            $plugin->setPrefix($config['prefix']);
            unset($config['prefix']);
        }
        
        parent::__construct(
            array_merge(
                array('base_url' => $baseUrl),
                $config
            )
        );
        $this->getEmitter()->attach($plugin);
    }
    
    /**
     * Overriden get request
     * 
     * @param string $url     Api URL
     * @param array  $params  Query Parameters
     * @param array  $options Client options
     * 
     * @throws \tabs\client\Exception
     * 
     * @return \GuzzleHttp\Message\Response
     */
    public function get($url = null, $params = [], $options = [])
    {
        return $this->_queryRequest('get', $url, $params, $options);
    }
    
    /**
     * Overriden delete request
     * 
     * @param string $url     Api URL
     * @param array  $params  Query Parameters
     * @param array  $options Client options
     * 
     * @throws \tabs\client\Exception
     * 
     * @return \GuzzleHttp\Message\Response
     */
    public function delete($url = null, array $params = [], array $options = [])
    {
        return $this->_queryRequest('delete', $url, $params, $options);
    }
    
    /**
     * Overriden options request
     * 
     * @param string $url     Api URL
     * @param array  $params  Query Parameters
     * @param array  $options Client options
     * 
     * @throws \tabs\client\Exception
     * 
     * @return \GuzzleHttp\Message\Response
     */
    public function options($url = null, array $params = [], array $options = [])
    {
        return $this->_queryRequest('options', $url, $params, $options);
    }
    
    /**
     * Overriden post request
     * 
     * @param string $url     Api URL
     * @param array  $params  POST Parameters
     * @param array  $options Client options
     * 
     * @throws \tabs\client\Exception
     * 
     * @return \GuzzleHttp\Message\Response
     */
    public function post($url = null, array $params = [], array $options = [])
    {
        return $this->_postRequest('post', $url, $params, $options);
    }
    
    /**
     * Overriden put request
     * 
     * @param string $url     Api URL
     * @param array  $params  POST Parameters
     * @param array  $options Client options
     * 
     * @throws \tabs\client\Exception
     * 
     * @return \GuzzleHttp\Message\Response
     */
    public function put($url = null, array $params = [], array $options = [])
    {
        return $this->_postRequest('put', $url, $params, $options);
    }
    
    /**
     * Perform a query request.  GET, OPTIONS, DELETE will use this method
     * 
     * @param string $method  Method name
     * @param string $url     Url to call
     * @param array  $params  Query Parameters
     * @param array  $options Options array
     * 
     * @return \GuzzleHttp\Message\Response
     */
    private function _queryRequest($method, $url, $params, $options)
    {
        try {
            $options['query'] = $params;
            $response = parent::$method($url, $options);
            return $response;
        } catch (\RuntimeException $ex) {
            $this->_setException($ex);
        }
    }
    
    /**
     * Perform a post request.  POST, PUT will use this method
     * 
     * @param string $method  Method name
     * @param string $url     Url to call
     * @param array  $params  Query Parameters
     * @param array  $options Options array
     * 
     * @return \GuzzleHttp\Message\Response
     */
    private function _postRequest($method, $url, $params, $options)
    {
        try {
            $options['body'] = $params;
            $response = parent::$method($url, $options);
            return $response;
        } catch (\RuntimeException $ex) {
            $this->_setException($ex);
        }
    }    
    
    /**
     * Handle a put/post request exception
     * 
     * @param \RuntimeException $exception Exception object
     * 
     * @throws \tabs\client\ValidationException
     * @throws \tabs\client\Exception
     * 
     * @return void
     */
    private function _setException($exception)
    {
        $json = $exception->getResponse()->json();
        switch ($json['errorType']) {
            case 'ValidationException':
                throw new \tabs\client\ValidationException(
                    $ex,
                    $json['errorDescription'],
                    $json['errorCode']
                );
            default:
                throw new \tabs\client\Exception(
                    $ex,
                    $json['errorDescription'],
                    $json['errorCode']
                );
        }
    }
}
