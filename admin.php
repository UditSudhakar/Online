<?php
session_start();
include("db.php");

$result = $conn->query("SELECT * FROM questions ORDER BY unit_name");
?>

<link rel="stylesheet" href="style.css">

<div class="container">
<h2>Admin Panel</h2>

<a href="add_question.php"><button>Add Question</button></a>
<a href="logout.php"><button>Logout</button></a>

<br><br>

<table>
<tr>
<th>ID</th>
<th>Unit</th>
<th>Question</th>
<th>Action</th>
</tr>

<?php
while($row = $result->fetch_assoc()){
echo "<tr>";
echo "<td>".$row['id']."</td>";
echo "<td>".$row['unit_name']."</td>";
echo "<td>".$row['question']."</td>";
echo "<td><a href='delete.php?id=".$row['id']."'>Delete</a></td>";
echo "</tr>";
}
?>

</table>
</div>