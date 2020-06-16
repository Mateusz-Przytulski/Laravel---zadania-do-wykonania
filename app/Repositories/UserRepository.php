<?php

namespace App\Repositories;

use App\User;

class UserRepository extends BaseRepository{

    public function __construct(user $model)
    {
        $this->model = $model;
    }

    public function getAllUsers(){
        return $this->model->get();
    }
}
