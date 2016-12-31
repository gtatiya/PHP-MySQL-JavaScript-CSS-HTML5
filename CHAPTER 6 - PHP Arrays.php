<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>CHAPTER 6 - PHP Arrays</title>
</head>

<body>

<?php

echo "<b style='font-size: 30px;'>Learning PHP, MySQL, JavaScript, CSS & HTML5, 3e (2014)</b><br><br>
  <b style='font-size: 20px;'>CHAPTER 6 - PHP Arrays</b><br><br>";
  
  echo "<b>Example 6-1:</b><br>";
  //Numerically Indexed Arrays
  $paper[] = "Copier";
  $paper[] = "Inkjet";
  $paper[] = "Laser";
  $paper[] = "Photo";

  print_r($paper);
  
  echo "<b><br><br>Example 6-2:</b><br>";
  //Adding items to an array using explicit locations
  unset($paper);
  $paper[0] = "Copier";
  $paper[1] = "Inkjet";
  $paper[2] = "Laser";
  $paper[3] = "Photo";

  print_r($paper);
  
  echo "<b><br><br>Example 6-3:</b><br>";
  //Adding items to an array and retrieving them
  unset($paper);
  $paper[] = "Copier";
  $paper[] = "Inkjet";
  $paper[] = "Laser";
  $paper[] = "Photo";

  for ($j = 0 ; $j < 4 ; ++$j)
    echo "$j: $paper[$j]<br>";
	
  echo "<b><br>Example 6-4:</b><br>";
	//Associative Arrays
	unset($paper);
  $paper['copier'] = "Copier & Multipurpose";
  $paper['inkjet'] = "Inkjet Printer";
  $paper['laser']  = "Laser Printer";
  $paper['photo']  = "Photographic Paper";

  echo $paper['laser']."<br>";
  print_r($paper);
  
  echo "<b><br><br>Example 6-5:</b><br>";
  //Assignment Using the array Keyword
  $p1 = array("Copier", "Inkjet", "Laser", "Photo");

  echo "p1 element: " . $p1[2] . "<br>";

  $p2 = array('copier' => "Copier & Multipurpose",
              'inkjet' => "Inkjet Printer",
              'laser'  => "Laser Printer",
              'photo'  => "Photographic Paper");

  echo "p2 element: " . $p2['inkjet'] . "<br>";
  
  echo "<b><br>Example 6-6:</b><br>";
  //The foreach ... as Loop
  //Walking through a numeric array using foreach ... as
  $paper = array("Copier", "Inkjet", "Laser", "Photo");
  $j = 0;

  foreach($paper as $item)
  {
    echo "$j: $item<br>";
    ++$j;
  }
  
  echo "<b><br>Example 6-7:</b><br>";
  //Walking through an associative array using foreach ... as
  $paper = array('copier' => "Copier & Multipurpose",
                 'inkjet' => "Inkjet Printer",
                 'laser'  => "Laser Printer",
                 'photo'  => "Photographic Paper");

  foreach($paper as $item => $description)
    echo "$item: $description<br>";

echo "<b><br>Example 6-8:</b><br>";
//Walking through an associative array using each and list
$paper = array('copier' => "Copier & Multipurpose",
                 'inkjet' => "Inkjet Printer",
                 'laser'  => "Laser Printer",
                 'photo'  => "Photographic Paper");

  while (list($item, $description) = each($paper))
    echo "$item: $description<br>";

echo "<b><br>Example 6-9:</b><br>";
//Using the list function
	list($a, $b) = array('Alice', 'Bob');
  echo "a=$a b=$b";

echo "<b><br><br>Example 6-10:</b><br>";
//Multidimensional Arrays
//Creating a multidimensional associative array
$products = array(

    'paper' => array(

      'copier' => "Copier & Multipurpose",
      'inkjet' => "Inkjet Printer",
      'laser'  => "Laser Printer",
      'photo'  => "Photographic Paper"),

    'pens' => array(

      'ball'   => "Ball Point",
      'hilite' => "Highlighters",
      'marker' => "Markers"),

    'misc' => array(

      'tape'   => "Sticky Tape",
      'glue'   => "Adhesives",
      'clips'  => "Paperclips"
    )
  );

  echo "<pre>";

  foreach($products as $section => $items)
    foreach($items as $key => $value)
      echo "$section:\t$key\t($value)<br>";

  echo "</pre>";
echo "<br>".$products['misc']['glue']; //directly access a particular element of the array using square brackets

echo "<b><br><br>Example 6-11:</b><br>";
//Creating a multidimensional numeric array
$chessboard = array(
	array('r', 'n', 'b', 'q', 'k', 'b', 'n', 'r'),
	array('p', 'p', 'p', 'p', 'p', 'p', 'p', 'p'),
	array(' ', ' ', ' ', ' ', ' ', ' ', ' ', ' '),
	array(' ', ' ', ' ', ' ', ' ', ' ', ' ', ' '),
	array(' ', ' ', ' ', ' ', ' ', ' ', ' ', ' '),
	array(' ', ' ', ' ', ' ', ' ', ' ', ' ', ' '),
	array('P', 'P', 'P', 'P', 'P', 'P', 'P', 'P'),
	array('R', 'N', 'B', 'Q', 'K', 'B', 'N', 'R')
  );

  echo "<pre>";

  foreach($chessboard as $row)
  {
    foreach ($row as $piece)
      echo "$piece ";

    echo "<br>";
  }

  echo "</pre>";
  echo "<br>".$chessboard[7][3]."<br><br>"; //directly access any element within this array using square brackets

//Using Array Functions - http://php.net/manual/en/ref.array.php
//is_array
echo (is_array($chessboard)) ? "Is an array<br><br>" : "Is not an array<br><br>";

//count
echo count($chessboard)."<br>";
echo count($products, 1)."<br><br>";

//sort
$a=array('b', 'a', 'd', 'c');
sort($a, SORT_STRING);
print_r($a); echo "<br>";
rsort($a, SORT_STRING);
print_r($a); echo "<br>";

$a=array('4', '2', '1', '3');
sort($a, SORT_NUMERIC);
print_r($a);echo "<br>";
rsort($a, SORT_NUMERIC);
print_r($a);echo "<br><br>";

//shuffle
shuffle($a);
print_r($a);

echo "<b><br><br>Example 6-12:</b><br>";
//explode - Exploding a string into an array using spaces
$temp = explode(' ', "This is a sentence with seven words");
  print_r($temp);

echo "<b><br><br>Example 6-13:</b><br>";
//Exploding a string delimited with *** into an array
$temp = explode('***', "A***sentence***with***asterisks");
  print_r($temp);echo "<br><br>";
  
  //extract
echo extract($_GET)."<br>";
echo extract($_GET, EXTR_PREFIX_ALL, 'fromget');

echo "<b><br><br>Example 6-14:</b><br>";
//compact
$fname         = "Doctor";
  $sname         = "Who";
  $planet        = "Gallifrey";
  $system        = "Gridlock";
  $constellation = "Kasterborous";

  $contact = compact('fname', 'sname', 'planet', 'system', 'constellation');

  print_r($contact);

echo "<b><br><br>Example 6-15:</b><br>";
//Using compact to help with debugging
$j       = 23;
  $temp    = "Hello";
  $address = "1 Old Street";
  $age     = 61;

  print_r(compact(explode(' ', 'j temp address age')));
  
  //reset
  reset($contact); // Throw away return value
$item = reset($contact); // Keep first element of the array in $item

//end
  end($contact);
$item = end($contact);

?>
</body>
</html>