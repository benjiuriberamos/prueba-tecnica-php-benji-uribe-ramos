<?php

namespace App\Repositories;

use App\Entities\User;
use App\Repositories\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface {
    private $users = [];

    public function save(User $user) {
        $this->users[$user->getEmail()] = $user;
    }

    public function update(User $user) {
        $this->users[$user->getEmail()] = $user;
    }

    public function delete(User $user) {
        unset($this->users[$user->getEmail()]);
    }

    public function findById($id): ?User {
        return $this->users[$id] ?? null;
    }
}