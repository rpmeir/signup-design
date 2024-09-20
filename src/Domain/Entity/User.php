<?php

declare(strict_types=1);

namespace Src\Domain\Entity;

class User
{
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $password,
        public readonly int $age
    ) {
        if (count(explode(' ', $name)) < 2) {
            throw new \Exception('Invalid name');
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \Exception('Invalid email');
        }
        if (strlen($password) < 8) {
            throw new \Exception('Invalid password');
        }
        if ($age < 18) {
            throw new \Exception('Invalid age');
        }
    }
}
