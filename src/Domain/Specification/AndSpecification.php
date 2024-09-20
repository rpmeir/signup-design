<?php

declare(strict_types=1);

namespace Src\Domain\Specification;

use Src\Domain\Entity\User;

class AndSpecification extends AbstractSpecification
{
    private Specification $first;
    private Specification $second;
    public function __construct(Specification $first, Specification $second)
    {
        $this->first = $first;
        $this->second = $second;
    }
    public function isSatisfiedBy(User $user): bool
    {
        return $this->first->isSatisfiedBy($user) && $this->second->isSatisfiedBy($user);
    }
}
