<?php

namespace App\UseCase;

use App\Repository\UserRepositoryInterface;
use App\User;

class SaveUserUseCase {
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function execute($name, $email, $password) {
        $user = new User($name, $email, $password);
        $this->userRepository->save($user);
    }
}