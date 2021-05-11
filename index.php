<?php
ini_set('display_errors', "On");
include 'config/db_connect.php';

// times を全て取得
$sql = 'SELECT * FROM times ORDER BY created_at';
$result = mysqli_query($conn, $sql);

// $result 配列として取得する。
$times = mysqli_fetch_all($result, MYSQLI_ASSOC);

// free result from memory
mysqli_free_result($result);

// タスク名と時間を取得。chart.jsに渡す。
$task_names = [];
$timers = [];
for ($i = 0; $i < count($times); $i++) {
    array_push($task_names, $times[$i]["task_name"]);
    array_push($timers, (int) $times[$i]["time"]);
}

$task_names = json_encode($task_names);
$timers = json_encode($timers);
// close connection
mysqli_close($conn);

?>

<?php include 'templates/header.php'?>
<h4 class="center grey-text">Times</h4>

<div class="main container row">
<div class="col s8">
    <canvas id="myChart"></canvas>
</div>
<table class="col s4 grey-text">
        <thead>
          <tr>
              <th>Task name</th>
              <th>Type</th>
              <th>Time</th>
          </tr>
        </thead>

        <tbody>
        <?php foreach ($times as $time): ?>
          <tr>
            <td><?php echo $time["task_name"]; ?></td>
            <td><?php echo $time["type"]; ?></td>
            <td><?php echo $time["time"]; ?></td>
          </tr>
          <?php endforeach;?>
        </tbody>
      </table>

</div>

<?php include 'templates/footer.php'?>
<script>
const task_names = <?php echo $task_names; ?>// php to js タスク名の配列の受け渡し。
const timers = <?php echo $timers; ?>// php to js 時間の配列の受け渡し。
</script>
<script src="js/chart.js"></script>

</body>
</html>
