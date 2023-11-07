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

    public function getUserById($params)
    {
        return User::select(['id','name','email'])->where('id', $params['id'])->first();
    }

    public function createUser($params)
    {
        return User::create($params);
    }

    public function update($params)
    {   
        $user = User::find($params['id']);
        return $user->update($params);
    }

    public function delete($id)
    {
        return User::where('id', $id)->delete();
    }
}
