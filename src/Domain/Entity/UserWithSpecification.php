<?php

declare(strict_types=1);

namespace Src\Domain\Entity;

use Src\Domain\Specification\UserAgeSpecification;
use Src\Domain\Specification\UserEmailSpecification;
use Src\Domain\Specification\UserNameSpecification;
use Src\Domain\Specification\UserPasswordSpecification;

class UserWithSpecification
{
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $password,
        public readonly int $age
    ) {
        $nameSpecification = new UserNameSpecification();
        $emailSpecification = new UserEmailSpecification();
        $passwordSpecification = new UserPasswordSpecification();
        $ageSpecification = new UserAgeSpecification();
        if (! $nameSpecification
            ->and($emailSpecification)
            ->and($passwordSpecification)
            ->and($ageSpecification)
            ->isSatisfiedBy(User::create($name, $email, $password, $age))
        ) {
            throw new \DomainException('Invalid parameter');
        }
    }
}
