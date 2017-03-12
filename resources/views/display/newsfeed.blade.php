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

//updateFeed();



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
            <span id="content">
                男子浪茄灣玩滑翔傘撞山坡受傷 (21:34)　　　　　　　　　　胡國興晤少數族裔代表 (19:46)　　　　　　　　　　下周日特首選舉論壇　公眾可提交問題 (19:43)　　　　　　　　　　曹星如取21連勝　料需時2個月待傷患康復後重投訓練 (19:28)　　　　　　　　　　多個商會反對逐步取消強積金對沖 (18:54)　　　　　　　　　　8旬男病人染鏈狀乳桿菌死亡　高永文未回應是否誤診 (18:51)　　　　　　　　　　馬紹祥憂外圍環境推高樓價　並稱關注地價高企 (18:49)　　　　　　　　　　梁振英重申UGL事件無利益衝突　簽協議時並非特首 (18:45)　　　　　　　　　　特首選舉民間投票　理大票站因爭議未能開放 (18:42)　　　　　　　　　　3名特首候選人首次同台　論教育及重啟政改 (18:38)　　　　　　　　　　林建岳指董建華說「支持攬過的人」　多名政協稱沒不公 (18:36)　　　　　　　　　　鍾國斌倡政府墊支150億成立基金助僱主付遣散費 (18:30)　　　　　　　　　　馮偉華：教協按會員市民意見及政綱綑綁投票 (17:33)　　　　　　　　　　林鄭月娥：如指政改是一人「衰咗」與團隊精神有出入 (17:30)　　　　　　　　　　袁國強張炳良明日上京商討高鐵香港段事宜 (17:21)　　　　　　　　　　回應覆核議員資格案　曾俊華林鄭月娥均稱依法辦事 (17:17)　　　　　　　　　　約百名市民遊行反對林鄭月娥　梁家傑余若薇參與 (17:07)　　　　　　　　　　梁振英回應UGL事件　稱簽協議時並非行會成員或特首 (17:02)　　　　　　　　　　胡國興曾俊華支持幼師訂薪級表　林鄭月娥倡檢視政策 (16:54)　　　　　　　　　　曾俊華謝教育界提名　林鄭稱辦峰會　胡國興批現屆官員 (16:50)　　　　　　　　　　
            </span>
        </div>
    </div>
</body>

</html>
