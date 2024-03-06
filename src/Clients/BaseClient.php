<?php
namespace Bearlovescode\Spotify\Clients;

use Bearlovescode\Spotify\Exceptions\InvalidHttpClientException;
use Bearlovescode\Spotify\Models\Configuration;
use GuzzleHttp\Client;

abstract class BaseClient
{
    protected Client $client;

    public function __construct(
        private readonly Configuration $config
    )
    {
        if (method_exists($this, 'init'))
            $this->init();

        $this->client = new Client($this->config->httpClientOptions);
    }

    public function ensureHttpClientExists()
    {
        if (!$this->client)
            throw new InvalidHttpClientException('No valid HTTP client set.');
    }


}