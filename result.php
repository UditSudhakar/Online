<?php
session_start();
include("db.php");

$user=$_SESSION['user_id'];
$res=$conn->query("SELECT * FROM results WHERE user_id=$user ORDER BY id DESC LIMIT 1");
$data=$res->fetch_assoc();
?>

<link rel="stylesheet" href="style.css">

<div class="container">
<h2>Your Result</h2>

Score: <?php echo $data['score']; ?> / <?php echo $data['total']; ?>

<br><br>

<a href="leaderboard.php"><button>View Ranking</button></a>
<a href="logout.php"><button>Logout</button></a>

</div>