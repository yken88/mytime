<?php

class Type
{
    const DB_FILE = 'config/db_connect.php';
    public static function all()
    {
        require DB_FILE;

        $sql = 'SELECT * FROM types';
        $result = mysqli_query($conn, $sql);

        $types = mysqli_fetch_all($result, MYSQLI_ASSOC);

        return $types;
    }
}
