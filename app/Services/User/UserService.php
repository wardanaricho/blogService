<?php

namespace App\Services\User;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Contracts\Pagination\Paginator;

interface UserService
{
    public function getAllUser(): array;
    public function getUserById(int $id): ?User;
    public function createUser(UserRequest $userRequest): User;
    public function updateUser(int $id, UserRequest $userRequest): bool;
    public function deleteUser(int $id): bool;
    public function getUserIndex(int $perPage, string $sort = 'asc', ?string $search): Paginator;
}
