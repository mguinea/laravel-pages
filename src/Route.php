<?php

namespace Mguinea\Pages;

use SebastianBergmann\Type\NullType;

final class Route
{
    public function __construct(
        private string $uri,
        private ?array $methods = null,
        private ?array $middlewares = null,
        private ?string $domain = null,
        private ?string $name = null,
        private ?array $wheres = null
    ) {
    }

    public function uri(): string
    {
        return $this->uri;
    }

    public function methods(): array
    {
        if ($this->methods === null) {
            return ['GET'];
        }

        return array_map(function(string $method) {
            return strtoupper($method);
        }, $this->methods);
    }

    public function middlewares(): array
    {
        return $this->middlewares ?? ['web'];
    }

    public function domain(): string|null
    {
        return $this->domain;
    }

    public function name(): string|null
    {
        return $this->name;
    }

    public function wheres(): array|null
    {
        return $this->wheres;
    }
}
