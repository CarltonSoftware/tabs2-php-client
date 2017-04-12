<?php

namespace tabs\apiclient\client\Oauth\GrantType;

/**
 * Resource owner password credentials grant type.
 *
 * @link http://tools.ietf.org/html/rfc6749#section-4.3
 */
class PasswordCredentials extends \Sainsburys\Guzzle\Oauth2\GrantType\GrantTypeBase
{
    const CONFIG_USERNAME = 'username';
    const CONFIG_PASSWORD = 'password';

    protected $grantType = 'password';

    /**
     * {@inheritdoc}
     */
    protected function getRequired()
    {
        return array_merge(parent::getRequired(), [self::CONFIG_USERNAME => '', self::CONFIG_PASSWORD => '']);
    }
    
    public function getToken()
    {
        $body = $this->config;
        $body[self::GRANT_TYPE] = $this->grantType;
        unset($body[self::CONFIG_TOKEN_URL], $body[self::CONFIG_AUTH_LOCATION]);

        try {
            $response = $this->client->post(
                $this->config[self::CONFIG_TOKEN_URL],
                $body
            );
            $data = json_decode($response->getBody()->__toString(), true);
        } catch (\GuzzleHttp\Exception\ClientException $ex) {
            $error = json_decode((string) $ex->getResponse()->getBody(), true);
            if (JSON_ERROR_NONE !== json_last_error() 
                || !is_array($error)
                || !isset($error['error_description'])
            ) {
                throw $ex;
            } else {
                throw new \tabs\apiclient\exception\Exception(
                    $error,
                    $error['error_description'],
                    -1,
                    $ex
                );
            }
        }

        return new \Sainsburys\Guzzle\Oauth2\AccessToken(
            $data['access_token'],
            $data['token_type'],
            $data
        );
    }
}
