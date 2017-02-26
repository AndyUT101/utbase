<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>timeweather</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<style>

@import url(https://fonts.googleapis.com/earlyaccess/notosanstc.css);
* {
	font-family: 'Noto Sans TC', sans-serif; font-size: 48px;
}

div.timeweather {
	width: 438px;
	height: 954px;
	position: relative;
	background-image: url("{{ url('images/bg/timeweather.jpg') }}");
}

div.timeweather div {
	width:100%;
	text-align: center;
}

div.timeweather div.time {
	position: absolute;
	top: 150px;
	left: 50%;
	margin-left: -219px;
}

div.timeweather div.date {
	font-size: 30px;
	position: absolute;
	top: 380px;
	left: 50%;
	margin-left: -219px;
}

div.timeweather div.lunar {
	font-size: 30px;
	position: absolute;
	top: 620px;
	left: 50%;
	margin-left: -219px;
}

div.timeweather div.temp {
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
var weather_api_url = "http://api.openweathermap.org/data/2.5/weather?id=1819729&units=metric&appid=92d11c0662b0aef09636babec2b18091";
var weatherdata = null;
// End <--- Init data object--->

$(document).ready(function(){

// <--- Date and Time --->
function displayDate() {
	var y = currentDateTime.getFullYear();
	var m = currentDateTime.getMonth() + 1;
	var d = currentDateTime.getDate();
    document.getElementById('current_date').innerHTML =
    y + "年" + m + "月" + d + "日";
}

function displayTime() {
	var ap = currentDateTime.getHours() < 12 ? 'am' : 'pm';
    var h = currentDateTime.getHours() % 12;
    var m = currentDateTime.getMinutes();
    var s = currentDateTime.getSeconds();
    if (currentDateTime.getHours() / 12)
    h = (h == 0) ? 12 : h;
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('current_time').innerHTML =
    h + ":" + m + ":" + s + " " + ap;
}
function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}

// End <--- Date and Time --->


// <--- Lunar Calendar Calulation --->
var numString="十一二三四五六七八九十";
var lMString="正二三四五六七八九十冬臘";


function displayCurrentLunarDate(){
	    document.getElementById('current_lunar').innerHTML = getLunarDateStr(currentDateTime);
}

function getLunarDateStr(date){
    var tY = date.getFullYear();
    var tM = date.getMonth();
    var tD = date.getDate();
    var l = new Lunar(date);
    var lM = l.month.toFixed(0);
    var pre = (l.isLeap) ? '閏' : '';
    var mStr = pre + lMString[lM-1] + '月';
    var lD = l.day.toFixed(0) - 1;
    pre = (lD <= 10) ? '初' : ((lD <= 19) ? '十' : ((lD <= 29) ? '廿' : '三'));
    var dStr = pre + numString[lD % 10];
    return mStr + dStr;
}

function lYearDays(a){var n,s=348;for(n=32768;n>8;n>>=1)s+=lunarInfo[a-1900]&n?1:0;return s+leapDays(a)}function leapDays(a){return leapMonth(a)?65536&lunarInfo[a-1900]?30:29:0}function leapMonth(a){return 15&lunarInfo[a-1900]}function monthDays(a,n){return lunarInfo[a-1900]&65536>>n?30:29}function Lunar(a){var n,s=0,t=0,i=new Date(1900,0,31),e=(a-i)/864e5;for(this.dayCyl=e+40,this.monCyl=14,n=1900;2050>n&&e>0;n++)t=lYearDays(n),e-=t,this.monCyl+=12;for(0>e&&(e+=t,n--,this.monCyl-=12),this.year=n,this.yearCyl=n-1864,s=leapMonth(n),this.isLeap=!1,n=1;13>n&&e>0;n++)s>0&&n==s+1&&0==this.isLeap?(--n,this.isLeap=!0,t=leapDays(this.year)):t=monthDays(this.year,n),1==this.isLeap&&n==s+1&&(this.isLeap=!1),e-=t,0==this.isLeap&&this.monCyl++;0==e&&s>0&&n==s+1&&(this.isLeap?this.isLeap=!1:(this.isLeap=!0,--n,--this.monCyl)),0>e&&(e+=t,--n,--this.monCyl),this.month=n,this.day=e+1}var lunarInfo=[19416,19168,42352,21717,53856,55632,91476,22176,39632,21970,19168,42422,42192,53840,119381,46400,54944,44450,38320,84343,18800,42160,46261,27216,27968,109396,11104,38256,21234,18800,25958,54432,59984,28309,23248,11104,100067,37600,116951,51536,54432,120998,46416,22176,107956,9680,37584,53938,43344,46423,27808,46416,86869,19872,42448,83315,21200,43432,59728,27296,44710,43856,19296,43748,42352,21088,62051,55632,23383,22176,38608,19925,19152,42192,54484,53840,54616,46400,46496,103846,38320,18864,43380,42160,45690,27216,27968,44870,43872,38256,19189,18800,25776,29859,59984,27480,21952,43872,38613,37600,51552,55636,54432,55888,30034,22176,43959,9680,37584,51893,43344,46240,47780,44368,21977,19360,42416,86390,21168,43312,31060,27296,44368,23378,19296,42726,42208,53856,60005,54576,23200,30371,38608,19415,19152,42192,118966,53840,54560,56645,46496,22224,21938,18864,42359,42160,43600,111189,27936,44448];
// End <--- Lunar Calendar Calulation --->


// <--- Get weather data--->
function getCurrentTemp(){
	$.ajax({
	    url: weather_api_url,
	    type:"GET",
	    dataType:'json',

	    success: function(data){
	        document.getElementById('current_temp').innerHTML = data['main']['temp'].toFixed(1) + " ℃";
	        console.log("weather data updated.");
	    },

	     error:function(xhr, ajaxOptions, thrownError){ 
	        
	     }
	});

	var weatherupdate_timeout = setTimeout(getCurrentTemp, weather_updatefreq);

	
}

getCurrentTemp();

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
	<div class="timeweather">
		<div class="time"><span id="current_time"></span></div>
		<div class="date"><span id="current_date"></span></div>
		<div class="lunar"><span id="current_lunar"></span></div>
		<div class="temp"><span id="current_temp"></span></div>
	</div>
</body>

</html>