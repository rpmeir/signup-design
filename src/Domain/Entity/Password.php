<?php

declare(strict_types=1);

namespace Src\Domain\Entity;

class Password
{
    public function __construct(readonly string $value)
    {
    }

    public static function create(string $value): self
    {
        if (strlen($value) < 8) {
            throw new \DomainException('Invalid password');
        }
        $password = password_hash($value, PASSWORD_BCRYPT);
        return new self($password);
    }

    public function validate(string $value): bool
    {
        return password_verify($value, $this->value);
    }
}
