<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>newsfeed</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
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
	font-family: 'Noto Sans TC', sans-serif; font-size: 36px;
}

p {
	margin: 0; padding: 0;
}

p#newstitle {
	padding: 20px;
    font-size: 50px;
}

div.newsfeed {
	width: 1920px;
	height: 126px;
	position: relative;
	background-image: url("{{ url('images/bg/newsfeed.jpg') }}");
}

div.newsfeed div {
	width: 285px;
	height: 185px;
    position: absolute;
	text-align: center;
}

div.newsfeed div p {
	width: 285px;
	margin-bottom: 40px;
	overflow: hidden;
    height: 80px;
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

 jQuery.getFeed({
   url: rthk_news_xml,
   success: function(feed) {
     feeddata = feed;
     feedlength = feeddata['items'].length;
     loop();
   }
 });

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
		<p id="newstitle"></p>
	</div>
</body>

</html>