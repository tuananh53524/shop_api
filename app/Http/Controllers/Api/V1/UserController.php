<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\User\UserService;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

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
            'page' => $request->page,
            'per_page' => $request->per_page,
            'full_name' => $request->full_name,
            'username' => $request->username,
            'phone' => $request->phone,
            'email' => $request->email,
        ];
        $users = $this->userService->index($params,true);
        return $this->sendResponse($users, '');
    }

    public function getUser($id)
    {

        $params = [
            'id' => $id
        ];

        $user = $this->userService->getUserById($params);
        return $this->sendResponse($user, '');
    }
    public function createUser(Request $request)
    {
        $params = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => ($request->password) ? Hash::make($request->password) : Hash::make('12345678'),
            'created_at' => Carbon::now('Asia/Ho_Chi_Minh'),
        ];

        $user = $this->userService->createUser($params);
        return $this->sendResponse($user, '');
    }

    public function updateUser(Request $request)
    {
        $params = [
            'id' => $request->id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'updated_at' => Carbon::now('Asia/Ho_Chi_Minh'),
        ];
        
        $user = $this->userService->update($params);
        return $this->sendResponse($user, '');
    }

    public function deleteUser($id)
    {
        $user = $this->userService->delete($id);
        return $this->sendResponse($user, '');
    }
}
