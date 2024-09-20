<?php

declare(strict_types=1);

use Src\Domain\Entity\Name;

describe('NameTest', function () {
    test('Deve criar um nome valido', function () {
        $email = new Name('John Doe');
        expect($email->getValue())->toBe('John Doe');
    });

    test('Não deve criar um nome invalido', function () {
        expect(fn() => new Name('John'))->toThrow(Exception::class, 'Invalid name');
    });
});
