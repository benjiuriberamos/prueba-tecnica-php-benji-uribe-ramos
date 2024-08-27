<?php

namespace App\UseCases;

use App\Entities\User;
use App\DTOs\UserSaveDTO;
use App\DTOs\CreateUserDTO;
use App\Repositories\UserRepositoryInterface;

class SaveUserUseCase {
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function execute(CreateUserDTO $usersaveDTO): void
    {
        $user = new User($usersaveDTO->name, $usersaveDTO->email, $usersaveDTO->password);
        $this->userRepository->save($user);
    }
}