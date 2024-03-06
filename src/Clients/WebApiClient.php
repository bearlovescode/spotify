<?php
    namespace Bearlovescode\Spotify\Clients;

    use Bearlovescode\Spotify\Exceptions\ApiErrorException;
    use Bearlovescode\Spotify\Exceptions\ConfigurationException;
    use Bearlovescode\Spotify\Models\Artist;
    use GuzzleHttp\Psr7\Uri;

    class WebApiClient extends BaseClient
    {
        /**
         * @return void
         * @throws ConfigurationException
         */
        protected function init()
        {
            if (empty($this->config->accessToken))
                throw new ConfigurationException('Invalid or missing access token in the config.');

            $this->config->httpClientOptions = [
                'base_uri' => 'https://api.spotify.com/',
                [
                    'headers' => [
                        'Authorization' => sprintf('Bearer %s', $this->config->accessToken)
                    ]
                ]
            ];
        }


        /**
         * @param string $id
         * @return Artist
         * @throws ApiErrorException
         * @throws \GuzzleHttp\Exception\GuzzleException
         */
        public function artist(string $id): Artist
        {
            $uri = new Uri(sprintf('v1/artist/%s', $id));
            $res = $this->client->request('GET', $uri);

            $data = json_decode($res->getBody()->getContents());
            if (!$res->getStatusCode() === 200)
                throw new ApiErrorException($data);

            return new Artist($data);
        }
    }