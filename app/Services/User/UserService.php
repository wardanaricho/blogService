<?php

namespace App\Services\User;

use App\Models\User;

interface UserService
{
    public function getAllUser(): array;
    public function getUserById(int $id): ?User;
    public function createUser(array $data): User;
    public function updateUser(int $id, array $data): bool;
    public function deleteUser(int $id): bool;
}
