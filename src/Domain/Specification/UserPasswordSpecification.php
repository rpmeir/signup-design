<?php

declare(strict_types=1);

namespace Src\Domain\Specification;

use Src\Domain\Entity\User;

class UserPasswordSpecification extends AbstractSpecification
{
    public function isSatisfiedBy(User $user): bool
    {
        return strlen($user->password) >= 8;
    }
}
