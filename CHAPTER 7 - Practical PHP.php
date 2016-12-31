<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>CHAPTER 7- Practical PHP</title>
</head>

<body>

<?php

echo "<b style='font-size: 30px;'>Learning PHP, MySQL, JavaScript, CSS & HTML5, 3e (2014)</b><br><br>
  <b style='font-size: 20px;'>CHAPTER 7- Practical PHP</b><br><br>";
 
 //Using printf
 //http://php.net/function.printf
 //http://php.net/manual/en/function.sprintf.php
printf("Display a percent character (no arg is required): %%");echo "<br>";
      
$n =  43951789;
$u = -43951789;
$c = 65; // ASCII 65 is 'A'

// notice the double %%, this prints a literal '%' character
printf("%%b = '%b'<br>", $n); // binary representation
printf("%%c = '%c'<br>", $c); // print the ascii character, same as chr() function
printf("%%d = '%d'<br>", $n); // standard integer representation
printf("%%e = '%e'<br>", $n); // scientific notation
printf("%%u = '%u'<br>", $n); // unsigned integer representation of a positive integer
printf("%%u = '%u'<br>", $u); // unsigned integer representation of a negative integer
printf("%%f = '%f'<br>", $n); // floating point representation
printf("%%o = '%o'<br>", $n); // octal representation
printf("%%s = '%s'<br>", $n); // string representation
printf("%%x = '%x'<br>", $n); // hexadecimal representation (lower-case)
printf("%%X = '%X'<br>", $n); // hexadecimal representation (upper-case)
printf("%%+d = '%+d'<br>", $n); // sign specifier on a positive integer
printf("%%+d = '%+d'<br><br>", $u); // sign specifier on a negative integer

printf("My name is %s. I'm %d years old, which is %X in hexadecimal<br><br>", 'Simon', 33, 33);

printf("<b><span style='color:#%X%X%X'>Hello</span></b><br>", 65, 127, 245);

$r=65; $g=127; $b=245;
printf("<b><span style='color:#%X%X%X'>Hello</span></b><br><br>", $r-20, $g-20, $b-20);

//Precision Setting
printf("The result is: $%.2f <br><br>", 123.42 / 12);

echo "<b>Example 7-1:</b><br>";
echo "<pre>"; // Enables viewing of the spaces

  // Pad to 15 spaces
  printf("The result is $%15f\n", 123.42 / 12);

  // Pad to 15 spaces, fill with zeros
  printf("The result is $%015f\n", 123.42 / 12);

  // Pad to 15 spaces, 2 decimal places precision
  printf("The result is $%15.2f\n", 123.42 / 12);

  // Pad to 15 spaces, 2 decimal places precision, fill with zeros
  printf("The result is $%015.2f\n", 123.42 / 12); 

  // Pad to 15 spaces, 2 decimal places precision, fill with # symbol
  printf("The result is $%'#15.4f\n", 123.42 / 12);

echo "<br><b>Example 7-2:</b><br>";
//String Padding
  $h = 'Rasmus';

  printf("[%s]\n",        $h); // Standard string output
  printf("[%12s]\n",      $h); // Right justify with spaces
  printf("[%-12s]\n",     $h); // Left justify with spaces
  printf("[%012s]\n",     $h); // Zero padding
  printf("[%'#12s]\n\n",  $h); // Use the custom padding character '#'

  $d = 'Rasmus Lerdorf';

  printf("[%12.8s]\n",    $d); // Right justify, cutoff of 8 characters
  printf("[%-12.12s]\n",   $d); // Left justify, cutoff of 12 characters
  printf("[%-'@12.10s]\n\n", $d); // Left justify, pad '@', cutoff 10 chars

//Using sprintf
$hexstring = sprintf("%X%X%X", 65, 127, 245);
echo $hexstring."<br>";
$out = sprintf("The result is: $%.2f", 123.42 / 12);
echo $out."<br><br>";

//Date and Time Functions
echo time()."<br>";
echo time() + 7 * 24 * 60 * 60 ."<br>";
echo mktime(0, 0, 0, 1, 1, 2000)."<br>";
echo date("l F jS, Y - g:ia", time())."<br>";

//Date Constants - http://php.net/manual/en/class.datetime.php
echo date(DATE_RSS);

$month = 9;    // September (only has 30 days)
  $day   = 31;   // 31st
  $year  = 2018; // 2018

echo "<br><br><b>Example 7-3:</b><br>";
//Using checkdate
  if (checkdate($month, $day, $year)) echo "Date is valid<br><br>";
  else echo "Date is invalid<br><br>";

//File Handling
//Checking Whether a File Exists

if (file_exists("CHAPTER 7 - testfile.txt"))	echo "File exists<br>";
else echo "File not exists<br>";
if (file_exists("CHAPTER 4 - text.txt"))	echo "File exists<br>";
else echo "File not exists<br>";

echo "<br><b>Example 7-4:</b><br>";
//Creating a File
$fh = fopen("CHAPTER 7 - testfile.txt", 'w') or die("Failed to create file");
echo $fh."<br>";
  $text = <<<_END
Line 1
Line 2
Line 3
_END;

  fwrite($fh, $text) or die("Could not write to file");
  fclose($fh);
  echo "File 'CHAPTER 7 - testfile.txt' written successfully";

echo "<br><br><b>Example 7-5:</b><br>";
//Reading a file with fgets — Gets a line from file pointer. 
$fh = fopen("CHAPTER 7 - testfile.txt", 'r') or              
    die("File does not exist or you lack permission to open it");

  $line = fgets($fh);
  fclose($fh);
  echo $line."<br>";

//understand fgets and feof
$handle = fopen("CHAPTER 7 - testfile.txt", "r");
if ($handle)
{
    while (($buffer = fgets($handle)) !== false)
	{
        echo $buffer;
    }
    if (!feof($handle)) //feof — Tests for end-of-file on a file pointer
	{
        echo "Error: unexpected fgets() fail\n";
    }
    fclose($handle);
}


echo "<br><br><b>Example 7-6:</b><br>";
//Reading a file with fread
$fh = fopen("CHAPTER 7 - testfile.txt", 'r') or
    die("File does not exist or you lack permission to open it");

  $text = fread($fh, 11);
  fclose($fh);
  echo $text."<br><br>";


echo "<br><br><b>Example 7-7:</b><br>";
//Copying Files
copy('CHAPTER 7 - testfile.txt', 'CHAPTER 7 - testfile2.txt') or die("Could not copy file");
  echo "File successfully copied to 'CHAPTER 7 - testfile2.txt'";

echo "<br><br><b>Example 7-8:</b><br>";
//Alternate syntax for copying a file
  if (!copy('CHAPTER 7 - testfile.txt', 'CHAPTER 7 - testfile3.txt'))
    echo "Could not copy file";
  else echo "File successfully copied to 'CHAPTER 7 - testfile3.txt'";
 
 echo "<br><br><b>Example 7-9:</b><br>";
 //Moving a file - To move a file, rename it with the rename function
 if (!rename('CHAPTER 7 - testfile3.txt', 'CHAPTER 7 - testfile3.new'))
    echo "Could not rename file";
  else echo "File successfully renamed to 'CHAPTER 7 - testfile3.new'";

echo "<br><br><b>Example 7-10:</b><br>";
//Deleting a file - Deleting a file is just a matter of using the unlink function to remove it from the filesystem
if (!unlink('CHAPTER 7 - testfile3.new')) echo "Could not delete file";
  else echo "File 'CHAPTER 7 - testfile3.new' successfully deleted";

echo "<br><br><b>Example 7-11:</b><br>";
//Updating a file
$fh   = fopen("CHAPTER 7 - testfile.txt", 'r+') or die("Failed to open file");
  $text = fgets($fh);

  fseek($fh, 0, SEEK_END); //fseek — Seeks on a file pointer
  fwrite($fh, "$text") or die("Could not write to file");
  fclose($fh);

  echo "File 'CHAPTER 7 - testfile.txt' successfully updated";
 
 echo "<br><br><b>Example 7-12:</b><br>";
//Locking Files for Multiple Accesses
//Updating a file with file locking
  $fh = fopen("CHAPTER 7 - testfile.txt", 'r+') or die("Failed to open file");
  $text = fgets($fh);

  if (flock($fh, LOCK_EX))
  {
    fseek($fh, 0, SEEK_END);
    fwrite($fh, "$text") or die("Could not write to file");
    flock($fh, LOCK_UN);
  }

  fclose($fh);
  echo "File 'CHAPTER 7 - testfile.txt' successfully updated";

echo "<br><br><b>Example 7-13:</b><br>";
//Reading an Entire File
//Using file_get_contents
echo "<pre>"; // Enables display of line feeds
  echo file_get_contents("CHAPTER 7 - testfile.txt");
  echo "</pre>"; // Terminates pre tag

echo "<br><br><b>Example 7-14:</b><br>";
//Grabbing the O’Reilly home page
//echo file_get_contents("http://oreilly.com");

echo "<br><br><b>Example 7-15:</b><br>";
//Uploading Files
//Image uploader CHAPTER 7- Practical PHP.php
/*
echo <<<_END
    <html><head><title>PHP Form Upload</title></head><body>
    <form method='post' action='CHAPTER 7- Practical PHP.php' enctype='multipart/form-data'>
    Select File: <input type='file' name='filename' size='10'>
    <input type='submit' value='Upload'>
    </form>
_END;

  if ($_FILES)
  {
    $name = $_FILES['filename']['name'];
    move_uploaded_file($_FILES['filename']['tmp_name'], $name);
    echo "Uploaded image '$name'<br><img src='$name'>";
  }

  echo "</body></html>";
*/
echo "<br><b>Example 7-16:</b><br>";
//Validation
//A more secure version of CHAPTER 7- Practical PHP.php
echo <<<_END
    <html><head><title>PHP Form Upload</title></head><body>
    <form method='post' action='CHAPTER 7- Practical PHP.php' enctype='multipart/form-data'>
    Select a JPG, GIF, PNG or TIF File:
    <input type='file' name='filename' size='10'>
    <input type='submit' value='Upload'></form>
_END;

  if ($_FILES)
  {
    $name = $_FILES['filename']['name'];

    switch($_FILES['filename']['type'])
    {
	  case 'image/pjpeg': //progressive JPEG,
      case 'image/jpeg': $ext = 'jpg'; break;
      case 'image/gif':  $ext = 'gif'; break;
      case 'image/png':  $ext = 'png'; break;
      case 'image/tiff': $ext = 'tif'; break;
      default:           $ext = '';    break;
    }
    if ($ext)
    {
      $n = "image.$ext";
      move_uploaded_file($_FILES['filename']['tmp_name'], $n);
      echo "Uploaded image '$name' as '$n':<br>";
      echo "<img src='$n'>";
    }
    else echo "'$name' is not an accepted image file";
  }
  else echo "No image has been uploaded";

  echo "</body></html>";


$name='Gyan@Pragya&Tatiya';
$name = preg_replace("/[^A-Za-z0-9.]/", " ", $name); //preg_replace — Perform a regular expression search and replace
echo "<br><br>".$name;

$name='Gyan@Pragya&Tatiya';
$name = strtolower(preg_replace("/[^A-Za-z0-9.]/", "", $name));
echo "<br>".$name;

echo "<br><b>Example 7-17:</b><br>";
//System Calls - Executing a system command
$cmd = "dir";   // Windows
  // $cmd = "ls"; // Linux, Unix & Mac

  exec(escapeshellcmd($cmd), $output, $status); // - it sanitizes the command string, preventing the execution of arbitrary commands

  if ($status) echo "Exec command failed";
  else
  {
    echo "<pre>";
    foreach($output as $line) echo htmlspecialchars("$line\n"); //The htmlspecialchars function is called to turn any special characters returned by the system into ones that HTML can understand and properly display
    echo "</pre>";
  }



?>

</body>
</html>