<?php
require_once 'Task.php';

class Time
{
    // 合計時間
    public static function getTotalTime()
    {
        $times = Task::all();
        $total_time = 0;
        for ($i = 0; $i < count($times); $i++) {
            $timer = $times[$i]["time"];
            $total_time += $timer;
        }

        return $total_time;
    }

    // chart.js にて円グラフの描画に必要な情報。
    public static function getTimers()
    {
        $times = Task::all();
        $timers = [];
        for ($i = 0; $i < count($times); $i++) {
            array_push($timers, (int) $times[$i]["time"]);
        }

        $timers = json_encode($timers); // chart.jsに渡すため、jsonに。
        return $timers;
    }
}
