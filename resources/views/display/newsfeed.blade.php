<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="Access-Control-Allow-Origin" content="*.rthk.hk">
<title>newsfeed</title>
<script src="{{ url('js/jquery-1.10.2.min.js') }}"></script>
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
@import  url(https://fonts.googleapis.com/earlyaccess/notosanstc.css);
* {
    font-family: 'Noto Sans TC', sans-serif; font-size: 50px;
}

p {
    margin: 0; padding: 0;
}

div.newsfeed {
    width: 1920px;
    height: 126px;
    line-height: 120px;
    position: relative;
    background-image: url("{{ url('images/bg/newsfeed.jpg') }}");
}


div.newsfeed div#marquee {
    margin-bottom: 40px;
    overflow: hidden;
    height: 80px;
    white-space: nowrap;
}
</style>

<script>
// <--- Init data object--->

var updatefreq = 60000;
var feedlength = 0;
var currentread = 0;
var width_start = 1920;
var rthk_news_xml = "http://rthk9.rthk.hk/rthk/news/rss/c_expressnews_clocal.xml";
var xml_getstatus = 0;
// End <--- Init data object--->

$(document).ready(function(){


var feedstring = "";

function refreshFeed(){
    $('marquee').fadeOut();
    updateFeed();
}

function updateFeed(){
 jQuery.getFeed({
   url: rthk_news_xml,
   success: function(feed) {
    xml_getstatus = 1;

     feed = feed;
     feedlength = feed['items'].length;

     for (var i = 0; i < feedlength; i++){
        if (i == 0) feedstring = "";

        feedstring += feed['items'][i]['title'] + " (" + 
            feed['items'][i]['updated'].substring(feed['items'][i]['updated'].length-14, feed['items'][i]['updated'].length-9) + ")";
        feedstring += "　　　"; 
     }

     $('.newsfeed').html('<marquee behavior="scroll" scrollamount="4" direction="left" width="' + width_start + '"></marquee>');
     $('marquee').text(feedstring);
     $('marquee').marquee();
   }
 });
 var timeout = setTimeout(updateFeed, xml_getstatus == 0 ? 10000 : updatefreq);
}

updateFeed();
});
</script>
</head>

<body>
	<div class="newsfeed">
		<div class="marquee">
			<div style="float: left; white-space: nowrap; padding: 0px 600px; font-size: 50px;">
            <marquee id="content"></marquee>
            </div>
		</div>
	</div>
</body>

</html>
