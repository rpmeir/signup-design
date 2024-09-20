<?php

declare(strict_types=1);

use Src\Domain\Entity\Password;

describe('PasswordTest', function () {
    test('Deve criar uma senha', function () {
        $password = Password::create('12345678');
        expect(password_verify('12345678', $password->value))->toBeTrue();
    });
});
