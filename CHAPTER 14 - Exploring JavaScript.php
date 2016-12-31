<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>CHAPTER 14 - Exploring JavaScript</title>
</head>

<body>

<b style='font-size: 30px;'>Learning PHP, MySQL, JavaScript, CSS & HTML5, 3e (2014)</b><br><br>
  <b style='font-size: 20px;'>CHAPTER 14 - Exploring JavaScript</b><br><br>
  
  <b>Example 14-1 and 14-2:</b><br>
  <!--“Hello World” displayed using JavaScript-->
  <script type="text/javascript"><!--
  document.write("Hello World")
    // --></script>
    
    <noscript>
      Your browser doesn't support or has disabled JavaScript
    </noscript>
  
<!--<br><br>Including JavaScript Files
  <script type="text/javascript" src="script.js"></script>
  <script type="text/javascript" src="http://someserver.com/script.js"></script>-->
  
  <br><br>
  String Variables:<br>
  
  <script type="text/javascript">
  
  status = "\"Hello there\" is a greeting"
document.write(status+'<br>')

//Arrays
top = ['R', 'G', 'Y']
mid = ['W', 'R', 'O']
bot = ['Y', 'W', 'G']
face = [top, mid, bot]
document.write(face[1][2]+'<br>')

//Arithmetic Operators
document.write(13 + 2+'<br>')

//Comparison Operators
p=12
q=13
document.write(p==q+'<br>')

//String Concatenation
messages=3
document.write("You have " + messages + " messages."+'<br>')
name = "James"
name += " Dean"
document.write(name+'<br>')

//Escaping Characters
heading = "Name\tAge\tLocation"
document.write(heading+'<br><br>')

document.write("<b>Example 14-8</b><br>")
//Setting a variable’s type by assignment
n = '838102050'        // Set 'n' to a string
  document.write('n = ' + n + ', and is a ' + typeof n + '<br>')

  n = 12345 * 67890;     // Set 'n' to a number
  document.write('n = ' + n + ', and is a ' + typeof n + '<br>')

  n += ' plus some text' // Change 'n' from a number to a string
  document.write('n = ' + n + ', and is a ' + typeof n + '<br>')

n = "123"
n *= 1 // Convert 'n' into a number
document.write('n = ' + n + ', and is a ' + typeof n + '<br>')
n = 123
n += "" // Convert 'n' into a string
document.write('n = ' + n + ', and is a ' + typeof n + '<br><br>')

//Functions

document.write(product(2, 3))

function product(a, b)
{
return a * b
}

document.write("<br><br><b>Example 14-10 and 14-11</b><br>")
//Checking the scope of the variables defined in function test
test()

  if (typeof a != 'undefined') document.write('a = "' + a + '"<br />')
  if (typeof b != 'undefined') document.write('b = "' + b + '"<br />')
  if (typeof c != 'undefined') document.write('c = "' + c + '"<br />')

  function test()
  {
     a     = 123 // Global scope
    var b = 456 // Local scope

    if (a == 123) var c = 789 // Local scope
  }
  
  </script>
  <br><b>Example 14-12:</b><br>
<!--Reading a link URL with JavaScript-->
<a id="mylink" href="http://mysite.com">Click me</a><br/>
<script>
//      url = document.links.mylink.href //Same as url = mylink.href
//	  url = mylink.href
//	  url = document.getElementById('mylink').href //working in Internet Explorer

//Using the DOM
	url = document.links[0].href  
      document.write('The URL is ' + url+'<br><br>')

numlinks = document.links.length
for (j=0 ; j < document.links.length ; ++j)
document.write(document.links[j].href + '<br>')
document.write(history.length)

history.go(-3) //send the browser back three pages
//move back or forward a page 
history.back()
history.forward()

//replace the currently loaded URL with one of your choose
//document.location.href = 'http://google.com'


document.write("<br><br><b>Example 14-13</b><br>")
//Another Use for the $ Symbol - A replacement function for the getElementById method

url = $('mylink').href

function $(id)
{
return document.getElementById(id)
}

</script>


 
  
  
  
</body>
</html>