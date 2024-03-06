<?php
    namespace Bearlovescode\Spotify\Models;

    use Bearlovescode\Datamodels\DataModel;

    class Artist extends DataModel
    {

        public string $id;

        public string $name;
        public int $popularity;
        public string $type;
        public string $uri;
        public object $external_urls;
        public object $followers;

        public array $genres;

        public string $href;

        public array $images;
    }