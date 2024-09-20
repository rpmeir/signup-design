<?php

declare(strict_types=1);

namespace Src\Domain\Entity;

class User
{
    private function __construct(
        public readonly Name $name,
        public readonly Email $email,
        public readonly Password $password,
        public readonly int $age
    ) {
        if ($age < 18) {
            throw new \DomainException('Invalid age');
        }
    }

    public static function create(
        string $name,
        string $email,
        string $password,
        int $age
    ): self {
        return new self(new Name($name), new Email($email), Password::create($password), $age);
    }

    public static function buildExistingUser ( string $name, string $email, string $hashPassword, int $age): self
    {
        return new self(new Name($name), new Email($email), Password::create($hashPassword), $age);
    }

    public function getEmail(): string
    {
        return $this->email->getValue();
    }

    public function getName(): string
    {
        return $this->name->getValue();
    }

    public function getPassword(): string
    {
        return $this->password->value;
    }

    public function validatePassword(string $password): bool
    {
        return $this->password->validate($password);
    }
}
