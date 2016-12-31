<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>CHAPTER 13 - Cookies, Sessions, and Authentication</title>
</head>

<body>

<?php 
echo "<b style='font-size: 30px;'>Learning PHP, MySQL, JavaScript, CSS & HTML5, 3e (2014)</b><br><br>
  <b style='font-size: 20px;'>CHAPTER 13 - Cookies, Sessions, and Authentication</b><br><br>";
  
  //Setting a Cookie
 setcookie('username', 'Hannah', time() + 60 * 60 * 24 * 7, '/'); 
  
  //Accessing a Cookie
  if (isset($_COOKIE['username'])) $username = $_COOKIE['username'];
  echo "value: ".$username."<br>";
  
  print_r($_COOKIE);
  
  //Destroying a Cookie
  //setcookie('username', 'Hannah', time() - 2592000, '/');
  
  echo "<br><br><b>Example 13-1:</b><br>";
  //PHP authentication
  /*if (isset($_SERVER['PHP_AUTH_USER']) &&
  	  isset($_SERVER['PHP_AUTH_PW']))
  {
    echo "Welcome User: " . $_SERVER['PHP_AUTH_USER'] ."<br>
          Password: "    . $_SERVER['PHP_AUTH_PW'];
  }
  else
  {
    header('WWW-Authenticate: Basic realm="Restricted Section"');
    header('HTTP/1.0 401 Unauthorized');
    die("Please enter your username and password");
  }*/
  
  echo "<br><br>".php_sapi_name();

echo "<br><br><b>Example 13-2:</b><br>";
  //PHP authentication with input checking
/*$username = 'admin';
  $password = 'letmein';

  if (isset($_SERVER['PHP_AUTH_USER']) &&
      isset($_SERVER['PHP_AUTH_PW']))
  {
    if ($_SERVER['PHP_AUTH_USER'] == $username &&
        $_SERVER['PHP_AUTH_PW']   == $password)
          echo "You are now logged in<br><br>";
    else die("Invalid username / password combination");
  }
  else
  {
    header('WWW-Authenticate: Basic realm="Restricted Section"');
    header('HTTP/1.0 401 Unauthorized');
    die ("Please enter your username and password");
  }*/
  
  //Storing Usernames and Passwords
  print_r(hash_algos());
  $token = hash('ripemd128', 'mypassword');
echo "<br><br>$token";  
  
  //Salting
  $token = hash('ripemd128', 'hqb%$tmypasswordcg*l');
  echo "<br><br>$token";
  
  echo "<br><br><b>Example 13-3:</b><br>";
  //Creating a users table and adding two accounts
  require_once 'CHAPTER 10 - Accessing MySQL Using PHP (login).php';
  
  $connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);

  if ($connection->connect_error) die($connection->connect_error);

  /*$query = "CREATE TABLE users (
    forename VARCHAR(32) NOT NULL,
    surname  VARCHAR(32) NOT NULL,
    username VARCHAR(32) NOT NULL UNIQUE,
    password VARCHAR(32) NOT NULL
  )";
  $result = $connection->query($query);
  if (!$result) die($connection->error);

  $salt1    = "qm&h*";
  $salt2    = "pg!@";

  $forename = 'Bill';
  $surname  = 'Smith';
  $username = 'bsmith';
  $password = 'mysecret';
  $token    = hash('ripemd128', "$salt1$password$salt2");

  add_user($connection, $forename, $surname, $username, $token);

  $forename = 'Pauline';
  $surname  = 'Jones';
  $username = 'pjones';
  $password = 'acrobat';
  $token    = hash('ripemd128', "$salt1$password$salt2");

  add_user($connection, $forename, $surname, $username, $token);

  function add_user($connection, $fn, $sn, $un, $pw)
  {
    $query  = "INSERT INTO users VALUES('$fn', '$sn', '$un', '$pw')";
    $result = $connection->query($query);
    if (!$result) die($connection->error);
  }*/

echo "<br><br><b>Example 13-4:</b><br>";
  //PHP authentication using MySQL
  /*if (isset($_SERVER['PHP_AUTH_USER']) &&
      isset($_SERVER['PHP_AUTH_PW']))
  {
    $un_temp = mysql_entities_fix_string($connection, $_SERVER['PHP_AUTH_USER']);
    $pw_temp = mysql_entities_fix_string($connection, $_SERVER['PHP_AUTH_PW']);

    $query  = "SELECT * FROM users WHERE username='$un_temp'";
    $result = $connection->query($query);
    if (!$result) die($connection->error);
    elseif ($result->num_rows)
    {
        $row = $result->fetch_array(MYSQLI_NUM);

		$result->close();

        $salt1 = "qm&h*";
        $salt2 = "pg!@";
        $token = hash('ripemd128', "$salt1$pw_temp$salt2");

        if ($token == $row[3]) echo "$row[0] $row[1] : 
        	Hi $row[0], you are now logged in as '$row[2]'";
        else die("Invalid username/password combination");
    }
    else die("Invalid username/password combination");
  }
  else
  {
    header('WWW-Authenticate: Basic realm="Restricted Section"');
    header('HTTP/1.0 401 Unauthorized');
    die ("Please enter your username and password");
  }

  //$connection->close();

  function mysql_entities_fix_string($connection, $string)
  {
    return htmlentities(mysql_fix_string($connection, $string));
  }	

  function mysql_fix_string($connection, $string)
  {
    if (get_magic_quotes_gpc()) $string = stripslashes($string);
    return $connection->real_escape_string($string);
  }*/

//Starting a Session
/*session_start();
$value=time();
$_SESSION['variable'] = $value;  
$variable = $_SESSION['variable'];*/

echo "<br><br><b>Example 13-5:</b><br>";
  //Starting a Session
  
  if (isset($_SERVER['PHP_AUTH_USER']) &&
      isset($_SERVER['PHP_AUTH_PW']))
  {
    $un_temp = mysql_entities_fix_string($connection, $_SERVER['PHP_AUTH_USER']);
    $pw_temp = mysql_entities_fix_string($connection, $_SERVER['PHP_AUTH_PW']);

	$query = "SELECT * FROM users WHERE username='$un_temp'";
    $result = $connection->query($query);

    if (!$result) die($connection->error);
	elseif ($result->num_rows)
	{
		$row = $result->fetch_array(MYSQLI_NUM);

		$result->close();

		$salt1 = "qm&h*";
		$salt2 = "pg!@";
        $token = hash('ripemd128', "$salt1$pw_temp$salt2");
		
		if ($token == $row[3])
		{
			session_start();
			$_SESSION['username'] = $un_temp;
			$_SESSION['password'] = $pw_temp;
			$_SESSION['forename'] = $row[0];
			$_SESSION['surname']  = $row[1];
			echo "$row[0] $row[1] : Hi $row[0],
				you are now logged in as '$row[2]'";
			die ("<p><a href=CHAPTER%2013%20-%20Cookies,%20Sessions,%20and%20Authentication%20(continue).php>Click here to continue</a></p>");
		}
		else die("Invalid username/password combination");
	}
	else die("Invalid username/password combination");
  }
  else
  {
    header('WWW-Authenticate: Basic realm="Restricted Section"');
    header('HTTP/1.0 401 Unauthorized');
    die ("Please enter your username and password");
  }

  $connection->close();

  function mysql_entities_fix_string($connection, $string)
  {
    return htmlentities(mysql_fix_string($connection, $string));
  }	

  function mysql_fix_string($connection, $string)
  {
    if (get_magic_quotes_gpc()) $string = stripslashes($string);
    return $connection->real_escape_string($string);
  }




  ?>
</body>
</html>