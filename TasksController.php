<?php
require_once 'Models/Task.php';
require_once 'Models/Type.php';
require_once 'Models/Color.php';
require_once 'Models/Time.php';
class TasksController
{

    // 一覧表示
    public function Index()
    {
        $times = Task::all();
        return $times;
    }
}
