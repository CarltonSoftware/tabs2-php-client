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

namespace tabs\apiclient\client;
use \GuzzleHttp\HandlerStack;
use \tabs\apiclient\client\Oauth\GrantType\RefreshToken;
use \tabs\apiclient\client\Oauth\GrantType\PasswordCredentials;
use \Sainsburys\Guzzle\Oauth2\Middleware\OAuthMiddleware;
use \Psr\Http\Message\ResponseInterface;
use tabs\apiclient\exception\Exception;

/**
 * Tabs API client object.
 *
 * PHP Version 5.5
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
     * @var \tabs\apiclient\client\Client
     */
    static $instance;

    /**
     * Create a new Api Connection for use within the tabs php client
     * api.
     *
     * @param string $base_uri     Url of the api
     * @param string $username     API Username
     * @param string $password     API User password
     * @param string $clientId     Client Id
     * @param string $clientSecret Client secret
     * @param array  $options      Configuration options
     *
     * @return \tabs\apiclient\client\Client
     */
    public static function factory(
        $base_uri,
        $username = '',
        $password = '',
        $clientId = '',
        $clientSecret = '',
        array $options = []
    ) {
        self::$instance = new static(
            $base_uri,
            $username,
            $password,
            $clientId,
            $clientSecret,
            $options
        );
        
        return self::$instance;
    }
    
    public static function dropClient()
    {
        self::$instance = null;
        //unset(self::$instance);
    }

    /**
     * Get the client
     *
     * @return \tabs\apiclient\client\Client
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
     * @param string $base_uri     Url of the api
     * @param string $username     API Username
     * @param string $password     API User password
     * @param string $clientId     Client Id
     * @param string $clientSecret Client secret
     * @param array  $options      Configuration options
     *
     * @throws \RuntimeException if cURL is not installed
     *
     * @return void
     */
    public function __construct(
        $base_uri,
        $username = '',
        $password = '',
        $clientId = '',
        $clientSecret = '',
        array $options = []
    ) {
        if (isset($options['HandlerStack'])) {
            $handlerStack = $options['HandlerStack'];
            unset($options['HandlerStack']);
        } else {
            $handlerStack = HandlerStack::create();
        }
        
        if ($username != '') {
            $options['handler'] = $handlerStack;
            $options['auth'] = 'oauth2';
            
            $tokenUri = parse_url(str_replace('/v2/', '', $base_uri) . '/oauth/v2/token');

            $config = [
                PasswordCredentials::CONFIG_USERNAME => $username,
                PasswordCredentials::CONFIG_PASSWORD => $password,
                PasswordCredentials::CONFIG_CLIENT_ID => $clientId,
                PasswordCredentials::CONFIG_CLIENT_SECRET => $clientSecret,
                PasswordCredentials::CONFIG_TOKEN_URL => $tokenUri['path'],
                PasswordCredentials::GRANT_TYPE => 'client_credentials'
            ];

            $token = new PasswordCredentials($this, $config);
            $refreshToken = new RefreshToken($this, $config);
            $middleware = new OAuthMiddleware($this, $token, $refreshToken);

            if (isset($options['AccessToken'])) {
                $middleware->setAccessToken($options['AccessToken']);
            }

            $handlerStack->push($middleware->onBefore());
            $handlerStack->push($middleware->onFailure(5));
        }
        
        parent::__construct(
            array_merge(
                array(
                    'base_uri' => $base_uri
                ),
                $options
            )
        );
    }

    /**
     * Overriden get request
     *
     * @param string $url     Api URL
     * @param array  $params  Query Parameters
     * @param array  $options Client options
     *
     * @return ResponseInterface
     */
    public function get($url = null, array $params = [], array $options = [])
    {
        //echo($url . '<br>');
        return $this->createQueryRequest('get', $url, $params, $options);
    }
    
    /**
     * Get the active user
     * 
     * @return \tabs\apiclient\actor\Actor
     */
    public function whoami()
    {
        $json = \tabs\apiclient\Base::getJson(
            $this->get(
                'whoami'
            )
        );
        $class = 'tabs\apiclient\\' . $json->type;
        $actor = new $class();
        \tabs\apiclient\Base::setObjectProperties(
            $actor,
            $json
        );
        
        return $actor;
    }

    /**
     * Overriden delete request
     *
     * @param string $url     Api URL
     * @param array  $params  Query Parameters
     * @param array  $options Client options
     *
     * @return ResponseInterface
     */
    public function delete($url = null, array $params = [], array $options = [])
    {
        return $this->createQueryRequest('delete', $url, $params, $options);
    }

    /**
     * Overriden options request
     *
     * @param string $url     Api URL
     * @param array  $params  Query Parameters
     * @param array  $options Client options
     *
     * @return ResponseInterface
     */
    public function options($url = null, array $params = [], array $options = [])
    {
        return $this->createQueryRequest('options', $url, $params, $options);
    }

    /**
     * Overriden post request
     *
     * @param string $url     Api URL
     * @param array  $params  POST Parameters
     * @param array  $options Client options
     *
     * @return ResponseInterface
     */
    public function post($url = null, array $params = [], array $options = [])
    {
        return $this->createPostRequest('post', $url, $params, $options);
    }

    /**
     * Overriden put request
     *
     * @param string $url     Api URL
     * @param array  $params  POST Parameters
     * @param array  $options Client options
     *
     * @return ResponseInterface
     */
    public function put($url = null, array $params = [], array $options = [])
    {
        return $this->createPostRequest('put', $url, $params, $options);
    }

    /**
     * Create a new guzzle request and append params onto the
     * request query.
     *
     * @param string     $method  HTTP method (GET, POST, PUT, etc.)
     * @param string|Url $url     HTTP URL to connect to
     * @param array      $params  Key/val array of parameters
     * @param array      $options Array of options to apply to the request
     *
     * @return ResponseInterface
     */
    public function createQueryRequest(
        $method,
        $url,
        array $params = [],
        array $options = []
    ) {
        $options['query'] = $params;
        return $this->request($method, $url, $options);
    }

    /**
     * Create a new guzzle request and append params onto the
     * request body.
     *
     * @param string     $method  HTTP method (GET, POST, PUT, etc.)
     * @param string|Url $url     HTTP URL to connect to
     * @param array      $params  Key/val array of parameters
     * @param array      $options Array of options to apply to the request
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function createPostRequest(
        $method,
        $url,
        array $params = [],
        array $options = []
    ) {
        $options['form_params'] = $params;
        return $this->request($method, $url, $options);
    }

    /**
     * Create a new guzzle request and append params onto the
     * request body.
     *
     * @param string|Url      $url     HTTP URL to connect to
     * @param string|resource $data    Data
     * @param array           $params  Key/val array of parameters
     * @param array           $options Array of options to apply to the request
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function createPostFileRequest(
        $url,
        $data,
        array $params = [],
        array $options = []
    ) {
        $newParams = array();
        foreach ($params as $key => $value) {
            $newParams[] = array(
                'name' => $key,
                'contents' => $value
            );
        }
        
        $options['multipart'] = array_merge(
            array(
                array(
                    'name' => 'data',
                    'contents' => is_string($data) ? fopen($data, 'r') : $data
                )
            ),
            $newParams
        );
        
        return $this->request('POST', $url, $options);
    }
    
    /**
     * @inhertDoc
     */
    public function request($method, $uri = '', array $options = array())
    {
        $response = parent::request($method, $uri, $options);
        
        // TODO Throw exceptions
        
        return $response;
    }
}