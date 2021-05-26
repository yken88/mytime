<?php
require_once 'Models/Task.php';
require_once 'Models/Type.php';
class Color
{
    // タスクカラーを取得。
    public static function getTaskColors()
    {
        $times = Task::all();
        $types = Type::all();

        $task_colors = self::getColors($times, $types, "color");
        $task_colors = json_encode($task_colors);

        return $task_colors;
    }

    // ボーダーのカラーを取得。
    public static function getBorderColors()
    {
        $times = Task::all();
        $types = Type::all();

        $border_colors = self::getColors($times, $types, "border_color");

        $border_colors = json_encode($border_colors);
        return $border_colors;
    }

    // taskに対応したカラーを返す
    public static function getColors($times, $types, $color_type) // 第三引数はテーブルのカラムになる。

    {

        $colors = [];
        foreach ($times as $time) {

            $type_id = $time["type_id"];

            $color = $types[$type_id - 1][$color_type];
            array_push($colors, $color);
        }

        return $colors;
    }

}
