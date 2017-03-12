<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>newsfeed</title>
<script src="{{ url('js/jquery-1.10.2.min.js') }}"></script>
<script src="{{ url('js/jquery.marquee.min.js') }}"></script>

<script>
	jQuery.browser = {};
(function () {

    jQuery.browser.msie = false;
    jQuery.browser.version = 0;

    if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
        jQuery.browser.msie = true;
        jQuery.browser.version = RegExp.$1;
    }
})();
</script>
<script src="{{ url('js/jquery.jfeed.js') }}"></script>
<style>

@import url(https://fonts.googleapis.com/earlyaccess/notosanstc.css);
* {
	font-family: 'Noto Sans TC', sans-serif; font-size: 50px;
}

p {
	margin: 0; padding: 0;
}

div#marquee {
	padding: 20px;
    font-size: 50px;
    overflow: hidden;
    width: 100%;
}

div.newsfeed {
	width: 1920px;
	height: 126px;
	position: relative;
	background-image: url("{{ url('images/bg/newsfeed.jpg') }}");
}


div.newsfeed div#marquee {
	margin-bottom: 40px;
	overflow: hidden;
    height: 80px;
    white-space: nowrap;
}


.marquee {
    width: 450px;
    margin: 0 auto;
    white-space: nowrap;
    overflow: hidden;
    box-sizing: border-box;
    border: 1px green solid;
}

.marquee span {
    display: inline-block;
    padding-left: 100%;
    text-indent: 0;
    border: 1px red solid;
    animation: marquee 180s linear infinite;
}
/*.marquee span:hover {
    animation-play-state: paused
}*/

/* Make it move */
@keyframes marquee {
    0%   { transform: translate(0, 0); }
    100% { transform: translate(-100%, 0); }
}
</style>
<script>
// <--- Init data object--->

var updatefreq = 5000;
var feeddata;
var feedlength = 0;
var currentread = 0;
var rthk_news_xml = "http://rthk.hk/rthk/news/rss/c_expressnews_clocal.xml";
// End <--- Init data object--->

$(document).ready(function(){

var feedstring = "";

function updateFeed(){
 jQuery.getFeed({
   url: rthk_news_xml,
   success: function(feed) {
     feeddata = feed;
     feedlength = feeddata['items'].length;
     //loop();

     for (var i = 0; i < feedlength; i++){
     	if (i == 0) feedstring = "";

     	feedstring += feeddata['items'][i]['title'] + " (" + 
	     	feeddata['items'][i]['updated'].substring(feeddata['items'][i]['updated'].length-14, feeddata['items'][i]['updated'].length-9) + ")";
	    feedstring += "　　　　　　　　　　";	
     }

     document.getElementById('content').innerHTML = feedstring;


   }
 });
}

updateFeed();



function showRandomMarquee() {
	updateFeed();

	$('.marquee')
	.marquee('destroy')
	.html(feedstring)
	.marquee({duration: 2000});
}

$('.marquee').bind('finished', showRandomMarquee);

//showRandomMarquee();


// <--- Init loop object--->
function loop(){
	console.log(currentread);
	if (feedlength > 0) {
		if (currentread >= feedlength)
			currentread = 0;
		document.getElementById('newstitle').innerHTML = feeddata['items'][currentread]['title'] + " (" + 
	     	feeddata['items'][currentread]['updated'].substring(feeddata['items'][currentread]['updated'].length-14, feeddata['items'][currentread]['updated'].length-9)
	      + ")";
	    currentread += 1;

	}
	var looptimeout = setTimeout(loop, updatefreq);
}

// End <--- Init loop object--->

});
</script>
</head>

<body>
    <div class="newsfeed">
        <div id="marquee" class="marquee">
            <span id="content"></span>
        </div>
    </div>
</body>

</html>
