<!doctype html>
<html>
<head>
<style>
input {
	display:block;
}

.main {
	margin-top:100px;
	margin-left:200px;
	margin-right:200px;
	text-align:justify;
}


</style>
</head>
<div class="main">
<?php

	$method = $_SERVER["REQUEST_METHOD"];
	echo $method;//this is where "GET" or "POST" is printed on the page so include it in div .main

	if ($method == "GET") {		
?>
<!--dropping out of php to avoid writing echo in front of every statement-->

<form method="post">
<input placeholder="adjective" name="adjective1">
<input placeholder="adjective" name="adjective2">
<input placeholder="plural noun" name="pluralNoun">
<input placeholder="number (btwn10&14)" name="number1">
<input placeholder="number" name="number2">
<input placeholder="number" name="number3">
<input placeholder="number 21+" name="number2">
<input placeholder="number 21+" name="number3">
<input placeholder="verb" name="verb">
<input placeholder="noun" name="noun">
<button>POST</button>
</form>


<?php


}else { 
//$adjective1=$_POST["adjective1"];
//$adjective2=$_POST["adjective2"];
//$pluralNoun=$_POST["pluralNoun"];
//$number1=$_POST["number1"];
//$number2=$_POST["number2"];
//$number3=$_POST["number3"];
//$verb=$_POST["verb"];
//$noun=$_POST["noun"];

echo "<p>Attractive, Wealthy, Successful, $adjective1 Person Seeks Same</p>";

echo "<p>I enjoy long $adjective2 walks on the beach, cliches and serendipitous encounters with $pluralNoun. I work out 1/4 of an hour per week although I am OK if you work out more often such as $number1 hours per week. How old are you, BTW? Hopefully between $number2 and $number3. ¥ou will love to $verb and I will appreciate it. Please send a photo of (the, your) $noun.</p>";
 

if ($number1==12) { 
echo "Wow, that workout's way more than 13 hours per year.";
} 



if ($number2>45 && $number3<60) { 
echo "Great, your age falls within the golden mean.";
} else {
echo "It's a safe bet we're not the same age or close.";
}

}

//COMMENTS: address the programming task first
//page structure integrate PHP with HTML
//expressing ideas as conditions
//relationship of lines 22, 25 and 29--possible meaning: $_SERVER["REQUEST_METHOD"] //applies to the page and contains the contents of $_GET and $_POST. If a user //GETS/retrieves the form (that is all about "posting") in a browser and updates its //values then echo/print the values into the text.



?>
</div>

