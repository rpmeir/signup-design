<?php

declare(strict_types=1);

namespace Src\Domain\Entity;

class Name
{
    private string $value;

    public function __construct(public readonly string $name)
    {
        if (count(explode(' ', $name)) < 2) {
            throw new \DomainException('Invalid name');
        }
        $this->value = $name;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
