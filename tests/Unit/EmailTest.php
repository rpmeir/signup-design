<?php

declare(strict_types=1);

use Src\Domain\Entity\Email;

describe('EmailTest', function () {
    test('Deve criar um email valido', function () {
        $email = new Email('john.doe@gmail.com');
        expect($email->getValue())->toBe('john.doe@gmail.com');
    });

    test('Não deve criar um email invalido', function () {
        expect(fn() => new Email('john.doe@gmail'))->toThrow(Exception::class, 'Invalid email');
    });
});
