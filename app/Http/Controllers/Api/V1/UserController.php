<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\User\UserService;

class UserController extends BaseController
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(Request $request)
    {
        $params = [
            'per_page' => $request->per_page,
            'full_name' => $request->full_name,
            'username' => $request->username,
            'phone' => $request->phone,
            'email' => $request->email,
        ];
        $users = $this->userService->index($params,true);

        return $this->sendResponse($users, '');
    }

}
