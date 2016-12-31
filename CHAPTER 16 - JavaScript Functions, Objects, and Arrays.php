<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>CHAPTER 16 - JavaScript Functions, Objects, and Arrays</title>
</head>

<body>

<b style='font-size: 30px;'>Learning PHP, MySQL, JavaScript, CSS & HTML5, 3e (2014)</b><br><br>
  <b style='font-size: 20px;'>CHAPTER 16 - JavaScript Functions, Objects, and Arrays</b><br><br>
  
  <b>Example 16-1:</b><br>
  <!--Defining a function-->
  <script>
  displayItems("Dog", "Cat", "Pony", "Hamster", "Tortoise")

  function displayItems(v1, v2, v3, v4, v5)
  {
    document.write(v1 + "<br>")
    document.write(v2 + "<br>")
    document.write(v3 + "<br>")
    document.write(v4 + "<br>")
    document.write(v5 + "<br>")
  }
  
  document.write("<br><b>Example 16-2</b><br>")
  <!--Modifying the function to use the arguments array-->
  displayItems("Dog", "Cat", "Pony", "Hamster", "Tortoise")
  function displayItems()
  {
    for (j = 0 ; j < displayItems.arguments.length ; ++j) // same as arguments.length
      document.write(displayItems.arguments[j] + "<br>") // same as arguments[j]
  }

document.write("<br><b>Example 16-3</b><br>")
  <!--Cleaning up a full name-->
document.write(fixNames("the", "DALLAS", "CowBoys"))

  function fixNames()
  {
    var s = ""

    for (j = 0 ; j < fixNames.arguments.length ; ++j)
      s += fixNames.arguments[j].charAt(0).toUpperCase() +
           fixNames.arguments[j].substr(1).toLowerCase() + " "

    return s.substr(0, s.length-1) // same as return s.substr(0)
  }
  
  document.write("<br><br><b>Example 16-4</b><br>")
  <!--Returning an array of values-->
  words = fixNames2("the", "DALLAS", "CowBoys")

  for (j = 0 ; j < words.length ; ++j)
    document.write(words[j] + "<br>")
	
	words = fixNames2("the", "DALLAS", "CowBoys")
document.write(words[0] + " " + words[2])
	
  function fixNames2()
  {
    var s = new Array()

    for (j = 0 ; j < fixNames2.arguments.length ; ++j)
      s[j] = fixNames2.arguments[j].charAt(0).toUpperCase() +
             fixNames2.arguments[j].substr(1).toLowerCase()

    return s
  }
  
  document.write("<br><br><b>Example 16-5</b><br>")
  <!--Declaring the User class and its method-->
  
 /* function User(forename, username, password)
  {
    this.forename = forename
    this.username = username
    this.password = password

    this.showUser = function()
    {
      document.write("Forename: " + this.forename + "<br>")
      document.write("Username: " + this.username + "<br>")
      document.write("Password: " + this.password + "<br>")
    }
  }*/

document.write("<br><br><b>Example 16-6</b><br>")
  <!--Declaring the User class and its method-->
 /* function User(forename, username, password)
  {
    this.forename = forename
    this.username = username
    this.password = password
    this.showUser = showUser
  }

  function showUser()
  {
    document.write("Forename: " + this.forename + "<br>")
    document.write("Username: " + this.username + "<br>")
    document.write("Password: " + this.password + "<br>")
  }*/
  
  //Creating an Object
  details = new User("Wolfgang", "w.a.mozart", "composer")
  details.greeting = "Hello"
  document.write(details.greeting+"<br>")
  
//  Accessing Objects
name = details.forename
if (details.username == "Admin") loginAsAdmin()
details.showUser()

document.write("<br><b>Example 16-7</b><br>")
  <!--Declaring a class using the prototype keyword for a method-->
  function User(forename, username, password)
  {
    this.forename = forename
    this.username = username
    this.password = password

    User.prototype.showUser = function()
    {
      document.write("Forename: " + this.forename + "<br>")
      document.write("Username: " + this.username + "<br>")
      document.write("Password: " + this.password + "<br>")
    }
  }

  User.prototype.greeting = "Hello"
document.write(details.greeting+"<br>")

//Static methods and properties
User.prototype.greeting = "Hello"
document.write(User.prototype.greeting+"<br>")

//Extending JavaScript objects
String.prototype.nbsp = function()
{
return this.replace(/ /g, '&nbsp;')
}
document.write("The quick brown fox".nbsp()+"<br>")

String.prototype.trim = function()
{
return this.replace(/^\s+|\s+$/g, '')
}
document.write("  Please      trim     me     ".trim())

document.write("<br><br><b>Example 16-8</b><br>")
  <!--Numeric Arrays - Creating, building, and printing an array-->
numbers = []
  numbers.push("One")
  numbers.push("Two")
  numbers.push("Three") // same as numbers = Array("One", "Two", "Three")

  for (j = 0 ; j < numbers.length ; ++j)
    document.write("Element " + j + " = " + numbers[j] + "<br>")
  
document.write("<br><b>Example 16-9</b><br>")
  <!--Associative Arrays - Creating and displaying an associative array-->
  balls = {"golf":   "Golf balls, 6",
           "tennis": "Tennis balls, 3",
           "soccer": "Soccer ball, 1",
           "ping":   "Ping Pong balls, 1 doz"}

  for (ball in balls)
    document.write(ball + " = " + balls[ball] + "<br>")
	
	document.write(balls['soccer'])
	
document.write("<br><br><b>Example 16-10</b><br>")
  <!--Creating a multidimensional numeric array-->	  
  checkerboard = Array(
    Array(' ', 'o', ' ', 'o', ' ', 'o', ' ', 'o'),
    Array('o', ' ', 'o', ' ', 'o', ' ', 'o', ' '),
    Array(' ', 'o', ' ', 'o', ' ', 'o', ' ', 'o'),
    Array(' ', ' ', ' ', ' ', ' ', ' ', ' ', ' '),
    Array(' ', ' ', ' ', ' ', ' ', ' ', ' ', ' '),
    Array('O', ' ', 'O', ' ', 'O', ' ', 'O', ' '),
    Array(' ', 'O', ' ', 'O', ' ', 'O', ' ', 'O'),
    Array('O', ' ', 'O', ' ', 'O', ' ', 'O', ' '))

  document.write("<pre>")

  for (j = 0 ; j < 8 ; ++j)
  {
    for (k = 0 ; k < 8 ; ++k)
      document.write(checkerboard[j][k] + " ")

    document.write("<br>")
  }

  document.write("</pre>")

document.write(checkerboard[7][2]+ "<br><br>")

//Using Array Methods
//concat
fruit = ["Banana", "Grape"]
veg = ["Carrot", "Cabbage"]
document.write(fruit.concat(veg)+"<br>")

pets = ["Cat", "Dog", "Fish"]
more_pets = pets.concat("Rabbit", "Hamster")
document.write(more_pets)

document.write("<br><br><b>Example 16-11</b><br>")
  <!--Using the forEach method-->
pets = ["Cat", "Dog", "Rabbit", "Hamster"]
  pets.forEach(output)

  function output(element, index, array)
  {
    document.write("Element at index " + index + " has the value " +
      element + "<br>")
  }
  
  //for (j = 0 ; j < pets.length ; ++j) output(pets[j], j)
  
  document.write("<br><b>Example 16-12</b><br>")
  <!--Using the join method-->
  pets = ["Cat", "Dog", "Rabbit", "Hamster"]

  document.write(pets.join()      + "<br>")
  document.write(pets.join(' ')   + "<br>")
  document.write(pets.join(' : ') + "<br>")
  
  document.write("<br><b>Example 16-13</b><br>")
  <!--Using the push and pop methods-->
  sports = ["Football", "Tennis", "Baseball"]
  document.write("Start = "      + sports +  "<br>")

  sports.push("Hockey");
  document.write("After Push = " + sports +  "<br>")

  removed = sports.pop()
  document.write("After Pop = "  + sports +  "<br>")
  document.write("Removed = "    + removed + "<br>")

document.write("<br><b>Example 16-14</b><br>")
  <!--Using push and pop inside and outside of a loop-->
numbers = []

  for (j=0 ; j<3 ; ++j)
  {
    numbers.push(j);
    document.write("Pushed " + j + "<br>")
  }

  // Perform some other activity here
  document.write("<br>")

  document.write("Popped " + numbers.pop() + "<br>")
  document.write("Popped " + numbers.pop() + "<br>")
  document.write("Popped " + numbers.pop() + "<br>")

document.write("<br><b>Example 16-15</b><br>")
  <!--Using the reverse method-->
sports = ["Football", "Tennis", "Baseball", "Hockey"]
  sports.reverse()
  document.write(sports)

document.write("<br><br><b>Example 16-16</b><br>")
  <!--Using the sort method-->
  // Alphabetical sort
  sports = ["Football", "Tennis", "Baseball", "Hockey"]
  sports.sort()
  document.write(sports + "<br>")

  // Reverse alphabetical sort
  sports = ["Football", "Tennis", "Baseball", "Hockey"]
  sports.sort().reverse()
  document.write(sports + "<br>")

  // Ascending numeric sort
  numbers = [7, 23, 6, 74]
  numbers.sort(function(a,b){return a - b})
  document.write(numbers + "<br>")

  // Descending numeric sort
  numbers = [7, 23, 6, 74]
  numbers.sort(function(a,b){return b - a})
  document.write(numbers + "<br>")

  
  



</script>
  
  

</body>
</html>