<?php
ini_set('display_errors', "On");
require_once 'TasksController.php';

$task = new TasksController;
list($times, $task_names, $timers) = $task->Index();

$total_time = $task->getTotalTime();
?>

<?php include 'templates/header.php'?>
<h4 class="center grey-text">Times</h4>

<div class="main container row">
<div class="col s8">
    <canvas id="myChart"></canvas>
</div>
<table class="col s4 grey-text">
<div class="col s4 card-panel purple lighten-4 center">
    <p class="grey-text">Total Time : <?php echo $total_time; ?></p>
</div>
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
const task_names = <?php echo $task_names; ?>// $task_namesをchart.jsへ
const timers = <?php echo $timers; ?> // $timersをchart.jsへ
</script>
<script src="js/chart.js"></script>

</body>
</html>
