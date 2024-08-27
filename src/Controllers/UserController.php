<?php

namespace App\Controllers;

use Klein\Request;
use Klein\Response;
use Klein\ServiceProvider;
use App\DTOs\CreateUserDTO;
use App\UseCases\SaveUserUseCase;
use App\Repositories\UserRepository;
use Klein\Exceptions\ValidationException;

class UserController
{

    public function createUser(Request $request, Response $response, ServiceProvider $service)
    {
        ini_set('display_errors', 1);

        try {
            
            $service->validateParam('name', 'El campo nombre es requerido.')
                ->notNull()
                ->isLen(5, 155);
            $service->validateParam('email', 'El campo email es requerido.')
                    ->notNull()
                    ->isEmail()
                    ->isLen(10, 155) ;
            $service->validateParam('password', 'El campo password es requerido.')
                    ->notNull()
                    ->isLen(8, 155);

            $name = $request->param('name', '');
            $email = $request->param('email', '');
            $password = $request->param('password', '');
            
            $userDTO= new CreateUserDTO($name, $email, $password);

            $repository = new UserRepository();
            $useCase = new SaveUserUseCase($repository);
            $useCase->execute($userDTO);
            $response->code(200);

            return $response->json([
                'msj' => "Se ha creado el usuario $email",
                'data' => $userDTO,
            ]);
            
        } catch (ValidationException $th) {
            $response->code(400);

            return $response->json([
                'msj' => $th->getMessage(),
            ]);
        }
        
    }
}
