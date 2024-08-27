<?php

namespace App\Repositories;

use App\Entities\User;


interface UserRepositoryInterface {
    public function save(User $user);
    public function update(User $user);
    public function delete(User $user);
    public function findById($id): ?User;
}