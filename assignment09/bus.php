<?php

/*
ACCESSING PROPERTY OPERATORS:
Array - [] - ex. $array["prop"];
Array def or loop - => - ex. foreach($array as $key => $value) or [ "key" => "value" ]
Object - -> - ex. $obj->prop;
*/
	


//any value that needs to persist from one line to another requires a property. The object ($bus) needs a property (defined in the class Bus) to contain values that persist between method calls. such as "speed"


	
//your BUS class (defined here in bus.php) should have the following properties and methods	--(written as functions inside bus class.?)

/*1)armed - A property that starts as false, and turns true once the bus has passed 50mph. This represents the bomb on the bus.

2)exploded - A property that also starts out as false, and is set to true if the bomb is armed and the bus goes less than 50mph.

3)setSpeed() - A function that takes a single argument, which is the speed of the bus. If this speed is higher than 50mph and the bomb has not previously been armed, this function should arm it.
 
4)getSpeed() - A function that RETURNS the current speed of the bus.

5)trigger() - A function that can be called by a bitter madman that immediately explodes the bomb.*/


/*Instantiate/create your object
Classes are the blueprints/templates of php objects. Classes don't actually become objects until you create an instance ( property or method) of it ...thus creating the object.
Instantiation: creating an instance of an object in the server's memory.*/

//SET: set an object's properties using the methods/setters you create. (SET means insert data into an object) 

//GET: getter methods are used to access the data held in an object … this is the SAME DATA we inserted into our objects using the setter methods. 
//methods and properties of a class are accessed with the skinny arrow (->) operator.

//You use -$this- to access properties and to call other methods of the current class. 
//it's best practice to create separate php pages that only contain your classes and access with an "include"

//when you test, you'll be inserting and retrieving data from the BUS objects
 



/*
class Bus {
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
      echo "FAIL: expected $b, got $a<br>";
      $this->failed = $this->failed + 1;
      return false;
    }
  }
}

//1)define Bus class in Bus.php as: armed, exploded, set speed(insert), get speed(access), trigger.

//does defining and instantiating Bus class mean the same thing?

  
  function setSpeed($x) {
    //$this->currentTotal -= $x;
    $this->currentTotal = $this->currentTotal - $x;
  } 
   
  //IF speed >= 50
  //IF armed == false
    //armed = true //the bomb is now armed
//ELSE //speed < 50
  //IF armed == true
    //exploded = true //BOOM
*/



class Bus {
	public $speed = 0;
	public $armed = false;
	public $exploded = false;

	
	
	//function setSpeed($speed_input) {
		// Set this bus's speed value and arm/explode accordingly
		//$this->speed = $speed_input;
		
		//if($this->speed >= 55) {
			//$this->armed = true; // arm the bomb
		//} elseif($this->speed < 55 && $this->armed) {
			//$this->trigger(); // explode the bus
		//}
	//}
	
	
	//IF speed >= 50
  	//	IF armed == false
    //		armed = true //the bomb is now armed
	//ELSE //speed < 50
  	//	IF armed == true
    //		exploded = true //BOOM
	
	
	
	//function resetValues() {
		// Reset this bus's values to be unarmed and unexploded
		//$this->exploded = false;
		//$this->armed = false;
	//}
	
	
	
	//function trigger() {
		// Cause the bus to explode
		//$this->exploded = true;
	//}
}