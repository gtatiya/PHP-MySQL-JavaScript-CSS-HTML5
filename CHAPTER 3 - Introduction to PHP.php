<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>CHAPTER 3 - Introduction to PHP</title>
</head>

<body>

<?php
  echo "<b style='font-size: 30px;'>Learning PHP, MySQL, JavaScript, CSS & HTML5, 3e (2014)</b><br><br>
  <b style='font-size: 20px;'>CHAPTER 3 - Introduction to PHP</b><br><br>";
  
  echo "<b>Example 3-1:</b><br>";
  echo "Hello world <br><br>";
  
  //Using Comments
  
  // single line comment
  
  /* This is a section
   of multi-line comments
   which will not be
   interpreted */
   
   
   
   //Semicolons
   $x = 10;
   echo $x ."<br><br>";
 
 //The $ symbol  
 echo "<b>Example 3-3:</b><br>";
  $mycounter = 1;
  echo $mycounter ."<br>";
  $mystring  = "Hello <br>";
  echo $mystring ;
  $myarray = array("One", 'Two', 'Three');
  for ($n = 0; $n <= 2; $n++)
  {
	  if ($n <= 1)
	  {
            echo $myarray[$n] . ", ";
        }
		else
		{
            echo $myarray[$n] . "<br><br>";
        }
  }

  //String variables
  echo "<b>Example 3-4:</b><br>";
  $username = "Fred Smith";
  echo $username ."<br>";
  $current_user = $username; //assigning string to another string variable
  echo $current_user ."<br><br>";
  
  //Two-dimensional arrays
  echo "<b>Example 3-5:</b><br>";
  $oxo = array(array('x', ' ', 'o'),
               array('o', 'o', 'x'),
               array('x', 'o', ' '));
  
  echo $oxo[1][2] ."<br><br>";
  
  for ($n = 0; $n <= 2; $n++)
  {
	  for ($p = 0; $p <= 2; $p++)
	  {
		echo $oxo[$n][$p];
	  }
	  echo "<br>";
  }
  echo "<br>";
  
  //Variable incrementing and decrementing
  $x=9;
  if (++$x == 10) echo $x."<br>";
  $y=0;
  if ($y-- == 0) echo $y."<br><br>";
  
  $bulletin = "ABCD";
  $newsflash = "EFGH";
  $bulletin .= $newsflash;
  echo $bulletin."<br><br>";
  
  //String types
  echo '$bulletin'."<br>";
  echo "$bulletin"."<br><br>";
  
 
  //Escaping characters
  echo 'My spelling\'s atroshus'."<br>";
  echo "She wrote upon it, \"Return to sender\".<br>";
  
  echo "Date\tName\tPayment.<br>";
  echo 'Date\tName\tPayment.<br>';
  
  print "\"Print\" statement works<br><br>";
  
  //Multiple-Line Commands
  echo "<b>Example 3-6 and 3-7:</b><br>";
  $author = "Steve Ballmer";
  echo "Developers, Developers, developers, developers, developers,
  developers, developers, developers, developers!

  - $author.<br>";
  
  $author = "Bill Gates";
  $text = "Measuring programming progress by lines of code is like
  Measuring aircraft building progress by weight.

  - $author.";
  
  echo "$text<br><br>";
  
  echo "<b>Example 3-8:</b><br>";
  $author = "Brian W. Kernighan";
  
  //here-document or heredoc
  echo <<<_END
  Debugging is twice as hard as writing the code in the first place.
  Therefore, if you write the code as cleverly as possible, you are,
  by definition, not smart enough to debug it.
  
  - $author.<br>
_END;

echo <<<END
This uses the "here document" syntax to output
multiple lines with variable interpolation. Note
that the here document terminator must appear on a
line with just a semicolon. no extra whitespace!<br>
END;

echo "<b>Example 3-9:</b><br>";
$author = "Scott Adams";

  $out = <<<_END
  Normal people believe that if it ain’t broke, don’t fix it.
  Engineers believe that if it ain’t broke, it doesn’t have enough " ; "
  features yet.

  - $author.
_END;
echo $out ."<br>";

//Appending
$out .= $author;
echo $out."<br><br>";

echo "<b>Example 3-10:</b><br>";
//Variable Typing
$number = 12345 * 67890;
echo $number."<br>";
echo substr($number, 3, 1)."<br>"; //Return part of a string

echo substr("abcdef", -1)."<br>";    // returns "f"
echo substr("abcdef", -2)."<br>";    // returns "ef"
echo substr("abcdef", -3, 1)."<br>"; // returns "d"
echo substr("abcdef", 0, 1)."<br><br>"; // returns "a"

echo "<b>Example 3-11:</b><br>";
$pi     = "3.1415927";
  $radius = 5;
  echo $pi * ($radius * $radius)."<br><br>";
  
  //Constants
  define("ROOT_LOCATION", "/usr/local/www/");
  echo ROOT_LOCATION."<br><br>"; //no need to use $
  
  
  
  //Predefined Constants - Magic constant
  echo __LINE__."<br>"; //current line number of the file
  echo __FILE__."<br>"; // full path and filename of the file
  echo __DIR__."<br>"; //directory of the file
  echo dirname(__FILE__)."<br>";
  echo __FUNCTION__."<br>"; //function name
  echo __CLASS__."<br>"; //class name
  echo __METHOD__."<br>"; //class method name
  echo __NAMESPACE__."<br>"; //name of the current namespace
  
  echo "This is line " . __LINE__ . " of file " . __FILE__."<br><br>";
  
  
  //The Difference Between the echo and print Commands
  $b=0;
  $b ? print "TRUE<br><br>" : print "FALSE<br><br>"; //Whichever command is on the left of the following colon is executed if $b is TRUE, whereas the command to the right is executed if $b is FALSE
  
  echo "<b>Example 3-12:</b><br>";
  //Functions
  function longdate($timestamp)
  {
    return date("l F jS Y", $timestamp);
  }
  
  echo longdate(time())."<br>"; //Thursday February 25th 2016
  echo longdate(time() - 10 * 24 * 60 * 60)."<br><br>"; //print out the date 10 days ago

  echo time()."<br>";//1456372290; Returns the current time measured in the number of seconds since the Unix Epoch (January 1 1970 00:00:00 GMT)
  echo "Date in INDIA: ";
  echo date("Y, F, l, j, h:i:s A", time()+5.5*60*60)."<br><br>"; // 2016, February, Thursday, 25, 09:45:43 AM - INDIAN Time zone
  
  echo "<b>Example 3-13:</b><br>";
  //Variable Scope - Local variables
  function longdate1($timestamp)
  {
	$temp = date("l F jS Y", $timestamp);
	return "The date is $temp";
  }
  echo longdate1(time())."<br><br>";
  
  echo "<b>Example 3-14:</b><br>";
  $temp = "The date is ";
  echo longdate2(time())."<br>";

  function longdate2($timestamp)
  {
//	return $temp . date("l F jS Y", $timestamp); //Undefined variable: temp in C:\wamp64\www\my-site\CHAPTER 3 - Introduction to PHP.php on line 218
  }
  
  echo "<b>Example 3-15:</b><br>";  
  $temp = "The date is ";
  echo $temp . longdate3(time())."<br><br>";

  function longdate3($timestamp)
  {
	return date("l F jS Y", $timestamp);
  }
  
  echo "<b>Example 3-16:</b><br>";
  $temp = "The date is ";
  echo longdate4($temp, time())."<br><br>";

  function longdate4($text, $timestamp)
  {
	return $text . date("l F jS Y", $timestamp);
  }
  
  //Global variables
  global $is_logged_in;
  
  
  echo "<b>Example 3-17:</b><br>";
  //Static variables
  function test()    //track how many times a function is called
  {
    static $count = 0;
    echo $count."<br>";
    $count++;
  }
  
  test ();
  test ();
  test ();
  test ();
  
  echo "<b>Example 3-18:</b><br>";
  //If you plan to use static variables, you should note that you cannot assign the result of an expression in their definitions
  static $int = 0;         // Allowed 
  //static $int = 1+2;       // Disallowed (will produce a Parse error)
  //static $int = sqrt(144); // Disallowed
  
  //Superglobal variables - http://php.net/manual/en/reserved.variables.php
  //$GLOBALS - All variables that are currently defined in the global scope of the script. The variable names are the keys of the array.
  function test1() {
    $foo = "local variable";

    echo '$foo in global scope: ' . $GLOBALS["foo"] . "<br>";
    echo '$foo in current scope: ' . $foo . "<br><br>";
}

$foo = "Example content";
test1();

//$_SERVER - Server and execution environment information
echo htmlentities($_SERVER['SERVER_NAME']);  // Superglobals and security - htmlentities function converts all characters into HTML entities.

  $indicesServer = array('GATEWAY_INTERFACE', 
'SERVER_ADDR', 
'SERVER_NAME', 
'SERVER_SOFTWARE', 
'SERVER_PROTOCOL', 
'REQUEST_METHOD', 
'REQUEST_TIME', 
'REQUEST_TIME_FLOAT',  
'DOCUMENT_ROOT', 
'HTTP_USER_AGENT', 
'REMOTE_PORT', 
'SCRIPT_FILENAME', 
'SERVER_ADMIN', 
'SERVER_PORT', 
'SERVER_SIGNATURE', 
'SCRIPT_NAME', 
'REQUEST_URI') ; 

echo '<table cellpadding="10">' ; 
foreach ($indicesServer as $arg) { 
    if (isset($_SERVER[$arg])) { 
        echo '<tr><td>'.$arg.'</td><td>' . $_SERVER[$arg] . '</td></tr>' ; 
    } 
    else { 
        echo '<tr><td>'.$arg.'</td><td>-</td></tr>' ; 
    } 
} 
echo '</table>' ; 



  
?>



</body>
</html>