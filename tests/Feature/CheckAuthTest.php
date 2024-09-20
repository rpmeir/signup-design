<?php

declare(strict_types=1);

use Src\Application\Usecase\CheckAuth;

describe('CheckAuthTest', function () {
    test('Deve verificar se está autenticado', function () {
       $checkAuth = new CheckAuth();
       $input = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE3MjY4MDEyMDAsImV4cCI6MjcyNjgwMTIwMCwic3ViIjoiam9obi5kb2VAZ21haWwuY29tIiwiZW1haWwiOiJqb2huLmRvZUBnbWFpbC5jb20iLCJleHBpcmVzSW4iOjEwMDAwMDAwMDB9.q360RtQltC2VbLlyHLC3EyxEea3-m-TQOiIT2YOKNXM';
       $output = $checkAuth->execute($input);
       expect($output->email)->toBe('john.doe@gmail.com');
    });
});
