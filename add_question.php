<?php
include("db.php");

if(isset($_POST['add'])){
$unit=$_POST['unit'];
$q=$_POST['question'];
$o1=$_POST['o1'];
$o2=$_POST['o2'];
$o3=$_POST['o3'];
$o4=$_POST['o4'];
$correct=$_POST['correct'];

$conn->query("INSERT INTO questions(unit_name,question,option1,option2,option3,option4,correct_option)
VALUES('$unit','$q','$o1','$o2','$o3','$o4','$correct')");

header("Location: admin.php");
}
?>

<link rel="stylesheet" href="style.css">

<div class="container">
<h2>Add Question</h2>

<form method="post">
Unit: <input type="text" name="unit" required><br><br>
Question: <input type="text" name="question" required><br><br>
Option1: <input type="text" name="o1" required><br><br>
Option2: <input type="text" name="o2" required><br><br>
Option3: <input type="text" name="o3" required><br><br>
Option4: <input type="text" name="o4" required><br><br>
Correct Option: <input type="text" name="correct" required><br><br>

<button name="add">Add Question</button>
</form>
</div>