<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Services\User\UserService;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
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
        $data = $userRequest->validated();
        $this->userService->createUser($data);
        return redirect()->to('/user');
    }
}
