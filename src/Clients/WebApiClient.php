<?php
    namespace Bearlovescode\Spotify\Clients;

    use GuzzleHttp\Client;

    class WebApiClient
    {
        const BASE_ACCOUNTS_URI = "https://accounts.spotify.com";
        const BASE_API_URI = "https://api.spotify.com";
        private Client $client;

        public function authUsingClientCredentials()
        {

        }
    }