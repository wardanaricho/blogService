<?php

namespace App\Repositories\User;

use App\Models\User;
use Illuminate\Contracts\Pagination\Paginator;

class UserRepositoryImpl implements UserRepository
{
    public function getAll(): array
    {
        return User::all()->toArray();
    }

    public function getById(int $id): ?User
    {
        return User::find($id);
    }

    public function create(array $data): User
    {
        return User::create($data);
    }

    public function update(int $id, array $data): bool
    {
        $user = User::find($id);
        if ($user) {
            return $user->update($data);
        }
        return false;
    }

    public function delete(int $id): bool
    {
        $user = User::find($id);
        if ($user) {
            return $user->delete();
        }
        return false;
    }

    public function getUserIndex(int $perPage, string $sort = 'asc', ?string $search): Paginator
    {
        $query = User::query();

        if ($search) {
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('username', 'like', '%' . $search . '%');
        }

        return $query->orderBy('id', $sort)->paginate($perPage);
    }
}
