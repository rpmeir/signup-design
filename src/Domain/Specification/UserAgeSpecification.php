<?php

declare(strict_types=1);

namespace Src\Domain\Specification;

use Src\Domain\Entity\User;

class UserAgeSpecification extends AbstractSpecification
{
    public function isSatisfiedBy(User $user): bool
    {
        return $user->age >= 18;
    }
}
