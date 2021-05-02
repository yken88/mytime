<?php
// connect to database
$conn = mysqli_connect('localhost', 'krn', 'test1234', 'mytime');

// check connection
if (!$conn) {
    echo 'Connection Error:' . mysqli_connect_error();
}
