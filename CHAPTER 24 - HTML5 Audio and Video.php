<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>CHAPTER 24 - HTML5 Audio and Video</title>
<script src='CHAPTER 22 - OSC.js'></script>
</head>

<body>

<b>Example 24-1:</b><br>
//Embedding three different types of audio files<br>
<audio controls>
      <source src='CHAPTER 24 - audio.m4a' type='audio/aac'>
      <source src='CHAPTER 24 - audio.mp3' type='audio/mp3'>
      <source src='CHAPTER 24 - audio.ogg' type='audio/ogg'>
</audio>

 <br><br><b>Example 24-2:</b><br>
//Playing audio using JavaScript<br>
<audio id='myaudio'>
      <source src='CHAPTER 24 - audio.m4a' type='audio/aac'>
      <source src='CHAPTER 24 - audio.mp3' type='audio/mp3'>
      <source src='CHAPTER 24 - audio.ogg' type='audio/ogg'>
    </audio>

    <button onclick='playaudio()'>Play Audio</button>
    <button onclick='pauseaudio()'>Pause Audio</button>

    <script>
      function playaudio()
      {
        O('myaudio').play()
      }
      function pauseaudio()
      {
        O('myaudio').pause()
      }
    </script>
    
  <br><br><b>Example 24-3:</b><br>
//Providing a Flash fallback for non-HTML5 browsers<br>
  <audio controls>
      <object type="application/x-shockwave-flash"
        data="CHAPTER 24 - audioplayer.swf" width="300" height="30">
        <param name="FlashVars"
          value="mp3=CHAPTER 24 - audio.mp3&showstop=1&showvolume=1">
      </object>

      <source src='CHAPTER 24 - audio.m4a' type='audio/aac'>
      <source src='CHAPTER 24 - audio.mp3' type='audio/mp3'>
      <source src='CHAPTER 24 - audio.ogg' type='audio/ogg'>
    </audio>
    
<br><br><b>Example 24-4:</b><br>
//Playing HTML5 video<br>
<video width='560' height='320' controls>
      <source src='CHAPTER 22 - movie.mp4'  type='video/mp4'>
      <source src='CHAPTER 22 - movie.webm' type='video/webm'>
      <source src='CHAPTER 22 - movie.ogv'  type='video/ogg'>
    </video>
    
<br><br><b>Example 24-5:</b><br>
//Controlling video playback from JavaScript<br>
<video id='myvideo' width='560' height='320'>
      <source src='CHAPTER 22 - movie.mp4'  type='video/mp4'>
      <source src='CHAPTER 22 - movie.webm' type='video/webm'>
      <source src='CHAPTER 22 - movie.ogv'  type='video/ogg'>
    </video><br>

    <button onclick='playvideo()'>Play Video</button>
    <button onclick='pausevideo()'>Pause Video</button>

    <script>
      function playvideo()
      {
        O('myvideo').play()
      }
      function pausevideo()
      {
        O('myvideo').pause()
      }
    </script>

<br><br><b>Example 24-6</b><br>
//Providing Flash as a fallback video player<br>
<video width='560' height='320' controls>
      <object width='560' height='320'
        type='application/x-shockwave-flash'
        data='CHAPTER 24 - flowplayer.swf'>
        <param name='movie' value='CHAPTER 24 - flowplayer.swf'>
        <param name='flashvars'
          value='config={"clip": {
            "url": "http://tinyurl.com/html5video-mp4",
            "autoPlay":false, "autoBuffering":true}}'>
        </object>

      <source src='CHAPTER 22 - movie.mp4'  type='video/mp4'>
      <source src='CHAPTER 22 - movie.webm' type='video/webm'>
      <source src='CHAPTER 22 - movie.ogv'  type='video/ogg'>
    </video>
    
    

</body>
</html>