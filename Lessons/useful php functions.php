

<?php

/*
	My goals for revisiting PHP fundamentals
	1. Learn those fundamental methods
	2. Ingrain myself on how methods actually work
	3. Come up with my own standard way of doing things


*/

number_format(32093849); //puts commas into the numbers
in_array($value, $array); //returns a boolean that shows whether the value is a member in the array


//Methods on a prepared PDO statement
$stmt->execute();
$stmt->bindParam();
$stmt->fetchAll();
$stmt->fetch();
$stmt->rows();


// String functions
trim(); // removes surrounding blanks 
strlen(); // returns string length

==; // compares strings in a case sensitive way
strcasecmp('john', 'jOHn'); // compares strings in a non-case sensitive way
strtolower();
strtoupper();
ucwords(); //uppercase the first letter of each word in a string
ucfirst(); //uppercase the first letter of the first word in each string
substr();
str_replace(' ', '_', $my_string); //replace all white spaces with underscores in the string


// Array functions
unset(); // remove an element from an array
implode(', ', $my_array); // prints all the elements of an array as strings separated by a comma
explode(', ', $string)// splits a string into array elements as separated by a comma in the string
sort();
asort(); // for associative arrays and sorts according to values not keys
ksort(); // for associative arrays and sorts according to keys not values
// The reverses are
rsort(); arsort(); krsort(); // respectively



// Classes and objects

$obj->getSum(); //calling a member function thats not static
Payment::paymentMode(); //calling a static method
Payment::MODE // calling a static constant 


public function __construct(){} // how we define a constructior

try{
	
	
}catch(Exception $error){
	$error->getMessage();
}

// in a constructor of a subclass, we first call the java equivalent of super()
// here its called parent

parent::__construct();

//Namespaces

namespace Tiny  
class Small{
	
}

use Tiny\Small as Small

// Server Variables to use
$_SERVER[]; // has many elements in it e.g.
QUERY_STRING, PHP_SELF, REQUEST_METHOD, PATH_INFO, SERVER_NAME, REMOTE_ADDR, 

// The null coalesce operate ?? replace the isset() method

$fname = $_POST['fname'] ?? ''; // means set the fname to the post variable if its there or to '' if its not


// When working on a form element that can have many values, set its name attribute to say item[]  to show it has many values and collect in the backend as $_POST['item'] and its an array

?>