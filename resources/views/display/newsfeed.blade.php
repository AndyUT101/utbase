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

var currentDateTime = new Date();
var updatefreq = 500;
var weather_updatefreq = 144000;
var weatherdata = null;
var datadata;
var rthk_news_xml = "http://rthk.hk/rthk/news/rss/c_expressnews_clocal.xml";
// End <--- Init data object--->

$(document).ready(function(){

 jQuery.getFeed({
   url: rthk_news_xml,
   success: function(feed) {
     datadata = feed;
     document.getElementById('newstitle').innerHTML = feed['items'][0]['title'] + " (" + 
     	datadata['items'][0]['updated'].substring(datadata['items'][0]['updated'].length-14, datadata['items'][0]['updated'].length-9)
      + ")";
     
   }
 });



// <--- Get newsfeed --->
/*function getCurrentnewsfeed(){
	$.ajax({
	    url: "{{ url($displayitem) }}",
	    type:"GET",
	    dataType:'json',

	    success: function(data){
	        document.getElementById('breakfast1').innerHTML = data[0]['breakfast1'];
	        document.getElementById('breakfast2').innerHTML = data[0]['breakfast2'];
	        document.getElementById('lunch1').innerHTML = data[0]['lunch1'];
	        document.getElementById('lunch2').innerHTML = data[0]['lunch2'];
	        document.getElementById('soup1').innerHTML = data[0]['soup1'];
	        document.getElementById('soup2').innerHTML = data[0]['soup2'];
	        document.getElementById('fruit1').innerHTML = data[0]['fruit1'];
	        document.getElementById('fruit2').innerHTML = data[0]['fruit2'];
	        document.getElementById('teatime1').innerHTML = data[0]['teatime1'];
	        document.getElementById('teatime2').innerHTML = data[0]['teatime2'];
	        document.getElementById('dinner1').innerHTML = data[0]['dinner1'];
	        document.getElementById('dinner2').innerHTML = data[0]['dinner2'];
	        document.getElementById('supper1').innerHTML = data[0]['supper1'];
	        document.getElementById('supper2').innerHTML = data[0]['supper2'];

	        console.log("weather data updated.");

	        $('div.newsfeed div p').flowtype({
			minimum   : 250,
			maximum   : 285,
			minFont   : 26,
			maxFont   : 40,
			fontRatio : 30,
			lineRatio : 1.45
			});
	    },

	     error:function(xhr, ajaxOptions, thrownError){ 
	        
	     }
	});

	var weatherupdate_timeout = setTimeout(getCurrentnewsfeed, weather_updatefreq);

	
}*/

getCurrentnewsfeed();

// <--- Init loop object--->
function loop(){
	currentDateTime = new Date();

	var looptimeout = setTimeout(loop, updatefreq);
}
loop();

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