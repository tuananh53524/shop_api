<?php

namespace App\Services\User;

use App\Services\BaseService;

interface UserService extends BaseService
{
    /**
     * Get index
     * @return mixed
     */
    public function index($params, $paginate);

    /**
     * Get User
     * @return mixed
     */
    public function getUserById($params);

    /**
     * Create User
     * @return mixed
     */
    public function createUser($params);

    /**
     * Update User
     * @return mixed
     */
    public function update($params);

    /**
     * delete User
     * @return mixed
     */
    public function delete($id);
}
