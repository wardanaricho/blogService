<?php

namespace App\Services\User;

use App\Models\User;
use Illuminate\Contracts\Pagination\Paginator;

interface UserService
{
    public function getAllUser(): array;
    public function getUserById(int $id): ?User;
    public function createUser(array $data): User;
    public function updateUser(int $id, array $data): bool;
    public function deleteUser(int $id): bool;
    public function getUserIndex(int $perPage, string $sort = 'asc', ?string $search): Paginator;
}
