<?php
// ini_set('display_errors', "On");
include 'config/db_connect.php';

// times を全て取得
$sql = 'SELECT * FROM times ORDER BY created_at';
$result = mysqli_query($conn, $sql);

// $result 配列として取得する。
$times = mysqli_fetch_all($result, MYSQLI_ASSOC);
// var_dump($times);
// free result from memory
mysqli_free_result($result);

// 時間だけを取り出す。
$timesValue = [];
for ($i = 0; $i < count($times); $i++) {
    array_push($timesValue, (int) $times[$i]["time"]);
}

$timesValue = json_encode($timesValue);
// close connection
mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">

<?php include 'templates/header.php'?>
<h4 class="center grey-text">Times</h4>

<div class="container" style="width:500px; height:500px;">
<canvas id="myChart" width="200" height="200"></canvas>
</div>

<?php include 'templates/footer.php'?>
<script>let timesValue = <?php echo $timesValue; ?></script>
<script src="js/chart.js"></script>

</body>
</html>
