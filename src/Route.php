<?php

namespace Mguinea\Pages;

final class Route
{
    public function __constructor(
        private string $uri,
        private array $methods,
        private ?array $middlewares = null,
        private ?string $domain = null,
        private ?string $name = null,
    ) {
    }

    public function uri(): string
    {
        return $this->uri;
    }

    public function methods(): array
    {
        return array_map(function(string $method) {
            return strtoupper($method);
        }, $this->methods);
    }

    public function domain(): string|null
    {
        return $this->domain;
    }
}
