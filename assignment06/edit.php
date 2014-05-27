<?php

include("passwords.php");
$mysql = new mysqli(
"localhost",
"mvonhe01",
$mysql_password,
"mvonhe01"
);

$query = 'INSERT INTO fitness (date, activity, calories) VALUES (?, ?, ?);';
$prepared = $mysql->prepare($query);

$prepared->bind_param(
"ssi",
$_REQUEST["date"],
$_REQUEST["activity"],
$_REQUEST["calories"]
);
$prepared->execute();

header("Location: fitness.php");
// use NOW() to clock the date in real time
?>