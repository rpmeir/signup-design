<?php

declare(strict_types=1);

namespace Src\Domain\Specification;

use Src\Domain\Entity\User;

abstract class AbstractSpecification implements Specification
{
    abstract public function isSatisfiedBy(User $user): bool;

    public function and(Specification $other): self
    {
        return new AndSpecification($this, $other);
    }
}
