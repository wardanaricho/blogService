<?php

namespace App\Repositories\User;

use App\Models\User;

interface UserRepository
{
    public function getAll(): array;
    public function getById(int $id): ?User;
    public function create(array $data): User;
    public function update(int $id, array $data): bool;
    public function delete(int $id): bool;
}
