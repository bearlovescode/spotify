<?php
    namespace Bearlovescode\Spotify\Clients;

    use Bearlovescode\Spotify\Exceptions\ApiAuthErrorException;
    use Bearlovescode\Spotify\Models\Configuration;
    use Bearlovescode\Spotify\Models\Http\RequestOptions;
    use Bearlovescode\Spotify\Models\Tokens\AccessToken;
    use GuzzleHttp\Client;

    class AuthClient extends BaseClient
    {

        protected function init()
        {
            $this->config->httpClientOptions = [
                'base_url' => 'https://accounts.spotify.com/'
            ];
        }

        public function usingClientCredentials()
        {
            try {
                $options = [
                    'headers' => [
                        'Authorization' => sprintf('Basic %s', $this->buildAuthTokenFromConfig())
                    ],
                    'form' => [
                        'grant_type' => 'client_credentials'
                    ],
                    'json' => true
                ];

                $res = $this->client->request('POST', 'api/token', $options);
                $data = json_decode($res->getBody()->getContents());

                if (!$res->getStatusCode() === 200)
                    throw new ApiAuthErrorException($data);

                return new AccessToken($data);
            }

            catch (ApiAuthErrorException $e)
            {

            }




        }

        public function buildAuthTokenFromConfig(): string
        {
            return base64_encode(sprintf('%s:%s', $this->config->clientId, $this->config->clientSecret));
        }
    }