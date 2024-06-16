<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\User\UserService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

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

    public function userView(Request $request)
    {
        $sort = $request->input('sort', 'asc');
        $search = $request->input('search', '');

        $users = $this->userService->getUserIndex(10, $sort, $search);

        return view('user.data-user', [
            'users' => $users
        ]);
    }
}
