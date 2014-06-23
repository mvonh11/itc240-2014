<?php

include("bus.php");

class Tester {
  public $passed = 0;
  public $failed = 0;
  
  //test takes two arguments
  //if they're equal, the test passed
  //in that case, $this->passed += 1
  //otherwise failed, etc
  //return whether it passed
  function test($a, $b) {
    if ($a == $b) {
      $this->passed = $this->passed + 1;
      return true;
    } else {
      echo "FAIL: expected ";
	  if(is_bool($b))
		  echo $b ? 'true' : 'false';
	  else
	  	  echo $b;
	  echo ", got ";
	  if(is_bool($a))
		  echo $a ? 'true' : 'false';
	  else
		  echo $a;
	  echo "<br>";
      $this->failed = $this->failed + 1;
      return false;
    }
  }
}

//2) ON THIS PAGE, include Bus.php/(the class definition) and create a new BUS, TEST IT here in index file AND SHOW THE RESULTS ON THE PAGE.


//TEST the BUS.php file and show results on the page. 
//HERE ARE THE TESTS: 

/*At the start of the page, the bus should be going 20mph, the bomb should be unarmed--not activated, and it should not have exploded.

Increase the speed to 55mph. At this point, the armed property should be true.

Increase speed to 80mph in order to jump over an unfinished gap in the freeway. The bomb should still be armed--activated, but it should not explode.

Drop the bus to 30mph. The bomb should explode: its exploded property should switch to true, 

Manually set the exploded value back to false, check its value, and then call trigger() and check to see that the bus (now emptied, thanks to a clever camera hack) explodes again.*/





//TEST is established by calling appropriate method on variables (same as objects)


$page_tester = new Tester(); // instantiate a new object of the class Tester and assign it to the variable named $page_tester.

//$obj = new Bus; a NEW bus class required to test and show results on page

$bus = new Bus(); //instantiate a new ojbect of the class Bus & assign it to the variable named $bus
$bus->setSpeed(20); // MPH call setSpeed method on the bus object
$armed = $bus->armed; // should return 0 or false--directly access internal variable on the object bus.
$exploded = $bus->exploded; // should return 0 or false

// First tests:
$page_tester->test($armed, false); // test that the bus is not armed at this point
$page_tester->test($exploded, false); // test that the bus is not exploded at this point


//// Increase speed to 55 MPH
$bus->setSpeed(55); // call setSpeed method on bus object
$armed = $bus->armed; // should return 1 or true--isArmed method will access internal variables on the object bus.
$exploded = $bus->exploded; // should return 0 or false

// Second set of tests:
$page_tester->test($armed, true); // test that the bus is armed at this point
$page_tester->test($exploded, false); // test that the bus is not exploded at this point

//// Increase speed to 80 mph
$bus->setSpeed(80); // call setSpeed method on bus object

$armed = $bus->armed; // should return 1 or true--access internal variables on the object bus.
$exploded = $bus->exploded; // should return 0 or false

// Second set of tests:
$page_tester->test($armed, true); // test that the bus is armed at this point
$page_tester->test($exploded, false); // test that the bus is not exploded at this point


//// Increase speed to 30 mph
$bus->setSpeed(30); // call setSpeed method on bus object

$exploded = $bus->exploded; // should return 1 or true

// Third set of tests:
$page_tester->test($exploded, true); // test that the bus is exploded at this point


//// Manually reset the exploded value
$bus->resetValues(); // the reset method will reset the $armed and $exploded internal variables
$armed = $bus->armed; // should return 0 or false--access internal variables on the object bus.
$exploded = $bus->exploded; // should return 0 or false

// Third set of tests:
$page_tester->test($armed, false); // test that the bus is not armed at this point
$page_tester->test($exploded, false); // test that the bus is not exploded at this point


//// Manually trigger the bomb to exploded
$bus->trigger();
$exploded = $bus->exploded; // should return 1 or true

// Fourth set of tests:
$page_tester->test($exploded, true); // test that the bus is exploded at this point



?>

<p>Tests passed: <?= $page_tester->passed ?>
<p>Tests failed: <?= $page_tester->failed ?>