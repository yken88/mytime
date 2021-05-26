<?php

class Type
{
    public static function all()
    {
        require 'config/db_connect.php';

        $sql = 'SELECT * FROM types';
        $result = mysqli_query($conn, $sql);

        $types = mysqli_fetch_all($result, MYSQLI_ASSOC);

        return $types;
    }
}
