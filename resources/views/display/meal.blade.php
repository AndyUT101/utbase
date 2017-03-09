<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>meal</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="{{ url('js/flowtype.js') }}"></script>
<script src="{{ url('js/jquery.textfill.min.js') }}"></script>
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
	width: 310px;
    height: 205px;
    position: absolute;
	text-align: center;
}

div.meal div.block {
	width: 310px;
    height: 90px;
	margin-bottom: 35px;
	overflow: hidden;
	line-height: 90px;
}

div.meal div.block:nth-child(2) {
    top: 115px;
}

div.meal div.breakfast {
	top: 325px;
    left: 30px;
}

div.meal div.lunch {
	top: 325px;
    left: 408px;
}

div.meal div.soup {
    top: 325px;
    left: 776px;
}

div.meal div.fruit {
	top: 325px;
	left: 1146px;
}

div.meal div.teatime {
	top: 697px;
	left: 30px;
}

div.meal div.dinner {
	top: 697px;
	left: 408px;
}

div.meal div.supper {
	top: 697px;
	left: 776px;
}

div.meal div.tmr {
	top: 697px;
	left: 1146px;
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
	        document.getElementById('breakfast1').innerHTML = data['breakfast1'];
	        document.getElementById('breakfast2').innerHTML = data['breakfast2'];
	        document.getElementById('lunch1').innerHTML = data['lunch1'];
	        document.getElementById('lunch2').innerHTML = data['lunch2'];
	        document.getElementById('soup1').innerHTML = data['soup1'];
	        document.getElementById('soup2').innerHTML = data['soup2'];
	        document.getElementById('fruit1').innerHTML = data['fruit1'];
	        document.getElementById('fruit2').innerHTML = data['fruit2'];
	        document.getElementById('teatime1').innerHTML = data['teatime1'];
	        document.getElementById('teatime2').innerHTML = data['teatime2'];
	        document.getElementById('dinner1').innerHTML = data['dinner1'];
	        document.getElementById('dinner2').innerHTML = data['dinner2'];
	        document.getElementById('supper1').innerHTML = data['supper1'];
	        document.getElementById('supper2').innerHTML = data['supper2'];
	        document.getElementById('tmr1').innerHTML = data['tmr1'];
	        document.getElementById('tmr2').innerHTML = data['tmr2'];

	        console.log("weather data updated.");

	        $('div.block').textfill({ 'maxFontPixels' : 50, });
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
			<div class="block"><span id="breakfast1"></span></div>
			<div class="block"><span id="breakfast2"></span></div>
		</div>

		<div class="lunch">
			<div class="block"><span id="lunch1"></span></div>
			<div class="block"><span id="lunch2"></span></div>
		</div>

		<div class="soup">
			<div class="block"><span id="soup1"></span></div>
			<div class="block"><span id="soup2"></span></div>
		</div>

		<div class="fruit">
			<div class="block"><span id="fruit1"></span></div>
			<div class="block"><span id="fruit2"></span></div>
		</div>

		<div class="teatime">
			<div class="block"><span id="teatime1"></span></div>
			<div class="block"><span id="teatime2"></span></div>
		</div>

		<div class="dinner">
			<div class="block"><span id="dinner1"></span></div>
			<div class="block"><span id="dinner2"></span></div>
		</div>

		<div class="supper">
			<div class="block"><span id="supper1"></span></div>
			<div class="block"><span id="supper2"></span></div>
		</div>

		<div class="tmr">
			<div class="block"><span id="tmr1"></span></div>
			<div class="block"><span id="tmr2"></span></div>
		</div>

	</div>
</body>

</html>