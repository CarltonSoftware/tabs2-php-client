<?php

namespace tabs\apiclient\client\Oauth\GrantType;

/**
 * Refresh token grant type.
 *
 * @link http://tools.ietf.org/html/rfc6749#section-6
 */
class RefreshToken extends \Sainsburys\Guzzle\Oauth2\GrantType\RefreshToken implements \Sainsburys\Guzzle\Oauth2\GrantType\RefreshTokenGrantTypeInterface
{
    /**
     * {@inheritdoc}
     */
    public function getToken()
    {
        if (!$this->hasRefreshToken()) {
            throw new \RuntimeException('Refresh token not available');
        }
        
        $body = $this->config;
        $body[self::GRANT_TYPE] = $this->grantType;
        unset($body[self::CONFIG_TOKEN_URL], $body[self::CONFIG_AUTH_LOCATION]);

        $response = $this->client->post($this->config[self::CONFIG_TOKEN_URL], $body);
        $data = json_decode($response->getBody()->__toString(), true);

        return new \Sainsburys\Guzzle\Oauth2\AccessToken(
            $data['access_token'],
            $data['token_type'],
            $data
        );
    }
}
