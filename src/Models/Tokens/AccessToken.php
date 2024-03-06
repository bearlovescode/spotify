<?php
    namespace Bearlovescode\Spotify\Models\Tokens;

    use Bearlovescode\Datamodels\DataModel;

    class AccessToken extends DataModel
    {
        public string $access_token;
        public string $token_type;
        public int $expires;
    }