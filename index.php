<?php
ini_set('display_errors', "On");
include 'config/db_connect.php';
// times を全て取得
$sql = 'SELECT * FROM times ORDER BY created_at';
$result = mysqli_query($conn, $sql);

// $result 配列として取得する。
$times = mysqli_fetch_all($result, MYSQLI_ASSOC);
// var_dump($times);
// free result from memory
mysqli_free_result($result);

// close connection
mysqli_close($conn);
// print_r($times);
?>

<!DOCTYPE html>
<html lang="en">

<?php include 'templates/header.php'?>
<h4 class="center grey-text">Times</h4>

<div class="container" style="width:500px; height:500px;">
<canvas id="myChart" width="200" height="200"></canvas>

</div>
<?php include 'templates/footer.php'?>
<script src="js/chart.js"></script>
</body>
</html>
