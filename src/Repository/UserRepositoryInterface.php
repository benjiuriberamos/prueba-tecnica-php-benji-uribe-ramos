<?php

namespace App\Repository;

use App\User;

interface UserRepositoryInterface {
    public function save(User $user);
    public function update(User $user);
    public function delete(User $user);
    public function findById($id): ?User;
}