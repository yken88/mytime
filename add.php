<?php
ini_set('display_errors', "On");

include 'config/db_connect.php';
$task_name = $type = $time = '';
$errors = array('task_name' => '', 'type' => '', 'time' => '');

if (isset($_POST['submit'])) {

    // check
    if (empty($_POST['task_name'])) {
        echo 'タスク名を入力してください。';
    } else {
        $task_name = $_POST['task_name'];
        if (!preg_match('/^[a-zA-Z\s]+$/', $task_name)) {
            $errors['task_name'] = 'タスク名がおかしいよ';
        }
        // echo htmlspecialchars($_POST['task_name']);
    }

    if (empty($_POST['type'])) {
        echo 'typeを入力してください。';
    } else {
        $type = htmlspecialchars($_POST['type']);
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
        $time = mysqli_real_escape_string($conn, $_POST['time']);

        // create sql
        $sql = "INSERT INTO times(task_name, type, time) VALUES('$task_name','$type', '$time')";

        if (mysqli_query($conn, $sql)) {
            // success
            header('Location: index.php');
        } else {
            echo 'query error: ' . mysqli_error($conn);
        }
        // echo 'form is valid';

    }
}

?>

<!DOCTYPE html>
<html lang="en">

<?php include 'templates/header.php'?>

<section class="container grey-text">
    <h4 class="center">Add a Task</h4>
    <form class="white" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <label>Task Name</label>
        <input type="text" name="task_name" value="<?php echo htmlspecialchars($task_name) ?>">

        <div class="red-text"><?php echo $errors['task_name']; ?></div>

        <label>type</label>
        <input type="text" name="type" value="<?php echo htmlspecialchars($type) ?>">

        <label>time</label>
        <input type="text" name="time" value="<?php echo htmlspecialchars($time) ?>">

        <div class="center">
            <input type="submit" name="submit" value="ADD" class="btn brand z-depth-0">
        </div>
    </form>
</section>

<?php include 'templates/footer.php'?>

</body>
</html>
