<?php

declare(strict_types=1);

namespace Src\Domain\Specification;

use Src\Domain\Entity\User;

class UserEmailSpecification extends AbstractSpecification
{
    public function isSatisfiedBy(User $user): bool
    {
        return (bool) filter_var($user->email, FILTER_VALIDATE_EMAIL);
    }
}
