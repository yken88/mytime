<?php

session_start();

if ($_SERVER['QUERY_STRING'] == 'noname') {
    // unset($_SESSION['name']);
    session_unset();
}
$name = $_SESSION['name'] ?? 'Guest';
?>

<head>
    <title>My Time</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"></script>

    <link rel="stylesheet" href="css/style.css">
    <style type="text/css">
        .brand{
            background: #cbb09c !important;
        }
        .brand-text {
            color: #cbb09c !important;
        }
        form{
            max-width: 460px;
            margin: 20px auto;
            padding: 20px;
        }
    </style>

</head>
<body class="grey lighten-4">
<nav class="white z-depth-0">
    <div class="container">
        <a href="index.php" class="bland-logo brand-text">My Time</a>
        <ul id="mav-mobile" class="right hide-on-small-and-down">
        <li class="grey-text">Hello <?php echo htmlspecialchars($name); ?></li>
            <li><a href="add.php" class="btn brand z-depth-0">Add Tasks</a></li>
        </ul>
    </div>
</nav>
