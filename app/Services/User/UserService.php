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
}