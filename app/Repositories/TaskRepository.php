<?php

namespace App\Repositories;

use App\task;

class TaskRepository extends BaseRepository{

    public function __construct(task $model)
    {
        $this->model = $model;
    }

    public function getAllTasks(){
        return $this->model->get();
    }
}
