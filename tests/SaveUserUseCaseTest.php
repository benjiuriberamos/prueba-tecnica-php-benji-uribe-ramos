<?php

use App\DTOs\CreateUserDTO;
use PHPUnit\Framework\TestCase;
use App\UseCases\SaveUserUseCase;
use App\Repositories\UserRepository;

class SaveUserUseCaseTest extends TestCase {

    public function testUserIsSaved() {
        $createuserdto = new CreateUserDTO("Nicolas Garcia", "nicolas@gmail.com", "admin");
        $repository = new UserRepository();
        $useCase = new SaveUserUseCase($repository);

        $useCase->execute($createuserdto);

        $savedUser = $repository->findById("nicolas@gmail.com");

        $this->assertNotNull($savedUser);
        $this->assertEquals("Nicolas Garcia", $savedUser->getName());
    }
}
