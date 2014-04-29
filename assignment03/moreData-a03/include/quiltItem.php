<?php
//["name"=>"", "price"=>"", "image"=>""]
	echo "<div>\n";

	// Echo image HTML
	echo '<img src="';
	echo $quilt["image"];
	echo '">';
	echo "\n";

	// Echo quilt name
	echo $quilt["name"];
	echo "<br>\n";

	// Echo quilt price
	echo $quilt["price"];
	echo "\n";
	//echo '<br>';

	// Echo end of div container
	echo "</div>\n\n";
?>