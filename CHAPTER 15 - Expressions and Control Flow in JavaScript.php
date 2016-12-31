<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>CHAPTER 15 - Expressions and Control Flow in JavaScript</title>
</head>

<body>

<b style='font-size: 30px;'>Learning PHP, MySQL, JavaScript, CSS & HTML5, 3e (2014)</b><br><br>
  <b style='font-size: 20px;'>CHAPTER 15 - Expressions and Control Flow in JavaScript</b><br><br>
  
  <b>Example 15-1:</b><br>
  <!--Four simple Boolean expressions-->
  <script>
  document.write("a: " + (42 > 3) + "<br>")
  document.write("b: " + (91 < 4) + "<br>")
  document.write("c: " + (8 == 2) + "<br>")
  document.write("d: " + (4 < 17) + "<br><br>")
  
  if (1 == true) document.write('true') // True
//if (1 == TRUE) document.write('TRUE') // Will cause an error
  
  
  document.write("<br><br><b>Example 15-2</b><br>")
  <!--Five types of literals-->
  myname = "Peter"
  myage  = 24
  document.write("a: " + 42     + "<br>") // Numeric literal
  document.write("b: " + "Hi"   + "<br>") // String literal
  document.write("c: " + true   + "<br>") // Constant literal
  document.write("d: " + myname + "<br>") // String variable
  document.write("e: " + myage  + "<br>") // Numeric variable
  
  document.write("<br><b>Example 15-3</b><br>")
  <!--Two simple JavaScript statements-->
  day_number = 345
  days_to_new_year = 366 - day_number;
  if (days_to_new_year < 30) document.write("It's nearly New Year")
  
  document.write("<br><br><b>Example 15-4</b><br>")
  <!--Assigning a value and testing for equality-->
  month = "July"
  if (month == "July") document.write("It's the fall")

document.write("<br><br><b>Example 15-5</b><br>")
  <!--The equality and identity operators-->
  a = 1000
  b = "1000"
  if (a == b)  document.write("1")
  if (a === b) document.write("2")

document.write("<br><br><b>Example 15-6</b><br>")
  <!--The four comparison operators-->
a = 7; b = 11
  if (a > b)  document.write("a is greater than b<br>")
  if (a < b)  document.write("a is less than b<br>")
  if (a >= b) document.write("a is greater than or equal to b<br>")
  if (a <= b) document.write("a is less than or equal to b<br>")
  
  document.write("<br><b>Example 15-7</b><br>")
  <!--The logical operators in use-->
  a = 1; b = 0
  document.write((a && b) + "<br>")
  document.write((a || b) + "<br>")
  document.write((  !b  ) + "<br>")

  document.write("<br><b>Example 15-8</b><br>")
  <!--A statement using the || operator-->
 // if (finished == 1 || getnext() == 1) done = 1

document.write("<br><b>Example 15-9</b><br>")
  <!--The if...or statement modified to ensure calling of getnext-->
  //gn = getnext()
  //if (finished == 1 OR gn == 1) done = 1;
  
  document.write("<br><b>Example 15-10</b><br>")
  <!--Using the with statement-->
  string = "The quick brown fox jumps over the lazy dog"

  with (string)
  {
    document.write("The string is " + length + " characters<br>")
    document.write("In upper case it's: " + toUpperCase()+"<br>")
  }
  
  with (document)
  {
    write("The string is " + length + " characters<br>")
  }
  
  document.write("<br><b>Example 15-11</b><br>")
  <!--A script employing the onerror event-->
  onerror = errorHandler //use the new errorHandler function from now onward
    document.write("Welcome to this website") // Deliberate error: document.writ("Welcome to this website")

  function errorHandler(message, url, line)
  {
    out  = "Sorry, an error was encountered.\n\n";
    out += "Error: " + message + "\n";
    out += "URL: "   + url     + "\n";
    out += "Line: "  + line    + "\n\n";
    out += "Click OK to continue.\n\n";
    alert(out);
    return true;
  }

document.write("<br><br><b>Example 15-12</b><br>")
  <!--Trapping an error with try and catch-->
try
  {
    request = new XMLHTTPRequest()
  }
  catch(err)
  {
    // Use a different method to create an XML HTTP Request object
  }
finally
{
//alert("The 'try' clause was encountered")
}

document.write("<br><b>Example 15-13</b><br>")
  <!--A multiline if...else if... statement-->
  page = "News"
  if      (page == "Home")  document.write("You selected Home")
  else if (page == "About") document.write("You selected About")
  else if (page == "News")  document.write("You selected News")
  else if (page == "Login") document.write("You selected Login")
  else if (page == "Links") document.write("You selected Links")
  
  document.write("<br><br><b>Example 15-14 and 15-15</b><br>")
  <!--A switch construct-->
  switch (page)
  {
    case "Home":
      document.write("You selected Home")
      break
    case "About":
      document.write("You selected About")
      break
    case "News":
      document.write("You selected News")
      break
    case "Login":
      document.write("You selected Login")
      break
    case "Links":
      document.write("You selected Links")
      break
    default:
      document.write("Unrecognized selection")
      break
  }

document.write("<br><br><b>Example 15-16</b><br>")
  <!--Using the ternary operator-->
  a=6
  document.write(
    a <= 5 ?
    "a is less than or equal to 5 <br>" :
    "a is greater than 5 <br>"
  )
  
  document.write("<br><b>Example 15-17</b><br>")
  <!--A while loop-->
  counter=0

  while (counter < 5)
  {
    document.write("Counter: " + counter + "<br>")
    ++counter
  }
  
  document.write("<br><b>Example 15-18</b><br>")
  <!--A do ... while loop-->
  count = 1

  do
  {
    document.write(count + " times 7 is " + count * 7 + "<br>")
  } while (++count <= 7)
  
  document.write("<br><b>Example 15-19</b><br>")
  <!--Using a for loop-->
for (count = 1 ; count <= 12 ; ++count)
  {
    document.write(count + " times 12 is " + count * 12 + "<br>");
  }
  
  for (i = 1, j = 1 ; i < 10 ; i++, --j);  //multiple variables and multiple modifications
  
  document.write("<br><b>Example 15-20</b><br>")
  <!--Using the break command in a for loop-->
  haystack     = new Array()
  haystack[17] = "Needle"

  for (j = 0 ; j < 20 ; ++j)
  {
    if (haystack[j] == "Needle")
    {
      document.write("<br>- Found at location " + j)
      break
    }
    else document.write(j + ", ")
  }
  
  document.write("<br><br><b>Example 15-21</b><br>")
  <!--Using the continue command in a for loop-->
  haystack     = new Array()
  haystack[4]  = "Needle"
  haystack[11] = "Needle"
  haystack[17] = "Needle"

  for (j = 0 ; j < 20 ; ++j)
  {
    if (haystack[j] == "Needle")
    {
      document.write("<br>- Found at location " + j + "<br>")
      continue
    }
    document.write(j + ", ")
  }
  
  document.write("<br><br>")
  //Explicit Casting
  n = 3.1415927
i = parseInt(n)
document.write(i+"<br>")
document.write(parseInt(3.1415927))

  
  
  
  
</script>





</body>
</html>