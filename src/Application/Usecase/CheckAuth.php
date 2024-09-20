<?php

declare(strict_types=1);

namespace Src\Application\Usecase;

use Src\Domain\Service\TokenGenerator;

class CheckAuth
{
    public function __construct()
    {
    }

    /** @return object{email: string} */
    public function execute(string $token): object
    {
        $tokenGenerator = new TokenGenerator('secret');
        $payload = $tokenGenerator->verify($token);
        return (object) ['email' => $payload->sub];
    }
}
