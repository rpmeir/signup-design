<?php

declare(strict_types=1);

namespace Src\Application\Usecase;
use Src\Application\Repository\UserRepository;

class Login
{
    public function __construct(private UserRepository $userRepository)
    {
    }

    /**
     * @param object{email: string, password: string} $input
     * @return object{name: string, token: string}
     */
    public function execute(object $input): object
    {
        $user = $this->userRepository->getByEmail($input->email);
        if ($user === null) {
            throw new \Exception('Email or Password Incorrect');
        }
        if ($input->password !== $user->password) {
            throw new \Exception('Email or Password Incorrect');
        }
        return (object) [
            'name' => $user->name,
            'token' => '123456'
        ];
    }
}
