var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: task_names,
        datasets: [{
            label: '',
            data: timers, // index.phpで取得した時間の配列
            backgroundColor: task_colors,
            borderColor: border_colors,
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        legend: {
            position: 'bottom',
        },
        scales: {
            ticks: {
                display: false
            }
        }
    }
});