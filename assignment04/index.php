<!DOCTYE html>
<html>
<head>
	<style type="text/css">
/*#wrapper {
	width:960px;
	margin:0 auto;
}*/

	body, body * { 
	margin: 0; padding: 0; 
	background-image: url("../images/bkgd.png")
    /*background-position: 95% top, center top;*/
    background-repeat: no-repeat;
	}
	/*table { border-collapse: collapse; }*/
   th { 
	padding: 3px 5px; 
	background-color:#B7B3B3; 
	font-family:Consolas, "Andale Mono", "Lucida Console", "Lucida Sans Typewriter", Monaco, "Courier New", monospace;
	}
	
	td {
		padding: 3px 5px; 
		background-color:#F7EFEF;
		font-family:Consolas, "Andale Mono", "Lucida Console", "Lucida Sans Typewriter", Monaco, "Courier New", monospace;
		
	}
	
	body table {
		/*display:block;
		max-width:500px;*/
		margin:0 auto;
		margin-top:120px;
		/*      top   right bottom left */
		/*margin: 120px auto  0      auto;*/
	}
	</style>
</head>
<body>
<?php

include("passwords.php");

//i stands for improved  params: server, username, password, database 
//new mysqli is creating an object that represents a connection to the mysql database as specified by the argument/params to mysqli
$mysql = new mysqli("localhost", "mvonhe01" ,$mysql_password, "mvonhe01");
//your password is required to login to command line so mask it in an include file/


//$result = $mysql->query('SELECT * FROM string_instruments ORDER BY strings ASC, type ASC;');


$result = $mysql->query('SELECT * FROM string_instruments;');


?>
<table>
<tr>
<th>ID</th>
<th>Type</th>
<th>Strings</th>
<th>Orchestral</th>
<th>Fits in Backpack</th>
</tr>
<?php
foreach ($result as $row) {//for each row in mysql table, print the data as a php array assoc. with each table heading 
?>
<tr>
<td><?php echo $row["id"] ?></td>
<td><?php echo $row["type"] ?></td>
<td><?php echo $row["strings"] ?></td>
<td><?php echo $row["orchestral"] ? 'T' : 'F'; ?></td>
<td><?php echo $row["fits_in_backpack"] ? 'Y' : 'N'; ?></td>


</tr>
<?php
}
?>
</table>

</body>
</html>