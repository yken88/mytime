<?php
// ini_set('display_errors', "On");

include 'config/db_connect.php';

if (isset($_POST['delete'])) {

    $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

    $sql = "DELETE FROM times WHERE id = $id_to_delete";

    if (mysqli_query($conn, $sql)) {
        //success
        header('Location: index.php');
    } else {
        echo 'query:error: ' . mysqli_error($conn);
    }
}
// check GET request id param
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $sql = "SELECT * FROM times WHERE id = $id";

    $result = mysqli_query($conn, $sql);

    $time = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    mysqli_close($conn);

    // print_r($time);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php include 'templates/header.php'?>

    <div class="container center gray-text">
        <?php if ($time): ?>
            <h4><?php echo htmlspecialchars($time['task_name']); ?></h4>
            <p>Type of: <?php htmlspecialchars($time['type']);?></p>
            <p><?php echo date($time['created_at']); ?></p>
            <p><?php echo htmlspecialchars($time['time']); ?></p>

            <!-- Delete form -->
            <form action="details.php" method="POST">
            <input type="hidden" name="id_to_delete" value="<?php echo $time['id'] ?>">
            <input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
            </form>
        <?php else: ?>
            <h5>No such task exist!</h5>
        <?php endif;?>
    </div>

<?php include 'templates/footer.php'?>
</body>
</html>