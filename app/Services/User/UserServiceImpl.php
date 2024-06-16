<?php

namespace App\Services\User;

use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Repositories\User\UserRepository;
use Illuminate\Contracts\Pagination\Paginator;

class UserServiceImpl implements UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAllUser(): array
    {
        return $this->userRepository->getAll();
    }

    public function getUserById(int $id): ?User
    {
        return $this->userRepository->getById($id);
    }

    public function createUser(UserRequest $userRequest): User
    {
        $data = $userRequest->validated();
        return $this->userRepository->create($data);
    }

    public function updateUser(int $id, UserRequest $userRequest): bool
    {
        $data = $userRequest->validated();
        if ($userRequest->filled('password')) {
            $data['password'] = bcrypt($userRequest->password);
        } else {
            unset($data['password']);
        }
        return $this->userRepository->update($id, $data);
    }

    public function deleteUser(int $id): bool
    {
        return $this->userRepository->delete($id);
    }

    public function getUserIndex(int $perPage, string $sort = 'asc', ?string $search): Paginator
    {
        return $this->userRepository->getUserIndex($perPage, $sort, $search);
    }
}
