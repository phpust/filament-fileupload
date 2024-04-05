<!DOCTYPE html>
<html lang="en">
    <head class="metadata">
        <meta content="text/html; charset=utf-8" http-equiv="content-type">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no" />
        <link rel="stylesheet" type="text/css" href='{{asset("dictionary/{$dictionary}/style.css")}}'>
    </head>
    <body class="page">
        {!! $content !!}
    </body>
    <script>
       var playingButtons = document.getElementsByClassName("play-pron-v2");
       for (var i = 0; i < playingButtons.length; i++) {
           playingButtons[i].onclick = function() {
               playingButton = this;
               var src = playingButton.getAttribute('data-src-mp3');
               var audio = new Audio(src);
               playingButton.classList.add("playing");
               window.playResult = audio.play();
               playResult.catch(e => {
                   playingButton.classList.remove("playing");
                   playingButton.innerHTML = 'Invalid Audio File.';
               });
               audio.addEventListener("ended", function() {
                   playingButton.classList.remove("playing");
               });
           }
       }
    </script>
</html>