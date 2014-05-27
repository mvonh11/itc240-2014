<!doctype html>
<html>
<body>
<h1>Kitty-Fitness</h1>
<form method="POST" action="edit.php">
	<input name="date" placeholder="yy/mm/dd">
	<input name="activity" placeholder="activity">
    <input name="calories" placeholder="calories">
	<input type="submit">
</form>

<!--setting query parameters:-->
<a href="fitness.php?sort=date">Date</a>
<a href="fitness.php?sort=activity">Activity</a>
<a href="fitness.php?sort=calories">Calories</a>

<?php

include("passwords.php");
$mysql = new mysqli(
"localhost",
"mvonhe01",
$mysql_password, 
"mvonhe01"
);


$column = "calories";
if (isset($_REQUEST["sort"])) {
	$column = $_REQUEST["sort"];
}

//escapes special characters in a string for use in an SQL stmt 
$column = $mysql->real_escape_string($column);

//$whitelist = [
//	"calories" => true,
//	"id" => true,
//	"type" => true
//];

//The whitelist is a simple list of applications that have been granted permission by the user or an administrator. When an application tries to execute, it is automatically checked againstthe list and, if found, allowed to run.

//if (!isset($whitelist[$column])) {
//	$column = 'calories';
//}

$prepared = $mysql->prepare('SELECT * FROM fitness ORDER BY ? DESC;');

$prepared->bind_param("s", $column);
$prepared->execute();
$results = $prepared->get_result();

foreach($results as $row) {
//leave html long enough to dump values to the page
//The htmlentities() function converts characters (that are output from the database) to HTML entities.
?>
<div> <?= htmlentities($row["date"])?>
<?= htmlentities($row["activity"])?> 
<?= htmlentities ($row["calories"]) ?>
</div>
<?php
}

//when page loads, you always want to know the total # of calories in the table. The question (query about total of calories) is independent of the database content. 
$sumQuery = $mysql->prepare('SELECT SUM(calories) AS sum FROM fitness;'); 
//AS sum assigns the result of SUM(aggregate function) to sum: the number of calories combined
//SUM adds the calories column
//no params/values so no bind

$sumQuery->execute();
$sumResult = $sumQuery->get_result();

$sum = $sumResult->fetch_array();


$maxQuery = $mysql->prepare('SELECT MAX(calories) AS calories FROM fitness'); 

//condition from line above WHERE calories < 75;');

$maxQuery->execute();
$maxResult = $maxQuery->get_result();
$max = $maxResult->fetch_array();

//$countResult = $mysql->query('SELECT COUNT(*) AS rows FROM fitness WHERE calories >= 150;');
//$count = $countResult->fetch_array();
?>
<div>
	Total calories burned:
	<?= $sum["sum"] ?>
</div>

<div>
	Highest number calories burned-single activity:
	<?= $max["calories"] ?>
</div>


</body>
</html>