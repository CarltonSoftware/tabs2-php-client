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
        $apiUrl,
        $key = '',
        $secret = '',
        $config = array()
    ) {
        self::$instance = new static($apiUrl, $key, $secret, $config);
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
        parent::__construct(
            array_merge(
                array('base_url' => $baseUrl),
                $config
            )
        );
        $this->getEmitter()->attach($plugin);
    }
}
