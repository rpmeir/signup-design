<?php

declare(strict_types=1);

use Src\Application\Usecase\Login;
use Src\Application\Usecase\Signup;
use Src\Infra\Repository\Memory\UserRepositoryMemory;

describe('SignupTest', function () {
    test('Deve fazer o signup', function () {
        $userRepository = new UserRepositoryMemory();
        // given
        $signup = new Signup($userRepository);
        $email = 'john.doe@gmail.com';
        $inputSignup = (object) [
            'name' => 'John Doe',
            'email' => $email,
            'password' => '12345678',
            'age' => 30
        ];
        // when
        $signup->execute($inputSignup);
        // then
        $login = new Login($userRepository);
        $inputLogin = (object) [
            'email' => $email,
            'password' => '12345678'
        ];
        $output = $login->execute($inputLogin);
        expect($output->name)->toBe('John Doe');
        expect($output->token)->toBe('123456');
    });

    test('Não deve fazer o signup se o nome for invalido', function () {
        $userRepository = new UserRepositoryMemory();
        // given
        $signup = new Signup($userRepository);
        $email = 'john.doe@gmail.com';
        $inputSignup = (object) [
            'name' => 'John',
            'email' => $email,
            'password' => '12345678',
            'age' => 30
        ];
        // when
        expect(fn() => $signup->execute($inputSignup))->toThrow(Exception::class, 'Invalid name');
    });

    test('Não deve fazer o signup se o email for invalido', function () {
        $userRepository = new UserRepositoryMemory();
        // given
        $signup = new Signup($userRepository);
        $email = 'john.doe@';
        $inputSignup = (object) [
            'name' => 'John Doe',
            'email' => $email,
            'password' => '12345678',
            'age' => 30
        ];
        // when
        expect(fn() => $signup->execute($inputSignup))->toThrow(Exception::class, 'Invalid email');
    });

    test('Não deve fazer o signup se o password for invalido', function () {
        $userRepository = new UserRepositoryMemory();
        // given
        $signup = new Signup($userRepository);
        $email = 'john.doe@gmail.com';
        $inputSignup = (object) [
            'name' => 'John Doe',
            'email' => $email,
            'password' => '1234567',
            'age' => 30
        ];
        // when
        expect(fn() => $signup->execute($inputSignup))->toThrow(Exception::class, 'Invalid password');
    });

    test('Não deve fazer o signup se a idade for invalida', function () {
        $userRepository = new UserRepositoryMemory();
        // given
        $signup = new Signup($userRepository);
        $email = 'john.doe@gmail.com';
        $inputSignup = (object) [
            'name' => 'John Doe',
            'email' => $email,
            'password' => '12345678',
            'age' => 17
        ];
        // when
        expect(fn() => $signup->execute($inputSignup))->toThrow(Exception::class, 'Invalid age');
    });
});
