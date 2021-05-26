<?php
ini_set('display_errors', "On");

require 'Task.php';

list($errors, $task_name, $type, $type_id, $time) = Task::create();
?>

<!DOCTYPE html>
<html lang="en">

<?php include 'templates/header.php'?>

<section class="container grey-text">
    <h4 class="center">Add a Task</h4>
    <form class="white" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <label>Task Name</label>
        <input type="text" name="task_name" value="<?php echo htmlspecialchars($task_name); ?>">

        <div class="red-text"><?php echo $errors['task_name']; ?></div>

        <label>type</label>
        <input type="text" name="type" value="<?php echo htmlspecialchars($type); ?>">

        <label>type_id</label>
        <input type="text" name="type_id" value="<?php echo htmlspecialchars($type_id); ?>">

        <label>time</label>
        <input type="text" name="time" value="<?php echo htmlspecialchars($time); ?>">

        <div class="center">
            <input type="submit" name="submit" value="ADD" class="btn brand z-depth-0">
        </div>
    </form>
</section>

<?php include 'templates/footer.php'?>

</body>
</html>
