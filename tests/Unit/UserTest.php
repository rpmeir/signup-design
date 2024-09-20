<?php

declare(strict_types=1);
use Src\Domain\Entity\User;

describe('UserTest', function () {
    test('Deve criar um usuario', function () {
       $user = new User('John Doe', 'john.doe@gmail.com', '12345678', 30);
       expect($user->name)->toBe('John Doe');
       expect($user->email)->toBe('john.doe@gmail.com');
       expect($user->password)->toBe('12345678');
       expect($user->age)->toBe(30);
    });

    test('Não deve criar um usuario se o nome for invalido', function () {
        expect(fn() => new User('John', 'john.doe@gmail.com', '12345678', 30))->toThrow(Exception::class, 'Invalid name');
    });

    test('Não deve criar um usuario se o email for invalido', function () {
        expect(fn() => new User('John Doe', 'john.doe', '12345678', 30))->toThrow(Exception::class, 'Invalid email');
    });

    test('Não deve criar um usuario se a senha for invalida', function () {
        expect(fn() => new User('John Doe', 'john.doe@gmail.com', '1234567', 30))->toThrow(Exception::class, 'Invalid password');
    });

    test('Não deve criar um usuario se a idade for invalida', function () {
        expect(fn() => new User('John Doe', 'john.doe@gmail.com', '12345678', 17))->toThrow(Exception::class, 'Invalid age');
    });
});
