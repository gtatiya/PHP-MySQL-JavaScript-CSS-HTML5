<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>CHAPTER 13 - Cookies, Sessions, and Authentication (continue)</title>
</head>

<body>

<?php

echo "<b style='font-size: 30px;'>Learning PHP, MySQL, JavaScript, CSS & HTML5, 3e (2014)</b><br><br>
  <b style='font-size: 20px;'>CHAPTER 13 - Cookies, Sessions, and Authentication (continue)</b><br><br>";
  
  echo "<br><b>Example 13-6:</b><br>";
  //Retrieving session variables
  /*session_start();

  if (isset($_SESSION['username']))
  {
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    $forename = $_SESSION['forename'];
    $surname  = $_SESSION['surname'];

    echo "Welcome back $forename.<br />
          Your full name is $forename $surname.<br />
          Your username is '$username'
          and your password is '$password'.";
  }
  else echo "Please <a href='CHAPTER%2013%20-%20Cookies,%20Sessions,%20and%20Authentication.php'>click here</a> to log in.";*/
  
  echo "<br><b>Example 13-7 and 13-8:</b><br>";
  //Retrieving session variables and then destroying the session
  session_start();

  if (isset($_SESSION['username']))
  {
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    $forename = $_SESSION['forename'];
    $surname  = $_SESSION['surname'];

    destroy_session_and_data();
	
    echo "Welcome back $forename.<br />
          Your full name is $forename $surname.<br />
          Your username is '$username'
          and your password is '$password'.";
  }
  else echo "Please <a href='CHAPTER%2013%20-%20Cookies,%20Sessions,%20and%20Authentication.php'>click here</a> to log in.";

  function destroy_session_and_data()
  {
	  echo $_SESSION['username']."<br>";
    $_SESSION = array();
    setcookie(session_name(), '', time() - 2592000, '/');
    session_destroy();
	//echo $_SESSION['username'];
  }

//Setting a Timeout
echo "<br><br>".ini_get('session.gc_maxlifetime');
  ini_set('session.gc_maxlifetime', 60 * 60 * 24);
  echo "<br>".ini_get('session.gc_maxlifetime');
  
  //Preventing session hijacking
 echo "<br><br>".$_SERVER['REMOTE_ADDR'];
 $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
 //if ($_SESSION['ip'] != $_SERVER['REMOTE_ADDR']) different_user();
 
 echo "<br>".$_SERVER['HTTP_USER_AGENT'];
 $_SESSION['ua'] = $_SERVER['HTTP_USER_AGENT'];
  //if ($_SESSION['ua'] != $_SERVER['HTTP_USER_AGENT']) different_user();
  
$_SESSION['check'] = hash('ripemd128', $_SERVER['REMOTE_ADDR'] .$_SERVER['HTTP_USER_AGENT']);
//if ($_SESSION['check'] != hash('ripemd128', $_SERVER['REMOTE_ADDR'] .$_SERVER['HTTP_USER_AGENT'])) different_user();

echo "<br><br><b>Example 13-9:</b><br>";
  //A session susceptible to session fixation
  //call it up in your browser using http://localhost/my-site/CHAPTER%2013%20-%20Cookies,%20Sessions,%20and%20Authentication%20(continue).php?PHPSESSID=1234
  //Press Reload a few times, and you’ll see the counter increase. Now try browsing to http://localhost/my-site/CHAPTER%2013%20-%20Cookies,%20Sessions,%20and%20Authentication%20(continue).php?PHPSESSID=5678
//session_start();

  /*if (!isset($_SESSION['count'])) $_SESSION['count'] = 0; 
  else ++$_SESSION['count']; 

  echo $_SESSION['count'];*/

echo "<br><br><b>Example 13-10:</b><br>";
//Session regeneration
$old_sessionid = session_id();

session_regenerate_id();

$new_sessionid = session_id();

echo "Old Session: $old_sessionid<br />";
echo "New Session: $new_sessionid<br />";

print_r($_SESSION);

//Example 13-10
if (!isset($_SESSION['initiated']))
  {
    session_regenerate_id();
    $_SESSION['initiated'] = 1; 
  }

  if (!isset($_SESSION['count'])) $_SESSION['count'] = 0; 
  else ++$_SESSION['count'];

  echo $_SESSION['count'];

//Forcing cookie-only sessions
ini_set('session.use_only_cookies', 1);

//Using a shared server
ini_set('session.save_path', '/home/user/myaccount/sessions');


  
  
?>



</body>
</html>