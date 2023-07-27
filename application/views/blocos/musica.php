<?php
            if($evento["video"] != ""){
                ?>
                <style>
                     a.sound {
        background: none;
        border: none;
        font-size: 44px;
        height: 40px;
        display: inline-block;
        top: 15px;
        position: relative;
        cursor: pointer;
        
    }

    a.sound p{
        color: <?=$config["corTextoMenu"]?>;
    }
    iframe#player {
        display: none;
    }
                </style>
                <div id="player"></div>
<script>
// 2. This code loads the IFrame Player API code asynchronously.
var tag = document.createElement('script');

tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

// 3. This function creates an <iframe> (and YouTube player)
//    after the API code downloads.
var player;

function onYouTubeIframeAPIReady() {
    player = new YT.Player('player', {
        height: '360',
        width: '640',
        videoId: '<?=$evento["video"]?>',
        events: {
            
            'onStateChange': onPlayerStateChange
        }
    });
}

// 4. The API will call this function when the video player is ready.
function onPlayerReady(event) {
    event.target.playVideo();
}

// 5. The API calls this function when the player's state changes.
//    The function indicates that when playing a video (state=1),
//    the player should play for six seconds and then stop.
var done = false;

function onPlayerStateChange(event) {
    if (event.data == YT.PlayerState.PLAYING && !done) {
        player.unMute();
        playVideo();
    }
}

function playVideo() {
    player.playVideo();
}

function stopVideo() {
    player.stopVideo();
}
</script>
<script>
$(document).ready(function() {
    var tipo = "mute";
    $("a.sound").click(function(){
        
        console.log(tipo)
        if(tipo == "mute"){
            playVideo();
            tipo = "play";
            $("a.sound p").removeClass("ion-ios-volume-mute");
            $("a.sound p").addClass("ion-ios-volume-high");
        }else{
            stopVideo();
            tipo = "mute";
            $("a.sound p").addClass("ion-ios-volume-mute");
            $("a.sound p").removeClass("ion-ios-volume-high");
        }
      
    });
    
    // setTimeout(function() {
    //     playVideo();
    //     console.log("video");
    // }, 5000);
});
</script>

<?php
           }
                ?>