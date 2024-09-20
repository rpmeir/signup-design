<?php

declare(strict_types=1);

namespace Src\Infra\Repository\Memory;

use Src\Application\Repository\UserRepository;
use Src\Domain\Entity\User;

class UserRepositoryMemory implements UserRepository
{
    /**
     * @var array<User>
     */
    private array $users;

    public function __construct()
    {
        $this->users = [];
    }

    public function save(User $user): void
    {
        $this->users[] = $user;
    }

    public function getByEmail(string $email): ?User
    {
        $filtered = array_filter($this->users, static function (User $user) use ($email) {
            return $user->email->getValue() === $email;
        });
        return array_pop($filtered);
    }
}
