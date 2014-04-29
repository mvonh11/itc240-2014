<!doctype html>
<html>
<head>
<style>

* { margin: 0; padding: 0; }

.main {
	width: 1000px;
	margin-left: auto;
	margin-right: auto;
	margin-top: 50px;
}

.main > div {
	/*display:inline;*/
	float: left;
	width: 200px;
	margin:0 auto;
	text-align:left;
}

.main img {
	display: block;
}

</style>

</head>
<body>
<div class="main">

<?php
include('include/quiltData.php');

// $0---------------------$500------$600------------------------$1000 
//                        ===========================================
// =====================================
// ================================================================== OR  (||)
//                        ==============                              AND (&&)

foreach ($quilts as $quilt) {
	//if ($quilt > $500.00 AND < $600.00 {a keyword to get items to display};
	if($quilt["price"] > 500 && $quilt["price"] < 600) {
		//echo "Hello!\n";
		//print_r($quilt);
	
		include("include/quiltItem.php");
	
		//echo "<div>\n"; //\n new line in code--eqivalent to return key/HTML b/c PHP generates your HTML received by the browser. In other words:Text Editor --> PHP File --> PHP Engine --> HTML File --> Browser --> Web Page
	
	//echo image HTML
	//echo '<img src="'; echo opening of img tag
	//echo $quilt["image"]; echo source link
	//echo '">'; caret puts the closing caret of the <img> tag into the HTML file
	//echo "\n";
	
	//echo quilt name
	//echo $quilt["name"];
	//echo "<br>\n"; break tag + newline both create line breaks--\n places line breaks in the source code for readability when debugging
	
	//echo quilt price
	//echo $quilt["price"];
	//echo "\n";
	
	//echo end of div container
	//echo "</div>\n\n"; double line break for readability

	}
	
};

//array array_filter ( array $array = array() [, callable $callback = Function() ] )
//array array_filter ( array $quilts = quilt() [, callable $callback = Function() ] )

// An example callback function
//function my_callback_function() {
    //echo 'hello world!';
//}

// Type 1: Simple callback
//call_user_func('my_callback_function'); 

?>
</div>
</body>
</html>