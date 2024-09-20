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
        expect($output->token)->toBe('eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE3MjY4MDEyMDAsImV4cCI6MjcyNjgwMTIwMCwic3ViIjoiam9obi5kb2VAZ21haWwuY29tIiwiZW1haWwiOiJqb2huLmRvZUBnbWFpbC5jb20iLCJleHBpcmVzSW4iOjEwMDAwMDAwMDB9.q360RtQltC2VbLlyHLC3EyxEea3-m-TQOiIT2YOKNXM');
    });

});
