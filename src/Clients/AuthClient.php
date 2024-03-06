<?php
    namespace Bearlovescode\Spotify\Clients;

    use Bearlovescode\Spotify\Exceptions\ApiAuthErrorException;
    use Bearlovescode\Spotify\Models\Tokens\AccessToken;

    class AuthClient extends BaseClient
    {
        protected function init()
        {
            $this->config->httpClientOptions = [
                'base_uri' => 'https://accounts.spotify.com/'
            ];
        }

        public function usingClientCredentials()
        {
            try {
                $options = [
                    'form_params' => [
                        'client_id' => $this->config->clientId,
                        'client_secret' => $this->config->clientSecret,
                        'grant_type' => 'client_credentials'
                    ]
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