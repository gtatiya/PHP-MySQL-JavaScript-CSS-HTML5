<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>CHAPTER 4 - Expressions and Control Flow in PHP</title>
</head>

<body>

<?php

echo "<b style='font-size: 30px;'>Learning PHP, MySQL, JavaScript, CSS & HTML5, 3e (2014)</b><br><br>
  <b style='font-size: 20px;'>CHAPTER 4 - Expressions and Control Flow in PHP</b><br><br>";
  
  echo "<b>Example 4-1:</b><br>";
  //TRUE or FALSE?
  echo "a: [" . (20 > 9) . "]<br>";
  echo "b: [" . (5 == 6) . "]<br>";
  echo "c: [" . (1 == 0) . "]<br>";
  echo "d: [" . (1 == 1) . "]<br><br>";
  
  echo "<b>Example 4-2:</b><br>";
  echo "a: [" . TRUE  . "]<br>";
  echo "b: [" . FALSE . "]<br><br>";
  
  echo "<b>Example 4-3:</b><br>";
  //Literals and Variables
  $myname = "Brian";
  $myage  = 37;

  echo "a: " . 73      . "<br>"; // Numeric literal
  echo "b: " . "Hello" . "<br>"; // String literal
  echo "c: " . FALSE   . "<br>"; // Constant literal
  echo "d: " . $myname . "<br>"; // String variable
  echo "e: " . $myage  . "<br><br>"; // Numeric variable
  
  echo "<b>Example 4-4:</b><br>";
  $day_number = 340;

  $days_to_new_year = 366 - $day_number; // Expression

  if ($days_to_new_year < 30)
  {
	echo "Not long now till new year</b><br><br>"; // Statement
  }
  
  echo "<b>Example 4-5 to 10:</b><br>";
  //Operator Precedence
  $a = 1 + 2 + 3 - 4 + 5;
  echo "$a<br>";
  $a = 2 - 4 + 5 + 3 + 1;
  echo "$a<br>";
  $a = 5 + 2 - 4 + 1 + 3;
  echo "$a<br><br>";
  
  $a = 1 * 2 * 3 / 4 * 5;
  echo "$a<br>";
  $a = 2 / 4 * 5 * 3 * 1;
  echo "$a<br>";
  $a = 5 * 2 / 4 * 1 * 3;
  echo "$a<br><br>";
  
  $a = 1 + 2 * 3 - 4 * 5;
  echo "$a<br>";
  $a = 2 - 4 * 5 * 3 + 1;
  echo "$a<br>";
  $a = 5 + 2 - 4 + 1 * 3;
  echo "$a<br><br>";
  
  $a = ((1 + 2) * 3 - 4) * 5;
  echo "$a<br>";
  $a = (2 - 4) * 5 * 3 + 1;
  echo "$a<br>";
  $a = (5 + 2 - 4 + 1) * 3;
  echo "$a<br><br>";
  
  echo "<b>Example 4-11:</b><br><br>";
  //Associativity
  $level = $score = $time = 0; //This multiple assignment is possible only if the rightmost part of the expression is evaluated first and then processing continues in a right-to-left direction
  
  //Relational Operators
  //Equality
  echo "<b>Example 4-12:</b><br>";
  $month = "March";
  if ($month == "March") echo "It's springtime<br><br>";
  
  echo "<b>Example 4-13:</b><br>";
  $a = "1000";
  $b = "+1000";
  if ($a == $b)  echo "1<br><br>";
  if ($a === $b) echo "2<br><br>";
  
  echo "<b>Example 4-14:</b><br>";
  $a = "1000";
  $b = "+1000";
  if ($a != $b)  echo "1<br><br>";
  if ($a !== $b) echo "2<br><br>";
  
  echo "<b>Example 4-15:</b><br>";
  $a = 2; $b = 3;
  if ($a > $b)  echo "$a is greater than $b<br>";
  if ($a < $b)  echo "$a is less than $b<br>";
  if ($a >= $b) echo "$a is greater than or equal to $b<br><br>";
  if ($a <= $b) echo "$a is less than or equal to $b<br><br>";
  
  echo "<b>Example 4-16:</b><br>";
  //Logical operators
  $a = 1; $b = 0;
  echo ($a AND $b) . "<br>";
  echo ($a or $b)  . "<br>";
  echo ($a XOR $b) . "<br>";
  echo !$a         . "<br>";
  
  echo "<b>Example 4-17 and 18:</b><br>";
  //if ($finished == 1 or getnext() == 1) exit;
  
  //$gn = getnext();
  //if ($finished == 1 or $gn == 1) exit;
  echo "<br>";
  
  echo "<b>Example 4-19:</b><br>";
  //The if Statement
  $bank_balance = 10;
  if ($bank_balance < 100)
  {
    $money         = 1000;
    $bank_balance += $money;
	echo $bank_balance."<br><br>";
  }
  
  echo "<b>Example 4-20:</b><br>";
  //The else Statement
  $bank_balance = 150;
  if ($bank_balance < 100)
  {
    $money         = 1000;
    $bank_balance += $money;
  }
  else
  {
    //$savings      += 50;
    $bank_balance -= 50;
	echo $bank_balance."<br><br>";
  }
  
  echo "<b>Example 4-21:</b><br>";
  //The elseif Statement
  if ($bank_balance < 100)
  {
  	$money         = 1000;
  	$bank_balance += $money;
  }
  elseif ($bank_balance > 200)
  {
  	//$savings      += 100;
  	$bank_balance -= 100;
  }
  else
  {
  	//$savings      += 50;
  	$bank_balance -= 50;
	echo $bank_balance."<br><br>";
  }
  
  echo "<b>Example 4-22:</b><br>";
  $page = "Links";
  if     ($page == "Home")  echo "You selected Home<br><br>";
  elseif ($page == "About") echo "You selected About<br><br>";
  elseif ($page == "News")  echo "You selected News<br><br>";
  elseif ($page == "Login") echo "You selected Login<br><br>";
  elseif ($page == "Links") echo "You selected Links<br><br>";
  
  echo "<b>Example 4-23:</b><br>";
  //The switch Statement
  switch ($page)
  {
  	case "Home":  echo "You selected Home<br><br>";
  		break;
  	case "About": echo "You selected About<br><br>";
  		break;
  	case "News":  echo "You selected News<br><br>";
  		break;
  	case "Login": echo "You selected Login<br><br>";
  		break;
  	case "Links": echo "You selected Links<br><br>";
  		break;
  }
  
  echo "<b>Example 4-24:</b><br>";
  $page = "None";
  switch ($page)
  {
  	case "Home":  echo "You selected Home<br><br>";
  		break;
  	case "About": echo "You selected About<br><br>";
  		break;
  	case "News":  echo "You selected News<br><br>";
  		break;
  	case "Login": echo "You selected Login<br><br>";
  		break;
  	case "Links": echo "You selected Links<br><br>";
  		break;
	default: echo "Unrecognized selection<br><br>"; //Default action
		break;
  }
  
  echo "<b>Example 4-25:</b><br>";
  //Alternative syntax
  $page = "Links";
  switch ($page):
  	case "Home":
  		echo "You selected Home<br><br>";
  		break;
  
  	// etc...
  
  	case "Links":
  		echo "You selected Links<br><br>";
  		break;
  endswitch;
  
  echo "<b>Example 4-26:</b><br>";
  //The ? Operator
  $fuel = 2;
  echo $fuel <= 1 ? "Fill tank now<br><br>" : "There's enough fuel<br><br>";

  echo "<b>Example 4-27:</b><br>";
  $enough = $fuel <= 1 ? FALSE : TRUE;
  echo $enough."<br><br>";
  
  echo "<b>Example 4-28:</b><br>";
  //while Loops
  $fuel = 5;
  while ($fuel > 1)
  {
	// Keep driving …
	echo "There's enough fuel<br>";
	$fuel--;
  }
  
  echo "<b><br>Example 4-29:</b><br>";
  $count = 1;
  while ($count <= 12)
  {
	echo "$count times 12 is " . $count * 12 . "<br>";
	++$count;
  }
  
  echo "<b><br>Example 4-30:</b><br>";
  $count = 0;
  while (++$count <= 12)
	echo "$count times 12 is " . $count * 12 . "<br>";
	
	
	echo "<b><br>Example 4-31:</b><br>";
	//do ... while Loops
	$count = 1;
  do
	echo "$count times 12 is " . $count * 12 . "<br>";
  while (++$count <= 12);
	
	echo "<b><br>Example 4-32:</b><br>";
	$count = 1;
  do {
	echo "$count times 12 is " . $count * 12;
	echo "<br>";
  } while (++$count <= 12);
  
  echo "<b><br>Example 4-33:</b><br>";
  //for Loops
  for ($count = 1 ; $count <= 12 ; ++$count)
	echo "$count times 12 is " . $count * 12 . "<br>";

echo "<b><br>Example 4-34:</b><br>";
for ($count = 1 ; $count <= 12 ; ++$count)
  {
	echo "$count times 12 is " . $count * 12;
	echo "<br>";
  }


echo "<b><br>Example 4-35:</b><br>";
//Breaking Out of a Loop
$fp = fopen("CHAPTER 4 - text.txt", 'wb'); //writing in binary mode

  for ($j = 0 ; $j < 10 ; ++$j)
  {
	$written = fwrite($fp, "data ");

	if ($written == FALSE) break; //if (!$written) break; OR if (!fwrite($fp, "data")) break;
  }

  fclose($fp);
  
  echo "<b><br>Example 4-36:</b><br>";
  //The continue Statement
  $j = 10;
  while ($j > -10)
  {
    $j--;

    if ($j == 0) continue;

    echo (10 / $j) . "<br>";
  }
  
  echo "<b><br>Example 4-37:</b><br>";
//Implicit and Explicit Casting
	$a = 56;
  $b = 12;
  $c = $a / $b;

  echo $c. "<br>";
  echo (int) $c."<br>";
  echo intval ($c)."<br>";
  
 
  
  
?>


</body>
</html>