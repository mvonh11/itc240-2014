<!doctype html>
<html>
<body>
<?php  
include("passwords.php");


//http://zephir.seattlecentral.edu/~mvonhe01/itc240-2014/assignment05/expenses.php


//connect to database
$mysql = new mysqli("localhost", "mvonhe01", $mysql_password, "mvonhe01");

if ($_SERVER["REQUEST_METHOD"] == "GET") {

  //<!--$monthresult = $mysql->query('SELECT MONTHNAME(date) as month, COUNT(*) as count FROM expenses GROUP BY MONTHNAME(date);');-->
  
  
  //if user queries by a given month then call, load values, send from sql  ISSET DEFINED: Determine if a variable is set and is not NULL. If a variable has been unset with unset(), it will no longer be set. isset() will return FALSE if testing a variable that has been set to NULL. Also note that a NULL byte ("\0") is not equivalent to the PHP NULL constant. If multiple parameters are supplied then isset() will return TRUE only if all of the parameters are set. Evaluation goes from left to right and stops as soon as an unset variable is encountered.
  if(isset($_REQUEST["month"])) {
	  $query='SELECT * FROM expenses WHERE MONTH(date)=?;';
	  $prepared = $mysql->prepare($query);
  	  $prepared->bind_param("i", $_REQUEST["month"]);
	  //otherwise select from all months
  } else { 
      $query='SELECT * FROM expenses;';
	  $prepared = $mysql->prepare($query);
  }
  
  $prepared->execute(); //cannot bind values until they've been executed/output by the user
  $prepared->bind_result($vendor,$date,$notes,$amount);
  ?>
  
  <table>
	<tr>
	  <th>vendor</th>
	  <th>date</th>
	  <th>notes</th>
	  <th>amount</th>
	</tr>
	<?php
  while($prepared->fetch()) {//calling the fetch method of the prepared variable until there's no more results from the query
  ?>
  
  <!--NOTE: THIS PART IS HTML-->
	<tr>
	  <td><?php echo $vendor ?></td>
	  <td><?php echo $date ?></td>
	  <td><?php echo $notes ?></td>
	  <td><?php echo $amount ?></td>
	</tr>
    <!--CLOSE HTML-->
    
	<?php
  }//closes while loop
  $prepared->close(); //skinny arrow is a method call. close the prepared statement/query
?>
</table>
<?php
}//closes if stmt for filtering receipts by month in table
?>

<!--php file given by "form-action" attr is the recipient of the form's data when submitted/posted-->
<form action="receipts-test.php" method="POST">
  <!--input name: assign what the user inputs to a variable named "vendor"-->
  <input name="vendor" placeholder="vendor">
  <input name="date" placeholder="yy/mm/dd">
  <textarea name="notes" placeholder="notes"></textarea>
  <input name="amount" placeholder="total">
  <input type="submit">
</form>
</body>
</html>
<?php



//only act on POST (i.e., insert data only if the form was submitted)


//the value of this request_method is POST(send to DB) (not GET--pull from DB)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //prepare query - like sending a delivery truck
  //first we write query - like getting an address
  //note: the NOW() function inserts the current date/time as the value
  
 //insert into=new row
  
  $query = 'INSERT INTO expenses (vendor, date, notes, amount) VALUES (?, ?, ?, ?);';
  
  //preparing is like calling for a truck
  $prepared = $mysql->prepare($query);
  //binding params = loading the truck with values
  $prepared->bind_param("sssd", $_REQUEST["vendor"], $_REQUEST["date"], $_REQUEST["notes"], $_REQUEST["amount"]);
  //executing sends the delivery to the database
  $prepared->execute();
}

?>
