<?php

declare(strict_types=1);

namespace Src\Domain\Specification;

use Src\Domain\Entity\User;

interface Specification
{
    public function isSatisfiedBy(User $user): bool;
    public function and(Specification $other): self;
}
