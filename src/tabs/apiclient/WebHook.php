<?php

namespace tabs\apiclient;
use tabs\apiclient\Builder;
use tabs\apiclient\exception\Exception;

/**
 * Tabs Rest API Website section object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * @method WebsiteSection setSection(string $str) Sets the section name
 */
class WebHook extends Base
{
    /**
     * Send a subscription request to the webhook endpoint
     * 
     * @param string $url  URL you want to send the web hook responses too
     * @param string $type Type of web hook.  Can be property, actor or booking.
     * 
     * @throws Exception
     * 
     * @return void
     */
    public static function subscribe($url, $type = 'property', $marketingBrandCode = null)
    {
        try {
            $args = array(
                'url' => $url
            );
            
            if ($marketingBrandCode) {
                $args['brandcode'] = $marketingBrandCode;
            }
            
            $res = \tabs\apiclient\client\Client::getClient()->get(
                'webhook/subscribe/' . strtolower($type),
                $args
            );

            if ($res->getStatusCode() != 200) {
                throw new Exception($req, (string) $res->getBody());
            }
        } catch (\GuzzleHttp\Exception\RequestException $ex) {
            throw new Exception(null, $ex->getMessage());
        }
    }
    
    /**
     * Get the request body from the webhook notification
     * 
     * @return array
     * 
     * @throws Exception
     */
    public static function detectRequestBody()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        if (JSON_ERROR_NONE !== json_last_error() || !is_array($data)) {
            throw new Exception(null, 'Invalid POST data.');
        }

        return $data;
    }

    /**
     * Returns the section name
     *
     * @return string
     */
    public function getSection()
    {
        return $this->section;
    }
}