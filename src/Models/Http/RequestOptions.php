<?php
    namespace Bearlovescode\Spotify\Models\Http;

    class RequestOptions
    {
        private object $options;

        public function __construct()
        {
            $this->options = new \stdClass();
            $this->options->headers = [];
        }

        public function setAuthorization(string $type = 'Bearer', string $token = ''): self
        {
            $clone = clone $this;
            $clone->options->headers['Authorization'] = sprintf('%s %s', $type, $token);
            return $clone;
        }

        public function setFormData(array $data = []): self
        {
            $clone = clone $this;
            $clone->options->form
        }

        public function toArray() {
            return $this->options;
        }

    }