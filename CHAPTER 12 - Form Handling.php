<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>CHAPTER 12 - Form Handling</title>
</head>

<body>

<?php 

echo "<b style='font-size: 30px;'>Learning PHP, MySQL, JavaScript, CSS & HTML5, 3e (2014)</b><br><br>
  <b style='font-size: 20px;'>CHAPTER 12 - Form Handling</b><br><br>";
  
  echo "<b>Example 12-1 and 12-2:</b><br>";
  //a simple PHP form handler
  
  if (isset($_POST['name'])) {$name = $_POST['name']; echo "Name: ".$name ;}
  else {$name = "(Not entered)"; echo "Name: ".$name;}
  
echo <<<_END
    
    <form method="post" action="CHAPTER 12 - Form Handling.php">
      What is your name?
      <input type="text" name="name">
      <input type="submit"></form>
   
_END;

echo "<br><b>Example 12-3:</b><br>";
  //Setting default values
 echo <<<_END
 
<form method="post" action="CHAPTER 12 - Form Handling.php"><pre>
Text boxes:
      Loan Amount <input type="text" name="principle" size="100" maxlength="5">
Monthly Repayment <input type="text" name="monthly">
  Number of Years <input type="text" name="years" value="25">
    Interest Rate <input type="text" name="rate"  value="6">
                  <input type="submit">
				
Text areas:				
<textarea name="name" cols="50" rows="3" wrap="soft">This is some default text.</textarea>

<p><label for="loveband">Official Contest Entry</label></p>
<textarea name="band" id="loveband" rows="4" cols="45"
placeholder="Tell us why you love the band."></textarea>

Checkboxes:
<input type="checkbox" name="name" value="value" checked="checked">
I Agree <input type="checkbox" name="agree">
I Agree <input type="checkbox" name="agree" value="1">
Subscribe? <input type="checkbox" name="news" checked="checked">

</pre></form>

_END;

echo "<br><b>Example 12-4:</b><br>";
  //Offering multiple checkbox choices
  
  echo <<<_END
 <form method="post" action="CHAPTER 12 - Form Handling.php"><pre>

   Vanilla <input type="checkbox" name="ice" value="Vanilla">
 Chocolate <input type="checkbox" name="ice" value="Chocolate">
Strawberry <input type="checkbox" name="ice" value="Strawberry">

<b>Example 12-5:</b><br>
  //Submitting multiple values with an array
   Vanilla <input type="checkbox" name="ice[]" value="Vanilla">
 Chocolate <input type="checkbox" name="ice[]" value="Chocolate">
Strawberry <input type="checkbox" name="ice[]" value="Strawberry">

<b>Example 12-6:</b><br>
  //Using radio buttons
8am-Noon<input type="radio" name="time" value="1">
Noon-4pm<input type="radio" name="time" value="2" checked="checked">
4pm-8pm<input type="radio" name="time" value="3">
 
 echo '<input type="hidden" name="submitted" value="yes">'

<select name="name" size="5" multiple="multiple"></select>

<b>Example 12-7:</b><br>
  //Using select
Vegetables
<select name="veg" size="1" >
  <option value="Peas">Peas</option>
  <option selected="selected" value="Beans">Beans</option>
  <option value="Carrots">Carrots</option>
  <option value="Cabbage">Cabbage</option>
  <option value="Broccoli">Broccoli</option>
</select>

<b>Example 12-8:</b><br>
  //Using select with the multiple attribute
  Vegetables
<select name="veg" size="5" multiple="multiple">
  <option value="Peas">Peas</option>
  <option selected="selected" value="Beans">Beans</option>
  <option value="Carrots">Carrots</option>
  <option selected="selected" value="Beans">Cabbage</option>
  <option value="Broccoli">Broccoli</option>
</select>

Labels:
<label>8am-Noon<input type="radio" name="time" value="1"></label>

The submit button:
<input type="submit" value="Search">
<input type="image" name="submit" src="image.gif">

</pre></form>

_END;

$variable =  "<b>hi</b>";
echo $variable."<br>";

echo htmlentities($variable)."<br>";
echo strip_tags($variable);


echo "<br><br><b>Example 12-10:</b><br>";
  //A program to convert values between Fahrenheit and Celsius
  $f = $c = '';

  if (isset($_POST['f'])) $f = sanitizeString($_POST['f']);
  if (isset($_POST['c'])) $c = sanitizeString($_POST['c']);

  if ($f != '')
  {
    $c = intval((5 / 9) * ($f - 32)); //intval — Get the integer value of a variable
    $out = "$f °f equals $c °c";
  }
  elseif($c != '')
  {
    $f = intval((9 / 5) * $c + 32);
    $out = "$c °c equals $f °f";
  }
  else $out = "";

  echo <<<_END

    <pre>
      Enter either Fahrenheit or Celsius and click on Convert
        
      <b>$out</b>
      <form method="post" action="CHAPTER 12 - Form Handling.php">
        Fahrenheit <input type="text" name="f" size="7">
           Celsius <input type="text" name="c" size="7">
                   <input type="submit" value="Convert">
      </form>
    </pre>
  
_END;

  function sanitizeString($var)
  {
    $var = stripslashes($var);
    $var = strip_tags($var);
    $var = htmlentities($var);
    return $var;
  }

echo <<<_END

    <pre>
The autocomplete Attribute:
<form action='CHAPTER 12 - Form Handling.php' method='post' autocomplete='on'>
<input type='text' name='username'>
<input type='password' name='password' autocomplete='off'>

The autofocus Attribute:
<input type='text' name='query' autofocus='autofocus'>

The placeholder Attribute:
<input type='text' name='name' size='50' placeholder='First & Last name'>

The required Attribute:
<input type='text' name='creditcard' required='required'>
<input type="submit" value="Submit">

Override Attributes:
<input type='text' name='field'>
<input type='submit' formaction='CHAPTER 10 - Accessing MySQL Using PHP.php'>

The width and height Attributes:
<input type='image' src='picture.png' width='120' height='80'>

The form Attribute:
<form action='myscript.php' method='post' id='form1'>
</form>
<input type='text' name='username' form='form1'>

The list Attribute:
Select destination:
<input type='url' name='site' list='links'>
<datalist id='links'>
<option label='Google' value='http://google.com'>
<option label='Yahoo!' value='http://yahoo.com'>
<option label='Bing' value='http://bing.com'>
<option label='Ask' value='http://ask.com'>
</datalist>

The min and max Attributes:
<input type='time' name='alarm' value='07:00' min='05:00' max='09:00'>

The step Attribute:
<input type='time' name='meeting' value='12:00'
min='09:00' max='16:00' step='3600'>

The color Input Type:
Choose a color <input type='color' name='color'>

The number and range Input Types:
<input type='number' name='age'>
<input type='range' name='num' min='0' max='100' value='50' step='1'>

Date and time Pickers:
<input type='time' name='time' value='12:34'>


</form>

</pre>
_END;








?>

</body>
</html>