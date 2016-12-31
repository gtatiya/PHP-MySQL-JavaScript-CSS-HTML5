<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>CHAPTER 11 - Using the mysqli Extension</title>
</head>

<body>

<?php

echo "<b style='font-size: 30px;'>Learning PHP, MySQL, JavaScript, CSS & HTML5, 3e (2014)</b><br><br>
  <b style='font-size: 20px;'>CHAPTER 11 - Using the mysqli Extension</b><br><br>";
  
  echo "<b>Example 11-2:</b><br>";
  //Connecting to a MySQL server with mysqli
  require_once 'CHAPTER 10 - Accessing MySQL Using PHP (login).php';
  
  $connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);

  if ($connection->connect_error) die($connection->connect_error);
  
  echo "<br><b>Example 11-3:</b><br>";
  //Querying a database with mysqli - Querying a database with mysqli
  $query  = "SELECT * FROM classics";
  $result = $connection->query($query); //mysqli::query - For successful SELECT, SHOW, DESCRIBE or EXPLAIN queries mysqli_query() will return a mysqli_result object. For other successful queries mysqli_query() will return TRUE. Returns FALSE on failure. GT- $result is now object of class mysqli_result
  
  if (!$result) die($connection->error);
  
  echo "<br><b>Example 11-4:</b><br>";
  //Fetching results with mysqli, one cell at a time
  
  $rows = $result->num_rows; //num_rows — Gets the number of rows in a result

  for ($j = 0 ; $j < $rows ; ++$j)
  {
    $result->data_seek($j);
    echo 'Author: '   . $result->fetch_assoc()['author']   . '<br>';
    $result->data_seek($j);
    echo 'Title: '    . $result->fetch_assoc()['title']    . '<br>';
    $result->data_seek($j);
    echo 'Category: ' . $result->fetch_assoc()['category'] . '<br>';
    $result->data_seek($j);
    echo 'Year: '     . $result->fetch_assoc()['year']     . '<br>';
    $result->data_seek($j);
    echo 'ISBN: '     . $result->fetch_assoc()['isbn']     . '<br><br>';
  }

//  $result->close();
//  $connection->close();

echo "<b>Example 11-5:</b><br>";
  //Fetching results with mysqli, one row at a time
  
for ($j = 0 ; $j < $rows ; ++$j)
  {
    $result->data_seek($j);
	$row = $result->fetch_array(MYSQLI_ASSOC);

    echo 'Author: '   . $row['author']   . '<br>';
    echo 'Title: '    . $row['title']    . '<br>';
    echo 'Category: ' . $row['category'] . '<br>';
    echo 'Year: '     . $row['year']     . '<br>';
    echo 'ISBN: '     . $row['isbn']     . '<br><br>';
  }

//  $result->close();
//  $connection->close();

echo "<b>Example 11-6:</b><br>";
  //Inserting and deleting using mysqli
  
  if (isset($_POST['delete']) && isset($_POST['isbn']))
  {
    $isbn   = get_post($connection, 'isbn');
    $query  = "DELETE FROM classics WHERE isbn='$isbn'";
	$result = $connection->query($query);

  	if (!$result) echo "DELETE failed: $query<br>" .
      $connection->error . "<br><br>";
  }

  if (isset($_POST['author'])   &&
      isset($_POST['title'])    &&
      isset($_POST['category']) &&
      isset($_POST['year'])     &&
      isset($_POST['isbn']))
  {
    $author   = get_post($connection, 'author');
    $title    = get_post($connection, 'title');
    $category = get_post($connection, 'category');
    $year     = get_post($connection, 'year');
    $isbn     = get_post($connection, 'isbn');
    $query    = "INSERT INTO classics VALUES" .
      "('$author', '$title', '$category', '$year', '$isbn')";
	$result   = $connection->query($query);

  	if (!$result) echo "INSERT failed: $query<br>" .
      $connection->error . "<br><br>";
  }

  echo <<<_END
  <form action="CHAPTER 11 - Using the mysqli Extension.php" method="post"><pre>
    Author <input type="text" name="author">
     Title <input type="text" name="title">
  Category <input type="text" name="category">
      Year <input type="text" name="year">
      ISBN <input type="text" name="isbn">
           <input type="submit" value="ADD RECORD">
  </pre></form>
_END;

  $query  = "SELECT * FROM classics";
  $result = $connection->query($query);

  if (!$result) die ("Database access failed: " . $connection->error);

  $rows = $result->num_rows;
  
  for ($j = 0 ; $j < $rows ; ++$j)
  {
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_NUM);

    echo <<<_END
  <pre>
    Author $row[0]
     Title $row[1]
  Category $row[2]
      Year $row[3]
      ISBN $row[4]
  </pre>
  <form action="CHAPTER 11 - Using the mysqli Extension.php" method="post">
  <input type="hidden" name="delete" value="yes">
  <input type="hidden" name="isbn" value="$row[4]">
  <input type="submit" value="DELETE RECORD"></form>
_END;
  }
  
  $result->close();
//  $connection->close();
  
  function get_post($connection, $var)
  {
    return $connection->real_escape_string($_POST[$var]);
  }

  
 echo "<b>Example 11-8:</b><br>";
  // Using Placeholders - Issuing prepared statements
  
  $statement = $connection->prepare('INSERT INTO classics VALUES(?,?,?,?,?)'); //mysqli_prepare() returns a statement object or FALSE if an error occurred
  $statement->bind_param('sssss', $author, $title, $category, $year, $isbn);

  $author   = 'Emily Brontë';
  $title    = 'Wuthering Heights';
  $category = 'Classic Fiction';
  $year     = '1847';
  $isbn     = '9780553212587';

  $statement->execute();
  printf("%d Row inserted.\n", $statement->affected_rows);
  $statement->close();
  $connection->close();
  
  
  
?>

</body>
</html>