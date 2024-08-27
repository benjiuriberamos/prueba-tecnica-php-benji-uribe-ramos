<?php

use PHPUnit\Framework\TestCase;
use App\UseCase\SaveUserUseCase;
use App\Repository\UserRepository;

class SaveUserUseCaseTest extends TestCase {

    public function testUserIsSaved() {
        $repository = new UserRepository();
        $useCase = new SaveUserUseCase($repository);

        $useCase->execute("Benji Uribe", "benjiuriberamos@gmail.com", "admin");

        $savedUser = $repository->findById("benjiuriberamos@gmail.com");

        $this->assertNotNull($savedUser);
        $this->assertEquals("Benji Uribe", $savedUser->getName());
    }
}
