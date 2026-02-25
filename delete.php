<?php
include("db.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $conn->query("DELETE FROM questions WHERE id=$id");
}

header("Location: admin.php");
exit();
?>