<?php

namespace App\Services\User;

use App\Models\User;
use App\Repositories\User\UserRepository;

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

    public function createUser(array $data): User
    {
        return $this->userRepository->create($data);
    }

    public function updateUser(int $id, array $data): bool
    {
        return $this->userRepository->update($id, $data);
    }

    public function deleteUser(int $id): bool
    {
        return $this->userRepository->delete($id);
    }
}
