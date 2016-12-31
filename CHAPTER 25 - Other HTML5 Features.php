<!doctype html>
<html>
<!--<html manifest='CHAPTER 25 - clock.appcache'>--> <!--Example 25-5. The CHAPTER 25 - clock.appcache file-->
<head>
<meta charset="utf-8">
<title>CHAPTER 25 - Other HTML5 Features</title>

<script src='CHAPTER 22 - OSC.js'></script>
<script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
<!--<script src='CHAPTER 25 - clock.js'></script>--> <!--Example 25-7. The CHAPTER 25 - clock.js file-->
<!--<link rel='stylesheet' href='CHAPTER 25 - clock.css'>--> <!--Example 25-8. The CHAPTER 25 - clock.css file-->
<style>
#dest 
{        
background:lightblue;   
border    :1px solid #444;
width     :320px;
height    :100px;
padding   :10px;
}
    
</style>

<style>      
#output 
{       
font-family:"Courier New";       
white-space:pre;
}   
</style>


</head>
<body>

<b>Example 25-1:</b><br>
//Displaying a map of your current location<br>
<div id='status'></div>
    <div id='map'></div>

    <script>
      if (typeof navigator.geolocation == 'undefined')
         alert("Geolocation not supported.")
      else
        navigator.geolocation.getCurrentPosition(granted, denied)

      function granted(position)
      {
        // Uncomment below to popup the location
        //     alert("You are at location:\n"
        //       + position.coords.latitude + ", "
        //       + position.coords.longitude)
	  
        O('status').innerHTML = 'Permission Granted'
        S('map').border       = '1px solid black'
        S('map').width        = '640px'
        S('map').height       = '320px'

        var lat   = position.coords.latitude
        var long  = position.coords.longitude
        var gmap  = O('map')
        var gopts =
        {
          center: new google.maps.LatLng(lat, long),
          zoom: 9, mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(gmap, gopts)
      }

      function denied(error)
      {
        var message

        switch(error.code)
        {
          case 1: message = 'Permission Denied'; break;
          case 2: message = 'Position Unavailable'; break;
          case 3: message = 'Operation Timed Out'; break;
          case 4: message = 'Unknown Error'; break;
        }

        // Uncomment below to popup the message
        //   alert("Error with Geolocation: " + message)

        O('status').innerHTML = message
      }
    </script>

<!--<br><b>Example 25-2:</b><br>
//Getting, setting, and removing local storage data<br>
<script>
      if (typeof localStorage == 'undefined')
      {
        alert("Local storage is not available")
      }
      else
      {
        username = localStorage.getItem('username')
        password = localStorage.getItem('password')
        alert("The current values of 'username' and 'password' are\n\n" +
          username + " / " + password + "\n\nClick OK to assign values")

        localStorage.setItem('username', 'ceastwood')
        localStorage.setItem('password', 'makemyday')
        username = localStorage.getItem('username')
        password = localStorage.getItem('password')
        alert("The current values of 'username' and 'password' are\n\n" +
          username + " / " + password +  "\n\nClick OK to clear values")

        localStorage.removeItem('username')
        localStorage.removeItem('password')
        username = localStorage.getItem('username')
        password = localStorage.getItem('password')
        alert("The current values of 'username' and 'password' are\n\n" +
          username + " / " + password)
      }
</script>-->
    
 <!--<br><b>Example 25-3:</b><br>
//Setting up and communicating with a web worker<br>
   Current highest prime number:
    <span id='result'>0</span>

    <script>
      if (!!window.Worker)
      {
        var worker = new Worker('CHAPTER 25 - worker.js') //Example 25-4. The worker.js web worker

        worker.onmessage = function (event)
        {
          O('result').innerHTML = event.data;
        }
      }
      else
      {
        alert("Web workers not supported")
      }
    </script>-->
    
<!--<br><br><b>Example 25-6:</b><br>
//The CHAPTER 25 - clock.html file<br>
    The time is: <output id='clock'></output>-->

<br><br><b>Example 25-9:</b><br>
//Dragging and dropping objects<br>
<div id='dest' ondrop='drop(event)' ondragover='allow(event)'></div><br>
Drag the images below into the above element<br><br>
<img id='source1' src='CHAPTER 25 - image1.png' draggable='true' ondragstart='drag(event)'>
<img id='source2' src='CHAPTER 25 - image2.png' draggable='true' ondragstart='drag(event)'>
<img id='source3' src='CHAPTER 25 - image3.png' draggable='true' ondragstart='drag(event)'>

<script>      
function allow(event)
{
        event.preventDefault()
}

function drag(event)
{
        event.dataTransfer.setData('image/png', event.target.id)
}

function drop(event)
{
event.preventDefault()
var data=event.dataTransfer.getData('image/png')
event.target.appendChild(O(data))
}   
</script>
    
 <br><br><b>Example 25-10:</b><br>
//Sending web messages to an iframe<br>
<iframe id='frame' src='CHAPTER 25 - Other HTML5 Features.php' width='360' height='75'></iframe>  
<script>
count = 1      
setInterval(function()
{       
O('frame').contentWindow.postMessage('Message ' + count++, '*')     
}, 1000)
</script>

 <br><br><b>Example 25-11:</b><br>
//Receiving messages from another document<br>
<div id='output'>Received messages will display here</div>
    
<script>   
window.onmessage = function(event)
{       
O('output').innerHTML =
          '<b>Origin:</b> ' + event.origin + '<br>' +
          '<b>Source:</b> ' + event.source + '<br>' +
          '<b>Data:</b>   ' + event.data
}    
</script>

<br><br><b>Example 25-12:</b><br>
//Adding microdata to HTML<br>
<section itemscope itemtype='http://schema.org/Person'>
      <img itemprop='image' src='CHAPTER 25 - gw.jpg' alt='George Washington'
        style='margin-right:10px; float:left;'>
      <h2 itemprop='name'>George Washington</h2>
      <p>I am the first <span itemprop='jobTitle'>US President</span>.
      My website is: <a itemprop='url'
        href='http://georgewashington.si.edu'>georgewashington.si.edu</a>.
      My address is:</p>
      <address itemscope itemtype='http://schema.org/PostalAddress' itemprop='address'>
        <span itemprop='streetAddress'>1600 Pennsylvania Avenue</span>,<br>
        <span itemprop='addressLocality'>Washington</span>,<br>
        <span itemprop='addressRegion'>DC</span>,
        <span itemprop='postalCode'>20500</span>,<br>
        <span itemprop='addressCountry'>United States</span>.
      </address>
    </section>
    <script>
      window.onload = function()
      {
        if (!!document.getItems)
        {
          data = document.getItems('http://schema.org/Person')[0]
          alert(data.properties['jobTitle'][0].textContent)
        }
      }
    </script>


</body>
</html>