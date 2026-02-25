<?php
include("db.php");

$res=$conn->query("
SELECT users.name, results.score, results.total
FROM results
JOIN users ON users.id=results.user_id
ORDER BY results.score DESC
");
?>

<link rel="stylesheet" href="style.css">

<div class="container">
<h2>Student Ranking</h2>

<table>
<tr>
<th>Rank</th>
<th>Name</th>
<th>Score</th>
</tr>

<?php
$r=1;
while($row=$res->fetch_assoc()){
echo "<tr>";
echo "<td>".$r++."</td>";
echo "<td>".$row['name']."</td>";
echo "<td>".$row['score']." / ".$row['total']."</td>";
echo "</tr>";
}
?>

</table>
</div>