<!DOCTYPE html>
<html>
<head>
<title>My Page</title>
<style type="text/css">

body {
    background-image: url("images/flowers.jpg");
    background-position: 95% top, center top;
    background-repeat: no-repeat;
    font-family: Muli, Arial, sans serif;
}

h4 {
	margin-top:45px;
	margin-left:140px;
	color:#B3B0B0;
}

#rectangle {
	margin: 0 auto;
	height: 40px;
	width: 700px;
	border-radius: 8px;
	background-color: white;
	text-align: center;
	font-size: 35px;
	color:grey;
	line-height: 35px;
	letter-spacing: 6px;
}

</style>


</head>
<body>

<?php 

include("passwords.php"); //must precede other includes
include("functions2.php");

// Connect to the database
$mysql = connect_to_mysql($mysql_password); //in passwords.php include

log_visit($mysql); // Insert the current date/time into the database when this page loads

$visit_count = get_page_visit_count($mysql); // $visit_count should be a number

//echo "<h3>Number of Visits to My Page</h3>";
//echo "<div id='number'>$visit_count</div>";



//algorithm as alternative to multiple for-loops needed to integrate the return value with underscores in the browser display. 

//$visit_count = 1023; // replace this with your variable assigned from the database
$placeholder = '___,___,___,___,___,___'; // what you see if there is no number in $visit_count
$num_string_with_commas = number_format($visit_count); // $visit_count converted to string with commas for thousands-separators (e.g. 1023 --> '1,023')
$num_string_len = strlen($num_string_with_commas); // get the length of the number-as-string-with-commas
$leading_string = substr($placeholder, 0, -$num_string_len); // get the portion of $placeholder minus the number of characters in the exisitng string
$final_num_string = $leading_string.$num_string_with_commas; // concatenate the leading string and the number string

?>

<h4><em>Number of Visits to My Page</em></h4>
<div id="rectangle"><?php echo $final_num_string; ?></div>

</body>
</html>