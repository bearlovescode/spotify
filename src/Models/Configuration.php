<?php
    namespace Bearlovescode\Spotify\Models;

    use Bearlovescode\Datamodels\DataModel;

    class Configuration extends DataModel
    {
        public string $clientId;
        public string $clientSecret;

        public array $httpClientOptions = [];
    }