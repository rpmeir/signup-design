<?php

declare(strict_types=1);

use Src\Application\Usecase\Login;
use Src\Application\Usecase\Signup;
use Src\Infra\Repository\Memory\UserRepositoryMemory;

require_once __DIR__ . '/vendor/autoload.php';

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
