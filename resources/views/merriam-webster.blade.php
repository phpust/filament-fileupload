<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;  charset=UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no" />
    <link rel="stylesheet" type="text/css" href='{{asset("dictionary/{$dictionary}/style.css")}}'>
</head>
<body>
<div class="redesign-container">
    <div class="container-xxl">
        <div class="row">
            <div id="entryContent" class="entrybox english entry-body" itemscope="" itemtype="http://schema.org/WebPage" lang="en">
                <div class="cdo-dblclick-area">
                    {!! $content !!}
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var playingButtons = document.getElementsByClassName("play-pron-v2"); // <- this gives you  a HTMLCollection
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
</body>
<style>

</style>
</html>
