<?php
function make_cookie($name, $value) { //look, name and value are the arguments/parameters)
	setcookie($name, $value, time() + 60 * 60 * 24 * 30, "/");
}

// 1. Set values here in PHP based on any existing cookies (from browser preset) NOTE: set cookie function appears before html tag
$sort_by = "title";
if(isset($_COOKIE['sort'])) {
	$sort_by = $_COOKIE['sort'];
}
$view = "cover";
if(isset($_COOKIE['view'])) {
	$view = $_COOKIE['view'];
}
$color = "light";
if(isset($_COOKIE['color'])) {
	$color = $_COOKIE['color'];
}

// 2. Set values here in PHP based on query parameters (parameters that are defined after a question mark '?' in the URL of this web page, e.g. library.php?param1=value1&param2=value2)

// 3. Set cookies based on the query string parameters (from the $_REQUEST variable) to be used in future page loads.

//$sort_by = "title"; // the other valid option is "author"
if (isset($_REQUEST['sort'])) {
	$sort_by = $_REQUEST['sort']; 			// 2.set values
	make_cookie('sort', $_REQUEST['sort']);	// 3.set cookies
}
//$view = "cover"; // the other valid option is "listing"
if (isset($_REQUEST['view'])) {
	$view = $_REQUEST['view'];				// 2.
	make_cookie('view', $_REQUEST['view']);	// 3.
}
//$color = "light";
if (isset($_REQUEST['color'])) {
	$color = $_REQUEST['color'];				// 2.
	make_cookie('color', $_REQUEST['color']);// 3.
}




?>
<!doctype html>
<html>
<head>
<style type="text/css">
body * { margin: 0; padding:0; }
body {
	background-color: white;
	color: black;
}
body.dark {
	background-color: #636161;
	color: white;
}
div.book {
	width: 200px;
	height: 400px;
	float: left;
	/*border: solid black 1px;*/
	margin: 10px;
	overflow: hidden;
	text-align: center;
}
div.book.cover p.description {
	display: none;
}
div.book.listing {
	clear: left;
	width: 800px;
	height: 75px;
}
div.book.listing > * {
	float: left;
	text-align: left;
}
div.book.cover img {
	width: 200px;
}
div.book.listing img {
	width: 50px;
}
div.book.listing div.book-info { 
	width: 650px;
	margin-left: 10px;
	margin-right: 10px;
}
div.book.listing button {
	padding: 4px;
	font-weight: bold;
}
#param-links {
	margin: 10px 0;
}
#param-links a {
	color: blue;
	text-decoration: none;
}
#param-links > div {
	width: 33.333333%;
	float: left;
}
header {
	margin: 0 10px;
}
</style>

</head>
<body class="<?php echo $color; ?>">
<header>
<h1>Library</h1>
<p>History Books</p>
<!--value of what follows the ? mark is available to the php script/code whenever the page loads/is requested. it's available via the $_REQUEST variable (in cookies)-->
<div id="param-links">
	<div>
  	<p><a href="library.php?sort=title">order by title</a></p>
  	<p><a href="library.php?sort=author">order by author</a></p>
  	</div>
  	<div>
  	<p><a href="library.php?view=cover">cover view</a></p>
  	<p><a href="library.php?view=listing">listing view</a></p>
  	</div>
  	<div>
  	<p><a href="library.php?color=light">light color</a></p>
  	<p><a href="library.php?color=dark">dark color</a></p>
  </div>
</div>
</header>
<?php

include("passwords.php");
$mysql = new mysqli("localhost", "mvonhe01", $mysql_password, "mvonhe01");

// Library book columns:
//  image, title, author, description

//escapes special characters in a string for use in an SQL stmt 
//$column = $mysql->real_escape_string($column);
//echo "<h3>sort=".$sort_by."</h3>";
if($sort_by == "author") {
	$prepared = $mysql->prepare('SELECT * FROM books ORDER BY author;'); 
} else {
	$prepared = $mysql->prepare('SELECT * FROM books ORDER BY title;');
}
//$prepared->bind_param("s",$sort_by);
$prepared->execute();
$results = $prepared->get_result();
?>
<div id="books">
<?php
foreach($results as $row) {
//leave html long enough to dump values to the page
//The htmlentities() function converts characters (that are output from the database) to HTML entities.
?>
<div class="book <?php echo $view; ?>"> 
	<img src="images/<?php echo htmlentities($row["image"])?>">

	<div class="book-info">
		<h3><?php echo htmlentities($row["title"])?></h3>
		<p class="author">by <?php echo htmlentities($row["author"])?></p>
    	<p class="description"><?php echo htmlentities($row["description"]) ?></p>
    </div>
    <button name="checkout">Checkout</button>
</div>
<?php
} // end of foreach loop
?>
</div><!--end of books div-->


</body>
</html>