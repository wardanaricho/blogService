<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Services\User\UserService;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(): View
    {
        return view('user.index');
    }

    public function userView(Request $request): View
    {
        $sort = $request->input('sort', 'asc');
        $search = $request->input('search', '');

        $users = $this->userService->getUserIndex(10, $sort, $search);

        return view('user.data-user', [
            'users' => $users
        ]);
    }

    public function create(): View
    {
        return view('user.create');
    }

    public function store(UserRequest $userRequest): RedirectResponse
    {

        $this->userService->createUser($userRequest);
        return redirect()->to('/user');
    }

    public function edit($userId): View
    {
        $user = $this->userService->getUserById($userId);
        return view('user.edit', [
            'user' => $user
        ]);
    }

    public function update(UserRequest $userRequest, $userId): RedirectResponse
    {
        $this->userService->updateUser($userId, $userRequest);
        return redirect()->to('/user');
    }

    public function delete($userId): RedirectResponse
    {
        $this->userService->deleteUser($userId);
        return redirect()->to('/user');
    }
}
