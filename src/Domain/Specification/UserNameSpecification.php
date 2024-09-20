<?php

declare(strict_types=1);

namespace Src\Domain\Specification;

use Src\Domain\Entity\User;

class UserNameSpecification extends AbstractSpecification
{
    public function isSatisfiedBy(User $user): bool
    {
        return count(explode(' ', $user->getName())) >= 2;
    }
}
