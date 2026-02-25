<?php
session_start();
include("db.php");

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

$q = $conn->query("SELECT * FROM questions ORDER BY unit_name");
?>

<!DOCTYPE html>
<html>
<head>
<title>Online Examination</title>
<link rel="stylesheet" href="style.css">

<script>
var timeLeft = 300; // 5 minutes

function startTimer(){
    var timer = setInterval(function(){
        document.getElementById("time").innerHTML = timeLeft;
        timeLeft--;

        if(timeLeft < 0){
            clearInterval(timer);
            document.getElementById("examForm").submit();
        }
    },1000);
}
</script>

</head>

<body onload="startTimer()">

<div class="header-main">Online Examination System</div>

<div class="container">

<h2>Online MCQ Examination</h2>

<h3>Time Remaining: <span id="time">300</span> seconds</h3>

<form method="post" action="loading.php" id="examForm">

<?php
$unit = "";
$qno = 1;

while($row = $q->fetch_assoc()){

    if($unit != $row['unit_name']){
        echo "<h3 class='unit-title'>".$row['unit_name']."</h3>";
        $unit = $row['unit_name'];
    }

    echo "<div class='question-box'>";
    echo "<p class='question'>Q".$qno.". ".$row['question']."</p>";
?>

    <label><input type="radio" name="ans[<?= $row['id']?>]" value="<?= $row['option1']?>" required> <?= $row['option1']?> </label><br>

    <label><input type="radio" name="ans[<?= $row['id']?>]" value="<?= $row['option2']?>"> <?= $row['option2']?> </label><br>

    <label><input type="radio" name="ans[<?= $row['id']?>]" value="<?= $row['option3']?>"> <?= $row['option3']?> </label><br>

    <label><input type="radio" name="ans[<?= $row['id']?>]" value="<?= $row['option4']?>"> <?= $row['option4']?> </label><br>

<?php
    echo "</div>";
    $qno++;
}
?>

<br>
<button type="submit">Submit Exam</button>

</form>

</div>

</body>
</html>