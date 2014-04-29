<!doctype html>
<html>
<head>
<style>

* { margin: 0; padding: 0; }

.main {
	width:1000px;
	margin-left:20px;
	margin-right:20px;
	margin-top:50px;
}

.main > div { /*.main > div
Matches any div that is a child (must be an immediate child, not any descendant) of .main*/
	float:left;
	width:200px;
	margin:0 auto;
	text-align:left;
}

.main img {
	display:block;
}

</style>

<!--Pay attention to how you're structuring your page, including your templates and data. Goal:maximum readability. Put data in a separate file and include the template partial for each list item in its own file.-->    

</head>
<div class="main">

<?php
// nested array with "name", "price", "image"
$quilts = [
  //["name"=>"", "price"=>"", "image"=>""] fat arrow makes a key/value pair
  ["name"=>"Q43 Pyramid Step", "price"=>"$515.00", "image"=>"http://d2i9ffo095jahk.cloudfront.net/img/thumbs/135x156_WOZZZ-M8507100P_KAF_00.jpg?1378310961"],
  ["name"=>"Q40 Five Of Diamonds", "price"=>"$810.00", "image"=>"http://d2i9ffo095jahk.cloudfront.net/img/thumbs/135x156_WOZZZ-M8506800P_PLA_00.jpg?1378311313"],
  ["name"=>"Q38 Autumn", "price"=>"$515.00", "image"=>"http://d2i9ffo095jahk.cloudfront.net/img/thumbs/135x156_WOZZZ-M8506900P_CAE_00.jpg?1378311473"],
  ["name"=>"Q42 Basketweave", "price"=>"$810.00", "image"=>"http://d2i9ffo095jahk.cloudfront.net/img/thumbs/135x156_WOZZZ-M8507000P_LAC_00.jpg?1378310966"],
  ["name"=>"Q37 Heather", "price"=>"$575.00", "image"=>"http://d2i9ffo095jahk.cloudfront.net/img/thumbs/135x156_COZZZ-M8506400P_SAA_00.jpg?1378310963"]
];

foreach ($quilts as $quilt) {
	//print_r($quilt);
	//include("quilt_item.php");
	
	echo "<div>\n"; //\n new line in code, doesn't get output to the screen
	
	//echo image HTML
	echo '<img src="';
	echo $quilt["image"];
	echo '">';
	echo "\n";
	
	//echo quilt name
	echo $quilt["name"];
	echo "<br>\n";
	
	//echo quilt price
	echo $quilt["price"];
	echo "\n";
	
	//echo end of div container
	echo "</div>\n\n"; 
	
};

?>
</div>