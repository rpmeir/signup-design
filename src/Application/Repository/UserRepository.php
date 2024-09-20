<?php

declare(strict_types=1);

namespace Src\Application\Repository;

use Src\Domain\Entity\User;

interface UserRepository
{
    public function save(User $user): void;
    public function getByEmail(string $email): ?User;
}
