<?php
    namespace Bearlovescode\Spotify\Models;

    use Bearlovescode\Datamodels\DataModel;

    class Search extends DataModel
    {
        public ?object $tracks;
        public ?object $artists;
        public ?object $albums;
        public ?object $playlists;
        public ?object $shows;
        public ?object $episodes;

        public ?object $audiobooks;
    }