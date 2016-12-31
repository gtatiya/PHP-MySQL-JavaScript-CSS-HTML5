<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>CHAPTER 10 - Accessing MySQL Using PHP</title>
</head>

<body>

<?php

echo "<b style='font-size: 30px;'>Learning PHP, MySQL, JavaScript, CSS & HTML5, 3e (2014)</b><br><br>
  <b style='font-size: 20px;'>CHAPTER 10 - Accessing MySQL Using PHP</b><br><br>";
  
  echo "<b>Example 10-2:</b><br>";
  //Connecting to a MySQL server
  require_once 'CHAPTER 10 - Accessing MySQL Using PHP (login).php';
  
  $db_server = mysql_connect($db_hostname, $db_username, $db_password);

  //if (!$db_server) die("Unable to connect to MySQL: " . mysql_error()); //mysql_error() outputs the error text from the last called MySQL function
  
  //more user-friendly error messages
  if (!$db_server) die(mysql_fatal_error());
  
  function mysql_fatal_error()
{
$msg2 = mysql_error();
echo <<< _END
We are sorry, but it was not possible to complete
the requested task. The error message we got was:
<p>$msg2</p>
Please click the back button on your browser
and try again. If you are still having problems,
please <a href="mailto:admin@server.com">email
our administrator</a>. Thank you.
_END;
}

echo "<br><b>Example 10-3:</b><br>";
//Selecting a database
mysql_select_db($db_database)
    or die("Unable to select database: " . mysql_error());

echo "<br><b>Example 10-4 and 10-5:</b><br>";
//Querying a database and Fetching results one cell at a time
$query  = "SELECT * FROM classics"; //no semicolon is required at the tail of the query
  $result = mysql_query($query);

  if (!$result) die ("Database access failed: " . mysql_error());
  
  $rows = mysql_num_rows($result); //mysql_num_rows reports the number of rows returned by a query

for ($j = 0 ; $j < $rows ; ++$j)
{
echo 'Author: ' . mysql_result($result,$j,'author') . '<br>';
echo 'Title: ' . mysql_result($result,$j,'title') . '<br>';
echo 'Category: ' . mysql_result($result,$j,'category') . '<br>';
echo 'Year: ' . mysql_result($result,$j,'year') . '<br>';
echo 'ISBN: ' . mysql_result($result,$j,'isbn') . '<br><br>';
}

echo "<br><b>Example 10-6:</b><br>";
//Replacement for loop for fetching results one row at a time

$query  = "SELECT * FROM classics"; //no semicolon is required at the tail of the query
  $result = mysql_query($query);
  if (!$result) die ("Database access failed: " . mysql_error());

for ($j = 0 ; $j < $rows ; ++$j)
{
	$row = mysql_fetch_row($result); //mysql_fetch_row Returns a numerical array that corresponds to the fetched row and moves the internal data pointer ahead, starting at offset 0 

	echo 'Author: ' .	$row[0] . '<br>';
	echo 'Title: ' .	$row[1] . '<br>';
	echo 'Category: ' .	$row[2] . '<br>';
	echo 'Year: ' .		$row[3] . '<br>';
	echo 'ISBN: ' .		$row[4] . '<br><br>';
}

echo "<b>Example 10-7:</b><br>";
//Closing a MySQL server connection
//mysql_close($db_server);

echo "<br><b>Example 10-8:</b><br>";
//Inserting and deleting
  
  if (isset($_POST['delete']) && isset($_POST['isbn']))
  {
	  echo '$_POST["isbn"]: '.$_POST['isbn']."<br>"; //$_POST['isbn'] is same as $_POST["isbn"]
	  
    $isbn  = get_post('isbn');
	
	echo 'get_post(\'isbn\'): '.$isbn."<br>";
	
    $query = "DELETE FROM classics WHERE isbn='$isbn'";

  	if (!mysql_query($query, $db_server))	
      echo "DELETE failed: $query<br>" . mysql_error() . "<br><br>";
  }

  if (isset($_POST['author']) &&
      isset($_POST['title']) &&
      isset($_POST['category']) &&
      isset($_POST['year']) &&
      isset($_POST['isbn']))
  {
    $author   = get_post('author');
    $title    = get_post('title');
    $category = get_post('category');
    $year     = get_post('year');
    $isbn     = get_post('isbn');

    $query = "INSERT INTO classics VALUES" .
      "('$author', '$title', '$category', '$year', '$isbn')";
	  
	  echo 'INSERT $query: '.$query."<br>";

    if (!mysql_query($query, $db_server))
      echo "INSERT failed: $query<br>" .
      mysql_error() . "<br><br>";
  }

  echo <<<_END
  <form action="CHAPTER 10 - Accessing MySQL Using PHP.php" method="post"><pre>
    Author <input type="text" name="author">
     Title <input type="text" name="title">
  Category <input type="text" name="category">
      Year <input type="text" name="year">
      ISBN <input type="text" name="isbn">
           <input type="submit" value="ADD RECORD">
  </pre></form>
_END;

  $query  = "SELECT * FROM classics";
  $result = mysql_query($query);
  
  if (!$result) die ("Database access failed: " . mysql_error());
  $rows = mysql_num_rows($result);
  
  for ($j = 0 ; $j < $rows ; ++$j)
  {
    $row = mysql_fetch_row($result);
    echo <<<_END
  <pre>
    Author $row[0]
     Title $row[1]
  Category $row[2]
      Year $row[3]
      ISBN $row[4]
  </pre>
  <form action="CHAPTER 10 - Accessing MySQL Using PHP.php" method="post">
  <input type="hidden" name="delete" value="yes">
  <input type="hidden" name="isbn" value="$row[4]">
  <input type="submit" value="DELETE RECORD"></form>
_END;
  }
  
  //mysql_close($db_server);
  
  function get_post($var)
  {
	  echo '$_POST[$var]: '.$_POST[$var]."<br>";
    return mysql_real_escape_string($_POST[$var]); //mysql_real_escape_string: strip out any characters that a hacker may have inserted in order to break into or alter your database
  }

echo "<br><b>Example 10-9:</b><br>";
//Creating a table called cats
$query = "CREATE TABLE cats (
    id SMALLINT NOT NULL AUTO_INCREMENT,
    family VARCHAR(32) NOT NULL,
    name VARCHAR(32) NOT NULL,
    age TINYINT NOT NULL,
    PRIMARY KEY (id)
  )";

  $result = mysql_query($query);

  //if (!$result) die ("Database access failed: " . mysql_error());

echo "<br><b>Example 10-10:</b><br>";
//Describing the table cats
$query  = "DESCRIBE cats";
  $result = mysql_query($query);

  if (!$result) die ("Database access failed: " . mysql_error());

  $rows = mysql_num_rows($result);

  echo "<table border='1'><tr><th>Column</th><th>Type</th><th>Null</th><th>Key</th></tr>";

  for ($j = 0 ; $j < $rows ; ++$j)
  {
    $row = mysql_fetch_row($result);
    echo "<tr>";

    for ($k = 0 ; $k < 4 ; ++$k)
      echo "<td>$row[$k]</td>";

    echo "</tr>";
  }

  echo "</table>";

echo "<br><b>Example 10-11:</b><br>";
//SHOW tables in current database
$query  = "SHOW tables";
$result = mysql_query($query);
if (!$result) die ("Database access failed: " . mysql_error());
$rows = mysql_num_rows($result); //mysql_num_rows reports the number of rows returned by a query
echo "Tables_in_publications";
for ($j = 0 ; $j < $rows ; ++$j)
{
	$row = mysql_fetch_row($result); //mysql_fetch_row Returns a numerical array that corresponds to the fetched row and moves the internal data pointer ahead, starting at offset 0 
	echo "<br>".$row[0];
	
}

//Dropping the table cats
$query  = "DROP TABLE cats";
  $result = mysql_query($query);

  if (!$result) die ("Database access failed: " . mysql_error());

//SHOW tables in current database
$query  = "SHOW tables";
$result = mysql_query($query);
if (!$result) die ("Database access failed: " . mysql_error());
$rows = mysql_num_rows($result); //mysql_num_rows reports the number of rows returned by a query
echo "<br><br>"."Tables_in_publications";
for ($j = 0 ; $j < $rows ; ++$j)
{
	$row = mysql_fetch_row($result); //mysql_fetch_row Returns a numerical array that corresponds to the fetched row and moves the internal data pointer ahead, starting at offset 0 
	echo "<br>".$row[0];
	
}

//Creating a table called cats again
$query = "CREATE TABLE cats (
    id SMALLINT NOT NULL AUTO_INCREMENT,
    family VARCHAR(32) NOT NULL,
    name VARCHAR(32) NOT NULL,
    age TINYINT NOT NULL,
    PRIMARY KEY (id)
  )";

  $result = mysql_query($query);

  //if (!$result) die ("Database access failed: " . mysql_error());

echo "<br><br><b>Example 10-12:</b><br>";
//Adding data to table cats
$query  = "INSERT INTO cats VALUES(NULL, 'Lion', 'Leo', 4),(NULL, 'Cougar', 'Growler', 2),(NULL, 'Cheetah', 'Charly', 3)";
  $result = mysql_query($query);
  if (!$result) die ("Database access failed: " . mysql_error());

echo "<br><br><b>Example 10-13:</b><br>";
//Retrieving rows from the cats table
$query  = "SELECT * FROM cats";
  $result = mysql_query($query);

  if (!$result) die ("Database access failed: " . mysql_error());

  $rows = mysql_num_rows($result);

  echo "<table border='1'><tr> <th>Id</th> <th>Family</th><th>Name</th><th>Age</th></tr>";

  for ($j = 0 ; $j < $rows ; ++$j)
  {
  	$row = mysql_fetch_row($result);
  	echo "<tr>";

  	for ($k = 0 ; $k < 4 ; ++$k)
      echo "<td>$row[$k]</td>";

  	echo "</tr>";
  }

  echo "</table>";

echo "<br><b>Example 10-14:</b><br>";
//Updating Data - Renaming Charly the cheetah to Charlie
$query  = "UPDATE cats SET name='Charlie' WHERE name='Charly'";
  $result = mysql_query($query);

  if (!$result) die ("Database access failed: " . mysql_error());

echo "<br><b>Example 10-15:</b><br>";
//Deleting Data - Removing Growler the cougar from the cats table
$query  = "DELETE FROM cats WHERE name='Growler'";
  $result = mysql_query($query);

  if (!$result) die ("Database access failed: " . mysql_error());

echo "<br><b>Example 10-16:</b><br>";
//Using AUTO_INCREMENT - Adding data to table cats and reporting the insertion id
$query  = "INSERT INTO cats VALUES(NULL, 'Lynx', 'Stumpy', 5)";
  $result = mysql_query($query);

  echo "The Insert Id was: " . mysql_insert_id(); //mysql_insert_id — Get the ID generated in the last query

  if (!$result) die ("Database access failed: " . mysql_error());
    
/*Using insert IDs
$query = "INSERT INTO cats VALUES(NULL, 'Lynx', 'Stumpy', 5)";
$result = mysql_query($query);
$insertID = mysql_insert_id();
$query = "INSERT INTO owners VALUES($insertID, 'Ann', 'Smith')"; //no owner table
$result = mysql_query($query);
*/

echo "<br><br><b>Example 10-17:</b><br>";
//Performing a secondary query
$query  = "SELECT * FROM customers";
  $result = mysql_query($query);

  if (!$result) die ("Database access failed: " . mysql_error());

  $rows = mysql_num_rows($result);

  for ($j = 0 ; $j < $rows ; ++$j)
  {
    $row = mysql_fetch_row($result);
    echo "$row[0] purchased ISBN $row[1]:<br>";

    $subquery  = "SELECT * FROM classics WHERE isbn='$row[1]'";
    $subresult = mysql_query($subquery);

    if (!$subresult) die ("Database access failed: " . mysql_error());

    $subrow = mysql_fetch_row($subresult);

    echo "  '$subrow[1]' by $subrow[0]<br>";
  } //you could also return the same information using a NATURAL JOIN query

echo "<br><b>Example 10-18 and 10-19:</b><br>";
//Preventing SQL Injection - How to properly sanitize user input for MySQL, and How to safely access MySQL with user input

echo <<<_END
  <form action="CHAPTER 10 - Accessing MySQL Using PHP.php" method="post"><pre>
    Enter malicious username <input type="text" name="user"> //Enter: admin' #, anything' OR 1=1 #
    Enter malicious password <input type="text" name="pass"> //Enter: leave blank, leave blank
                             <input type="submit" value="ADD RECORD">
  </pre></form>
_END;

if (isset($_POST['user']) && isset($_POST['pass']))
{
echo '$_POST["user"]= '.$_POST['user']."<br>";
echo '$_POST["pass"]= '.$_POST['pass']."<br>";


$user  = mysql_fix_string($_POST['user']); echo '$user= '.$user."<br>";
  $pass  = mysql_fix_string($_POST['pass']); echo '$pass= '.$pass."<br>";
  $query = "SELECT * FROM users WHERE user='$user' AND pass='$pass'";

}

  function mysql_fix_string($string)
  {
    if (get_magic_quotes_gpc()) $string = stripslashes($string); echo '$string= '.$string."<br>";//get_magic_quotes_gpc function returns TRUE if magic quotes are active; stripslashes — Un-quotes a quoted string
    return mysql_real_escape_string($string);
  }

echo "<b>Example 10-21:</b><br>";
//Using placeholders with PHP

  $query = 'PREPARE statement FROM "INSERT INTO classics VALUES(?,?,?,?,?)"';
  mysql_query($query);

  $query = 'SET @author = "Emily Brontë",' .
  		 '@title = "Wuthering Heights",' .
  		 '@category = "Classic Fiction",' .
  		 '@year = "1847",' .
  		 '@isbn = "9780553212587"';
  mysql_query($query);

  $query = 'EXECUTE statement USING @author,@title,@category,@year,@isbn';
  mysql_query($query);

  $query = 'DEALLOCATE PREPARE statement';
  mysql_query($query);

//DELETE FROM classics WHERE isbn='9780553212587';

echo "<br><b>Example 10-22:</b><br>";
//Preventing HTML Injection - Functions for preventing both SQL and XSS injection attacks
function mysql_entities_fix_string($string)
  {
    return htmlentities(mysql_fix_string($string));
  }	

  function mysql_fix_string2($string)
  {
    if (get_magic_quotes_gpc()) $string = stripslashes($string);
    return mysql_real_escape_string($string);
  }
  
  
echo "<br><b>Example 10-23:</b><br>";
//How to safely access MySQL and prevent XSS attacks
echo <<<_END
  <form action="CHAPTER 10 - Accessing MySQL Using PHP.php" method="post"><pre>
    Enter malicious username <input type="text" name="user"> //Enter: admin' #, anything' OR 1=1 #
    Enter malicious password <input type="text" name="pass"> //Enter: leave blank, leave blank
                             <input type="submit" value="ADD RECORD">
  </pre></form>
_END;

if (isset($_POST['user']) && isset($_POST['pass']))
{
echo '$_POST["user"]= '.$_POST['user']."<br>";
echo '$_POST["pass"]= '.$_POST['pass']."<br>";


$user  = mysql_entities_fix_string2($_POST['user']); echo '$user= '.$user."<br>";
  $pass  = mysql_entities_fix_string2($_POST['pass']); echo '$pass= '.$pass."<br>";
  $query = "SELECT * FROM users WHERE user='$user' AND pass='$pass'";

}

function mysql_entities_fix_string2($string)
{
return htmlentities(mysql_fix_string3($string));
}

  function mysql_fix_string3($string)
  {
    if (get_magic_quotes_gpc()) $string = stripslashes($string); echo '$string= '.$string."<br>";//get_magic_quotes_gpc function returns TRUE if magic quotes are active; stripslashes — Un-quotes a quoted string
    return mysql_real_escape_string($string);
  }

mysql_close($db_server);

	
?>



</body>
</html>