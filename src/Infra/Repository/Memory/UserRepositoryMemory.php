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

    /**
     * @param object{name: string, email: string, password: string, age: int} $input
     */
    public function save(object $input): void
    {
        $this->users[] = new User(
            $input->name,
            $input->email,
            $input->password,
            $input->age
        );
    }

    public function getByEmail(string $email): ?User
    {
        return $this->users[array_search($email, array_column($this->users, 'email'))];
    }
}
