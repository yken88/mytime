<?php
class Task
{
    private $task_name;
    private $type;
    private $time;

    public function __consturct($task_name, $type, $time)
    {
        $this->task_name = $task_name;
        $this->type = $type;
        $this->time = $time;
    }

    public function getTaskName()
    {
        return $this->task_name;
    }
    public function getType()
    {
        return $this->type;
    }
    public function getTime()
    {
        return $this->time;
    }

    public static function all()
    {
        require 'config/db_connect.php';

        $sql = 'SELECT * FROM times';
        $result = mysqli_query($conn, $sql);

        $times = mysqli_fetch_all($result, MYSQLI_ASSOC);

        return $times;
    }

    public static function getTaskNames()
    {
        $times = self::all();

        $task_names = [];
        foreach ($times as $time) {
            array_push($task_names, $time["task_name"]);
        }

        $task_names = json_encode($task_names);

        return $task_names;
    }

    // 新規登録。
    public static function create()
    {
        require 'config/db_connect.php';
        $task_name = $type = $time = $type_id = '';
        $errors = array('task_name' => '', 'type' => '', 'type_id' => '', 'time' => '');

        if (isset($_POST['submit'])) {

            // check
            if (empty($_POST['task_name'])) {
                echo 'タスク名を入力してください。';
            } else {
                $task_name = $_POST['task_name'];
                if (!preg_match('/^[a-zA-Z\s]+$/', $task_name)) {
                    $errors['task_name'] = 'タスク名がおかしいよ';
                }
            }

            if (empty($_POST['type'])) {
                echo 'typeを入力してください。';
            } else {
                $type = htmlspecialchars($_POST['type']);
            }
            if (empty($_POST['type_id'])) {
                echo 'type_idを入力してください。';
            } else {
                $type_id = htmlspecialchars($_POST['type_id']);
            }

            if (empty($_POST['time'])) {
                echo '時間を入力してください。';
            } else {
                $time = htmlspecialchars($_POST['time']);
            } // end check

            if (array_filter($errors)) {
                echo 'errors in the form';
            } else {
                //
                $task_name = mysqli_real_escape_string($conn, $_POST['task_name']);
                $type = mysqli_real_escape_string($conn, $_POST['type']);
                $type_id = mysqli_real_escape_string($conn, $_POST['type_id']);
                $time = mysqli_real_escape_string($conn, $_POST['time']);

                // create sql
                $sql = "INSERT INTO times(task_name, type, type_id, time) VALUES('$task_name','$type', '$type_id' ,'$time')";

                if (mysqli_query($conn, $sql)) {
                    // success
                    header('Location: index.php');
                } else {
                    echo 'query error: ' . mysqli_error($conn);
                }

            }
        }

        return [$errors, $task_name, $type, $type_id, $time];
    }
}
