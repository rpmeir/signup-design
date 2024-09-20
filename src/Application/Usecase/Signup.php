<?php

declare(strict_types=1);

namespace Src\Application\Usecase;

use Src\Application\Repository\UserRepository;
use Src\Domain\Entity\User;

class Signup
{
    public function __construct(private UserRepository $userRepository)
    {
    }

    /**
     * @param object{name: string, email: string, password: string, age: int} $input
     */
    public function execute(object $input): void
    {
        $user = new User($input->name, $input->email, $input->password, $input->age);
        $this->userRepository->save($user);
    }
}
