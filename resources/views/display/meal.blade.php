<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>meal</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="{{ url('js/flowtype.js') }}"></script>
<style>

@import url(https://fonts.googleapis.com/earlyaccess/notosanstc.css);
* {
	font-family: 'Noto Sans TC', sans-serif; font-size: 36px;
}

p {
	margin: 0; padding: 0;
}

div.meal {
	width: 1482px;
	height: 954px;
	position: relative;
	background-image: url("{{ url('images/bg/meal.jpg') }}");
}

div.meal div {
	width: 285px;
	height: 185px;
    position: absolute;
	text-align: center;
}

div.meal div p {
	width: 285px;
	margin-bottom: 40px;
	overflow: hidden;
    height: 80px;
}

div.meal div.breakfast {
	top: 335px;
	left: 60px;
}

div.meal div.lunch {
	top: 335px;
	left: 410px;
}

div.meal div.soup {
	top: 335px;
	left: 752px;
}

div.meal div.teatime {
	top: 900px;
	left: 1098px;
}

div.meal div.dinner {
	top: 675px;
	left: 410px;
}

div.meal div.supper {
	top: 675px;
	left: 752px;
}

div.meal div.date {
	font-size: 30px;
	position: absolute;
	top: 380px;
	left: 50%;
	margin-left: -219px;
}

div.meal div.lunar {
	font-size: 30px;
	position: absolute;
	top: 620px;
	left: 50%;
	margin-left: -219px;
}

div.meal div.temp {
	font-size: 30px;
	position: absolute;
	top: 850px;
	left: 50%;
	margin-left: -219px;
}
</style>
<script>
// <--- Init data object--->

var currentDateTime = new Date();
var updatefreq = 500;
var weather_updatefreq = 144000;
var weatherdata = null;
// End <--- Init data object--->

$(document).ready(function(){





// <--- Get meal --->
function getCurrentMeal(){
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
	        document.getElementById('teatime1').innerHTML = data[0]['teatime1'];
	        document.getElementById('teatime2').innerHTML = data[0]['teatime2'];
	        document.getElementById('dinner1').innerHTML = data[0]['dinner1'];
	        document.getElementById('dinner2').innerHTML = data[0]['dinner2'];
	        document.getElementById('supper1').innerHTML = data[0]['supper1'];
	        document.getElementById('supper2').innerHTML = data[0]['supper2'];

	        console.log("weather data updated.");

	        $('div.meal div p').flowtype({
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

	var weatherupdate_timeout = setTimeout(getCurrentMeal, weather_updatefreq);

	
}

getCurrentMeal();


$('body').flowtype({
minimum   : 250,
maximum   : 285,
minFont   : 26,
maxFont   : 40,
fontRatio : 30,
lineRatio : 1.45
});

// <--- Init loop object--->
function loop(){
	currentDateTime = new Date();

	displayDate();
	displayCurrentLunarDate();
	displayTime();
	var looptimeout = setTimeout(loop, updatefreq);
}
loop();

// End <--- Init loop object--->


});


</script>
</head>

<body>
	<div class="meal">
		<div class="breakfast">
			<p id="breakfast1"></p>
			<p id="breakfast2"></p>
		</div>

		<div class="lunch">
			<p id="lunch1"></p>
			<p id="lunch2"></p>
		</div>

		<div class="soup">
			<p id="soup1"></p>
			<p id="soup2"></p>
		</div>

		<div class="teatime">
			<p id="teatime1"></p>
			<p id="teatime2"></p>
		</div>

		<div class="dinner">
			<p id="dinner1"></p>
			<p id="dinner2"></p>
		</div>

		<div class="supper">
			<p id="supper1"></p>
			<p id="supper2"></p>
		</div>

	</div>
</body>

</html>