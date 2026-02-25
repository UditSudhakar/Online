<?php
session_start();
include("db.php");

$user = $_SESSION['user_id'];
$score = 0;
$total = 25;

if(isset($_POST['ans'])){
foreach($_POST['ans'] as $id=>$val){
$res=$conn->query("SELECT correct_option FROM questions WHERE id=$id");
$row=$res->fetch_assoc();
if($row['correct_option']==$val){
$score++;
}
}
}

$conn->query("INSERT INTO results(user_id,score,total) VALUES('$user','$score','$total')");
?>
<!DOCTYPE html>
<html>
<head>
<title>Submitting...</title>
<link rel="stylesheet" href="style.css">
<style>
.spinner{
margin:20px auto;
border:8px solid #f3f3f3;
border-top:8px solid #764ba2;
border-radius:50%;
width:60px;
height:60px;
animation:spin 1s linear infinite;
}
@keyframes spin{
0%{transform:rotate(0deg);}
100%{transform:rotate(360deg);}
}
</style>

<script>
function startLoading(){
var messages=[
"Consulting Elon Musk...",
"Hacking NASA for Data...",
"Calling to Stephen Hawking...",
"99 Missed Calls Received from Sanat Sir..."
];

var i=0;

function show(){
if(i<messages.length){
document.getElementById("msg").innerHTML=messages[i];
i++;
setTimeout(show,2000);
}else{
window.location="result.php";
}
}
show();
}
</script>
</head>

<body onload="startLoading()" style="text-align:center;">
<h2>Submitting Answers... Please Wait</h2>
<div class="spinner"></div>
<h3 id="msg"></h3>
</body>
</html>