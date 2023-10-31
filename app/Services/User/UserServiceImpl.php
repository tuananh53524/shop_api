<?php

namespace App\Services\User;

use App\Services\User\UserService;
use App\Models\User;

class UserServiceImpl implements UserService
{
    public function index($params, $paginate)
    {
        
        $users = User::select(['id','name','email'])->paginate($params['per_page']);
        return $users;
    }

    // public function search($params)
    // {
    //     $users = User::select(['id', 'full_name']);

    //     if (!empty($params['key']) && !empty($params['value'])) {
    //         return $users->where($params['key'], $params['value'])->first();
    //     }

    //     if (!empty($params['search'])) {
    //         $users->where(function ($query) use ($params) {
    //             $query->where('full_name', 'like', '%'. $params['search'] .'%')
    //                 ->orWhere('username', 'like', '%'. $params['search'] .'%')
    //                 ->orWhere('phone', 'like', '%'. $params['search'] .'%')
    //                 ->orWhere('email', 'like', '%'. $params['search'] .'%');
    //         });
    //     }

    //     return !empty($params['limit']) ? $users->limit($params['limit'])->get() : $users->limit(10)->get();
    // }

    // public function getUserById($params)
    // {
    //     return User::where('id', $params['id'])->with(['StaffPosition:id,allowed_vue_router_routes'])->first();
    // }

    // public function createUser($params)
    // {
    //     return User::create([
    //         'username' => $params['username'],
    //         'email' => $params['email'],
    //         'full_name' => $params['full_name'],
    //         'phone' => $params['phone'],
    //         'address' => $params['address'],
    //         'birthday' => $params['birthday'],
    //         'department_id' => $params['department_id'],
    //         'branch_id' => $params['branch_id'],
    //         'district_id' => $params['district_id'],
    //         'ward_id' => $params['ward_id'],
    //         'province_id' => $params['province_id'],
    //         'hire_date' => $params['hire_date'],
    //         'staff_position_id' => $params['staff_position_id'],
    //         'password' => \Hash::make('12345678'),
    //     ]);
    // }

    // public function update($params, $user)
    // {
    //     return $user->update($params);
    // }

    // public function delete($params)
    // {
    //     return User::where('id', $params['id'])->delete();
    // }
}
