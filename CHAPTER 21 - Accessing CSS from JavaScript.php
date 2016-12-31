<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>CHAPTER 21 - Accessing CSS from JavaScript</title>

<style>
/*Example 21-10:</b><br>
  A simple animation*/
      #box {
        position  :absolute;
        background:orange;
        border    :1px solid red;
      }
    </style>
    
</head>

<body>
<b>Example 21-1 and 21-2:</b><br>
<div id='myobj'>Some text</div><br>

<b>Example 21-3:</b><br>
<div id='myobj2'>Some text 2</div><br>

<b>Example 21-5:</b><br>
<div id='object'>Div Object</div>

<br><b>Example 21-6:</b><br>
  //Using inline JavaScript<br>
  <img src='CHAPTER 21 - orange.png'
      onmouseover="this.src='CHAPTER 21 - apple.png'"
      onmouseout="this.src='CHAPTER 21 - orange.png'"><br>
      
   <br><b>Example 21-7:</b><br>
  //Non-inline JavaScript<br>
  <img id='object1' src='CHAPTER 21 - apple.png'><br>

<br><b>Example 21-8:</b><br>
  //Inserting an element into the DOM<br>
  This is a document with only this text in it.<br><br>
   
   <br><b>Example 21-9:</b><br>
  //A clock created using interrupts<br>
  The time is: <span id='time'>00:00:00</span><br>
   
   <br><b>Example 21-10:</b><br>
    <div id='box'></div>
<script>
/*Example 21-1 and 21-2:*/
/*O('myobj').style.color = 'green'*/

/*S('myobj').color = 'green'*/

fred = O('myobj')
S(fred).color = 'green'

/*Example 21-1:</b><br>
  The O() function*/
function O(obj)
{
  if (typeof obj == 'object') return obj
  else return document.getElementById(obj)
}

/*Example 21-2:</b><br>
  The S() functi*/
function S(obj)
{
  return O(obj).style
}

/*Example 21-3:</b><br>
  The C() function*/
function C(name)
{
  var elements = document.getElementsByTagName('*')
  var objects  = []

  for (var i = 0 ; i < elements.length ; ++i)
    if (elements[i].className == name)
      objects.push(elements[i])

  return objects
} 

myarray = C('myobj2')
for (i = 0 ; i < myarray.length ; ++i)
S(myarray[i]).color = 'red'

/*Example 21-5:</b><br>
  Accessing CSS properties from JavaScript*/
      S('object').border     = 'solid 1px red'
      S('object').width      = '100px'
      S('object').height     = '100px'
      S('object').background = '#eee'
      S('object').color      = 'blue'
      S('object').fontSize   = '15pt'
      S('object').fontFamily = 'Helvetica'
      S('object').fontStyle  = 'italic'

/*Example 21-7:</b><br>
  Non-inline JavaScript*/
S('object1').onmouseover = function() { this.src = 'CHAPTER 21 - orange.png' }
S('object1').onmouseout  = function() { this.src = 'CHAPTER 21 - apple.png'  }

/*Example 21-8:</b><br>
  Inserting an element into the DOM*/
  alert('Click OK to add an element')

      newdiv    = document.createElement('div')
      newdiv.id = 'NewDiv'
      document.body.appendChild(newdiv)

      S(newdiv).border = 'solid 1px red'
      S(newdiv).width  = '100px'
      S(newdiv).height = '100px'
      newdiv.innerHTML = "I'm a new object inserted in the DOM"
      tmp              = newdiv.offsetTop

      alert('Click OK to remove the element')
      pnode = newdiv.parentNode
      pnode.removeChild(newdiv)
      tmp = pnode.offsetTop
  
/*Example 21-9:</b><br>
  A clock created using interrupts*/
  setInterval("showtime(O('time'))", 1000)

      function showtime(object)
      {
        var date = new Date()
        object.innerHTML = date.toTimeString().substr(0,8)
      }
  
/*Example 21-10:</b><br>
  A simple animation*/
SIZE = LEFT = 0

       setInterval(animate, 30)

       function animate()
       {
         SIZE += 10
         LEFT += 3

         if (SIZE == 200) SIZE = 0
         if (LEFT == 600) LEFT = 0

         S('box').width  = SIZE + 'px'
         S('box').height = SIZE + 'px'
         S('box').left   = LEFT + 'px'
       }
</script>


	  
     

</body>
</html>