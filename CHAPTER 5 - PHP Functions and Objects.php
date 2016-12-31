<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>CHAPTER 5 - PHP Functions and Objects</title>
</head>

<body>

<?php

echo "<b>Example 5-6:</b><br><br>";
//The include Statement
//include("library.php");

echo "<b>Example 5-7:</b><br><br>";
//Using include_once
//include_once("library.php");

echo "<b>Example 5-8:</b><br><br>";
//Using require and require_once
//require_once("library.php");

echo "<b style='font-size: 30px;'>Learning PHP, MySQL, JavaScript, CSS & HTML5, 3e (2014)</b><br><br>
  <b style='font-size: 20px;'>CHAPTER 5 - PHP Functions and Objects</b><br><br>";
  
  print "print is a pseudo-function. No ()<br>";
  print ("print doesn't require parentheses. With ()<br><br>");
  
  //phpinfo();
  
  echo "<b>Example 5-1:</b><br>";
  //PHP Functions
  echo strrev(" .dlrow olleH")."<br>"; // Reverse string
  echo str_repeat("Hip ", 2)."<br>";   // Repeat string
  echo strtoupper("hooray!")."<br><br>";   // String to upper case
  
  $lowered = strtolower("aNY # of Letters and Punctuation you WANT");echo $lowered."<br>";
  $ucfixed = ucfirst("any # of letters and punctuation you want");echo $ucfixed."<br>";
  echo ucfirst($lowered)."<br>";
  echo ucfirst(strtolower("aNY # of Letters and Punctuation you WANT"))."<br><br>";
  
  print(5-8)."<br>";
  print(abs(5-8))."<br>";
  
  echo "<br><b>Example 5-2:</b><br>";
  //Returning a Value
  echo fix_names("WILLIAM", "henry", "gatES")."<br>";
  function fix_names($n1, $n2, $n3)
  {
    $n1 = ucfirst(strtolower($n1));
    $n2 = ucfirst(strtolower($n2));
    $n3 = ucfirst(strtolower($n3));

    return $n1 . " " . $n2 . " " . $n3;
  }
  
  echo "<br><b>Example 5-3:</b><br>";
  //Returning an Array
  $names = fix_names1("WILLIAM", "henry", "gatES");
  echo $names[0] . " " . $names[1] . " " . $names[2]. "<br>";

  function fix_names1($n1, $n2, $n3)
  {
    $n1 = ucfirst(strtolower($n1));
    $n2 = ucfirst(strtolower($n2));
    $n3 = ucfirst(strtolower($n3));

    return array($n1, $n2, $n3);
  }
  
  echo "<br><b>Example 5-4:</b><br>";
  //Passing by Reference
  $a1 = "WILLIAM";
  $a2 = "henry";
  $a3 = "gatES";
  echo $a1 . " " . $a2 . " " . $a3 . "<br>";
  fix_names2($a1, $a2, $a3);
  echo $a1 . " " . $a2 . " " . $a3. "<br><br>";
  function fix_names2(&$n1, &$n2, &$n3)
  {
    $n1 = ucfirst(strtolower($n1));
    $n2 = ucfirst(strtolower($n2));
    $n3 = ucfirst(strtolower($n3));
  }

$g = "Gyan";
$g2 = &$g;
echo $g. "<br>";
echo $g2. "<br>";

echo "<br><b>Example 5-5:</b><br>";
  $b1 = "WILLIAM";
  $b2 = "henry";
  $b3 = "gatES";
  echo $b1 . " " . $b2 . " " . $b3 . "<br>";
  fix_names3();
  echo $b1 . " " . $b2 . " " . $b3."<br>";
  function fix_names3()
  {
    global $b1; $b1 = ucfirst(strtolower($b1));
    global $b2; $b2 = ucfirst(strtolower($b2));
    global $b3; $b3 = ucfirst(strtolower($b3));
  }

echo "<br><b>Example 5-9:</b><br>";
//PHP Version Compatibility
if (function_exists("array_combine"))
  {
    echo "Function exists<br><br>";
  }
  else
  {
    echo "Function does not exist - better write our own<br><br>";
  }

echo phpversion()."<br>";

echo "<br><b>Example 5-10 and 11:</b><br>";
//Declaring a Class and Accessing Objects
$object = new User; //creates a new instance (called $object) //Same as - $object = new User();
  print_r($object); //prints User Object ( [name] => [password] => )
echo "<br>";

$object->name = "Joe";
  $object->password = "mypass";
  print_r($object); //prints User Object ( [name] => Joe [password] => mypass ) 
  echo "<br>";
  
  $object->save_user(); //prints Save User code goes here
  
  class User //defines the class User
  {
    public $name, $password; //two properties: $name and $password

    function save_user()
    {
  	  echo "Save User code goes here";
    }
  }

echo "<br><br><b>Example 5-12:</b><br>";
//Cloning Objects - Once you have created an object, it is passed by reference when you pass it as a parameter.
$object1 = new User1();
  $object1->name = "Alice";
  $object2 = $object1;
  $object2->name = "Amy";

  echo "object1 name = " . $object1->name . "<br>";
  echo "object2 name = " . $object2->name;
  
  class User1
  {
    public $name;
  }

echo "<br><br><b>Example 5-13:</b><br>";
//Cloning -  the clone operator creates a new instance of the class and copies the property values from the original instance to the new instance.
$object1 = new User2();
  $object1->name = "Alice";
  $object2 = clone $object1;
  $object2->name = "Amy";

  echo "object1 name = " . $object1->name . "<br>";
  echo "object2 name = " . $object2->name;
  
  class User2
  {
    public $name;
  }

echo "<br><br><b>Example 5-14:</b><br>";
//Constructors
$object = new User3(5,10); //Creating an object automatically calls Constructors method

class User3
  {
    function User3($param1, $param2)
    {
		echo $param1+=$param2;
      // Constructor statements go here
    }
  }

echo "<br><br><b>Example 5-15:</b><br>";
$object = new User4(5,15); //Creating an object automatically calls Constructors method
class User4
  {
    function __construct($param1, $param2)
    {
		echo $param1+=$param2;
      // Constructor statements go here
    }
  }

echo "<br><br><b>Example 5-16:</b><br>";
//PHP 5 Destructors
$object = new User5();
echo $object->a."<br>";
unset ($object); //unset() destroys the object and automatically calls Destructors method
//$object=null; //this is another way to destroy the object and it also utomatically calls Destructors method
class User5
  {
	  var $a=420;
    function __destruct()
    {
		echo "$this->a<br>";
		echo "Object Deleted";
      // Destructor code goes here
    }
  }

echo "<br><br><b>Example 5-17:</b><br>";
//Writing Methods
$object = new User6();
$object->password = "secret";
echo $object->get_password();
 
  class User6
  {
    public $name, $password;

    function get_password()
    {
      return $this->password; // special variable called $this, which can be used to access the current object’s properties
    }
  }
  
echo "<br><br><b>Example 5-18:</b><br>";
//Static Methods in PHP 5
User7::pwd_string();

  class User7
  {
    static function pwd_string()
    {
      echo "Please enter your password";
    }
  }

echo "<br><br><b>Example 5-19:</b><br>";
//Declaring Properties
$object1 = new User8();
  $object1->name = "Alice"; //It is not necessary to explicitly declare properties within classes, as they can be implicitly defined when first used

  echo $object1->name;

  class User8 {}

echo "<br><br><b>Example 5-20:</b><br>";
class Test
  {
    public $name     = "Paul Smith"; // Valid
    public $age      = 42;           // Valid
    //public $time     = time();       // Invalid - calls a function
    //public $score    = $level * 2;   // Invalid - uses an expression
  }
  
  echo "<br><br><b>Example 5-21:</b><br>";
  //Declaring Constants
  Translate::lookup();
  
  class Translate
  {
    const ENGLISH = 0;
    const SPANISH = 1;
    const FRENCH  = 2;
    const GERMAN  = 3;
    // …

    static function lookup()
    {
      echo self::SPANISH;
    }
  }
  
  echo "<br><br><b>Example 5-22:</b><br>";
  //Property and Method Scope in PHP 5
  class Example
  {
    var $name = "Michael";   // Same as public but deprecated
    public $age = 23;        // Public property
    protected $usercount;    // Protected property
  
    private function admin() // Private method
    {
      // Admin code goes here
    }
  }

echo "<br><br><b>Example 5-23:</b><br>";
//Static Properties and Methods
$temp = new Test1();

  echo "Test A: " . Test1::$static_property . "<br>";
  echo "Test B: " . $temp->get_sp()        . "<br>";
  //echo "Test C: " . $temp->static_property . "<br>";

  class Test1
  {
    static $static_property = "I'm static";

    function get_sp()
    {
      return self::$static_property;
    }
  }

echo "<br><b>Example 5-24:</b><br>";
//Inheritance
$object           = new Subscriber;
  $object->name     = "Fred";
  $object->password = "pword";
  $object->phone    = "012 345 6789";
  $object->email    = "fred@bloggs.com";
  $object->display();

  class User9
  {
    public $name, $password;
  
    function save_user()
    {
      echo "Save User code goes here";
    }
  }

  class Subscriber extends User9
  {
    public $phone, $email;
  
    function display()
    {
      echo "Name:  " . $this->name     . "<br>";
      echo "Pass:  " . $this->password . "<br>";
      echo "Phone: " . $this->phone    . "<br>";
      echo "Email: " . $this->email;
    }
  }

echo "<br><br><b>Example 5-25:</b><br>";
//The parent operator
$object = new Son;
  $object->test();
  $object->test2();

  class Dad
  {
    function test()
    {
      echo "[Class Dad] I am your Father<br>";
    }
  }

  class Son extends Dad
  {
    function test()
    {
      echo "[Class Son] I am Luke<br>";
    }
  	
    function test2()
    {
      parent::test();
	  self::test(); //to call a method from the current class use the self keyword
    }
  }
  
  echo "<br><b>Example 5-26:</b><br>";
  //Subclass constructors
  $object = new Tiger();
  echo "Tigers have...<br>";
  echo "Fur: " . $object->fur . "<br>";
  echo "Stripes: " . $object->stripes. "<br>";

  class Wildcat
  {
    public $fur; // Wildcats have fur

    function __construct()
    {
      $this->fur = "TRUE";
    }
  }

  class Tiger extends Wildcat
  {
    public $stripes; // Tigers have stripes

    function __construct()
    {
      parent::__construct(); // Call parent constructor first
      $this->stripes = "TRUE";
    }
  }

echo "<br><b>Example 5-27:</b><br>";
//Final methods
class User10
  {
    final function copyright()
    {
      echo "This class was written by Joe Smith";
    }
  }

  
  ?>
</body>
</html>