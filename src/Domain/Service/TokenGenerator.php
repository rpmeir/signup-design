<?php

declare(strict_types=1);

namespace Src\Domain\Service;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Src\Domain\Entity\User;

class TokenGenerator
{
    public function __construct(readonly private string $secret)
    {
    }

    public function generate(User $user, int $expiresIn, \DateTimeImmutable $issueAt): string
    {
        $payload = [
            'iat' => $issueAt->getTimestamp(),
            'exp' => $issueAt->getTimestamp() + $expiresIn,
            'sub' => $user->getEmail(),
            'email' => $user->getEmail(),
            'expiresIn' => $expiresIn,
        ];
        return JWT::encode($payload, $this->secret, 'HS256');
    }

    public function verify(string $token): object
    {
        return JWT::decode($token, new Key($this->secret, 'HS256'));
    }
}
