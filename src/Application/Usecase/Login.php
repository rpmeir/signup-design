<?php

declare(strict_types=1);

namespace Src\Application\Usecase;

use Src\Application\Repository\UserRepository;
use Src\Domain\Service\TokenGenerator;

class Login
{
    public function __construct(private UserRepository $userRepository)
    {
    }

    /**
     * @param object{email: string, password: string} $input
     *
     * @return object{name: string, token: string}
     */
    public function execute(object $input): object
    {
        $user = $this->userRepository->getByEmail($input->email);
        if ($user === null) {
            throw new \Exception('Email or Password Incorrect');
        }
        $isValidPassword = $user->validatePassword($input->password);
        if (! $isValidPassword) {
            throw new \Exception('Email or Password Incorrect');
        }
        $tokenGenerator = new TokenGenerator('secret');
        $token = $tokenGenerator->generate($user, 1000000000, new \DateTimeImmutable('2024-09-20T00:00:00'));
        return (object) [
            'name' => $user->getName(),
            'token' => $token,
        ];
    }
}
